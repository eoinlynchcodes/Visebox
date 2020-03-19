<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->helper('url');
		$this->load->library('upload');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		
	}
	
	public function index($page = 0){
		$this->load->library('table');
		
		$list = '<a href="'.base_url('gallery/admin').'">Manage gallery</a>';
		$data['title'] = $list .' > List gallery';
		$data['tbl_gallerys'] = $this->gallery_model->get_tbl_gallery(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
    
	}
	
	
	public function create($status = 0){
		//echo "ok";die;
		if($status == 1){
			$data['message'] = 'Color Added';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = ' Add gallery';
	    
		
		if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('image_title', 'image_title','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		} else {
			// print_r ($_FILES); die;
			 $files = $_FILES;
                $cpt = count($_FILES['userfile']['name']);
                 for($i=0; $i<$cpt; $i++)
                {
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                 $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                 $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                 $images[] = $fileName;
				}
				  $fileName = implode(',',$images);
			$this->gallery_model->set_tbl_gallery($fileName);
			redirect(base_url() .'gallery/admin/create/1');
		}
		}
	     $data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function set_upload_options()
	  { 
	  // upload an image options
	  		$filename=time() . date('Ymd');
	         $config = array();
	         $config['upload_path'] = 'assets/upload/gallery/'; //give the path to upload the image in folder
	         $config['allowed_types'] = 'gif|jpg|png|jpeg';
	         $config['max_size'] = '0';
	         $config['overwrite'] = FALSE;
	  return $config;
	  }
	

	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$list = '<a href="'.base_url('gallery/admin').'">Manage gallery</a>';
		$data['title'] = $list .' > View gallery ';
		$data['tbl_gallery'] = $this->gallery_model->get_tbl_gallery($id);
		if(empty($data['tbl_gallery'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id = NULL,$status = NULL)
	{
		if($status == 1){
			$data['message'] = 'gallery updated';
		}
		if($id == NULL){
			show_404();
		}
		
		$data['tbl_gallery'] = $this->gallery_model->get_tbl_gallery($id);
		if(empty($data['tbl_gallery'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('gallery/admin').'">Manage gallery</a>';
		$data['title'] = $list .' > Modify gallery';
	   if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('image_title', 'image_title','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		}else{
	$filename=time() . date('Ymd');
			 $image='';
			 if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
						$config = array(
						'upload_path' => "assets/upload/gallery/",
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
			$this->gallery_model->set_tbl_gallery($image,$id);
			redirect(base_url() .'gallery/admin/edit/'.$id.'/1');
			
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
		$this->gallery_model->remove_tbl_gallery($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('gallery/admin/');
		}	
	}
	
	
	
	
}