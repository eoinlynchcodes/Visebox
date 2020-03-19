<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends CI_Model{
	 public function __construct(){
		
	 }
	 

	public function get_group($id = NULL){
		if($id == NULL){
			// return all users
			$query = $this->db->get_where('groups');
			return $query->result();
		}
		// return groups with user_id
		$query = $this->db->get_where('groups',array('id' => $id));
		return $query->first_row();
	}
	 
	 
	public function set_group($id = NULL){
		$data = array(
			'group_name' => $this->input->post('group_name'),
			'updated_at' => date('Y-m-d H:i:s'),

		);
		if($id == NULL){
			
			$data['created_at'] = date('Y-m-d H:i:s');
			// need to create entery
			return $this->db->insert('groups', $data);
		}
		
		$this->db->where('id',$id);
		return $this->db->update('groups', $data);
	}
	
	
	
	public function remove_groups($id){
		$this->db->where('id',$id);
		$this->db->delete('groups');
	}
	 
	
	 
	 
}
