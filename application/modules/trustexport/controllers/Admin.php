<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('trustexport_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		}
	
public function index($page = 0){
		$this->load->library('table');
		$list = '<a href="'.base_url('trustexport/admin').'">Manage Trustexport</a>';
		$data['title'] = $list .' > List Trustexport';
		$data['trustexports'] = $this->trustexport_model->get_trustexport(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
    
	}
	public function create($status = 0){
		//echo "ok";die;
		if($status == 1){
			$data['message'] = 'Trustexport Added';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('trustexport/admin').'">Manage Trustexport</a>';
		$data['title'] = $list .' > Add Trustexport';
	    
		
		if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('title','Title','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		} else {
			
			$this->trustexport_model->set_trustexport();
			redirect(base_url() .'trustexport/admin/create/1');
		}
		}
	     $data['view']='create';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$list = '<a href="'.base_url('trustexport/admin').'">Manage Trustexport</a>';
		$data['title'] = $list .' > View Trustexport ';
		$data['trustexports'] = $this->trustexport_model->get_trustexport($id);
		if(empty($data['trustexports'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function edit($id = NULL,$status = NULL)
	{
		if($status == 1){
			$data['message'] = 'Trustexport updated';
		}
		if($id == NULL){
			show_404();
		}
		
		$data['trustexports'] = $this->trustexport_model->get_trustexport($id);
		if(empty($data['trustexports'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$list = '<a href="'.base_url('trustexport/admin').'">Manage Trustexport</a>';
		$data['title'] = $list .' > Modify Trustexport';
	   if(isset($_POST)&&!empty($_POST)){
		$this->form_validation->set_rules('title', 'Title','required');
		
		if ($this->form_validation->run() === FALSE){	
		
		}else{
			$this->trustexport_model->set_trustexport($id);
			redirect(base_url() .'trustexport/admin/edit/'.$id.'/1');
			
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
		$this->trustexport_model->remove_trustexport($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('trustexport/admin/');
		}	
	}
	
	
	
}