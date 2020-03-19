<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('privilege_model');
		$this->load->model('group/group_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		
	}
	public function index(){
		$data['title'] = 'Privilege List';
		$data['list_menu'] = get_menu();
		$data['menus'] = $this->privilege_model->allmenus();
		$data['privileges'] = $this->privilege_model->all();
		$data['groups'] = $this->group_model->get_group();
		$data['view'] = 'index';
		$this->load->view('backend/layout', $data);
	}
	

	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'privilege created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'privilege Create';
	
		$this->form_validation->set_rules('privilege_name', 'privilege Name', 'required');


		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->privilege_model->set_privilege();
			redirect('privilege/admin/create/1');
		}
		
		$data['view'] = 'create';
		$this->load->view('backend/layout', $data);
	}
	
	
	public function edit(){
		
		$data1=$_POST;
		//echo'<pre>';print_r($data1);die;
		//$this->db->where('group_id', $this->input->post('group_id'));
		
		$this->privilege_model->set_privileges($data1);
		redirect('privilege/admin/');

	}

	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->privilege_model->remove_privilege($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('privilege/admin/');
		}
	}
	
	
}