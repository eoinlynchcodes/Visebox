<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('module_model');
		$this->load->helper('url');
		 if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
	}
	public function index(){
		$this->load->library('table');
	    $data['title'] = 'Module';
		$data['modules'] = $this->module_model->get_tbl_module(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Module created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create module';
	    if(isset($_POST)&&!empty($_POST)){
			$this->form_validation->set_rules('module_name', 'Module_Name', 'required');
			

		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		
			$this->module_model->set_tbl_module();
			redirect('module/admin/create/1');
  }
	}
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Module View';
		$data['modules'] = $this->module_model->get_tbl_module($id);
		if(empty($data['modules'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
	//-------------------------	
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Module updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['modules'] = $this->module_model->get_tbl_module($id);
		if(empty($data['modules'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Module';
	if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('module_name', 'module Name', 'required');
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		//	print_r($_FILES);die;
			
			$this->module_model->set_tbl_module($id);
			
			redirect('module/admin/edit/'.$id.'/1');
           }
	}
		$data['view']='edit';
        $this->load->view('backend/layout', $data);
	}
	
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->module_model->remove_tbl_module($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('module/');
		}
	}

	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');

		if($status == 1){
			 $this->module_model->update_status($id,$status);
		}
		else{
			$this->module_model->update_status($id,$status);
		}
		redirect('module/admin');
	}
}