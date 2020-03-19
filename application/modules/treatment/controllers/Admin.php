<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('treatment_model');
		$this->load->helper('url');
		 check_logged_user();
		 if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
	}
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->treatment_model->get_row_count();
		$data['per_page'] = 20;
		$data['current_page'] = $page;
	
		$list = '<a href="'.base_url('contactus_branches/admin').'">Manage Contact</a>';
		$data['title'] = $list .' >  Pages List';
		$data['contact'] = $this->treatment_model->get_tbl_page(NULL,$page,$data['per_page']);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'page created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('treatment/admin').'">Manage pages</a>';
		$data['title'] = $list .' >  Create page';
	
		$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('slug', 'Slug', 'required');
		//$this->form_validation->set_rules('description_1', 'Description 1', 'required');
		//$this->form_validation->set_rules('sub_title', 'Sub Title', 'required');
		//$this->form_validation->set_rules('description_1', 'Description 2', 'required');
	    // $this->form_validation->set_rules('image', 'Image', 'required');
		//$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
		//$this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
		if ($this->form_validation->run() === FALSE){		
		}else{
			
				$filename=time() . date('Ymd');
				$image='';
			 if(isset($_FILES['image'])&&$_FILES['image']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/treatment_image/",
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
			$this->treatment_model->set_tbl_page($image);
			redirect(base_url() .'/treatment/admin/create/1');
		}
		
		$data['view']='/treatment/create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		
		if($id == NULL){
			show_404();
		}
	    $list = '<a href="'.base_url('treatment/admin').'">Manage pages</a>';
		$data['title'] = $list .' > View pages';
		$data['pages'] = $this->treatment_model->get_tbl_page($id);
		if(empty($data['pages'])){
			show_404();
		}
		
		$data['view']='/treatment/view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		
		if($status == 1){
			$data['message'] = 'pages updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['pages'] = $this->treatment_model->get_tbl_page($id);
		if(empty($data['pages'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify pages';
		$list = '<a href="'.base_url('treatment/admin').'">Manage pages</a>';
		$data['title'] = $list .' > Modify pages';
	
		$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('slug', 'Slug', 'required');
		//$this->form_validation->set_rules('description_1', 'Description 1', 'required');
		//$this->form_validation->set_rules('sub_title', 'Sub Title', 'required');
		//$this->form_validation->set_rules('description_1', 'Description 2', 'required');
	     //$this->form_validation->set_rules('image', 'Image', 'required');
		//$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
		//$this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
		

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{	
		//	print_r($_FILES);die;
				$filename=time() . date('Ymd');
			$image='';
			 if(isset($_FILES['image'])&&$_FILES['image']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/treatment_image/",
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
			 
			
			$this->treatment_model->set_tbl_page($image,$id);
			redirect(base_url() .'treatment/admin/edit/'.$id.'/1');
		}
		
		$data['view']='/treatment/edit';
        $this->load->view('backend/layout', $data);
	}
	
	
	
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->pages_model->remove_tbl_page($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect(base_url() . 'treatment/admin');
		}
	}
	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');
	
		

		if($status == 1){
			 $this->treatment_model->update_status($id,$status);
		
		}
		else{
			$this->treatment_model->update_status($id,$status);
		}
		
		redirect(base_url() . 'treatment/admin');

	}
    // for delete page content
    public function delete($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->treatment_model->get_row_count();
		$data['per_page'] = 20;
		$data['current_page'] = $page;
	    $list = '<a href="'.base_url('treatment/admin').'">Manage pages</a>';
		$data['title'] = $list .' > Delete pages';
		$data['pages'] = $this->treatment_model->get_tbl_page(NULL,$page,$data['per_page']);

		$data['view']='index_delete';
        $this->load->view('backend/layout', $data);
	}
    

}