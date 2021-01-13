<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Function_Model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function generade_code($alias,$code,$where,$table,$num){
		$this->db->select("IFNULL(MAX(".$code."),0) AS ".$code."");
		$this->db->from($table);
		if($where != ''){
			$this->db->like($table.'.code',$where);	
		}
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $alias.str_pad(mb_substr($query->row()->$code,"-".$num)+1,$num,'0',STR_PAD_LEFT);
		}else{
			return $alias.str_pad(1,$num,'0',STR_PAD_LEFT);
		}
	}

	public function get_message($message,$perfix,$status){
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