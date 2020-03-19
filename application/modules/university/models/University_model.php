<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class University_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_university($id = NULL){
		if($id == NULL){
			// return all 
			$this->db->select('tbl_university.*,tbl_country.country_name,tbl_city.city_name');
			$this->db->join('tbl_country','tbl_country.id=tbl_university.country_id','LEFT');
			$this->db->join('tbl_city','tbl_city.id=tbl_university.city_id','LEFT');
			$query = $this->db->get('tbl_university');
			return $query->result();
		}
		// return with id
		$this->db->select('tbl_university.*,tbl_country.country_name,tbl_city.city_name');
			$this->db->join('tbl_country','tbl_country.id=tbl_university.country_id','LEFT');
			$this->db->join('tbl_city','tbl_city.id=tbl_university.city_id','LEFT');
		$query = $this->db->get_where('tbl_university',array('tbl_university.id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('tbl_university');
	 }
	
	 
	public function set_tbl_university($id = NULL){
		$data = array(
			'slug' => strtolower(url_title($this->input->post('university_name'))),
	    	'university_name' => $this->input->post('university_name'),
			'country_id' => $this->input->post('country_id'),
			'city_id' => $this->input->post('city_id'),
		);
		
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date('Y-m-d H:i:s');
			$data['updated_on'] = date('Y-m-d H:i:s');
			return $this->db->insert('tbl_university', $data);
		}
		$this->db->where('id',$id);
		return $this->db->update('tbl_university', $data);
	}
	
	public function remove_tbl_university($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_university');
	}

	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_university',$data);

	}
	 public function get_City($country_id){
        $this->db->select('*');
        $this->db->from('tbl_city');
        $this->db->where('status', '1');
		$this->db->where('country_id',$country_id);
        $query = $this->db->get();
        return $query->result();
    }
	 
}