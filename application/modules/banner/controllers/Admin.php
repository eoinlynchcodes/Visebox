<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('banner_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		
	}
	
	public function index($page = 0){
		$this->load->library('table');
		
		$list = '<a href="'.base_url('banner/admin').'">Manage Banner</a>';
		$data['title'] = $list .' > List Banner';
		$data['tbl_banners'] = $this->banner_model->get_tbl_banner(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
    
	}
	public function create($status = 0){
		//echo "ok";die;
		if($status == 1){
			$data['message'] = 'Banner Added';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('banner/admin').'">Manage Banner</a>';
		$data['title'] = $list .' > Add Banner';
	    
		
		if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('image_title', 'image_title','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		} else {
			// print_r ($_FILES); die;
			$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/banner/",
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
			$this->banner_model->set_tbl_banner($image);
			redirect(base_url() .'banner/admin/create/1');
		}
		}
	     $data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$list = '<a href="'.base_url('banner/admin').'">Manage Banner</a>';
		$data['title'] = $list .' > View Banner ';
		$data['tbl_banner'] = $this->banner_model->get_tbl_banner($id);
		if(empty($data['tbl_banner'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id = NULL,$status = NULL)
	{
		if($status == 1){
			$data['message'] = 'Banner updated';
		}
		if($id == NULL){
			show_404();
		}
		
		$data['tbl_banner'] = $this->banner_model->get_tbl_banner($id);
		if(empty($data['tbl_banner'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('banner/admin').'">Manage Banner</a>';
		$data['title'] = $list .' > Modify Banner';
	   if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('image_title', 'image_title','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		}else{
	$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/banner/",
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
			$this->banner_model->set_tbl_banner($image,$id);
			redirect(base_url() .'banner/admin/edit/'.$id.'/1');
			
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
		$this->banner_model->remove_tbl_banner($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('banner/admin/');
		}	
	}
	
	
	
}