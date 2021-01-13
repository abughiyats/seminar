<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Management_Organisasi extends REST_Controller {	
	var $alias_table = 'management_organisasi_';
	public function __construct(){
		parent::__construct();
		$this->load->model('menu/Management_Organisasi_Model','management_organisasi_model');
		$this->load->model('util/Function_Model','fn');
        $this->load->model('security/Gateway_Model','gateway_model');
	}

	public function index_GET(){
        $mn_tambah = "'".base_url('src/menu/Management_Organisasi')."?m_pfx=form'";
        $mn_cancel = "'".base_url('src/menu/Management_Organisasi')."?m_pfx=view'";
        $mn = "'".base_url('src/menu/Management_Organisasi')."?m_pfx=form'";
		$data['tambah'] = 'load_menu('.$mn_tambah.')';
		$data['cancel'] = 'load_menu('.$mn_cancel.')';
		$data['management_organisasi_code'] = $this->input->get('code');

		if(!empty($this->input->get('m_pfx'))){
			if($this->input->get('m_pfx')=="form"){
				$this->load->view('menu/management-organisasi/form.php',$data);
				return;
			}
		}
		$this->load->view('menu/management-organisasi/view.php',$data);
		return;
	}

	public function index_POST(){
		if(!empty($this->input->post('management_organisasi_code'))){
			$where = array('code' => $this->input->post('management_organisasi_code'));
		}else{
			$where = "";
		}

		$data = $this->management_organisasi_model->get_One($where);
		print $this->load->view('menu/management-organisasi/form.php',$data);
	}

	public function ajax_list_GET(){
		if(!empty($this->input->get('management_organisasi_code'))){$where = array($this->management_organisasi_model->column_search[0] => $this->input->get('management_organisasi_code'));
		}else{$where = "1=1";}

		$result = $this->management_organisasi_model->get_datatables($where);
		$data = array();
		$no = $this->input->get('management_organisasi_start');
		foreach ($result as $management_organisasi_list) {
        	$edit_city = "'".base_url('src/menu/management-organisasi')."?m_pfx=form&code=".$management_organisasi_list->management_organisasi_code."'";

			$delete_city = "delete_city('".$management_organisasi_list->management_organisasi_code."')";
			$print_city = "print_review('".base_url()."auth/print?code=".$management_organisasi_list->management_organisasi_code."')";
			$checkout_city = "check_out('".$management_organisasi_list->management_organisasi_code/**$this->gateway_model->transaction_data()**/."')";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $management_organisasi_list->management_organisasi_code;
			$row[] = $management_organisasi_list->management_organisasi_name;
			$row[] = '
					<button class="btn btn-primary" onclick="load_menu('.$edit_city.')" title="edit" ><i class="fa fa-fw fa-lg fa-edit"></i></button>
				';

			$data[] = $row;
		}

		if(!$result){$message = $this->fn->get_message($this->input->get('management_organisasi_code'), READ, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('management_organisasi_code'), READ, TRUE); $status = TRUE;}

		$data = array(
				  "draw" => $this->input->get('draw')
				, "recordsTotal" => $this->management_organisasi_model->get_count($where)
				, "recordsFiltered" => $this->management_organisasi_model->count_filtered($where)
				, "data" => $data
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI MENGAMBIL SATU DATA
	public function reqs_one_GET(){
		if(!empty($this->input->get('code'))){
			$where = $this->management_organisasi_model->column_search[0]." = '".$this->input->get('code')."' ";
		}else{
			$where = "";
		}

		$result = $this->management_organisasi_model->get_One($where);
		if(!$result){$message = $this->fn->get_message($this->input->get('code'), READ, FALSE);$status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('code'), READ, TRUE); $status = TRUE;}

		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI MENGAMBIL BANYAK DATA
	public function reqs_list_GET(){
		if(!empty($this->input->get('code'))){
			$where = "code LIKE '%".$this->input->get('code')."%' ";
		}else{
			$where = "";
		}
		$result = $this->management_organisasi_model->get_list($where);

		if(!$result){$message = $this->fn->get_message($this->input->get('code'), READ, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('code'), READ, TRUE); $status = TRUE;}
		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI MENYIMPAN DATA
	public function insert_POST() {	
		if(!empty($this->input->post('management_organisasi_code'))){
			$code = $this->fn->generade_code($this->input->post('management_organisasi_organisasi_code').'-','code','','mst_management_organisasi',5);
			$data = array(
					 'code' => $code
					,'name' => $this->input->post('management_organisasi_name')
				);
		}else{
			$data = "";
		}
        $data_user = array(
                 'code' => $this->session->userdata(NAME_SESSION)['user_branch'].'-'.$code
                ,'organisasi_code' => $this->input->post('management_organisasi_organisasi_code')
                ,'role_code' => $this->input->post('management_organisasi_role_code')
                ,'username' => $code
                ,'password' => md5($this->input->post('management_organisasi_password'))
                ,'status' => 1
            );

        $result = $this->user_model->insert($data_user);
        if ($result) {
			$result = $this->management_organisasi_model->insert($data);
        }

		if(!$result){$message = $this->fn->get_message($this->input->post('management_organisasi_name'), CREATE,  FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('management_organisasi_name'), CREATE, TRUE); $status = TRUE;}

		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI UBAH DATA
	public function update_POST(){
		if(!empty($this->input->post('management_organisasi_code'))){
			$data = array(
					 'name' => $this->input->post('management_organisasi_name')
				);
		}else{
			$data = "";
		}

		$result = $this->management_organisasi_model->update($data, array($this->management_organisasi_model->column_search[0] => $this->input->post('management_organisasi_code')));

		if(!$result){$message = $this->fn->get_message($this->input->post('management_organisasi_name'), UPDATE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('management_organisasi_name'), UPDATE, TRUE); $status = TRUE;}
		
		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI HAPUS
	public function delete_GET(){
		if(!empty($this->input->get('management_organisasi_code'))){
			$where = array('code' => $this->input->get('management_organisasi_code'));
		}else{
			$where = "";
		}

		$result = $this->management_organisasi_model->delete($where);

		if (!$result){$message = $this->fn->get_message($this->input->get('management_organisasi_code'), DELETE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('management_organisasi_code'), DELETE, TRUE);  $status = TRUE;}
		
		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

}