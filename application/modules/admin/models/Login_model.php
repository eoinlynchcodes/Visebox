<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
	 public function __construct(){
		
	 }
	 
	public function get_admin_email($email){
		$query = $this->db->get_where('tbl_login',array('email' => $email));
		return $query->first_row();
	}

	public function get_tbl_login($user_id = NULL){
		if($user_id == NULL){
			// return all users
			$user=$this->session->userdata('user_id'); 
			$this->db->join('groups','groups.id=tbl_login.group_id','LEFT');
			$query = $this->db->get_where('tbl_login',array('user_id != '  => $user));
			return $query->result();
		}
		// return tbl_login with user_id
		$query = $this->db->get_where('tbl_login',array('user_id' => $user_id));
		return $query->first_row();
	}
	 
	 
	public function set_tbl_login($user_id = NULL){
		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'group_id' => $this->input->post('group_id'),

		);
		if($user_id == NULL){
			
			$data['createdDate'] = date('Y-m-d H:i:s');
			$data['password'] = md5($this->input->post('password'));
			// need to create entery
			return $this->db->insert('tbl_login', $data);
		}
		// need to update entery
		// if(!empty($this->input->post('password'))){
			
			// $data['password'] = md5($this->input->post('password'));
			
		// }
		$this->db->where('user_id',$user_id);
		return $this->db->update('tbl_login', $data);
	}
	
	public function change_password($user_id = NULL){
		$data = array(
			'password' => md5($this->input->post('confirm_password')),
			'createdDate' => date('Y-m-d H:i:s'),
		);
		if($user_id == NULL){
			
			$data['date_created'] = date('Y-m-d H:i:s');
			// need to create entery
			return $this->db->insert('tbl_login', $data);
		}
		// need to update entery
		$this->db->where('user_id',$user_id);
		return $this->db->update('tbl_login', $data);
	}

	public function check_password(){
		$old_password =md5($this->input->get('old_password'));
		//echo $old_password;die;

		$this->db->select('*');
		$this->db->from('tbl_login');
		$data= $this->db->where('password',$old_password);
		//echo $data;die;
		return $this->db->get()->result();
	}
	
	public function remove_tbl_login($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_login');
	}
	 
	public function checkemail($email) {
		 $this->db->where('email',$email);
		 $query = $this->db->get('tbl_login');
		 return $query->first_row();
	}
	 
	 
}
