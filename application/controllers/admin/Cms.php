<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('cmsmodel');
		$this->load->model('category_model');
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $arr['page'] = 'cms';
        $arr['list'] =$this->cmsmodel->getCmsList();
		
        $this->load->view('admin/cms',$arr);
    }
	
	public function addCMS() {
        $arr['page'] = 'Add CMS';
		
		$arr['categoryList'] = $this->category_model->getCategoryList();
		$this->load->view('admin/addcms',$arr);
    }
	public function editCMS() {
        $arr['page'] = 'Add CMS';
		
		$arr['categoryList'] = $this->category_model->getCategoryList();
		$this->load->view('admin/addcms',$arr);
    }
	function saveCMS(){
		
		$postData = $this->input->post();
		
		try{
		if(isset($postData['save'])){
			
			$result= $this->cmsmodel->select('pages',array('page_url'=>$postData['page_url']),'id');
			
			if(count($result)>0)
			{
				throw new Exception('Page URL already Exist');
			
			}else{
				unset($postData['save']);
				$isSuccess = $this->cmsmodel->insertData($postData);
				
				$this->session->set_flashdata('message', $isSuccess);
			}
		}
		}
		catch(Exception $e){
			$message ="Invalid Request Exception ". $e->getMessage();
			
			$this->session->set_flashdata('message', $message);
			
		}
		
		redirect('/admin/Cms/addCMS');
	}
    
}