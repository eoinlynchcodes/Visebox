<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/login_model');
		$this->load->helper('url');
		$this->load->helper('login/login');
		$method = $this->router->fetch_method();
		if(is_user_login(TRUE) === FALSE){
			redirect('login/admin');
			die();
		}
	}
	public function index($page = 0){
		
		$data['title'] = 'User List';
		$data['all_users'] = $this->login_model->get_tbl_login();
		$data['view'] = 'index';
		$this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Admin created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Admin Create';
	
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_login.email]');


		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->login_model->set_tbl_login();
			redirect('/admin/create/1');
		}
		
		$data['view'] = 'create';
		$this->load->view('backend/layout', $data);
	}
	
	public function view($user_id = NULL){
		if($user_id == NULL){
			show_404();
		}
		$data['title'] = 'Admin View';
		$data['tbl_login'] = $this->login_model->get_tbl_login($user_id);
		if(empty($data['tbl_login'])){
			show_404();
		}
		
		$data['view'] = 'view';
		$this->load->view('backend/layout', $data);
	}
		
	public function edit($user_id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Admin updated';
		}
		if($user_id == NULL){
			show_404();
		}
		$data['tbl_login'] = $this->login_model->get_tbl_login($user_id);
		if(empty($data['tbl_login'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Admin Profile';
	
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		//echo 'hhhhhhhhh';die;
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->login_model->set_tbl_login($user_id);
			redirect('/admin/edit/'.$user_id.'/1');
		}
		$data['view'] = 'edit';
		$this->load->view('backend/layout', $data);
	}

	public function change_password($user_id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Admin Password updated';
		}
		if($user_id == NULL){
			show_404();
		}
		$data['tbl_login'] = $this->login_model->get_tbl_login($user_id);
		if(empty($data['tbl_login'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Admin Password';
	
		$this->form_validation->set_rules('old_password', 'Old Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->login_model->change_password($user_id);
			redirect('/admin/change_password/'.$user_id.'/1');
		}
		$data['view'] = 'changepassord';
		$this->load->view('backend/layout',$data);
	}

	public function check_old_password()
	{
	   	   //echo "ok";die;
	   	   $get_result = $this->login_model->check_password();
   
  
           if ($get_result) {
                 $error=true;
				   }
				   else{
				    $error=false;
				   }

           echo json_encode($error);
	}
	
	
	public function remove($user_id = NULL){
		if($user_id== NULL || !is_numeric($user_id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->login_model->remove_tbl_login($user_id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('admin/');
		}
	}
	public function chackmail(){
		$email = $this->input->get('email');
		$result = $this->login_model->checkemail($email);
		if(!$result){
			$error = true;
		  } else {
		  $error =false;
		  }
       echo json_encode($error); die;
	}
	
}