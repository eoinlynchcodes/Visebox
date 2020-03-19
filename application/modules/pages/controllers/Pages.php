<?php
error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
		//$this->load->model('website/website_model');
		$this->load->helper('url');
	}
	
	public function index(){
		
		$this->load->view('frontend/home');
	}
	public function view($slug){
		 //echo $slug;die;
		if($slug == NULL){
			show_404();
		}
		if($this->pages_model->page_exist($slug) === FALSE){
			show_404();
		}
		$data = array();
		$data['content'] = $this->pages_model->get_page_by_slug($slug);
		$data['title'] = $data['content']->page_title;
		$data['description'] = $data['content']->meta_description;
		$data['keywords'] = $data['content']->meta_keyword;
		$data['view'] = 'main';
		$this->load->view('frontend/layout', $data);
	}
	public function show_404(){
		$data['title'] = '404 Page Not Found';
		$this->load->view('frontend/404', $data);
	}
	
	
		
}
