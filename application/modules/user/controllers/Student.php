<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url');
		if($this->session->userdata('student_logged_frontend') != TRUE){
			 redirect(base_url('student-login'));
		 }
		
	}
	public function index(){
		get_student_detail();
		get_student_loged_id();
		$data['title']="Student Dashboard";
		$data['view']='studentdashboard/index';
        $this->load->view('frontend/layout', $data);
	}
	
	public function add_book(){
		
		if(!empty($_POST)){

			 $filename=time() . date('Ymd');
             $image='';
             if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
                        $config = array(
                        'upload_path' => "assets/upload/addbook",
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
			$this->user_model->set_book(get_student_loged_id(),$image);
			 $this->session->set_flashdata('message', 'Book is created waiting for approval.');
              redirect('student/add-book');
		}
		$data['title']="Add New Book";
		$data['view']='studentdashboard/add_book';
        $this->load->view('frontend/layout', $data);
	}
	

	public function book_list(){
		$student_id=get_student_loged_id();
		$limit=1;
		$data['limit'] = $limit;
		$data['title']="My Book List";
		$data['books']=$this->user_model->get_book_list($student_id,$limit);
		$data['totals']=count($this->user_model->get_book_listCount($student_id));
		$data['view']='studentdashboard/book_list';
		$this->load->view('frontend/layout',$data);
	}

}