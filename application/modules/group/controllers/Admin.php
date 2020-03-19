<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/group_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		
	}
	public function index(){
		//$this->load->helper('form');
		$data['title'] = 'Group List';
		$data['groups'] = $this->group_model->get_group();
		$data['view'] = 'index';
		$this->load->view('backend/layout', $data);
	}
	

	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Group created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Group Create';
	
		$this->form_validation->set_rules('group_name', 'Group Name', 'required');


		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->group_model->set_group();
			redirect('group/admin/create/1');
		}
		
		$data['view'] = 'create';
		$this->load->view('backend/layout', $data);
	}
	
	
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Group updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['group'] = $this->group_model->get_group($id);
		if(empty($data['group'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'User Details Update';
		$this->form_validation->set_rules('group_name', 'Group Name', 'required');
		

		//echo 'hhhhhhhhh';die;
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->group_model->set_group($id);
			redirect('group/admin/edit/'.$id.'/1');
		}
		$data['view'] = 'edit';
		$this->load->view('backend/layout', $data);
	}

	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->group_model->remove_group($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('group/admin/');
		}
	}
	
	
}