<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_social($id = NULL) 
	 {
		if($id == NULL){
			// return all users
		    $this->db->select('*');
			$this->db->from('tbl_social_link');
			$this->db->order_by('title','ASC');
			$query = $this->db->get();
			return $query->result();
		}
		// return  tbl_social_link with id
		$query = $this->db->get_where (' tbl_social_link',array('id' => $id));
		return $query->first_row();
	 }
	  
	public function set_social($image ,$id=NULL) {
		//print_r($id);die;
		//echo $image; die;
			$data = array(
				'title' => $this->input->post('title'),
				'a_link' => $this->input->post('a_link'),
				'status' => $this->input->post('status'),
		);
		//print_r($data);die;
		  if($image != ''){
			  	$data['image']=$image;
              }
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date("Y-m-d:H:i:s");
			return $this->db->insert('tbl_social_link', $data);
		}
		// need to update entery
		$data['update_on'] = date("Y-m-d:H:i:s");
		$this->db->where('id',$id);
		return $this->db->update('tbl_social_link', $data);
	}
	
	public function remove_social($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_social_link');
	}
	
}

