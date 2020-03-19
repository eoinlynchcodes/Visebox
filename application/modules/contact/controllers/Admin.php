<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('contact_model');
		$this->load->helper('url');
		if($this->session->userdata('logged_admin') != TRUE){
			 redirect(base_url('login'));
		 }
		
	}
	public function index(){
		$this->load->library('table');
		$list = '<a href="'.base_url('contact/admin').'">Contact</a>';
		$data['title'] = $list .' >  Contact List';
		$data['pages'] = $this->contact_model->get_contact(NULL);

		$data['view']='index';
        $this->load->view('backend/layout', $data);
	}
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
	    $list = '<a href="'.base_url('contact/admin').'">Contact</a>';
		$data['title'] = $list .' > View Contact';
		$data['pages'] = $this->contact_model->get_contact($id);
		if(empty($data['pages'])){
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
		$this->contact_model->remove_contact($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect(base_url() . 'contact/admin');
		}
	}
	
	// ecport contect list in csv ,,,................
  public function cnt_explode(){
	$csvData[] =array(  "Name", "Email Id","Mobile No.","Description","Date");
	$data = $this->contact_model->get_contact(NULL);
   foreach($data as $cnt){
	$csvData[]=array(
	      $cnt->name ,$cnt->email, $cnt->mobile_no,$cnt->description,$cnt->created_on,
          );
	}
 	header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=Contact".time().".csv");
    header("Content-Transfer-Encoding: binary");
 	$df = fopen("php://output", 'w');
   	array_walk($csvData, function($row) use ($df) {
      fputcsv($df, $row);
   	});
   	fclose($df);
	}
	///------------ downlode csv done --------------
}