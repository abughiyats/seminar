<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller {	
	var $alias_table = 'user_';
	public function __construct(){
		parent::__construct();
		$this->load->model('User_Model','user_model');
		$this->load->model('util/Function_Model','fn');
        $this->load->model('security/Gateway_Model','gateway_model');
	}

	public function index_GET(){
        $mn_tambah = "'".base_url('src/security/User')."?m_pfx=form'";
        $mn_cancel = "'".base_url('src/security/User')."?m_pfx=view'";
        $mn = "'".base_url('src/security/User')."?m_pfx=form'";
		$data['tambah'] = 'load_menu('.$mn_tambah.')';
		$data['cancel'] = 'load_menu('.$mn_cancel.')';
		$data['user_code'] = $this->input->get('code');

		if(!empty($this->input->get('m_pfx'))){
			if($this->input->get('m_pfx')=="form"){
				$this->load->view('user/form.php',$data);
				return;
			}
		}
		$this->load->view('user/view.php',$data);
		return;
	}

	public function index_POST(){
		if(!empty($this->input->post('user_code'))){
			$where = array('code' => $this->input->post('user_code'));
		}else{
			$where = "";
		}

		$data = $this->user_model->get_One($where);
		print $this->load->view('user/form.php',$data);
	}

	public function ajax_list_GET(){
		if(!empty($this->input->get('user_code'))){$where = array($this->user_model->column_search[0] => $this->input->get('user_code'));
		}else{$where = "1=1";}

		$result = $this->user_model->get_datatables($where);
		$data = array();
		$no = $this->input->get('user_start');
		foreach ($result as $user_list) {
        	$edit_user = "'".base_url('src/security/User')."?m_pfx=form&code=".$user_list->user_code."'";

			$delete_user = "delete_user('".$user_list->user_code."')";
			$print_user = "print_review('".base_url()."auth/print?code=".$user_list->user_code."')";
			$checkout_user = "check_out('".$user_list->user_code/**$this->gateway_model->transaction_data()**/."')";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $user_list->user_code;
			$row[] = $user_list->user_name;
			$row[] = '
					<button class="btn btn-primary" onclick="load_menu('.$edit_user.')" title="edit" ><i class="fa fa-fw fa-lg fa-edit"></i></button>
					<button class="btn btn-danger" onclick="'.$delete_user.'" title="delete" ><i class="fa fa-fw fa-lg fa-remove"></i></button>
					<button class="btn btn-warning" onclick="'.$print_user.'" title="print" ><i class="fa fa-fw fa-lg fa-print"></i></button>
					<button class="btn btn-warning" onclick="'.$checkout_user.'" title="midtrans" ><i class="fa fa-fw fa-lg fa-pie-chart"></i></button>
				';

			$data[] = $row;
		}

		if(!$result){$message = $this->fn->get_message($this->input->get('user_code'), READ, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('user_code'), READ, TRUE); $status = TRUE;}

		$data = array(
				  "draw" => $this->input->get('draw')
				, "recordsTotal" => $this->user_model->get_count($where)
				, "recordsFiltered" => $this->user_model->count_filtered($where)
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
			$where = $this->user_model->column_search[0]." = '".$this->input->get('code')."' ";
		}else{
			$where = "";
		}

		$result = $this->user_model->get_One($where);
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
		$result = $this->user_model->get_list($where);

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
		if(!empty($this->input->post('user_code'))){
			$code = $this->fn->generade_code($this->session->userdata(NAME_SESSION)['user_branch'].'-','code','','mn_user',5);
			$data = array(
					 'code' => $code
					,'name' => $this->input->post('user_name')
				);
		}else{
			$data = "";
		}
		$result = $this->user_model->insert($data);

		if(!$result){$message = $this->fn->get_message($this->input->post('user_name'), CREATE,  FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('user_name'), CREATE, TRUE); $status = TRUE;}

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
		if(!empty($this->input->post('user_code'))){
			$data = array(
					 'name' => $this->input->post('user_name')
				);
		}else{
			$data = "";
		}

		$result = $this->user_model->update($data, array($this->user_model->column_search[0] => $this->input->post('user_code')));

		if(!$result){$message = $this->fn->get_message($this->input->post('user_name'), UPDATE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('user_name'), UPDATE, TRUE); $status = TRUE;}
		
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
		if(!empty($this->input->get('user_code'))){
			$where = array('code' => $this->input->get('user_code'));
		}else{
			$where = "";
		}

		$result = $this->user_model->delete($where);

		if (!$result){$message = $this->fn->get_message($this->input->get('user_code'), DELETE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('user_code'), DELETE, TRUE);  $status = TRUE;}
		
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