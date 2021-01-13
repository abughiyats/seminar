<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Topup extends REST_Controller {

    /** START SHOW ERROR STYLE ARRAY **
        show_error(highlight_string("<?php\n\$result =\n".var_export($result, true).";\n?>"), 505, $heading = 'DEBUG');
    /** END SHOW ERROR STYLE ARRAY **/ 

    public function __construct() {
        parent::__construct();
        $this->load->model('security/Saldo_Model','saldo_model');
        $this->load->model('security/Profile_Model','profile_model');
        $this->load->library('rsa');
    }

    public function index_GET() {
        $this->load->view('topup/index.php');
        return;
    }

    // FUNGSI MENYIMPAN DATA
    public function index_POST() { 
    
        $result = json_decode($this->input->post('result_data'));

    /** START SHOW ERROR STYLE ARRAY **
        show_error(highlight_string("<?php\n\$result =\n".var_export($result, true).";\n?>"), 505, $heading = 'DEBUG');
    /** END SHOW ERROR STYLE ARRAY **/ 

        $keys = $this->rsa->generate_keys();
        $modulo = $keys[0];
        $publicKey = $keys[1];
        $privateKey = $keys[2];

        $en_amount = $this->rsa->rsa_encrypt($this->input->post('saldo'),  $publicKey,  $modulo);
        $de_amount = $this->rsa->rsa_decrypt($en_amount,  $privateKey,  $modulo);

        $time = time();
        $data = array(
                 'code' => null
                ,'profile_code' => $this->session->userdata(NAME_SESSION)['user_profile']
                ,'price' => $this->input->post('amount')
                ,'description' => "PENAMBAHAN SALDO"
                ,'log_date' => date("Y-m-d H:i:s O",$time)
            );
        $result =  $this->saldo_model->insert($data);
        
        $data = array('saldo' => $modulo."@".$en_amount."@".$privateKey);
        $result = $this->profile_model->update($data, array("code" => $this->session->userdata(NAME_SESSION)['user_profile']));
        //FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
    }

}