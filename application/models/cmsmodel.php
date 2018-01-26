<?php
class CmsModel extends CI_Model{

	function __construct() {
		parent::__construct();
	}
	public $table = 'pages';
	
	function get_last_item(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get($this->table, 1);
		return $query->result();
	}
	function insertData($data){
		$insdata=$this->db->insert($this->table, $data);
		if($insdata){
			return "Record Inserted Successfully";
		}
	}
	function updateData($data){
		$id=$data['id'];
		$uptdata=$this->db->update($this->table, $data , array('id' => $id));	
		if($uptdata){
			return "Record Inserted Successfully";
		}
	}
	
	function deleteData($data){
				
			$id=$data['id'];
			$deldata=$this->db->delete($this->table, array('id' => $id));
			
			if($deldata){
				return "Record Deleted Successfully";
			}
		}
	function getCmsList(){
		$this->db->select('id,created,title,category_id,is_active,page_url,meta_title,select_theme,h1_tag');
		$this->db->from($this->table);
		$query = $this->db->get();

		return $query->result();
	}
	function getCmsById($id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function select($table,$condition = [] ,$selectField = '*'){
		
		$this->db->select($selectField);
		$this->db->from($table);
		if(isset($condition) && !empty($condition)){
			$this->db->where($condition);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
} 
