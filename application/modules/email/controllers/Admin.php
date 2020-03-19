<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('email_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
	}
	public function index($page = 0){
		$this->load->library('table');
		
		$list = '<a href="'.base_url('email/admin').'">Manage Email</a>';
		$data['title'] = $list .' > List Email';
		$data['tbl_email'] = $this->email_model->get_tbl_email(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
    
	}
	
	
	public function create($status = 0){
		//echo "ok";die;
		if($status == 1){
			$data['message'] = 'Email Added';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = ' Add Email';
		$this->form_validation->set_rules('title', 'title','required');
	
		if ($this->form_validation->run() === FALSE){
           
		}
		 else {
			//echo "ok";die;
			// print_r ($_FILES); die;
			/*$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['image'])&&$_FILES['image']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/testimonial_image/",
						'allowed_types' => "gif|jpg|png|jpeg",
						'overwrite' => TRUE,
						'max_size' => "2048000", 
						'file_name' => $filename
						);
						$this->load->library('upload', $config);
						if($this->upload->do_upload('image'))
						{
						$data = array('upload_data' => $this->upload->data());
						$image=$data['upload_data']['file_name'];
						}
						else
						{
						$error = array('error' => $this->upload->display_errors());
						echo $error['error'];die;
						}
			 }*/
			$this->email_model->set_tbl_email();
			redirect(base_url() .'email/admin/create/1');
		}
		
	     $data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$list = '<a href="'.base_url('email/admin').'">Manage Email</a>';
		$data['title'] = $list .' > View Email ';
		$data['tbl_email'] = $this->email_model->get_tbl_email($id);
		if(empty($data['tbl_email'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id = NULL,$status = NULL)
	{
		if($status == 1){
			$data['message'] = 'Email updated';
		}
		if($id == NULL){
			show_404();
		}
		
		$data['tbl_email'] = $this->email_model->get_tbl_email($id);
		if(empty($data['tbl_email'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('email/admin').'">Manage Email</a>';
		$data['title'] = $list .' > Modify Email';
		
	    $this->form_validation->set_rules('title', 'title','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		}else{
	/*$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/testimonial_image/",
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
			 }*/
			$this->email_model->set_tbl_email($id);
			redirect(base_url() .'email/admin/edit/'.$id.'/1');
			
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
		$this->email_model->remove_tbl_email($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('email/admin/');
		}	
	}

	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');
	
		

		if($status == 1){
			 $this->email_model->update_status($id,$status);
		
		}
		else{
			$this->email_model->update_status($id,$status);
		}
		
		redirect(base_url() . 'email/admin');

	}
	
}