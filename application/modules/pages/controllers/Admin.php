<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
		$this->load->helper('url');
		 if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
	}
	public function index(){
		$this->load->library('table');
		
		$list = '<a href="'.base_url('pages/admin').'">Manage pages</a>';
		$data['title'] = $list .' >  Pages List';
		$data['pages'] = $this->pages_model->get_tbl_page(NULL);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'page created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('pages/admin').'">Manage pages</a>';
		$data['title'] = $list .' >  Create page';
	
		$this->form_validation->set_rules('page_title', 'Page Title', 'required');
		if ($this->form_validation->run() === FALSE){		
		}else{
			
				$filename=time() . date('Ymd');
				$image='';
			 if(isset($_FILES['image'])&&$_FILES['image']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/package_image/",
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
			$this->pages_model->set_tbl_page($image);
			redirect(base_url() .'/pages/admin/create/1');
		}
		$Cms = $this->GetAllCms();
		$data['Cms'] = $Cms;
		$data['view']='/pages/create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		
		if($id == NULL){
			show_404();
		}
	    $list = '<a href="'.base_url('pages/admin').'">Manage pages</a>';
		$data['title'] = $list .' > View pages';
		$data['pages'] = $this->pages_model->get_tbl_page($id);
		if(empty($data['pages'])){
			show_404();
		}
		
		$data['view']='/pages/view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		
		if($status == 1){
			$data['message'] = 'pages updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['pages'] = $this->pages_model->get_tbl_page($id);
		if(empty($data['pages'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify pages';
		$list = '<a href="'.base_url('pages/admin').'">Manage pages</a>';
		$data['title'] = $list .' > Modify pages';
	
		$this->form_validation->set_rules('page_title', 'Page Title', 'required');
		
		if ($this->form_validation->run() === FALSE){	
			
		}else{	
		//	print_r($_FILES);die;
				$filename=time() . date('Ymd');
			$image='';
			 if(isset($_FILES['image'])&&$_FILES['image']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/package_image/",
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
			 
			
			$this->pages_model->set_tbl_page($image,$id);
			redirect(base_url() .'pages/admin/edit/'.$id.'/1');
		}
		$Cms = $this->GetAllCms();
		$data['Cms'] = $Cms;
		$data['view']='/pages/edit';
        $this->load->view('backend/layout', $data);
	}
	
	
	public function GetAllCms(){
		$CmsPage = array();
		$result = $this->pages_model->get_cms();
		$CmsPage['']='Root Page';
		foreach($result as $data){
			$CmsPage[$data->id]= $data->page_title;
		}
		return $CmsPage;
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
			redirect(base_url() . 'pages/admin');
		}
	}
	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');
	
		

		if($status == 1){
			 $this->pages_model->update_status($id,$status);
		
		}
		else{
			$this->pages_model->update_status($id,$status);
		}
		
		redirect(base_url() . 'pages/admin');

	}
    // for delete page content
    public function delete(){
		$this->load->library('table');
	    $list = '<a href="'.base_url('pages/admin').'">Manage pages</a>';
		$data['title'] = $list .' > Delete pages';
		$data['pages'] = $this->pages_model->get_tbl_page(NULL);

		$data['view']='index_delete';
        $this->load->view('backend/layout', $data);
	}
    

}