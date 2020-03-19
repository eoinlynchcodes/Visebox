<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		
	}
	public function index(){
		$data['title'] = 'View Setting';
		$data['settings'] = $this->setting_model->get_setting();
		if(empty($data['settings'])){
			show_404();
		}
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}

	//  setting edit -----
		public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Setting updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['setting'] = $this->setting_model->get_setting($id);
		if(empty($data['setting'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Setting';
		$list = '<a href="'.base_url('setting/admin').'">Manage Setting</a>';
		$data['title'] = $list .' > Modify Setting';
	
		$this->form_validation->set_rules('phone_no', 'Phone Number', 'required');
		
		if ($this->form_validation->run() === FALSE){	
			
		}else{	
		$this->setting_model->set_setting($id);
			redirect(base_url() .'setting/admin/edit/'.$id.'/1');
		}
		$data['view']='edit';
        $this->load->view('backend/layout', $data);
	}
	
}