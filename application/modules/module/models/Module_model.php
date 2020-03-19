<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class module_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_tbl_module($id = NULL){
		if($id == NULL){
			// return all
			
			$this->db->select('tbl_module.*,tbl_category.name as category_name');
			$this->db->join('tbl_category','tbl_category.category_id=tbl_module.category_id','LEFT');
			$query = $this->db->get('tbl_module');
			return $query->result();
		}
		// return  with id
		$this->db->select('tbl_module.*,tbl_category.name as category_name');
		$this->db->join('tbl_category','tbl_category.category_id=tbl_module.category_id','LEFT');
		$query = $this->db->get_where('tbl_module',array('tbl_module.id' => $id));
		return $query->first_row();
	 }
	 
	public function set_tbl_module($id = NULL){
		$data = array(
	    	'module_name' => $this->input->post('module_name'),
			'category_id' => $this->input->post('category_id'),

		);
		
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date('Y-m-d H:i:s');
			return $this->db->insert('tbl_module', $data);
		}
		// need to update entery
		$data['updated_on'] = date('Y-m-d H:i:s');
		$this->db->where('id',$id);
		return $this->db->update('tbl_module', $data);
	}
	
	public function remove_tbl_module($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_module');
	}

	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_module',$data);

	}
	
	 
}