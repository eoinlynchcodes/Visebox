<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 public function get_user($id){
		 if($id == NULL){
			 $this->db->select('users.*,tbl_city.city_name,tbl_country.country_name,tbl_course.course_name,tbl_university.university_name');
			$this->db->join('tbl_city','tbl_city.id=users.city_id','LEFT');
			$this->db->join('tbl_country','tbl_country.id=users.country_id','LEFT');
			$this->db->join('tbl_course','tbl_course.id=users.course_id','LEFT');
			$this->db->join('tbl_university','tbl_university.id=users.university_id','LEFT');
			$query = $this->db->get('users');
			return $query->result();
		}
		$this->db->select('users.*,tbl_city.city_name,tbl_country.country_name,tbl_course.course_name,tbl_university.university_name');
			$this->db->join('tbl_city','tbl_city.id=users.city_id','LEFT');
			$this->db->join('tbl_country','tbl_country.id=users.country_id','LEFT');
			$this->db->join('tbl_course','tbl_course.id=users.course_id','LEFT');
			$this->db->join('tbl_university','tbl_university.id=users.university_id','LEFT');
		$query = $this->db->get_where ('users',array('users.id' => $id));
		return $query->first_row();
	 } 
	public function set_user(){
		//echo "mvmv";die;
		$data=array(
		//'name'=>$this->input->post('f_name') .'/'.$this->input->post('l_name'),
		'username'=>$this->input->post('username'),
		'email'=>$this->input->post('email'),
		'password'=>$this->input->post('password'),
		'college'=>$this->input->post('college'),
		'country'=>$this->input->post('country'),
		'city'=>$this->input->post('city'),
		'university'=>$this->input->post('university'),
		'course'=>$this->input->post('course'),
		'description'=>$this->input->post('description'),
		'created_on'=>date("Y-m-d"),
		);
		//print_r($data); die;
		$this->db->insert('users', $data);
		return;
	}
	public function remove_user($id){
		$this->db->where('id',$id);
		$this->db->delete('users');
	}
	 
 public function update_status($id, $status){
	$data=array(

		'active' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('users',$data);

	}

	public function set_book($student_id,$image){
		$data=array(
	    'student_id'=>$student_id,
		'name_of_book' => $this->input->post('book_name'),
		'price' => $this->input->post('price'),
		'author' => $this->input->post('author'),
		'selling_from' => $this->input->post('location'),
		'book_edition' => $this->input->post('edition'),
		'university_used' => $this->input->post('book_university'),
		'course_used' => $this->input->post('book_course'),
		'module_used' => $this->input->post('book_module'),
		'status' => 0,
		'created_on'=>date('Y-m-d H:i:s'),
		'updated_on'=>date('Y-m-d H:i:s'),
		'image'=>$image,
		);
	
	return $this->db->insert('tbl_add_book',$data);

	}

	public function get_book_list($student_id,$limit){
		if (isset($_GET["page"])) { 
			$page  = $_GET["page"]; 
		} else { 
			$page=1; 
		} 
        $start_from = ($page-1) * $limit;  
		$this->db->select('*');
		$this->db->where('student_id',$student_id);
		$this->db->limit($limit, $start_from);
		$query=$this->db->get('tbl_add_book');
		return $query->result();
	}
	public function get_book_listCount($student_id){

		$this->db->select('*');
		$this->db->where('student_id',$student_id);
		$query=$this->db->get('tbl_add_book');
		return $query->result();
	}
}