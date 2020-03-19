<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_banner($id = NULL) 
	 {
		if($id == NULL){
			// return all users
		    $this->db->select('*');
			$this->db->from('tbl_banner');
			$this->db->order_by('title','ASC');
			$query = $this->db->get();
			return $query->result();
		}
		// return tbl_banner with id
		$query = $this->db->get_where ('tbl_banner',array('id' => $id));
		return $query->first_row();
	 }
	  
	public function set_tbl_banner($image ,$id=NULL) {
		//print_r($id);die;
		//echo $image; die;
			$data = array(
				'title' => $this->input->post('image_title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
		);
		  if($image != ''){
			  	$data['image']=$image;
              }
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date("Y-m-d:H:i:s");
			return $this->db->insert('tbl_banner', $data);
		}
		// need to update entery
		$data['updated_on'] = date("Y-m-d:H:i:s");
		$this->db->where('id',$id);
		return $this->db->update('tbl_banner', $data);
	}
	
	public function remove_tbl_banner($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_banner');
	}
	
}

