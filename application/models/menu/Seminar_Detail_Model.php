
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar_Detail_Model extends CI_Model {

	var $alias = 'seminar_detail_';
	var $code = 'code';
	var $table = 'mn_seminar_detail';
	var $code_table = "mn_seminar_detail.code";
	var $column_search = array(
						  'mn_seminar_detail.code'
						  ,'mn_seminar_detail.seminar_code'
						  ,'mn_seminar_detail.profile_code'
						  ,'mn_seminar_detail.pending_payment_date'
						  ,'mn_seminar_detail.payment_type'
						  ,'mn_seminar_detail.paid_amount'
						  ,'mn_seminar_detail.payment_amount'
						  ,'mn_seminar_detail.certificate'
						  ,'mn_seminar_detail.presence'
						  ,'mn_seminar_detail.created_by'
						  ,'mn_seminar_detail.created_date'
						  ,'mn_seminar_detail.updated_by'
						  ,'mn_seminar_detail.updated_date'
						);
	var $column_order = array(
						   'mn_seminar_detail.code'
						  ,'mn_seminar_detail.seminar_code'
						  ,'mn_seminar_detail.profile_code'
						  ,'mn_seminar_detail.pending_payment_date'
						  ,'mn_seminar_detail.payment_type'
						  ,'mn_seminar_detail.paid_amount'
						  ,'mn_seminar_detail.payment_amount'
						  ,'mn_seminar_detail.certificate'
						  ,'mn_seminar_detail.presence'
						  ,'mn_seminar_detail.created_by'
						  ,'mn_seminar_detail.created_date'
						  ,'mn_seminar_detail.updated_by'
						  ,'mn_seminar_detail.updated_date'
					);
	var $column_select = array(
						   'mn_seminar_detail.code AS seminar_detail_code'
						  ,'mn_seminar_detail.seminar_code AS seminar_detail_seminar_code'
						  ,'mn_seminar_detail.profile_code AS seminar_detail_profile_code'
						  ,'mn_seminar_detail.pending_payment_date AS seminar_detail_pending_payment_date'
						  ,'mn_seminar_detail.payment_type AS seminar_detail_payment_type'
						  ,'mn_seminar_detail.paid_amount AS seminar_detail_paid_amount'
						  ,'mn_seminar_detail.payment_amount AS seminar_detail_payment_amount'
						  ,'IF(mn_seminar_detail.certificate="0","belum","sudah") AS seminar_detail_certificate'
						  ,'IF(mn_seminar_detail.presence="0","tidak","hadir") AS seminar_detail_presence'
						  ,'mn_seminar_detail.created_by AS seminar_detail_created_by'
						  ,'mn_seminar_detail.created_date AS seminar_detail_created_date'
						  ,'mn_seminar_detail.updated_by AS seminar_detail_updated_by'
						  ,'mn_seminar_detail.updated_date AS seminar_detail_updated_date'
					);
	var $order = array(
					"mn_seminar_detail.code" => 'ASC'
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
		// $this->db->select(implode(", ", $this->column_select));
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
