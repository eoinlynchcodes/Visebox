<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_city($id = NULL){
		if($id == NULL){
			// return all
			
			$this->db->select('tbl_city.*,tbl_country.country_name');
			$this->db->join('tbl_country','tbl_country.id=tbl_city.country_id','LEFT');
			$query = $this->db->get('tbl_city');
			return $query->result();
		}
		// return  with id
		$this->db->select('tbl_city.*,tbl_country.country_name');
		$this->db->join('tbl_country','tbl_country.id=tbl_city.country_id','LEFT');
		$query = $this->db->get_where('tbl_city',array('tbl_city.id' => $id));
		return $query->first_row();
	 }
	 
	 
	 
	 
	 
	 public function get_row_count(){
		return $this->db->count_all('tbl_city');
	 }
	
	 
	public function set_tbl_city($id = NULL){
		$data = array(
			'slug' => strtolower(url_title($this->input->post('city_name'))),
	    	'city_name' => $this->input->post('city_name'),
			'country_id' => $this->input->post('country_id'),
			
			//'updated_on' => date('Y-m-d H:i:s'),
		);
		
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date('Y-m-d H:i:s');
			$data['updated_on'] = date('Y-m-d H:i:s');
			return $this->db->insert('tbl_city', $data);
		}
		$this->db->where('id',$id);
		return $this->db->update('tbl_city', $data);
	}
	
	public function remove_tbl_city($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_city');
	}

	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_city',$data);

	}
	
	 
}