<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_gallery($id = NULL) 
	 {
		if($id == NULL){
			// return all users
		    $this->db->select('*');
			$this->db->from('tbl_gallery');
			 $this->db->where('status','1');
			$this->db->order_by('title','ASC');
			$query = $this->db->get();
			return $query->result();
		}
		// return tbl_gallery with id
		$query = $this->db->get_where ('tbl_gallery',array('id' => $id));
		return $query->first_row();
	 }
	  

	  
	public function set_tbl_gallery($filename) {
		
		if($filename!='' ){
		      $filename1 = explode(',',$filename);
		  foreach($filename1 as $file){
		  $file_data = array(
				  'image' => $file,
				  'title' => $this->input->post('image_title'),
				  'product_id' => $this->input->post('product_id'),
				  'status' => $this->input->post('status'),
				  'created_on' => date('Y-m-d h:i:s'),
		  );
		   $this->db->insert('tbl_gallery', $file_data);
		  	}
		 }
			
	}
	
	public function remove_tbl_gallery($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_gallery');
	}
	
}

