
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends CI_Model {

	var $alias = 'profile_';
	var $code = 'code';
	var $table = 'sys_profile';
	var $code_table = "sys_profile.code";
	var $column_search = array(
					    'sys_profile.code'
					  , 'sys_profile.first_name'
					  , 'sys_profile.last_name'
					  , 'sys_profile.organisasi_code'
					  , 'sys_profile.birthdate'
					  , 'sys_profile.email'
					  , 'sys_profile.phone'
					  , 'sys_profile.phone_wa'
					  , 'sys_profile.age'
					  , 'sys_profile.gender'
					  , 'sys_profile.address'
					  , 'sys_profile.photo'
					  , 'sys_profile.status'
					);
	var $column_order = array(
					    'sys_profile.code'
					  , 'sys_profile.first_name'
					  , 'sys_profile.last_name'
					  , 'sys_profile.organisasi_code'
					  , 'sys_profile.birthdate'
					  , 'sys_profile.email'
					  , 'sys_profile.phone'
					  , 'sys_profile.phone_wa'
					  , 'sys_profile.age'
					  , 'sys_profile.gender'
					  , 'sys_profile.address'
					  , 'sys_profile.photo'
					  , 'sys_profile.status'
					);
	var $column_select = array(
					    'sys_profile.code AS profile_code'
					  , 'sys_profile.first_name AS profile_first_name'
					  , 'sys_profile.last_name AS profile_last_name'
					  , 'CONCAT(sys_profile.first_name, " ", sys_profile.last_name) AS profile_name'
					  , 'sys_profile.organisasi_code AS profile_organisasi_code'
					  , 'sys_profile.birthdate AS profile_birthdate'
					  , 'sys_profile.email AS profile_email'
					  , 'sys_profile.phone AS profile_phone'
					  , 'sys_profile.phone_wa AS profile_phone_wa'
					  , 'sys_profile.age AS profile_age'
					  , 'sys_profile.gender AS profile_gender'
					  , 'sys_profile.address AS profile_address'
					  , 'sys_profile.photo AS profile_photo'
					  , 'sys_profile.status AS profile_status'
					);
	var $order = array("sys_profile.code" => 'DESC');

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// FUNGSI PENGAMBILAN DATA UNTUK JQUERY DATA TABLE
	private function _get_datatables_query($where){
		$this->db->select(implode(", ", $this->column_select));
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $data) {
			if($_POST['search']['value']){
				if($i===0) {
					$this->db->group_start();
					$this->db->like($data, $_POST['search']['value']);
				}else{
					if($_POST['search']['value'] == 'Done'){
						$this->db->or_like($data, 1);
					}else{
						$this->db->or_like($data, $_POST['search']['value']);
					}
				}
				if(count($this->column_search)-1 == $i){
					$this->db->group_end();
				}
			}
			$i++;
		}

		if(empty($where)) {
			return FALSE;
		}
		$this->db->where($where);

		$this->db->group_by($this->id_table);
		if(isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	// FUNGSI PENGAMBILAN DATA UNTUK JQUERY DATA TABLE
	public function get_datatables($where){
		$this->_get_datatables_query($where);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		
		$query = $this->db->get();
		return $query->result();
	}

	// FUNGSI PENGAMBILAN DATA UNTUK JQUERY DATA TABLE
	public function count_filtered($where){
		$this->_get_datatables_query($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	// FUNGSI PENGAMBILAN JUMLAH DATA BERDASARKAN PARAMETER
	public function count_all($where){
		$this->db->select(implode(", ", $this->column_select));
		$this->db->from($this->table);

		return $this->db->count_all_results();
	}

	// FUNGSI PENGAMBILAN JUMLAH DATA BERDASARKAN PARAMETER
	public function get_count($where){
		$this->db->select(implode(", ", $this->column_select));
		$this->db->from($this->table);
		
		if (empty($where)) {
			return FALSE;
		}
		$this->db->where($where);

		return $this->db->count_all_results();
	}

	// FUNGSI PENGAMBILAN DATA MAKSIMAL 
	public function get_max($where){
		$this->db->select("MAX(".$this->id_table.") AS ".$this->alias.$this->id);
		$this->db->from($this->table);
		
		if (empty($where)) {
			return FALSE;
		}
		$this->db->where($where);

		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
			} else {
				return $this->db->get();
			}
	}

	// FUNGSI PENGAMBILAN DATA MINIMAL 
	public function get_min($where) {
		$this->db->select("MIN(".$this->id_table.") AS ".$this->alias.$this->id);
		$this->db->from($this->table);
		
		if (empty($where)) {
			return FALSE;
		}
		$this->db->where($where);
		$this->db->limit(1);

		$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->row();
			} else {
				return $this->db->get();
			}
	}

	// FUNGSI PENGAMBILAN DATA TUNGGAL 
	public function get_one($where) {
		$this->db->select(implode(", ", $this->column_select));
		$this->db->from($this->table);
		
		if (empty($where)) {
			return FALSE;
		}
		$this->db->where($where);
		$this->db->limit(1);

		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return true;
		}
	}

	// FUNGSI PENGAMBILAN DATA BERBENTUK LIST ARRAY
	public function get_list($where) {
		$this->db->select(
						implode(", ", $this->column_select)
					);
		$this->db->from($this->table);
		if (empty($where)) {
			return FALSE;
		}
		$this->db->where($where);
		
		$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
		}
	}

	// FUNGSI PENYIMPANAN DATA
	public function insert($data){
		if (empty($data)) {
			return TRUE;
		}
		$this->db->insert($this->table, $data);
		$this->db->insert_id();

		return TRUE; 
	}

	// FUNGSI PERUBAHAN DATA
	public function update( $data, $where){
		$this->db->update($this->table, $data, $where);

		return $this->db->affected_rows();
	}
 
 	// FUNGSI PENGHAPUSAN DATA
	public function delete($where){
		if (empty($where)) {
			return FALSE;
		}
		$this->db->where($where);
		$this->db->delete($this->table);

		return TRUE;
	}

}
