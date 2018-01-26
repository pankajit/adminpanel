<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('category_model');
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $arr['page'] = 'Category';
        
        $arr['list'] = $this->category_model->getCategoryList();    
        $this->load->view('admin/category',$arr);
    }

     public function editCategory() {
        $arr['page'] = 'Category';
     
        $this->load->view('admin/edit_category',$arr);
       
    }
   
    
       public function update_cms() {
		   
		   $postdata=$this->input->post();
		   unset($postdata['btn_submit']);
		   
           $id = $postdata['cm_id'];
           //$cm_large_description = $_POST['cm_large_description'];
        if(isset($id) && !empty($postdata) ){
            // $sql = "update gs_cms_category set `cm_large_description`='".$cm_large_description."' where cm_id=".$id;
            // $val = $this->db->query($sql,array($cm_large_description ,$id ));
			$this->cmsmodel->updateData($postdata);	
			//redirect('admin/cms/edit_cms/'.$id);
			redirect('admin/cms');
        }
        
        $arr['page'] = 'cms';
        $this->load->view('admin/vwEditCMS',$arr);
    }
    

}