<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('location_model');
    }

    public function index() {
        $arr['page'] = 'Country';
		$arr['breadcrum'] = 'Manage Location';
		$arr['list']=$this->location_model->get_all_list();
        $this->load->view('admin/country',$arr);
    }

    public function addCountry() {
		
        $arr['page'] = 'Add Country';
        $this->load->view('admin/editCountry',$arr);
    }

     public function editCountry() {
        $arr['page'] = 'Edit Country';
		
		$urlstring=$this->uri->uri_string();
	    $con_id = substr(strrchr($urlstring, "/"), 1);
		if($con_id){
			$con_list=$this->location_model->getCountryListById($con_id);
			$arr['con_list'] = $con_list[0];
			$this->load->view('admin/editCountry',$arr);
		}else{
			redirect('admin/location/');     
		}
    }
    public function deleteCountry() {
    
	   $urlstring=$this->uri->uri_string();
	   $con_id = substr(strrchr($urlstring, "/"), 1);
	   if($con_id){
			$deldata=$this->location_model->deleteData($con_id);

	   }
	   redirect('admin/location/');
    }
	
	public function savedata(){
		$post_data=$this->input->post();
	
		if(!empty($post_data['con_id'])){
				$ins=$this->location_model->updateData($post_data);
		}else{
			$ins=$this->location_model->insertData($post_data);
		}	
		redirect('admin/location/');
        }
		
		
	 public function state() {
        $arr['page'] = 'State';
		$arr['breadcrum'] = 'Manage Location';
		$arr['list']=$this->location_model->get_allState_list();
        $this->load->view('admin/state',$arr);
    }

    public function addState() {
		
        $arr['page'] = 'Add State';
        $this->load->view('admin/editState',$arr);
    }

     public function editState() {
        $arr['page'] = 'Edit State';
		
		$urlstring=$this->uri->uri_string();
	    $st_id = substr(strrchr($urlstring, "/"), 1);
		if($st_id){
			$st_list=$this->location_model->getStateListById($st_id);
			$arr['st_list'] = $st_list[0];
			$this->load->view('admin/editState',$arr);
		}else{
			redirect('admin/location/');     
		}
    }
    public function deleteState() {
    
	   $urlstring=$this->uri->uri_string();
	   $st_id = substr(strrchr($urlstring, "/"), 1);
	   if($st_id){
			$deldata=$this->location_model->updateStateData($st_id);

	   }
	   redirect('admin/location/');
    }
	
	public function saveStatedata(){
		$post_data=$this->input->post();
	
		if(!empty($post_data['st_id'])){
				$ins=$this->location_model->updateStateData($post_data);
		}else{
			$ins=$this->location_model->insertData($post_data);
		}	
		redirect('admin/location/');
        }	
		
		
		
}