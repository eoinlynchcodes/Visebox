<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_blog($id = NULL) 
	 {
		if($id == NULL){
			// return all blogs
		    $this->db->select('*');
			$this->db->from('tbl_blog');
			//$this->db->order_by('title','ASC');
			$query = $this->db->get();
			return $query->result();
		}
		// return tbl_blog with id
		$query = $this->db->get_where ('tbl_blog',array('id' => $id));
		return $query->first_row();
	 }
	  
	public function set_tbl_blog($image ,$id=NULL) {
		//print_r($id);die;
		//echo $image; die;
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => strtolower(url_title($this->input->post('title'))),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
		);
		  if($image != ''){
			  	$data['image']=$image;
              }
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date("Y-m-d:H:i:s");
			return $this->db->insert('tbl_blog', $data);
		}
		// need to update entery
		$data['updated_on'] = date("Y-m-d:H:i:s");
		$this->db->where('id',$id);
		return $this->db->update('tbl_blog', $data);
	}
	
	public function remove_tbl_blog($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_blog');
	}
	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_blog',$data);

	}
}

