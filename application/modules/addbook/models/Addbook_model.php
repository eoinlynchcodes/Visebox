<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addbook_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_addbook($id = NULL) 
	 {
		if($id == NULL){
			// return all addbooks
			$this->db->select('tbl_add_book.*,users.fullname');
			$this->db->join('users','users.id=tbl_add_book.student_id','LEFT');
			$this->db->from('tbl_add_book');
			//$this->db->order_by('title','ASC');
			$query = $this->db->get();
			return $query->result();
		}
		// return tbl_addbook with id
		$this->db->select('tbl_add_book.*,users.fullname');
		$this->db->join('users','users.id=tbl_add_book.student_id','LEFT');
		$query = $this->db->get_where ('tbl_add_book',array('tbl_add_book.id' => $id));
		return $query->first_row();
	 }
	  
	
	
	public function remove_tbl_addbook($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_add_book');
	}
	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_add_book',$data);

	}
}

