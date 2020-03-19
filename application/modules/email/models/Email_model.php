<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_email($id = NULL) 
	 {
		if($id == NULL){
			// return all users
		    $this->db->select('*');
			$this->db->from('tbl_email');
			// $this->db->where('status','1');
			//$this->db->order_by('websitename','ASC');
			$query = $this->db->get();
			return $query->result();
		}
		// return tbl_email with id
		$query = $this->db->get_where ('tbl_email',array('id' => $id));
		return $query->first_row();
	 }
	  
	public function set_tbl_email($id=NULL) {
		//print_r($id);die;
		//echo $image; die;
			$data = array(
				'title' => $this->input->post('title'),
				'subject' => $this->input->post('subject'),
				'description' => $this->input->post('description'),
				);
		  /*if($image != ''){
			  	$data['image']=$image;
              }*/
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date("Y-m-d:H:i:s");
			return $this->db->insert('tbl_email', $data);
		}
		// need to update entery
		$data['updated_on'] = date("Y-m-d:H:i:s");
		$this->db->where('id',$id);
		return $this->db->update('tbl_email', $data);
	}
	
	public function remove_tbl_email($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_email');
	}
	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_email',$data);

	}
}

