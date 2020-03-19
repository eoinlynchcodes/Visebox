<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('course_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
	}
	public function index(){
		$this->load->library('table');
		$data['title'] = 'Course';
		$data['courses'] = $this->course_model->get_tbl_course(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Course created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Course';
	if(isset($_POST)&&!empty($_POST)){
			$this->form_validation->set_rules('course_name', 'Course_Name', 'required');
			
       if ($this->form_validation->run() === FALSE){	
		}else{
			
		$this->course_model->set_tbl_course();
			redirect('course/admin/create/1');
        }
	}
		$data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Course View';
		$data['courses'] = $this->course_model->get_tbl_course($id);
		if(empty($data['courses'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
	//-------------------------	
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Course updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['courses'] = $this->course_model->get_tbl_course($id);
		if(empty($data['courses'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Course';
	if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('course_name', 'Course Name', 'required');
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			
		//	print_r($_FILES);die;
			$this->course_model->set_tbl_course($id);
			
			redirect('course/admin/edit/'.$id.'/1');
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
		$this->course_model->remove_tbl_course($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('course/');
		}
	}

	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');

		if($status == 1){
			 $this->course_model->update_status($id,$status);
		}
		else{
			$this->course_model->update_status($id,$status);
		}
		redirect('course/admin');
	}
	//get city by ajax call
	public function GetAllCity(){
		 //echo"ok";die;
		$country_id = $this->input->post('country_id',TRUE); 
        $results = $this->course_model->get_City($country_id);
        echo'<option value="">---select City---</option>';
        foreach ($results as $result) {
        echo '<option value="'.$result->id.'">'.$result->city_name.'</option>';
        }
		
    }
	//get city by ajax call
	public function GetAllUniversity(){
		 //echo"ok";die;
		$city_id = $this->input->post('city_id',TRUE); 
		$country_id = $this->input->post('country_id',TRUE); 
		$results = $this->course_model->get_University($country_id,$city_id);
        echo'<option value="">---select University---</option>';
        foreach ($results as $result) {
        echo '<option value="'.$result->id.'">'.$result->university_name.'</option>';
        }
		
    }
}