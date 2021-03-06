<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Master_Organisasi extends REST_Controller {	

	public function __construct(){
		parent::__construct();
		$this->load->model('master/Organisasi_Model','organisasi_model');
		$this->load->model('util/Function_Model','fn');
        $this->load->model('security/Gateway_Model','gateway_model');
        $this->load->model('security/Transaction_Log_Model','transaction_log_model');
	}

	public function index_GET(){
        $mn_tambah = "'".base_url('src/menu/admin/Master_Organisasi')."?m_pfx=form'";
        $mn_cancel = "'".base_url('src/menu/admin/Master_Organisasi')."?m_pfx=view'";
        $mn = "'".base_url('src/menu/admin/Master_Organisasi')."?m_pfx=form'";
		$data['tambah'] = 'load_menu('.$mn_tambah.')';
		$data['cancel'] = 'load_menu('.$mn_cancel.')';
		$data['organisasi_code'] = $this->input->get('code');

		if(!empty($this->input->get('m_pfx'))){
			if($this->input->get('m_pfx')=="form"){
				$this->load->view('menu/admin/master_organisasi/form.php',$data);
				return;
			}
		}
		$this->load->view('menu/admin/master_organisasi/view.php',$data);
		return;
	}

	public function index_POST(){
		if(!empty($this->input->post('organisasi_code'))){
			$where = array('code' => $this->input->post('organisasi_code'));
		}else{
			$where = "";
		}

		$data = $this->organisasi_model->get_One($where);
		print $this->load->view('menu/admin/master_organisasi/form.php',$data);
	}

	public function ajax_list_GET(){
		if(!empty($this->input->get('organisasi_code'))){$where = array(
			$this->organisasi_model->column_search[0] => $this->input->get('organisasi_code')
			,"type" => "ORG");
		}else{$where = "1=1 AND type='ORG'";}

		$result = $this->organisasi_model->get_datatables($where);
		$data = array();
		$no = $this->input->get('organisasi_start');
		foreach ($result as $organisasi_list) {
        	$edit_seminar = "'".base_url('src/menu/admin/Master_Organisasi')."?m_pfx=form&code=".$organisasi_list->organisasi_code."'";

			$delete_organisasi = "delete_organisasi('".$organisasi_list->organisasi_code."')";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $organisasi_list->organisasi_code;
			$row[] = $organisasi_list->organisasi_name;
			$row[] = '
					<button class="btn btn-primary" onclick="load_menu('.$edit_seminar.')" title="edit" ><i class="fa fa-fw fa-lg fa-edit"></i></button>
					<button class="btn btn-danger" onclick="'.$delete_organisasi.'" title="delete" ><i class="fa fa-fw fa-lg fa-remove"></i></button>
				';

			$data[] = $row;
		}

		if(!$result){$message = $this->fn->get_message($this->input->get('organisasi_code'), READ, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('organisasi_code'), READ, TRUE); $status = TRUE;}

		$data = array(
				  "draw" => $this->input->get('draw')
				, "recordsTotal" => $this->organisasi_model->get_count($where)
				, "recordsFiltered" => $this->organisasi_model->count_filtered($where)
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
			$where = $this->organisasi_model->column_search[0]." = '".$this->input->get('code')."' ";
		}else{
			$where = "";
		}

		$result = $this->organisasi_model->get_One($where);
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
		$result = $this->organisasi_model->get_list($where);

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
		if(!empty($this->input->post('organisasi_code'))){
			$code = $this->fn->generade_code('ORG-','code','ORG-','mst_organisasi',3);
			$data = array(
					 'code' => $code
					,'name' => $this->input->post('organisasi_name')
					,'type' => 'ORG'
					,'status' => '1'
					,'created_by' => $this->session->userdata(NAME_SESSION)['user_name']
					,'created_date' => date("Y-m-d H:i:s")
				);
		}else{
			$data = "";
		}
		$result = $this->organisasi_model->insert($data);

		if(!$result){
			$message = $this->fn->get_message($this->input->post('organisasi_name'), CREATE,  FALSE); $status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->post('organisasi_name'), CREATE, TRUE); $status = TRUE;
			$code_log = $this->fn->generade_code('LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','code','LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','sys_transaction_log',3);
			$data_log = array(
				 'code' => $code_log
				,'menu_alias' => 'MST_ORG'
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
		if(!empty($this->input->post('organisasi_code'))){
			$data = array(
					'name' => $this->input->post('organisasi_name')
					,'updated_by' => $this->session->userdata(NAME_SESSION)['user_name']
					,'updated_date' => date("Y-m-d H:i:s")
				);
		}else{
			$data = "";
		}

		$result = $this->organisasi_model->update($data, array($this->organisasi_model->column_search[0] => $this->input->post('organisasi_code')));

		if(!$result){
			$message = $this->fn->get_message($this->input->post('organisasi_name'), UPDATE, FALSE); $status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->post('organisasi_name'), UPDATE, TRUE); $status = TRUE;
				$code = $this->input->post('organisasi_code');
				$code_log = $this->fn->generade_code('LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','code','LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','sys_transaction_log',3);
				$data_log = array(
					 'code' => $code_log
					,'menu_alias' => 'MST_ORG'
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
		if(!empty($this->input->get('organisasi_code'))){
			$where = array('code' => $this->input->get('organisasi_code'));
		}else{
			$where = "";
		}

		$result = $this->organisasi_model->delete($where);

		if (!$result){
			$message = $this->fn->get_message($this->input->get('organisasi_code'), DELETE, FALSE); $status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->get('organisasi_code'), DELETE, TRUE);  $status = TRUE;
				$code = $this->input->get('organisasi_code');
				$code_log = $this->fn->generade_code('LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','code','LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','sys_transaction_log',3);
				$data_log = array(
					 'code' => $code_log
					,'menu_alias' => 'MST_ORG'
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