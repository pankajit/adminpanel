<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
         if ($this->session->userdata('is_admin_login') && $this->session->userdata('user_type')=='SA') {
            redirect('admin/dashboard');
        } elseif($this->session->userdata('is_admin_login') && $this->session->userdata('user_type')=='SEO'){
		   redirect('admin/cms');
		}
		else {
			$this->load->view('admin/login');
        }
    }

     public function do_login() {
        if ($this->session->userdata('is_admin_login')) {
            redirect('admin/dashboard');
        } else {
            $user = $_POST['username'];
            $password = $_POST['password'];

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
					
				
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/login');
            } else {
                $salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId';
                $enc_pass  = md5($salt.$password);

                $sql = "SELECT * FROM tbl_admin_users WHERE username = ? AND password = ?";
                $val = $this->db->query($sql,array($user ,$enc_pass ));
				
				//echo "<pre>";
				//print_r($val->result_array());
				//die;
                   $usertype ='';  
                if ($val->num_rows()>0) {
                    foreach ($val->result_array() as $recs => $res) {
						
				
                        $this->session->set_userdata(array(
                            'id' => $res['id'],
                            'username' => $res['username'],
                            'email' => $res['email'],                            
                            'is_admin_login' => true,
                            'user_type' => $res['user_type']
                         )
						
                        );
                    }
					if($this->session->userdata('user_type') == "SEO"){
						redirect('admin/Cms');	
					}else{
						redirect('admin/Dashboard');
					}
                } else {
                    $err['error'] = '<strong>Access Denied</strong> Invalid Username/Password';
                    $this->load->view('admin/Login', $err);
                }
            }
        }
       }

        
    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('is_admin_login');   
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('admin/home', 'refresh');
    }

    

}