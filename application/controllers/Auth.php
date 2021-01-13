<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller {

    /** START SHOW ERROR STYLE ARRAY **
        show_error(highlight_string("<?php\n\$result =\n".var_export($result, true).";\n?>"), 505, $heading = 'DEBUG');
    /** END SHOW ERROR STYLE ARRAY **/ 

    public function __construct() {
        parent::__construct();
        $this->load->model('security/Auth_Model','auth_model');
        $this->load->model('security/Profile_Model','profile_model');
        $this->load->model('security/User_Model','user_model');
        $this->load->model('menu/Seminar_Model','seminar_model');
        $this->load->model('menu/Seminar_Detail_Model','seminar_detail_model');
        $this->load->model('security/Gateway_Model','gateway_model');
        $this->load->model('util/Function_Model','fn');
        $this->load->library('rsa');
    }

    public function index_GET() {
        // check session & user auth
        if($this->auth_model->check_log()){
            $result["count_seminar"] = $this->seminar_model->count_all("target_date = DATE(NOW())");
            $result["count_peserta"] = $this->seminar_detail_model->count_all("1=1");
            $result["count_total"] = $this->seminar_model->count_all(array('1' => 1 ));
            $result["list_seminar"] = $this->seminar_model->get_list("1=1");
            $this->load->view('home/index.php',$result, false);return;
        }
        $result = $this->auth_model->auth_menu($this->session->userdata(NAME_SESSION)['token_mod']);
        $saldo_profile = $this->auth_model->auth_saldo($this->session->userdata(NAME_SESSION)['user_profile']);
        $profile = "'".base_url('src/security/User')."?m_pfx=view'";    
        
        $data['mn_profile'] = 'load_menu('.$profile.')';

        $price = ((int)$saldo_profile != 0 )? explode("@",$saldo_profile[0]->user_saldo):0;
        $de_amount = (is_array($price))? $this->rsa->rsa_decrypt($price[1], $price[2],  $price[0]):0;

        $data['saldo_profile'] = (is_numeric($de_amount))? $de_amount:0;
        $data['list_menu'] = '';
        if ($result) {
            foreach ($result as $list_mn) {
                $mn = "'".base_url($list_mn->menu_url)."?m_pfx=view'";
                $data['list_menu'] .= '
                  <ul class="sidebar-menu">
                    <li><a onclick="load_menu('.$mn.')"><i class="fa fa-table"></i><span>'.$list_mn->menu_name_id.'</span></a></li>
                  </ul>
                ';
            }
        }

        $this->load->view('dashboard/index.php',$data);
		return;
    }

    public function index_POST(){
        $result = $this->auth_model->auth_login($this->input->post('username'),$this->input->post('password'));
        if($result){
            $session_data = array(
                 'auth'             => 'is_valid'
                ,'token_mod'        => $result[0]->token_mod
                ,'user_role'        => $result[0]->role_code
                ,'user_organisasi'  => $result[0]->organisasi_code
                ,'user_profile'     => $result[0]->profile_code
                ,'user_name'        => $result[0]->user_name
                ,'user_role_en'     => $result[0]->role_name_en
                ,'user_role_id'     => $result[0]->role_name_id
                ,'user_photo'       => $result[0]->user_photo
                ,'status'           => true
            );

            // remove data session
            $this->session->unset_userdata(NAME_SESSION);

	        // Add data session
            $this->session->set_userdata(NAME_SESSION, $session_data);
	        // Add data in session
            $data["data"] = "";
	        $data["message"] = VALID_LOGIN_MESSAGE;
	        $data["status"] = TRUE;
	        $data["url"] = base_url();
        	$this->response($data, REST_Controller::HTTP_OK);
        	return;
		}
        $data["message"] = INVALID_LOGIN_MESSAGE;
        $data["status"] = FALSE;
        $data["url"] = base_url();
    	$this->response($data, REST_Controller::HTTP_OK);
    	return;
    }

    // register
    public function register_POST(){

        // $code = $this->fn->generade_code($this->session->userdata(NAME_SESSION)['user_branch'].'-','code','','mn_city',5);
        $result = $this->user_model->get_one(array('username' =>$this->input->post('username')));
        if ($result == null) {
            $code = $this->fn->generade_code('PRFL-','code','PRFL-','sys_profile',4);
            $data = array(
                     'code'             => $code
                    ,'first_name'       => $this->input->post('fName')
                    ,'last_name'        => $this->input->post('lName')
                    ,'organisasi_code'  => 'ORG-000'
                    ,'status'           => 1
                );
            $data = $this->profile_model->insert($data);
            $data = array(
                     'code'             => "UEU/USR/".$code
                    ,'profile_code'     => $code
                    ,'role_code'        => "ROLE-003"
                    ,'username'         => $this->input->post('username')
                    ,'password'         => md5($this->input->post('password'))
                    ,'status'           => 1
                );
            $result = $this->user_model->insert($data);
            if ($result) {
                $result_data = $this->auth_model->auth_login($this->input->post('username'),$this->input->post('password'));
                if($result_data){
                    $session_data = array(
                         'auth'             => 'is_valid'
                        ,'token_mod'        => $result_data[0]->token_mod
                        ,'user_role'        => $result_data[0]->role_code
                        ,'user_organisasi'  => $result_data[0]->organisasi_code
                        ,'user_profile'     => $result_data[0]->profile_code
                        ,'user_name'        => $result_data[0]->user_name
                        ,'user_role_en'     => $result_data[0]->role_name_en
                        ,'user_role_id'     => $result_data[0]->role_name_id
                        ,'user_photo'       => $result_data[0]->user_photo
                        ,'status'           => true
                    );

                    // remove data session
                    $this->session->unset_userdata(NAME_SESSION);

                    // Add data session
                    $this->session->set_userdata(NAME_SESSION, $session_data);
                    // Add data in session
                    $data["data"] = "";
                    $data["message"] = VALID_LOGIN_MESSAGE;
                    $data["status"] = TRUE;
                    $data["url"] = base_url();
                    $this->response($data, REST_Controller::HTTP_OK);
                    return;
                }
            }
        }
        $data["message"] = "User Name Sudah Terdaftar";
        $data["status"] = FALSE;
        $data["url"] = base_url();
        $this->response($data, REST_Controller::HTTP_OK);
        return;
    }

    // reqs log out user
    public function logout_GET(){
        $this->session->unset_userdata(NAME_SESSION);
        redirect(base_url(), 'refresh');
        return;
    }

    // reqs print
    public function print_GET(){
        $this->load->view('print/print1.php');
        return;
    }
    // reqs print
    public function checkout_GET(){
        echo $this->gateway_model->transaction_data();
        return;
        $data['token'] = $this->gateway_model->transaction_data();
        $this->response($data, REST_Controller::HTTP_OK);
        return;
    }

    public function uploads_POST() { 
        
        // echo json_decode("disini");
        // die;
        $config['upload_path'] = './assets/uploads/'; 
        $config['allowed_types'] = 'gif|jpeg|jpg|png'; 
        // $config['max_size'] = 500; 
        // $config['max_width'] = 260; 
        // $config['max_height'] = 260; 
        // $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config); 
        if($this->upload->do_upload("file_name")){
            $data = array('upload_data' => $this->upload->data());
 
            // $title= $this->input->post('profile_image');
            // $image= $data['upload_data']['file_name']; 
             
            // $result= $this->upload_model->save_upload($title,$image);
            echo json_decode($data);
            return;
        }
    }


}