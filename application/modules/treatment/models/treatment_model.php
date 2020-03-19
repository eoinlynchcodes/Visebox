<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class treatment_model extends CI_Model{
	public $table_page = 'tbl_treatment';
	 public function __construct(){
		$this->load->database();
	 }
	  
	 
	 public function get_tbl_page($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('tbl_treatment',$limit,$from);
			return $query->result();
		}
		// return tbl_page with id
		$query = $this->db->get_where('tbl_treatment',array('id' => $id));
		return $query->first_row();
	 }
	 
	   public function get_row_count(){
		return $this->db->count_all('tbl_treatment');
	 }
	
	public function remove_tbl_page($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_treatment');
	}
	
	public function set_tbl_page($image,$id = NULL){
		//echo "mvmv";die;
		$data = array(
			'title' => $this->input->post('title'),
			'description_1' => $this->input->post('description_1'),
			'sub_title' => $this->input->post('sub_title'),
			'description_2' => $this->input->post('description_2'),
			'su_title' => $this->input->post('su_title'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_description' => $this->input->post('meta_description'),
			'updated_on'=> date('Y-m-d H:i:s'),
		);
		if($image != ''){
			  	$data['image']=$image;
              }
			  
	    
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date('Y-m-d H:i:s');
			return $this->db->insert('tbl_treatment', $data);
		}
		$this->db->where('id',$id);
		return $this->db->update('tbl_treatment', $data);
	}

	 
	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_treatment',$data);

	}
}