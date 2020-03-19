<?php

if (!defined('BASEPATH')) {
    exit('No Direct Script access allowed');
}

class Auth_model extends CI_Model {

    private $tbl_name = 'tbl_login';
    
    private $user_name;
    
    private $password;
    
    private $email;
    
    function __construct() {
        parent::__construct();
    }
    
    public function setUsername($username) {
        $this->user_name =    $username; 
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getUsername() {
        return $this->user_name;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function validate_user() {
        $username = $this->getUsername();
        $password = $this->getPassword();
        $this->db->select('*');
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
       // $this->db->where('status', '1');
        return $this->db->get($this->tbl_name)->row();
    }
    public function checkUserEmail(){
        $email = $this->getEmail();
        $this->db->select('*');
        $this->db->where('email', $email);
        return $this->db->get($this->tbl_name)->row();
    }
    public function password_validate(){
        $password = $this->getPassword();
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('password', md5($password));
        return $this->db->get($this->tbl_name)->row();
    }
    public function update_password() {
        $password = $this->getPassword();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        return $this->db->update($this->tbl_name, array('password' => md5($password)));
    }
	public function student_login()
	{
		//print_r($_POST); die;
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this ->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		return $this->db->get()->row();
	}

    public function checkUserEmailForgot($email){
          
            $this->db->select('*');
            $this->db->where('email', $email);
           // $this->db->where('status',1);
            return $this->db->get('tbl_login')->row();
        }

     public function forgot_update_password($validate,$password) {
            $this->db->where('user_id', $validate->user_id);
            return $this->db->update('tbl_login', array('password' => md5($password)));
        }	
	
	
	public function get_student_register()
    {
        //print_r($_POST); die;
        $email = $this->input->post('email');
        $this ->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        return $this->db->get()->row();
    }

    public function set_student_register()
    {
    //echo '<pre>';print_r($_POST); die;
       $data=array(
        'fullname'=>$this->input->post('fname').' '.$this->input->post('lname'),
        'fname'=>$this->input->post('fname'),
        'lname'=>$this->input->post('lname'),
        'email'=>$this->input->post('email'),
        'password'=>md5($this->input->post('password')),
        //'college'=>$this->input->post('c_year'),
        'country_id'=>$this->input->post('country'),
        //'city_id'=>$this->input->post('city'),
        //'university_id'=>$this->input->post('university'),
        //'course_id'=>$this->input->post('course'),
        //'description'=>$this->input->post('description'),
        'phone'=>$this->input->post('phone'),
        'active'=>1,
        'last_login'=>strtotime(date('Y-m-d H:i:s')),
        'created_on'=>strtotime(date('Y-m-d H:i:s')),
        'ip_address'=>visiteIp(),
   
        );

       return $this->db->insert('users',$data);
    }

    public function get_mentor_register()
    {
        //print_r($_POST); die;
        $email = $this->input->post('email');
        $this ->db->select('*');
        $this->db->from('tbl_mentors');
        $this->db->where('email',$email);
        return $this->db->get()->row();
    }

    public function set_mentor_register()
    {
    //echo '<pre>';print_r($_POST); die;
       $data=array(
        'fullname'=>$this->input->post('fname').' '.$this->input->post('lname'),
        'first_name'=>$this->input->post('fname'),
        'last_name'=>$this->input->post('lname'),
        'email'=>$this->input->post('email'),
        'password'=>md5($this->input->post('password')),
        'country_id'=>$this->input->post('country'),
        'city_id'=>$this->input->post('city'),
        'university_id'=>$this->input->post('university'),
       // 'category_id'=>$this->input->post('category_id'),
        'bio'=>$this->input->post('bio'),
        'description'=>$this->input->post('about_us'),
        'phone_no'=>$this->input->post('phone'),
        'status'=>0,
        'last_login'=>strtotime(date('Y-m-d H:i:s')),
        'created_on'=>date('Y-m-d H:i:s'),
        'updated_on'=>date('Y-m-d H:i:s'),
        'ip_address'=>visiteIp(),
   
        );

      return  $this->db->insert('tbl_mentors',$data);
       /*$mentor_id=$this->db->insert_id();

       $module_ids=$this->input->post('module_id[]');
       foreach ($module_ids as $module_id) {
            $data=array(
        
                    'mentor_id'=>$mentor_id,
                    'module_id'=>$module_id,
               
                    );
             $this->db->insert('tbl_mentor_module',$data);

       }*/

    }


    public function mentor_login()
    {
        //print_r($_POST); die;
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this ->db->select('*');
        $this->db->from('tbl_mentors');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        return $this->db->get()->row();
    }

    
	
}

