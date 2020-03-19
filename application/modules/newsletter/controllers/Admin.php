<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('newsletter_model');
		$this->load->helper('url');
		 if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
	}
	public function index(){
		$this->load->library('table');
		$data['title'] = 'Newsletter';
		$data['newsletters'] = $this->newsletter_model->get_tbl_newsletter(NULL);
        $data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Newsletter View';
		$data['newsletters'] = $this->newsletter_model->get_tbl_newsletter($id);
		if(empty($data['newsletters'])){
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
		$this->newsletter_model->remove_tbl_newsletter($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('newsletter/');
		}
	}

	public function setstatus(){

		$id = (isset($_GET['id'])?$_GET['id']:'X');
		$status =  (isset($_GET['status'])?$_GET['status']:'X');

		if($status == 1){
			 $this->newsletter_model->update_status($id,$status);
		}
		else{
			$this->newsletter_model->update_status($id,$status);
		}
		redirect('newsletter/admin');
	}
}