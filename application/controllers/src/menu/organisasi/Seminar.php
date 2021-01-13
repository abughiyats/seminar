<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Seminar extends REST_Controller {	
	var $alias_table = 'seminar_';
	public function __construct(){
		parent::__construct();
		$this->load->model('menu/Seminar_Model','seminar_model');
		$this->load->model('util/Function_Model','fn');
        $this->load->model('security/Gateway_Model','gateway_model');
        $this->load->model('security/Transaction_Log_Model','transaction_log_model');
	}

	public function index_GET(){
        $mn_tambah = "'".base_url('src/menu/organisasi/Seminar')."?m_pfx=form'";
        $mn_cancel = "'".base_url('src/menu/organisasi/Seminar')."?m_pfx=view'";
        $mn = "'".base_url('src/menu/organisasi/Seminar')."?m_pfx=form'";
		$data['tambah'] = 'load_menu('.$mn_tambah.')';
		$data['cancel'] = 'load_menu('.$mn_cancel.')';
		$data['seminar_code'] = $this->input->get('code');

		if(!empty($this->input->get('m_pfx'))){
			if($this->input->get('m_pfx')=="form"){
				$this->load->view('menu/organisasi/seminar/form.php',$data);
				return;
			}
		}
		$this->load->view('menu/organisasi/seminar/view.php',$data);
		return;
	}

	public function index_POST(){
		if(!empty($this->input->post('seminar_code'))){
			$where = array('code' => $this->input->post('seminar_code'));
		}else{
			$where = "";
		}

		$data = $this->seminar_model->get_One($where);
		print $this->load->view('menu/organisasi/seminar/form.php',$data);
	}

	public function ajax_list_GET(){
		if(!empty($this->input->get('seminar_code'))){$where = array($this->seminar_model->column_search[0] => $this->input->get('seminar_code'));
		}else{$where = "1=1";}

		$result = $this->seminar_model->get_datatables($where);
		$data = array();
		$no = $this->input->get('seminar_start');
		foreach ($result as $seminar_list) {
        	$edit_seminar = "'".base_url('src/menu/organisasi/Seminar')."?m_pfx=form&code=".$seminar_list->seminar_code."'";

			$delete_seminar = "delete_seminar('".$seminar_list->seminar_code."')";
			$print_seminar = "print_review('".base_url()."auth/print?code=".$seminar_list->seminar_code."')";
			$checkout_seminar = "check_out('".$seminar_list->seminar_code/**$this->gateway_model->transaction_data()**/."')";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $seminar_list->seminar_code;
			$row[] = $seminar_list->seminar_title;
			$row[] = date("d-m-Y", strtotime($seminar_list->seminar_target_date));
			$row[] = $seminar_list->seminar_pembicara;
			$row[] = $seminar_list->seminar_location;
			$row[] = date("d-m-Y", strtotime($seminar_list->seminar_close_regist_date));
			$row[] = $seminar_list->seminar_qouta;
			$row[] = $seminar_list->seminar_price;
			$row[] = '
					<button class="btn btn-primary" onclick="load_menu('.$edit_seminar.')" title="edit" ><i class="fa fa-fw fa-lg fa-edit"></i></button>
					<button class="btn btn-danger" onclick="'.$delete_seminar.'" title="delete" ><i class="fa fa-fw fa-lg fa-remove"></i></button>
				';

			$data[] = $row;
		}

		if(!$result){$message = $this->fn->get_message($this->input->get('seminar_code'), READ, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('seminar_code'), READ, TRUE); $status = TRUE;}

		$data = array(
				  "draw" => $this->input->get('draw')
				, "recordsTotal" => $this->seminar_model->get_count($where)
				, "recordsFiltered" => $this->seminar_model->count_filtered($where)
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
			$where = $this->seminar_model->column_search[0]." = '".$this->input->get('code')."' ";
		}else{
			$where = "";
		}

		$result = $this->seminar_model->get_One($where);
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
		$result = $this->seminar_model->get_list($where);

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
		if(!empty($this->input->post('seminar_code'))){
			$code = $this->fn->generade_code('SMR/'.$this->session->userdata(NAME_SESSION)['user_organisasi'].'-','code','SMR/'.$this->session->userdata(NAME_SESSION)['user_organisasi'].'-','mn_seminar',5);
			$data = array(
					 'code' => $code
					,'organisasi_code' => $this->session->userdata(NAME_SESSION)['user_organisasi']
					,'title' => $this->input->post('seminar_title')
					,'target_date' => date("Y-m-d", strtotime($this->input->post('seminar_target_date')))
					,'pembicara' => $this->input->post('seminar_pembicara')
					,'open_regist_date' => date("Y-m-d", strtotime($this->input->post('seminar_open_regist_date')))
					,'close_regist_date' => date("Y-m-d", strtotime($this->input->post('seminar_close_regist_date')))
					,'qouta' => $this->input->post('seminar_qouta')
					,'location' => $this->input->post('seminar_location')
					,'price' => $this->input->post('seminar_price')
					,'certificate_status' => $this->input->post('seminar_certificate_status')
					,'remark' => $this->input->post('seminar_remark')
					,'created_by' => $this->session->userdata(NAME_SESSION)['user_name']
					,'created_date' => date("Y-m-d H:i:s")
				);
		}else{
			$data = "";
		}
		$result = $this->seminar_model->insert($data);

		if(!$result){
			$message = $this->fn->get_message($this->input->post('seminar_name'), CREATE,  FALSE); $status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->post('seminar_name'), CREATE, TRUE); $status = TRUE;
				$code_log = $this->fn->generade_code('LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','code','LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','sys_transaction_log',3);
				$data_log = array(
					 'code' => $code_log
					,'menu_alias' => 'SMR'
					,'transaction_code' => $code
					,'action' => 'INSERT_DATA'
					,'profile_code' => $this->session->userdata(NAME_SESSION)['user_profile']
					,'description' => 'Berhasil'
					,'created_by' => $this->session->userdata(NAME_SESSION)['user_name']
					,'created_date' => date("Y-m-d H:i:s")
				);
				$this->transaction_log_model->insert($data_log);

		}

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
		if(!empty($this->input->post('seminar_code'))){
			$data = array(
					 'title' => $this->input->post('seminar_title')
					,'target_date' => date("Y-m-d", strtotime($this->input->post('seminar_target_date')))
					,'pembicara' => $this->input->post('seminar_pembicara')
					,'open_regist_date' => date("Y-m-d", strtotime($this->input->post('seminar_open_regist_date')))
					,'close_regist_date' => date("Y-m-d", strtotime($this->input->post('seminar_close_regist_date')))
					,'qouta' => $this->input->post('seminar_qouta')
					,'location' => $this->input->post('seminar_location')
					,'price' => $this->input->post('seminar_price')
					,'certificate_status' => $this->input->post('seminar_certificate_status')
					,'remark' => $this->input->post('seminar_remark')
					,'updated_by' => $this->session->userdata(NAME_SESSION)['user_name']
					,'updated_date' => date("Y-m-d H:i:s")
				);
		}else{
			$data = "";
		}

		$result = $this->seminar_model->update($data, array($this->seminar_model->column_search[0] => $this->input->post('seminar_code')));

		if(!$result){
			$message = $this->fn->get_message($this->input->post('seminar_name'), UPDATE, FALSE); $status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->post('seminar_name'), UPDATE, TRUE); $status = TRUE;
				$code = $this->input->post('seminar_code');
				$code_log = $this->fn->generade_code('LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','code','LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','sys_transaction_log',3);
				$data_log = array(
					 'code' => $code_log
					,'menu_alias' => 'SMR'
					,'transaction_code' => $code
					,'action' => 'UPDATE_DATA'
					,'profile_code' => $this->session->userdata(NAME_SESSION)['user_profile']
					,'description' => 'Berhasil'
					,'created_by' => $this->session->userdata(NAME_SESSION)['user_name']
					,'created_date' => date("Y-m-d H:i:s")
				);
				$this->transaction_log_model->insert($data_log);
		}
		
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
		if(!empty($this->input->get('seminar_code'))){
			$where = array('code' => $this->input->get('seminar_code'));
		}else{
			$where = "";
		}

		$result = $this->seminar_model->delete($where);

		if (!$result){
			$message = $this->fn->get_message($this->input->get('seminar_code'), DELETE, FALSE); $status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->get('seminar_code'), DELETE, TRUE);  $status = TRUE;
				$code = $this->input->get('seminar_code');
				$code_log = $this->fn->generade_code('LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','code','LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','sys_transaction_log',3);
				$data_log = array(
					 'code' => $code_log
					,'menu_alias' => 'SMR'
					,'transaction_code' => $code
					,'action' => 'DELETE_DATA'
					,'profile_code' => $this->session->userdata(NAME_SESSION)['user_profile']
					,'description' => 'Berhasil'
					,'created_by' => $this->session->userdata(NAME_SESSION)['user_name']
					,'created_date' => date("Y-m-d H:i:s")
				);
				$this->transaction_log_model->insert($data_log);
		}
		
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