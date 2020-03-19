<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		}
	
public function index($page = 0){
		$this->load->library('table');
		$list = '<a href="'.base_url('product/admin').'">Manage Product</a>';
		$data['title'] = $list .' > List Product';
		$data['tbl_products'] = $this->product_model->get_product(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
    
	}
	public function create($status = 0){
		//echo "ok";die;
		if($status == 1){
			$data['message'] = 'Product Added';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('product/admin').'">Manage Product</a>';
		$data['title'] = $list .' > Add Product';
	    
		
		if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('product_name','Product Name','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		} else {
			// print_r ($_FILES); die;
			$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/product/",
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
			
			$this->product_model->set_product($image);
			redirect(base_url() .'product/admin/create/1');
		}
		}
	     $data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$list = '<a href="'.base_url('product/admin').'">Manage Product</a>';
		$data['title'] = $list .' > View Product ';
		$data['tbl_product'] = $this->product_model->get_product($id);
		if(empty($data['tbl_product'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id = NULL,$status = NULL)
	{
		if($status == 1){
			$data['message'] = 'Product updated';
		}
		if($id == NULL){
			show_404();
		}
		
		$data['tbl_product'] = $this->product_model->get_product($id);
		if(empty($data['tbl_product'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('product/admin').'">Manage Product</a>';
		$data['title'] = $list .' > Modify Product';
	   if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('product_name', 'Name','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		}else{
			$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/product/",
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
			
			
			$this->product_model->set_product($image,$id);
			redirect(base_url() .'product/admin/edit/'.$id.'/1');
			
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
		$this->product_model->remove_product($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('product/admin/');
		}	
	}
	
	
	
}