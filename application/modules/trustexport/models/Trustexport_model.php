<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trustexport_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_trustexport($id = NULL) 
	 {
		if($id == NULL){
			// return all users
		    $this->db->select('*');
			$this->db->from('tbl_trustexports');
			$query = $this->db->get();
			return $query->result();
		}
		// return  tbl_trustexports with id
		$query = $this->db->get_where (' tbl_trustexports',array('id' => $id));
		return $query->first_row();
	 }
	  
	public function set_trustexport($id=NULL) {
		//print_r($id);die;
		//echo $image; die;
			$data = array(
				'title' => $this->input->post('title'),
'slug' => strtolower(url_title($this->input->post('title').'-'.$this->input->post('sub_title'))),
				'sub_title' => $this->input->post('sub_title'),
				'discription' => $this->input->post('discription'),
				'meta_keyword' => $this->input->post('meta_keyword'),
				'meta_title' => $this->input->post('meta_title'),
				'meta_description' => $this->input->post('meta_description'),
				);
		//print_r($data);die;
		  
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date("Y-m-d:H:i:s");
			return $this->db->insert('tbl_trustexports', $data);
		}
		// need to update entery
		$data['updated_on'] = date("Y-m-d:H:i:s");
		$this->db->where('id',$id);
		return $this->db->update('tbl_trustexports', $data);
	}
	
	public function remove_trustexport($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_trustexports');
	}
	
}

