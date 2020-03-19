<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privilege_model extends CI_Model{
	 public function __construct(){
		
	 }
	 

	public function get_privilege($group_id)
    {
        $query = $this->db->from('privileges')
                          ->where('group_id', $group_id)
                          ->get();
        return $query->result();
    }
	 
	public function all()
    {
    	$privileges = $this->db->get('privileges')->result();
		return $privileges;
    }

    
	public function set_privilege($id = NULL){
		$data = array(
			'privilege_name' => $this->input->post('privilege_name'),
			'updated_at' => date('Y-m-d H:i:s'),

		);
		if($id == NULL){
			
			$data['created_at'] = date('Y-m-d H:i:s');
			// need to create entery
			return $this->db->insert('privileges', $data);
		}
		
		$this->db->where('id',$id);
		return $this->db->update('privileges', $data);
	}

	public function allmenus()
    {
    	$menus = $this->db->get('menus')->result();
		return $menus;
    }
	
	
	
	public function remove_privileges(){
		$this->db->select('*');
		$this->db->where('id >',0);
		$this->db->delete('privileges');
	}

	public function set_privileges($data1){
		$this->remove_privileges();
		foreach($data1 as $key=> $value){
			foreach($value as  $value1){
			$data['group_id'] = $value1;
			$data['menu_id'] = $key;
			$this->db->insert('privileges', $data);
			}
		}
	}
	 
	
	 
	 
}
