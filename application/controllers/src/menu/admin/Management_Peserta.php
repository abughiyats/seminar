<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Management_Peserta extends REST_Controller {	
	var $alias_table = 'management_peserta';
	public function __construct(){
		parent::__construct();
		$this->load->model('menu/Management_Peserta_Model','management_peserta_model');
		$this->load->model('util/Function_Model','fn');
        $this->load->model('security/Gateway_Model','gateway_model');
	}

	public function index_GET(){
        $mn_tambah = "'".base_url('src/menu/admin/Management_Peserta')."?m_pfx=form'";
        $mn_cancel = "'".base_url('src/menu/admin/Management_Peserta')."?m_pfx=view'";
        $mn = "'".base_url('src/menu/admin/Management_Peserta')."?m_pfx=form'";
		$data['tambah'] = 'load_menu('.$mn_tambah.')';
		$data['cancel'] = 'load_menu('.$mn_cancel.')';
		$data['management_peserta_code'] = $this->input->get('code');

		if(!empty($this->input->get('m_pfx'))){
			if($this->input->get('m_pfx')=="form"){
				$this->load->view('menu/admin/management-peserta/form.php',$data);
				return;
			}
		}
		$this->load->view('menu/admin/management-peserta/view.php',$data);
		return;
	}

	public function index_POST(){
		if(!empty($this->input->post('management_peserta_code'))){
			$where = array('code' => $this->input->post('management_peserta_code'));
		}else{
			$where = "";
		}

		$data = $this->management_peserta_model->get_One($where);
		print $this->load->view('menu/admin/management-peserta/form.php',$data);
	}

	public function ajax_list_GET(){
		if(!empty($this->input->get('management_peserta_code'))){$where = array($this->management_peserta_model->column_search[0] => $this->input->get('management_peserta_code'));
		}else{$where = "1=1";}

		$result = $this->management_peserta_model->get_datatables($where);
		$data = array();
		$no = $this->input->get('start');
		foreach ($result as $management_peserta_list) {
        	$edit_city = "'".base_url('src/menu/management-peserta')."?m_pfx=form&code=".$management_peserta_list->management_peserta_code."'";
			$delete_city = "delete_city('".$management_peserta_list->management_peserta_code."')";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $management_peserta_list->management_peserta_code;
			$row[] = $management_peserta_list->management_peserta_first_name;
			$row[] = $management_peserta_list->management_peserta_last_name;
			$row[] = $management_peserta_list->management_peserta_peserta_code;
			$row[] = $management_peserta_list->management_peserta_birthdate;
			$row[] = $management_peserta_list->management_peserta_email;
			$row[] = $management_peserta_list->management_peserta_phone;
			$row[] = $management_peserta_list->management_peserta_phone_wa;
			$row[] = $management_peserta_list->management_peserta_age;
			$row[] = $management_peserta_list->management_peserta_gender;
			$row[] = $management_peserta_list->management_peserta_address;
			$row[] = $management_peserta_list->management_peserta_photo;
			$row[] = $management_peserta_list->management_peserta_status;
			$row[] = '
					<button class="btn btn-primary" onclick="load_menu('.$edit_city.')" title="edit" ><i class="fa fa-fw fa-lg fa-edit"></i></button>
				';

			$data[] = $row;
		}

		if(!$result){$message = $this->fn->get_message($this->input->get('management_peserta_code'), READ, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('management_peserta_code'), READ, TRUE); $status = TRUE;}

		$data = array(
				  "draw" => $this->input->get('draw')
				, "recordsTotal" => $this->management_peserta_model->get_count($where)
				, "recordsFiltered" => $this->management_peserta_model->count_filtered($where)
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
			$where = $this->management_peserta_model->column_search[0]." = '".$this->input->get('code')."' ";
		}else{
			$where = "";
		}

		$result = $this->management_peserta_model->get_One($where);
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
		$result = $this->management_peserta_model->get_list($where);

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
		if(!empty($this->input->post('management_peserta_code'))){
			$code = $this->fn->generade_code($this->session->userdata(NAME_SESSION)['user_organisasi'].'-','code','','sys_profile',5);
			$data = array(
					 'code' => $code
					,'first_name' => $this->input->post('management_peserta_first_name')
					,'last_name' => $this->input->post('management_peserta_last_name')
					,'organisasi_code' => $this->input->post('management_peserta_organisasi_code')
					,'birthdate' => $this->input->post('management_peserta_birthdate')
					,'email' => $this->input->post('management_peserta_email')
					,'phone' => $this->input->post('management_peserta_phone')
					,'phone_wa' => $this->input->post('management_peserta_phone_wa')
					,'age' => $this->input->post('management_peserta_age')
					,'gender' => $this->input->post('management_peserta_gender')
					,'address' => $this->input->post('management_peserta_address')
					,'photo' => $this->input->post('management_peserta_photo')
					,'status' => $this->input->post('management_peserta_status')
				);
		}else{
			$data = "";
		}
		$result = $this->management_peserta_model->insert($data);

		if(!$result){$message = $this->fn->get_message($this->input->post('management_peserta_name'), CREATE,  FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('management_peserta_name'), CREATE, TRUE); $status = TRUE;}

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
		if(!empty($this->input->post('management_peserta_code'))){
			$data = array(
					 'name' => $this->input->post('management_peserta_name')
				);
		}else{
			$data = "";
		}

		$result = $this->management_peserta_model->update($data, array($this->management_peserta_model->column_search[0] => $this->input->post('management_peserta_code')));

		if(!$result){$message = $this->fn->get_message($this->input->post('management_peserta_name'), UPDATE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('management_peserta_name'), UPDATE, TRUE); $status = TRUE;}
		
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
		if(!empty($this->input->get('management_peserta_code'))){
			$where = array('code' => $this->input->get('management_peserta_code'));
		}else{
			$where = "";
		}

		$result = $this->management_peserta_model->delete($where);

		if (!$result){$message = $this->fn->get_message($this->input->get('management_peserta_code'), DELETE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('management_peserta_code'), DELETE, TRUE);  $status = TRUE;}
		
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