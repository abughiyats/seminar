<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Read data from database to show data in page
	public function auth_sess($token_mod) {
		if ($this->session->userdata(NAME_SESSION.$token_mod)['token_mod']) {
		        if($token_mod == $this->session->userdata(NAME_SESSION.$token_mod)['token_mod']){
		        $data["data"] = "Session Habis!, silahkan login kembali.";
		        $data["message"] = "Session Habis!, silahkan login kembali.";
		        $data["status"] = FALSE;
		        $data["url"] = base_url();
	        	$this->response($data, REST_Controller::HTTP_OK);
	        	return;
	        }
        }
        return false;
	}

	// Read data from database to show data in page
	public function auth_saldo($code) {
		$this->db->select("sys_profile.saldo AS user_saldo");
		$this->db->from("sys_profile");
		$this->db->join("mn_log_pembayaran", "mn_log_pembayaran.profile_code = sys_profile.code", "INNER");
		$this->db->where("sys_profile.code",$code);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	// Read data from database to show data in page
	public function auth_login($username,$password) {
		$str_qry =  "
			   md5(sys_user.code) AS token_mod
			  ,sys_profile.code AS profile_code
			  ,sys_profile.organisasi_code AS organisasi_code
			  ,sys_user.role_code AS role_code
			  ,sys_role.name_en AS role_name_en
			  ,sys_role.name_id AS role_name_id
			  ,sys_profile.photo AS user_photo
			  ,sys_profile.saldo AS user_saldo
			  ,CONCAT(sys_profile.first_name, ' ', sys_profile.last_name) AS user_name
			";
		$this->db->select($str_qry);
		$this->db->from("sys_user");
		$this->db->join("sys_role", "sys_role.code = sys_user.role_code", "LEFT");
		$this->db->join("sys_profile", "sys_profile.code = sys_user.profile_code", "LEFT");
		
		$this->db->where("md5(sys_user.username)",md5($username));
		$this->db->where("sys_user.password",md5($password));
		// $this->db->where("mst_company.status",TRUE);
		$this->db->where("sys_role.status",TRUE);
		$this->db->where("sys_user.status",TRUE);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	// Read data from database to show data in page
	public function auth_menu($user_perfix) {
		$str_qry =  "
				  sys_role.code AS role_code,
				  sys_role.name_en AS role_name_en,
				  sys_role.name_id AS role_name_id,
				  sys_menu.code AS menu_code,
				  sys_menu.menu_alias AS menu_alias,
				  sys_menu.name_en AS menu_name_en,
				  sys_menu.name_id AS menu_name_id,
				  sys_menu.url AS menu_url
			";
		$this->db->select($str_qry);
		$this->db->from("sys_user");
		$this->db->join("sys_role", "sys_role.code = sys_user.role_code", "INNER");
		$this->db->join("sys_menu", "sys_menu.role_code = sys_role.code", "INNER");

		$this->db->where("MD5(sys_user.code)",$user_perfix);
		$this->db->where("sys_role.status",TRUE);
		$this->db->where("sys_menu.status",TRUE);
		$this->db->where("sys_user.status",TRUE);

		$this->db->order_by("sys_menu.sort_no","ASC");
		$this->db->order_by("menu_code","ASC");
		
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function check_log(){
		if (empty($this->session->userdata(NAME_SESSION))){
        	return true;
		}
	}

	public function get_message($message,$perfix,$status){
		// Create 	= 1
		// Read 	= 2
		// Update 	= 3
		// Delete 	= 4

		if($status){
			switch ($perfix) {
			    case CREATE:
			        return $message." Berhasil di simpan.";
			        break;
			    case READ:
			        return $message." Berhasil di temukan.";
			        break;
			    case UPDATE:
			        return $message." Berhasil di ubah.";
			        break;
			    case DELETE:
			        return $message." Berhasil di hapus.";
			        break;
			    default:
			        return " Terjadi Kesalahan.!";
			        break;
			}	
		}else{
			switch ($perfix) {
			    case CREATE:
			        return $message." Gagal di simpan.";
			        break;
			    case READ:
			        return $message." Gagal di temukan.";
			        break;
			    case UPDATE:
			        return $message." Gagal di ubah.";
			        break;
			    case DELETE:
			        return $message." Gagal di hapus.";
			        break;
			    default:
			        return " Terjadi Kesalahan.!";
			        break;
			}
		}
        return "Terjadi Kesalahan.!";
	}
}

?>