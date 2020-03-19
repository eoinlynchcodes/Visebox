<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('university_model');
		$this->load->helper('url');
		 if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
	}
	public function index(){
		$this->load->library('table');
		$data['total_rows'] = $this->university_model->get_row_count();
		
	    $data['title'] = 'City';
		$data['universitys'] = $this->university_model->get_tbl_university();

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'University created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create University';
	if(isset($_POST)&&!empty($_POST)){
			$this->form_validation->set_rules('university_name', 'University Name', 'required');
			

		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		
			$this->university_model->set_tbl_university();
			redirect('university/admin/create/1');
  }
	}
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'University View';
		$data['universitys'] = $this->university_model->get_tbl_university($id);
		if(empty($data['universitys'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
	//-------------------------	
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'University updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['universitys'] = $this->university_model->get_tbl_university($id);
		if(empty($data['universitys'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify university';
	   if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('university_name', 'University Name', 'required');
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		//	print_r($_FILES);die;
			
			$this->university_model->set_tbl_university($id);
			
			redirect('university/admin/edit/'.$id.'/1');

		
		
		
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
		$this->university_model->remove_tbl_university($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('university/');
		}
	}

	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');

		if($status == 1){
			 $this->university_model->update_status($id,$status);
		}
		else{
			$this->university_model->update_status($id,$status);
		}
		redirect('university/admin');
	}
	
	 public function GetAllCity(){
		 //echo"ok";die;
		$country_id = $this->input->post('country_id',TRUE); 
        $results = $this->university_model->get_City($country_id);
        echo'<option value="">---select City---</option>';
        foreach ($results as $result) {
        echo '<option value="'.$result->id.'">'.$result->city_name.'</option>';
        }
		
    }
}