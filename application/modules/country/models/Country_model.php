<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_country($id = NULL){
		if($id == NULL){
			// return all 
			$query = $this->db->get('tbl_country');
			return $query->result();
		}
		// return  with id
		$query = $this->db->get_where('tbl_country',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('tbl_country');
	 }
	
	 
	public function set_tbl_country($id = NULL){
		$data = array(
			'slug' => strtolower(url_title($this->input->post('country_name'))),
	    	'country_name' => $this->input->post('country_name'),
			
			//'updated_on' => date('Y-m-d H:i:s'),
		);
		
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date('Y-m-d H:i:s');
			$data['updated_on'] = date('Y-m-d H:i:s');
			return $this->db->insert('tbl_country', $data);
		}
		$this->db->where('id',$id);
		return $this->db->update('tbl_country', $data);
	}
	
	public function remove_tbl_country($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_country');
	}

	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_country',$data);

	}
	 
}