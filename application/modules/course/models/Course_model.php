<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_course($id = NULL){
		if($id == NULL){
			// return all
			
			$this->db->select('tbl_course.*,tbl_country.country_name,tbl_city.city_name,tbl_university.university_name');
			$this->db->join('tbl_country','tbl_country.id=tbl_course.country_id','LEFT');
			$this->db->join('tbl_city','tbl_city.id=tbl_course.city_id','LEFT');
			$this->db->join('tbl_university','tbl_university.id=tbl_course.university_id','LEFT');
			$query = $this->db->get('tbl_course');
			return $query->result();
		}
		// return  with id
		$this->db->select('tbl_course.*,tbl_country.country_name,tbl_city.city_name,tbl_university.university_name');
			$this->db->join('tbl_country','tbl_country.id=tbl_course.country_id','LEFT');
			$this->db->join('tbl_city','tbl_city.id=tbl_course.city_id','LEFT');
			$this->db->join('tbl_university','tbl_university.id=tbl_course.university_id','LEFT');
		$query = $this->db->get_where('tbl_course',array('tbl_course.id' => $id));
		return $query->first_row();
	 }
	
	public function set_tbl_course($id = NULL){
		$data = array(
			'slug' => strtolower(url_title($this->input->post('course_name'))),
	    	'course_name' => $this->input->post('course_name'),
			'country_id' => $this->input->post('country_id'),
			'city_id' => $this->input->post('city_id'),
			'university_id' => $this->input->post('university_id'),

		);
		
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date('Y-m-d H:i:s');
			$data['updated_on'] = date('Y-m-d H:i:s');
			return $this->db->insert('tbl_course', $data);
		}
		$this->db->where('id',$id);
		return $this->db->update('tbl_course', $data);
	}
	
	public function remove_tbl_course($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_course');
	}

	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_course',$data);

	}
	
	public function get_City($country_id){
        $this->db->select('*');
        $this->db->from('tbl_city');
        $this->db->where('status', '1');
		$this->db->where('country_id',$country_id);
        $query = $this->db->get();
        return $query->result();
    }
	public function get_University($country_id,$city_id){
        $this->db->select('*');
        $this->db->from('tbl_university');
        $this->db->where('status', '1');
		$this->db->where('country_id',$country_id);
		$this->db->where('city_id',$city_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_Course($country_id,$city_id,$university_id){
        $this->db->select('*');
        $this->db->from('tbl_course');
        $this->db->where('status', '1');
		$this->db->where('country_id',$country_id);
		$this->db->where('city_id',$city_id);
		$this->db->where('university_id',$university_id);
        $query = $this->db->get();
        return $query->result();
    }
	 
}