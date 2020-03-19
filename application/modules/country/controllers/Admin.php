<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('country_model');
		$this->load->helper('url');
		 if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
	}
	public function index(){
		$this->load->library('table');
		$data['title'] = 'City';
		$data['countrys'] = $this->country_model->get_tbl_country(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Country created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Country';
	if(isset($_POST)&&!empty($_POST)){
			$this->form_validation->set_rules('country_name', 'Country Name', 'required');
			

		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		
			$this->country_model->set_tbl_country();
			redirect('country/admin/create/1');
  }
	}
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Country View';
		$data['countrys'] = $this->country_model->get_tbl_country($id);
		if(empty($data['countrys'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
	//-------------------------	
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Country updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['countrys'] = $this->country_model->get_tbl_country($id);
		if(empty($data['countrys'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify country';
	   if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('country_name', 'Country Name', 'required');
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		//	print_r($_FILES);die;
			
			$this->country_model->set_tbl_country($id);
			
			redirect('country/admin/edit/'.$id.'/1');

		
		
		
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
		$this->country_model->remove_tbl_country($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('country/');
		}
	}

	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');

		if($status == 1){
			 $this->country_model->update_status($id,$status);
		}
		else{
			$this->country_model->update_status($id,$status);
		}
		redirect('country/admin');
	}
}