<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model{
	
	
	public $tbl_album = 'tbl_album';
	
    function __construct() {
        parent::__construct();
    }
	
     public function get_header(){
		 
		$query = $this->db->get_where ('tbl_header');
		return $query->first_row();
	 } 	
	public function get_clients(){
		    $this->db->select('*');
			$this->db->from('tbl_client');
			//$this->db->order_by('title','ASC');
			$query = $this->db->get();
			return $query->result();
	 } 
   public function get_color1(){
		    $this->db->select('*');
			$this->db->from('tbl_colors');
			$this->db->where('type','Colors');
			$this->db->order_by('sequence','ASC');
			$query = $this->db->get();
			return $query->result();
	 } 
    public function get_color2(){
		    $this->db->select('*');
			$this->db->from('tbl_colors');
			$this->db->where('type','Design');
			//$this->db->order_by('title','ASC');
			$query = $this->db->get();
			return $query->result();
	 }
    //	 trustexports list  
    public function get_exports_list(){
		    $this->db->select('*');
			$this->db->from('tbl_trustexports');
			$query = $this->db->get();
			return $query->result();
	 } 
	 //	 trustexports details by slug  
    public function get_exports($slug){
		    $this->db->select('*');
			$this->db->from('tbl_trustexports');
			$this->db->where('slug',$slug);
			$query = $this->db->get();
			return $query->row();
	 } 
    //	 get_product  details by slug  
    public function get_product_details($slug){
		    $this->db->select('*');
			$this->db->from('tbl_product');
			$this->db->where('product_slug',$slug);
			$query = $this->db->get();
			return $query->row();
	 } 
    //	 get_our product  details by category 
    public function get_product_category(){
		    $this->db->select('*');
			$this->db->from('tbl_category');
			$this->db->where('status','1');
			$query = $this->db->get();
			return $query->result();
	 } 
    //	   list_product  by category 
    public function get_product_list_cat($slug){
		    $this->db->select('*');
			$this->db->from('tbl_product');
			$this->db->where('category_slug',$slug);
			$query = $this->db->get();
			return $query->result();
	 } 
	 
	  public function get_contactusbranches(){
		    $this->db->select('*');
			$this->db->from('tbl_contactus_branches');
			$this->db->where('status','1');
			$query = $this->db->get();
			return $query->row();
	 } 

	 public function get_Module($category_id){
        $this->db->select('*');
        $this->db->from('tbl_module');
        $this->db->where('status', '1');
		$this->db->where('category_id',$category_id);
        $query = $this->db->get();
        return $query->result();
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
    public function get_UniversityFilter($country_id,$city_id){
        $this->db->select('*');
        $this->db->from('tbl_university');
        $this->db->where('status', '1');
        if(!empty($country_id)){
		$this->db->where('country_id',$country_id);
		}
		$this->db->where('city_id',$city_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_UniversityHome($city_id){
        $this->db->select('*');
        $this->db->from('tbl_university');
        $this->db->where('status', '1');
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

    public function get_mentor_profile($mymentorship_id){
    	$this->db->select('tbl_mentors.*,tbl_mymentorship.title,tbl_mymentorship.slug,tbl_mymentorship.price,tbl_mymentorship.image as mymeberimage,tbl_mymentorship.category_id as mymember_category_id,tbl_mymentorship.id as mymeberid');
        $this->db->from('tbl_mymentorship');
        $this->db->join('tbl_mentors','tbl_mentors.mentor_id=tbl_mymentorship.mentor_id');
        //$this->db->join('tbl_mentor_module','tbl_mentor_module.mentor_id=tbl_mentors.mentor_id');
        //$this->db->join('tbl_module','tbl_module.id=tbl_mentor_module.module_id');
        $this->db->where('tbl_mymentorship.status', '1');
		$this->db->where('tbl_mymentorship.id',$mymentorship_id);
        $query = $this->db->get();
        return $query->row();
    } 

    public function get_mentor_by_mymentershipId($mymentorship_id){
    	$this->db->select('tbl_mentors.*,tbl_mymentorship.title,tbl_mymentorship.slug,tbl_mymentorship.price,tbl_mymentorship.image as mymeberimage,tbl_mymentorship.category_id as mymember_category_id,tbl_mymentorship.id as mymeberid');
        $this->db->from('tbl_mymentorship');
        $this->db->join('tbl_mentors','tbl_mentors.mentor_id=tbl_mymentorship.mentor_id');
        //$this->db->join('tbl_mentor_module','tbl_mentor_module.mentor_id=tbl_mentors.mentor_id');
        //$this->db->join('tbl_module','tbl_module.id=tbl_mentor_module.module_id');
        $this->db->where('tbl_mymentorship.status', '1');
		$this->db->where('tbl_mymentorship.id',$mymentorship_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_mentor_search($mentor_keyword,$city_id,$university_id){
    	$this->db->select('tbl_mentors.*,tbl_mymentorship.title,tbl_mymentorship.slug,tbl_mymentorship.price,tbl_mymentorship.image as mymeberimage,tbl_mymentorship.category_id as mymember_category_id,tbl_mymentorship.id as mymeberid');
        $this->db->from('tbl_mentors');
        $this->db->join('tbl_mymentorship','tbl_mymentorship.mentor_id=tbl_mentors.mentor_id');
        //$this->db->join('tbl_mentor_module','tbl_mentor_module.mentor_id=tbl_mentors.mentor_id');
        //$this->db->join('tbl_module','tbl_module.id=tbl_mentor_module.module_id');
        $this->db->where('tbl_mentors.status', '1');
		$this->db->where('tbl_mentors.city_id',$city_id);
		$this->db->where('tbl_mentors.university_id',$university_id);
        $query = $this->db->get();
        return $query->result();
    }

     public function get_mentor_search_filter(){
     	$category_id=$this->input->post('category_id'); 
     	$country_id=$this->input->post('country_id'); 
     	$city_id=$this->input->post('city_id'); 
     	$university_id=$this->input->post('university_id'); 
     	$price_range=$this->input->post('price_range'); 
    	$this->db->select('tbl_mentors.*,tbl_mymentorship.title,tbl_mymentorship.slug,tbl_mymentorship.price,tbl_mymentorship.image as mymeberimage,tbl_mymentorship.category_id as mymember_category_id,tbl_mymentorship.id as mymeberid');
        $this->db->from('tbl_mentors');
        $this->db->join('tbl_mymentorship','tbl_mymentorship.mentor_id=tbl_mentors.mentor_id');
        $this->db->where('tbl_mentors.status', '1');
        if(!empty($city_id)){
			$this->db->where('tbl_mentors.city_id',$city_id);
		}
		if(!empty($university_id)){
			$this->db->where('tbl_mentors.university_id',$university_id);
		}
		if(!empty($country_id)){
			$this->db->where('tbl_mentors.country_id',$country_id);
		}
		if(!empty($category_id)){
			$this->db->where('tbl_mymentorship.category_id',$category_id);
		}
		if(!empty($price_range)){
			$this->db->where('tbl_mymentorship.price <=',$price_range);
		}
        $query = $this->db->get();
        return $query->result();
    }

    public function get_book(){
    	$university_Course_module=$this->input->get('university_Course_module'); 
    	$name_author_edition=$this->input->get('name_author_edition'); 
    	$this->db->select('*');
        $this->db->from('tbl_add_book');
        $this->db->where('status', '1');
        if(!empty($name_author_edition)){
        	$this->db->like('name_of_book', $name_author_edition);
        	$this->db->or_like('author', $name_author_edition);
        	$this->db->or_like('book_edition', $name_author_edition);

    	}
    	if(!empty($university_Course_module)){
        	$this->db->like('university_used', $university_Course_module);
        	$this->db->or_like('course_used', $university_Course_module);
        	$this->db->or_like('module_used', $university_Course_module);
    	}
        $query = $this->db->get();
        // /echo $this->db->last_query();die;
        return $query->result();
    }
    public function get_show_seller($book_id){
        $this->db->select('tbl_add_book.*,users.email,users.phone');
        $this->db->from('tbl_add_book');
        $this->db->join('users','users.id=tbl_add_book.student_id');
        $this->db->where('tbl_add_book.id',$book_id);
        $query = $this->db->get();
        return $query->row();
    } 

    public function get_blog(){
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('status',1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_blog_by_slug($slug){
    	$this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('slug',$slug);
        $query = $this->db->get();
        return $query->row();
    }

     public function Get_Subscriber($email){
        $this->db->select('*');
        $this->db->from('tbl_newsletter');
        $this->db->where('status', '1');
        $this->db->where('email',$email);
        $query = $this->db->get();
        return $query->result();
    }
	 
      public function setSubscribe($email){
        $data['email']=$email;
        $data['status']=1;
        $data['created_on']=date('Y-m-d H:i:s');
        return $this->db->insert('tbl_newsletter',$data);
    } 

   
}