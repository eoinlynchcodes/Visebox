<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model{
	public $table_page = 'tbl_pages';
	 public function __construct(){
		$this->load->database();
	 }
	   public function get_page_by_slug($slug = NULL){ 
		// return page with id
		$query = $this->db->get_where($this->table_page,array('slug' => $slug));
		return $query->first_row();
	 }
	 public function page_exist($slug = NULL){
		
		// return page with id
		$query = $this->db->get_where($this->table_page,array('slug' => $slug));
		$result =  $query->first_row();
		
		if(empty($result)){
			return FALSE;
		}
		return TRUE;
	 }

	 public function get_page($id = NULL){
		if($id == NULL){
			// return all 
			
			$query = $this->db->get($this->table_page);
			return $query->result();
		}
		// return page with id
		$query = $this->db->get_where($this->table_page,array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_tbl_page($id = NULL){
		if($id == NULL){
			// return all 
			
			$query = $this->db->get('tbl_pages');
			return $query->result();
		}
		// return tbl_page with id
		$query = $this->db->get_where('tbl_pages',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('tbl_pages');
	 }
	
	 
	public function set_tbl_page($image,$id = NULL){
		//echo "mvmv";die;
		$data = array(
			'slug' => strtolower(url_title($this->input->post('page_title'))),
	    	'parent' => $this->input->post('parent'),
			'page_title' => $this->input->post('page_title'),
			'content' => $this->input->post('content'),
			'short_content' => $this->input->post('short_content'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_description' => $this->input->post('meta_description'),
			'updated_on' => date('Y-m-d H:i:s'),
		);
		if($image != ''){
			  	$data['image']=$image;
              }
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date('Y-m-d H:i:s');
			return $this->db->insert('tbl_pages', $data);
		}
		$this->db->where('id',$id);
		return $this->db->update('tbl_pages', $data);
	}
	
	public function get_cms(){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('parent', '0');
		$res = $this->db->get()->result();
		return $res;
	}
	
	public function remove_tbl_page($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_pages');
	}
	 
	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_pages',$data);

	}
}