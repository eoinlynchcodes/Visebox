<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('mentors_model');
		$this->load->helper('url');
		 if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		
	}
	public function index(){
		$this->load->library('table');
		$list = '<a href="'.base_url('mentors/admin').'">Mentors</a>';
		$data['title'] = $list .' >  Mentors List';
		$data['mentors'] = $this->mentors_model->get_mentors(NULL);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
	    $list = '<a href="'.base_url('mentors/admin').'">Mentors</a>';
		$data['title'] = $list .' > View Mentors';
		$data['mentors'] = $this->mentors_model->get_mentors($id);
		if(empty($data['mentors'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
	
	public function edit($id= NULL,$status = NULL){
		
		if($status == 1){
			$data['message'] = 'mentors updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['mentors'] = $this->mentors_model->get_mentors($id);
		if(empty($data['mentors'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Mentors';
		$list = '<a href="'.base_url('mentors/admin').'">Manage Mentors</a>';
		$data['title'] = $list .' > Modify mentors';
	
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		
		if ($this->form_validation->run() === FALSE){	
			
		}else{	
		$this->mentors_model->set_mentors($id);
			redirect(base_url() .'mentors/admin/edit/'.$id.'/1');
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
		$this->mentors_model->remove_mentors($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect(base_url() . 'mentors/admin');
		}
	}
	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');

		if($status == 1){
			 $this->mentors_model->update_status($id,$status);
		}
		else{
			$this->mentors_model->update_status($id,$status);
		}
		redirect('mentors/admin');
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


    public function mymentorshipview($id){
        $this->data['mentorships'] = $this->mentors_model->get_mentorship_admin($id);
        $this->data['title'] = 'My Mentorship';
        $this->data['view'] = 'mymentorship_view_admin';
        $this->load->view('backend/layout', $this->data);
    }

    public function mymentorship(){
        $this->data['mentorships'] = $this->mentors_model->get_mentorship_admin(NULL);
        $this->data['title'] = 'My Mentorship';
        $this->data['view'] = 'mymentorship_admin';
        $this->load->view('backend/layout', $this->data);
    }

    public function mymentorshipstatus($status,$id){

		$this->mentors_model->update_status_mymentorship($id,$status);
		
		redirect('mentors/admin/mymentorship');
	}

	 public function mymentorshipedit($id){

        $this->data['mentorships'] = $this->mentors_model->get_mentorship_admin($id);
        if(!empty($_POST)){
             $filename=time() . date('Ymd');
             $image='';
             if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
                        $config = array(
                        'upload_path' => "assets/upload/mymentorship",
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => TRUE,
                        'max_size' => "2048000", 
                        'file_name' => $filename
                        );
                        $this->load->library('upload', $config);
                        if($this->upload->do_upload('fileToUpload'))
                        {
                        $data = array('upload_data' => $this->upload->data());
                        $image=$data['upload_data']['file_name'];
                        }
                        else
                        {
                        $error = array('error' => $this->upload->display_errors());
                        echo $error['error'];die;
                        }
             }

            $updated = $this->mentors_model->update_mentorship_admin($image,$id);
                
                $this->session->set_flashdata('message', 'Mentorship is updated.');
                redirect('mentors/admin/mymentorshipedit/'.$id);
        }
        $this->data['title'] = 'My Mentorship Edit';
        $this->data['view'] = 'mymentorship_edit_admin';
        $this->load->view('backend/layout', $this->data);
    }

     public function mymentorshipremove($id){
        $this->mentors_model->remove_mymentorship_admin($id);
        redirect('mentors/admin/mymentorship');
    }
}