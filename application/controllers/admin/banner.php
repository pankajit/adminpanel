<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
		$this->load->helper('comman_helper');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('banner_model');
		//$this->load->model('Builder_model');
		//$this->load->model('Property_model');
		//$this->load->model('propertytypelocationmodel');
		//$this->load->model('propertytype_model');
		//$this->load->model('cmsmodel');
    }

    public function index() {
        $arr['page'] = 'Banner';
		
		$arr['list']=$this->banner_model->get_all_banner_list();
        $this->load->view('admin/Banner',$arr);
    }

    public function addBanner() {
		
        $arr['page'] = 'Add Banner';
		$arr['bc']=$this->banner_model->get_all_bannerCategory_list();
		
        $this->load->view('admin/editBanner',$arr);
    }

     public function editBanner() {
        $arr['page'] = 'Edit Banner';
		
		$urlstring=$this->uri->uri_string();
	    $ba_id = substr(strrchr($urlstring, "/"), 1);
		if($ba_id){
			$arr['bc']=$this->banner_model->get_all_bannerCategory_list();
			$ba_list=$this->banner_model->getBannerListById($ba_id);
			$arr['ban_list'] = $ba_list[0];
			
			$this->load->view('admin/editBanner',$arr);
		}else{
			redirect('admin/banner/');     
		}
    }
    public function deletebanner() {
    
	   $urlstring=$this->uri->uri_string();
	   $ba_id = substr(strrchr($urlstring, "/"), 1);
	   if($ba_id){
	   $deldata=$this->banner_model->deleteData($ba_id);
	   }
		redirect('admin/banner/');    
    }
	
	public function savedata()
        {
			$post_data=$this->input->post();
			
			$config['upload_path']          = './uploads/banner/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 0;
			$config['max_width']            = 1920;
			$config['max_height']           = 960;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('ba_image'))
			{
				$error = array('error' => $this->upload->display_errors());
				
				//print_r($error['error'] );die;
				
				$this->load->view('admin/Banner', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				if($data['upload_data']['file_name']!=""){
					$fullPath = base_url() .'uploads/banner/'. $data['upload_data']['file_name'];
					$post_data['ba_image'] = $fullPath; 
				}
			}
			if(!empty($post_data['ba_id'])){
				$ins=$this->banner_model->updateData($post_data);
			}else{
				$ins=$this->banner_model->insertData($post_data);
			}
			
			if($ins){
				redirect('admin/banner/');
			}
        }
	
}