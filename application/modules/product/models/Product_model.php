<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_product($id = NULL) 
	 {
		if($id == NULL){
			// return all users
		    $this->db->select('*');
			$this->db->from('tbl_product');
			$query = $this->db->get();
			return $query->result();
		}
		// return  tbl_product with id
		$query = $this->db->get_where (' tbl_product',array('product_id' => $id));
		return $query->first_row();
	 }
	  
	public function set_product($image,$id=NULL) {
		//print_r($id);die;
		//echo $image; die;
			$data = array(
				'product_name' => $this->input->post('product_name'),
				'category_slug' => $this->input->post('category_slug'),
				'product_slug' => strtolower(url_title($this->input->post('product_name'))),
				'sub_title' => $this->input->post('sub_title'),
				'packing' => $this->input->post('packing'),
				'description' => $this->input->post('description'),
				'meta_keyword' => $this->input->post('meta_keyword'),
				'meta_title' => $this->input->post('meta_title'),
				'meta_description' => $this->input->post('meta_description'),
				'technical_description' => $this->input->post('technical_description'),
				'advised_description' => $this->input->post('advised_description'),
				'instruction_discription' => $this->input->post('instruction_discription'),
				'featured_products' => $this->input->post('featured_products'),
				
		);
		//print_r($data);die;
		  if($image != ''){
			  	$data['image']=$image;
              }
		if($id == NULL){
			// need to create entery
			$data['created_on'] = date("Y-m-d:H:i:s");
			return $this->db->insert('tbl_product', $data);
		}
		// need to update entery
		$data['updated_on'] = date("Y-m-d:H:i:s");
		$this->db->where('product_id',$id);
		return $this->db->update('tbl_product', $data);
	}
	
	public function remove_product($id){
		$this->db->where('product_id',$id);
		$this->db->delete('tbl_product');
	}
	
}

