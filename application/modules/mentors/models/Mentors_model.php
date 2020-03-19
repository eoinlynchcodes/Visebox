<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mentors_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 public function get_mentors($id){
		 if($id == NULL){
		$this->db->select('tbl_mentors.*,tbl_country.country_name,tbl_city.city_name,tbl_university.university_name');
			$this->db->join('tbl_country','tbl_country.id=tbl_mentors.country_id','LEFT');
			$this->db->join('tbl_city','tbl_city.id=tbl_mentors.city_id','LEFT');
			$this->db->join('tbl_university','tbl_university.id=tbl_mentors.university_id','LEFT');
			//$this->db->join('tbl_course','tbl_course.id=tbl_mentors.course_id','LEFT');
			//$this->db->join('tbl_module','tbl_module.id=tbl_mentors.module_id','LEFT');
			$query = $this->db->get('tbl_mentors');
			return $query->result();
		}
		$this->db->select('tbl_mentors.*,tbl_country.country_name,tbl_city.city_name,tbl_university.university_name');
			$this->db->join('tbl_country','tbl_country.id=tbl_mentors.country_id','LEFT');
			$this->db->join('tbl_city','tbl_city.id=tbl_mentors.city_id','LEFT');
			$this->db->join('tbl_university','tbl_university.id=tbl_mentors.university_id','LEFT');
			//$this->db->join('tbl_course','tbl_course.id=tbl_mentors.course_id','LEFT');
			//$this->db->join('tbl_module','tbl_module.id=tbl_mentors.module_id','LEFT');
		$query = $this->db->get_where ('tbl_mentors',array('tbl_mentors.mentor_id' => $id));
		return $query->first_row();
	 } 
	public function set_mentors($id = NULL , $image){
        $data=array(
		'country_id'=>$this->input->post('country_id'),
		'city_id'=>$this->input->post('city_id'),
		'university_id'=>$this->input->post('university_id'),
		'course_id'=>$this->input->post('course_id'),
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'email'=>$this->input->post('email'),
		'phone_no'=>$this->input->post('phone_no'),
		'bio'=>$this->input->post('bio'),
		'description'=>$this->input->post('description'),
		);
		if($image !=''){
		$data['image']=$image;
		}
		//print_r($data); die;
		if($id == NULL){
			// need to create entery
			$data['password'] = md5($this->input->post('password'));
			$data['created_on'] = date('Y-m-d H:i:s');
			return $this->db->insert('tbl_mentors', $data);
		}
		$this->db->where('mentor_id',$id);
		return $this->db->update('tbl_mentors', $data);
	}
	public function remove_mentors($id){
		$this->db->where('id',$id);
		$this->db->delete('tbl_mentors');
	}
	public function update_status($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('mentor_id',$id);
	$this->db->update('tbl_mentors',$data);

	}

	public function update_mentor_password($password){
		$mentor_id=$this->session->userdata('mentor_id');
	$data=array(

		'password' => md5($password),
		);
	$this->db->where('mentor_id',$mentor_id);
	$this->db->update('tbl_mentors',$data);

	}

	 public function password_validate_mentor($password){
        $mentor_id=$this->session->userdata('mentor_id');
        $this->db->select('*');
        $this->db->where('mentor_id', $mentor_id);
        $this->db->where('password', md5($password));
        return $this->db->get('tbl_mentors')->row();
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

    public function get_mentorship($id){

    	$mentor_id=$this->session->userdata('mentor_id');
        if($id == NULL){
        $this->db->select('tbl_mymentorship.*,tbl_category.name');
        $this->db->from('tbl_mymentorship');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_mymentorship.category_id','LEFT');
		$this->db->where('mentor_id',$mentor_id);
        $query = $this->db->get();
        return $query->result();
    }
    $this->db->select('tbl_mymentorship.*,tbl_category.name');
        $this->db->from('tbl_mymentorship');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_mymentorship.category_id','LEFT');
		$this->db->where('mentor_id',$mentor_id);
		$this->db->where('tbl_mymentorship.id',$id);
        $query = $this->db->get();
		return $query->first_row();
    }


       public function get_mentorship_admin($id){

       	$this->db->select('tbl_mymentorship.*,tbl_category.name,tbl_mentors.fullname');
        $this->db->from('tbl_mymentorship');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_mymentorship.category_id','LEFT');
        $this->db->join('tbl_mentors','tbl_mentors.mentor_id=tbl_mymentorship.mentor_id','LEFT');
        if($id == NULL){
       
	        $query = $this->db->get();
	        return $query->result();
    	}
			$this->db->where('tbl_mymentorship.id',$id);
	        $query = $this->db->get();
			return $query->first_row();
		
    }


    
     public function set_mentorship($image, $id=NULL){
    	//echo '<pre>';print_r($_POST); die;
    	$mentor_id=$this->session->userdata('mentor_id');
    	$mentor_detail=get_mentor_detail();
        $suffix = rand(65,90);
        $suffixch = chr($suffix);
       $data=array(
        
        'mentor_id'=>$mentor_id,
        'slug'=>strtolower(url_title($this->input->post('title').' '.$mentor_detail->fullname.' '.$suffixch)),
        'title'=>$this->input->post('title'),
        'category_id'=>$this->input->post('category_id'),
        'description'=>$this->input->post('description'),
        'price'=>$this->input->post('price'),
        'op_msg'=>$this->input->post('op_msg'),
        'status'=>0,
        'created_on'=>date('Y-m-d H:i:s'),
        'updated_on'=>date('Y-m-d H:i:s'),
        'image'=>$image,
       
   
        );
      

        $this->db->insert('tbl_mymentorship',$data);

       $mentorship_id=$this->db->insert_id();


       $module_ids=$this->input->post('module_id[]');
       foreach ($module_ids as $module_id) {
            $data=array(
        
                    'mentorship_id'=>$mentorship_id,
                    'module_id'=>$module_id,
               	 	'mentor_id'=>$mentor_id,
                    );
             $this->db->insert('tbl_mentor_module',$data);

       }
  

		

    }

     public function update_mentorship($image, $id){
    	// /echo '<pre>';print_r($_POST); die;
    	$mentor_id=$this->session->userdata('mentor_id');
    	$mentor_detail=get_mentor_detail();
       $data=array(
        'slug'=>strtolower(url_title($this->input->post('title').' '.$mentor_detail->fullname)),
        'title'=>$this->input->post('title'),
        'category_id'=>$this->input->post('category_id'),
        'description'=>$this->input->post('description'),
        'price'=>$this->input->post('price'),
        'op_msg'=>$this->input->post('op_msg'),
           
        );
      
         if($image != ''){
			  	$data['image']=$image;
              }
        $data['updated_on'] = date("Y-m-d:H:i:s");
		$this->db->where('mentor_id',$mentor_id);
		$this->db->where('id',$id);
		$this->db->update('tbl_mymentorship', $data);

		$this->remove_mymentorship_module($id);
       $module_ids=$this->input->post('module_id[]');
       foreach ($module_ids as $module_id) {
            $data=array(
        
                    'mentorship_id'=>$id,
                    'module_id'=>$module_id,
                    'mentor_id'=>$mentor_id,
               
                    );
             $this->db->insert('tbl_mentor_module',$data);

       }
    }

    public function remove_mymentorship_module($id){
    	
    	$mentor_id=$this->session->userdata('mentor_id');
    	$this->db->where('mentorship_id',$id);
    	$this->db->where('mentor_id',$mentor_id);
		return $this->db->delete('tbl_mentor_module');
    }

    public function remove_mymentorship($id){
    	
    	$mentor_id=$this->session->userdata('mentor_id');
    	$this->db->where('id',$id);
    	$this->db->where('mentor_id',$mentor_id);
		return $this->db->delete('tbl_mymentorship');
    }

    public function update_status_mymentorship($id, $status){
	$data=array(

		'status' => $status,
		);
	$this->db->where('id',$id);
	$this->db->update('tbl_mymentorship',$data);

	}

	 public function update_mentorship_admin($image, $id){
    	// /echo '<pre>';print_r($_POST); die;
       $data=array(
        'title'=>$this->input->post('title'),
        'description'=>$this->input->post('description'),
        'price'=>$this->input->post('price'),
        'op_msg'=>$this->input->post('op_msg'),
           
        );
      
         if($image != ''){
			  	$data['image']=$image;
              }
        $data['updated_on'] = date("Y-m-d:H:i:s");
		$this->db->where('id',$id);
		return $this->db->update('tbl_mymentorship', $data);
		
    }

     public function remove_mymentorship_admin($id){
   
    	$this->db->where('id',$id);
		return $this->db->delete('tbl_mymentorship');
    }


}