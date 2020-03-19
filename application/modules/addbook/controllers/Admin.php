<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('addbook_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		
	}
	
	public function index(){
		$this->load->library('table');
		$list = '<a href="'.base_url('addbook/admin').'">Manage Addbook</a>';
		$data['title'] = $list .' > List Addbook';
		$data['tbl_addbooks'] = $this->addbook_model->get_tbl_addbook(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
    
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$list = '<a href="'.base_url('addbook/admin').'">Manage Addbook</a>';
		$data['title'] = $list .' > View Addbook ';
		$data['tbl_addbook'] = $this->addbook_model->get_tbl_addbook($id);
		if(empty($data['tbl_addbook'])){
			show_404();
		}
		
		$data['view']='view';
        $this->load->view('backend/layout', $data);
	}
		
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->addbook_model->remove_tbl_addbook($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('addbook/admin/');
		}	
	}
	
	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');

		if($status == 1){
			 $this->addbook_model->update_status($id,$status);
		}
		else{
			$this->addbook_model->update_status($id,$status);
		}
		redirect('addbook/admin');
	}
	
}