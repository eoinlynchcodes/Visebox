<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	
  public function get_category($id = NULL) 
	 {
		if($id == NULL){
			// return all users
		    $this->db->select('*');
			$this->db->from('tbl_category');
			$query = $this->db->get();
			return $query->result();
		}
		$query = $this->db->get_where ('tbl_category',array('category_id' => $id));
		return $query->first_row();
	 }
	  
	public function set_category($image ,$id=NULL) {
		//print_r($id);die;
			$data = array(
				'name' => $this->input->post('name'),
				'slug' => strtolower(url_title($this->input->post('name'))),
				'description' => $this->input->post('description'),
				'meta_keyword' => '',
				'meta_description' => '',
		);
		  if($image != ''){
			  	$data['image']='';
              }
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date("Y-m-d");
			return $this->db->insert('tbl_category', $data);
		}
		// need to update entery
		$this->db->where('category_id',$id);
		return $this->db->update('tbl_category', $data);
	}
	
	public function remove_category($id){
		$this->db->where('category_id',$id);
		$this->db->delete('tbl_category');
	}
	
}


