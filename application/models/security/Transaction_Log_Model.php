
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_Log_Model extends CI_Model {

	var $alias = 'transaction_log_';
	var $code = 'code';
	var $table = 'sys_transaction_log';
	var $code_table = "sys_transaction_log.code";
	var $column_search = array(
						  'sys_transaction_log.code'
						  ,'sys_transaction_log.menu_alias'
						  ,'sys_transaction_log.transaction_code'
						  ,'sys_transaction_log.action'
						  ,'sys_transaction_log.profile_code'
						  ,'sys_transaction_log.description'
						  ,'sys_transaction_log.create_by'
						  ,'sys_transaction_log.create_date'
						);
	var $column_order = array(
						   'sys_transaction_log.code'
						  ,'sys_transaction_log.menu_alias'
						  ,'sys_transaction_log.transaction_code'
						  ,'sys_transaction_log.action'
						  ,'sys_transaction_log.profile_code'
						  ,'sys_transaction_log.description'
						  ,'sys_transaction_log.create_by'
						  ,'sys_transaction_log.create_date'
					);
	var $column_select = array(
						   'sys_transaction_log.code AS transaction_log_code'
						  ,'sys_transaction_log.menu_alias AS transaction_log_menu_alias'
						  ,'sys_transaction_log.transaction_code AS transaction_log_transaction_code'
						  ,'sys_transaction_log.action AS transaction_log_action'
						  ,'sys_transaction_log.profile_code AS transaction_log_profile_code'
						  ,'sys_transaction_log.description AS transaction_log_description'
						  ,'sys_transaction_log.create_by AS transaction_log_create_by'
						  ,'sys_transaction_log.create_date AS transaction_log_create_date'
					);
	var $order = array(
					"sys_transaction_log.code" => 'ASC'
				);

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
			if($_GET['search']['value']){
				if($i===0) {
					$this->db->group_start();
					$this->db->like($data, $_GET['search']['value']);
				}else{
					if($_GET['search']['value'] == 'Done'){
						$this->db->or_like($data, 1);
					}else{
						$this->db->or_like($data, $_GET['search']['value']);
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
		if(isset($_GET['order'])) {
			$this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
		} else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	// FUNGSI PENGAMBILAN DATA UNTUK JQUERY DATA TABLE
	public function get_datatables($where){
		$this->_get_datatables_query($where);
		if($_GET['length'] != -1)
		$this->db->limit($_GET['length'], $_GET['start']);
		
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
