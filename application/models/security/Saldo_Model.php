
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo_Model extends CI_Model {

	var $alias = 'city_';
	var $code = 'code';
	var $table = 'mn_log_pembayaran';
	var $code_table = "mn_log_pembayaran.code";
	var $column_search = array(
						  'mn_log_pembayaran.code'
					  	, 'mn_log_pembayaran.profile_code'
					  	, 'mn_log_pembayaran.price'
					  	, 'mn_log_pembayaran.description'
					);
	var $column_order = array(
						  'mn_log_pembayaran.code'
					  	, 'mn_log_pembayaran.profile_code'
					  	, 'mn_log_pembayaran.price'
					  	, 'mn_log_pembayaran.description'
					);
	var $column_select = array(
						  'mn_log_pembayaran.code AS log_saldo_code'
						, 'mn_log_pembayaran.profile_code AS log_saldo_profile_code'
						, 'mn_log_pembayaran.price AS log_saldo_price'
						, 'mn_log_pembayaran.description AS log_saldo_description' 
					);
	var $order = array(
					"mn_log_pembayaran.code" => 'ASC'
				);

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// FUNGSI PENGAMBILAN DATA UNTUK JQUERY DATA TABLE
	private function _get_datatables_query($where){
		$this->db->select(
						implode(", ", $this->column_select)
					);
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

		$this->db->group_by($this->code_table);
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
		$this->db->select(
						implode(", ", $this->column_select)
					);
		$this->db->from($this->table);

		return $this->db->count_all_results();
	}

	// FUNGSI PENGAMBILAN JUMLAH DATA BERDASARKAN PARAMETER
	public function get_count($where){
		$this->db->select(
						implode(", ", $this->column_select)
					);
		$this->db->from($this->table);
		
		if (empty($where)) {
			return FALSE;
		}
		$this->db->where($where);

		return $this->db->count_all_results();
	}

	// FUNGSI PENGAMBILAN DATA MAKSIMAL 
	public function get_max($where){
		$this->db->select("MAX(".$this->code_table.") AS ".$this->code.$alias);
		$this->db->from(
						implode(", ", $this->column_select)
					);
		
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
		$this->db->select("MIN(".$this->code_table.") AS ".$this->code.$alias);
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
		$this->db->select(
						implode(", ", $this->column_select)
					);
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
			return FALSE;
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
