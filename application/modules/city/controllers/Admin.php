<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('city_model');
		$this->load->helper('url');
		 if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
	}
	public function index(){
		$this->load->library('table');
		$data['total_rows'] = $this->city_model->get_row_count();
	    $data['title'] = 'City';
		$data['citys'] = $this->city_model->get_tbl_city(NULL);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'City created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create City';
	if(isset($_POST)&&!empty($_POST)){
			$this->form_validation->set_rules('city_name', 'City_Name', 'required');
			

		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		
			$this->city_model->set_tbl_city();
			redirect('city/admin/create/1');
  }
	}
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'City View';
		$data['citys'] = $this->city_model->get_tbl_city($id);
		if(empty($data['citys'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
	//-------------------------	
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'City updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['citys'] = $this->city_model->get_tbl_city($id);
		if(empty($data['citys'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify City';
	if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('city_name', 'City Name', 'required');
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		//	print_r($_FILES);die;
			
			$this->city_model->set_tbl_city($id);
			
			redirect('city/admin/edit/'.$id.'/1');

		
		
		
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
		$this->city_model->remove_tbl_city($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('city/');
		}
	}

	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');

		if($status == 1){
			 $this->city_model->update_status($id,$status);
		}
		else{
			$this->city_model->update_status($id,$status);
		}
		redirect('city/admin');
	}
}