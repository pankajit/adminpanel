<?php
class Category_model extends CI_Model{

	function __construct() {
		parent::__construct();
	}
	public $table = 'page_categories';
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
	function getCategoryList(){
		$this->db->select('*');
		$this->db->from($this->table);
		$query = $this->db->get();

		return $query->result();
	}
	function getCategoryById($id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	
} 
