<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 public function get_contact($id){
		 if($id == NULL){
			$query = $this->db->get('tbl_contact');
			return $query->result();
		}
		$query = $this->db->get_where ('tbl_contact',array('id' => $id));
		return $query->first_row();
	 } 
	public function set_contact(){
		//echo "mvmv";die;
		$data=array(
		'name'=>$this->input->post('f_name'),
		'email'=>$this->input->post('email'),
		'mobile_no'=>$this->input->post('mobile'),
		'description'=>$this->input->post('description'),
		'created_on'=>date("Y-m-d"),
		);
		//print_r($data); die;
		$this->db->insert('tbl_contact', $data);
		return;
	}
	public function remove_contact($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_contact');
	}
	 

}