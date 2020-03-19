<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('category_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		
	}
	
	public function index(){
		$this->load->library('table');
		$list = '<a href="'.base_url('category/admin').'">Manage Category</a>';
		$data['title'] = $list .' > List category';
		$data['category'] = $this->category_model->get_category(NULL);
        $data['view']='category/index';
        $this->load->view('backend/layout', $data);
	}
	public function create($status = 0){
		//echo "ok";die;
		if($status == 1){
			$data['message'] = 'Category Added';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('category/admin').'">Manage Category</a>';
		$data['title'] = $list .' > Add Category';
	    
		$this->form_validation->set_rules('name', 'name','required');
		$this->form_validation->set_rules('description', 'description','required');
		if ($this->form_validation->run() === FALSE){     
		}
		 else {
			//echo "ok";die;
			// print_r ($_FILES); die;
			$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['image'])&&$_FILES['image']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/category_image/",
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
			 }
			$this->category_model->set_category($image);
			redirect(base_url() .'category/admin/create/1');
		}
	     $data['view']='category/create';
         $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$list = '<a href="'.base_url('category/admin').'">Manage category</a>';
		$data['title'] = $list .' > View category ';
		$data['category'] = $this->category_model->get_category($id);
		if(empty($data['category'])){
			show_404();
		}
		
		$data['view']='category/view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id = NULL,$status = NULL)
	{
		if($status == 1){
			$data['message'] = 'category updated';
		}
		if($id == NULL){
			show_404();
		}
		
		$data['category'] = $this->category_model->get_category($id);
		if(empty($data['category'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('category/category').'">Manage category</a>';
		$data['title'] = $list .' > Modify category';
		
	    $this->form_validation->set_rules('name', 'name','required');
		$this->form_validation->set_rules('description', 'description','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		}else{
	$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/category_image/",
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
			$this->category_model->set_category($image,$id);
			redirect(base_url() .'category/admin/edit/'.$id.'/1');	
		}
		$data['view']='category/edit';
        $this->load->view('backend/layout', $data);
	}
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->category_model->remove_category($id);
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('category/admin/');
		}	
	}

}