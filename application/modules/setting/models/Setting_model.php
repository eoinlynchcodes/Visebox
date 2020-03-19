<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 public function get_setting(){
		 
		$query = $this->db->get_where ('tbl_setting');
		return $query->first_row();
	 } 
	public function set_setting($id = NULL){
		//echo "mvmv";die;
		$data=array(
		'phone_no'=>$this->input->post('phone_no'),
		'email'=>$this->input->post('email'),
		'why_visebox'=>$this->input->post('why_visebox'),
		'security'=>$this->input->post('security'),
		'earn_money'=>$this->input->post('earn_money'),
		'community'=>$this->input->post('community'),
		);
		
		//print_r($data); die;
		$data['updated_on'] = date('Y-m-d H:i:s');
		$this->db->where('id',$id);
		$this->db->update('tbl_setting', $data);
		return;
	}

}