<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_newsletter($id = NULL){
		if($id == NULL){
			// return all 
			$query = $this->db->get('tbl_newsletter');
			return $query->result();
		}
		// return  with id
		$query = $this->db->get_where('tbl_newsletter',array('id' => $id));
		return $query->first_row();
	 }
	 
	
	public function remove_tbl_newsletter($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_newsletter');
	}

	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_newsletter',$data);

	}
	 
}