<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('auth_model');
	    $this->lang->load('login');
        //check_user_logged();
    }

    public function index() {
           if(($this->session->userdata('logged_admin')))
			{
				redirect('admin');
			}else{
		     $this->load->view('login/main');
		 }
    }
    public function process() {
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
	   $this->load->view('login/main');
        } else {
            $user_name = $this->input->post('username');
            $password = $this->input->post('password');
            // echo '<pre>'; print_r($_POST);
           $this->auth_model->setUsername($user_name);
            $this->auth_model->setPassword($password);
            $validate = $this->auth_model->validate_user();
		//dump($validate);
            if(!empty($validate)) {
                $userdata = array();
                $userdata['user_id'] = $validate->user_id;
                $userdata['group_id'] = $validate->group_id;
                $userdata['username'] = $validate->email;
                $userdata['first_name'] = $validate->firstname;
                $userdata['last_name'] = $validate->lastname;
                $userdata['email'] = $validate->email;
                $userdata['logged_admin'] = TRUE;
                $this->session->set_userdata($userdata);
					redirect('admin');
           
			} else {
                $this->session->set_flashdata('message', lang('invalid_credential_messege'));
                redirect('login');
			}
			
			}
    }
    public function forget_password() {
		
           if($this->input->post()) {
               $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
               $this->form_validation->set_rules('email', 'email', 'required');
               if($this->form_validation->run() == TRUE) {
                        $email = $this->input->post('email');
                       
                        $validate = $this->auth_model->checkUserEmailForgot($email);
                        //print_r($validate);die;
                        if(!empty($validate)) {
                            // need send email
                            $password = rand(324,2342343);
				            $this->auth_model->forgot_update_password($validate,$password);
                            $header = 'Forgot Password';
		                    $mail = array();
		                    $mail['name'] = $validate->name;
		                    $mail['email'] = $validate->email;
		                    $mail['password'] = $password;
		                    $message = $this->load->view('mail_forgot_password', $mail, true);
		                    //echo'<pre>';print_r($message) ;die;
		                    @send_mail($result->u_email,$header,$message);
                            $this->session->set_flashdata('success_message', lang('password_reset_message'));
                            redirect('forget-password');
                            } else {
                            $this->session->set_flashdata('error_message', lang('email_invalid_message'));
                            redirect('forget-password');							
                    }
               }
           }
         $this->load->view('login/student_forgot');
    }
   public function logout() {
        $array_items = array('username' => '', 'user_id' => '', 'first_name' =>'', 'last_name' => '', 'user_role_id'=>'','logged_admin' =>'FALSE');
	// print_r ($array_items);  die;
      //  $this->session->unset_userdata($array_items);
	 $this->session->sess_destroy();
        redirect('login');
    } 

    public function userlogout() {
        $array_items = array('user_name' => '', 'student_id' => '', 'first_name' =>'', 'last_name' => '', 'user_role_id'=>'','student_logged_frontend' => FALSE);
        $this->session->unset_userdata($array_items);
        redirect(base_url());
    }
	
	public function student(){
		//echo 'kk' ;die;
		

     $last_page=$this->session->userdata('last_page');


		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$validate = $this->auth_model->student_login();
		//echo "<pre>"; print_r($validate); die;
				if(!empty($validate)){
					if($validate->active==0){
						 $this->session->set_flashdata('error', "Your account is not approved.");
                 		 redirect('student-login');
					}else{
						$userdata = array();
						$userdata['student_id']   = $validate->id;
						$userdata['email']  = $validate->email;
						$userdata['student_logged_frontend'] = TRUE;
						$this->session->set_userdata($userdata);
						
						//echo $this->session->userdata['user_logged_frontend']; die;
						if(empty($last_page)){
							redirect(base_url('student-dashboard'));
						}else{
							redirect($last_page);
						}
					}
			}else{
				 $this->session->set_flashdata('error', "Email or password is incorrect. Please try again.");
                 redirect('student-login');
			 
			}	
		}
		$data['title']="Student Login";
		$data['view']='student_login';
		$this->load->view('frontend/layout',$data);
	}
	
	
	
	public function register($status=0){
		
		if (!empty($_POST)) {
			$validate = $this->auth_model->get_student_register();
		//echo "<pre>";print_r($validate); die;
				if(empty($validate)){
					$this->auth_model->set_student_register();
					echo base_url('student-register-msg');
				}else{
				 	echo 'Already';
				}	
		
		}else{
			$data['title']="Student Registration";
			$data['view']='student_reg';
		    $this->load->view('frontend/layout',$data);
		}
	
	}

	public function register_msg(){
		$this->session->set_flashdata('message', 'Registration successful.');
		redirect(base_url('student-register'));
	}

	public function student_logout() {
        $array_items = array('student_id' => '', 'email' => '', 'student_logged_frontend'=>'FALSE');
	// print_r ($array_items);  die;
       $this->session->unset_userdata($array_items);
	 $this->session->sess_destroy();
      redirect('student-login');
    } 



    public function mentor_register(){
		
		if (!empty($_POST)) {
			$validate = $this->auth_model->get_mentor_register();
		//echo "<pre>";print_r($validate); die;
				if(empty($validate)){
					$this->auth_model->set_mentor_register();
					echo base_url('mentor-register-msg');
				}else{
				 	echo 'Already';
				}	
		
		}else{
			$data['title']="Mentor Registration";
			$data['view']='mentor_reg';
		    $this->load->view('frontend/layout',$data);
		}
	
	}

	public function mentor(){
		if($this->session->userdata('mentor_logged_frontend') == TRUE){
		 	
			 redirect(base_url('mentor-dashboard'));
		 }
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$validate = $this->auth_model->mentor_login();
		//echo "<pre>"; print_r($validate); die;
				if(!empty($validate)){
					if($validate->status==0){
						 $this->session->set_flashdata('error', "Your account is not approved.");
                 		 redirect('mentor-login');
					}else{
						$userdata = array();
						$userdata['mentor_id']   = $validate->mentor_id;
						$userdata['email']  = $validate->email;
						$userdata['mentor_logged_frontend'] = TRUE;
						$this->session->set_userdata($userdata);
						
						//echo $this->session->userdata['user_logged_frontend']; die;
						redirect(base_url('mentor-dashboard'));
					}
			}else{
				 $this->session->set_flashdata('error', "Email or password is incorrect. Please try again.");
                 redirect('mentor-login');
			 
			}	
		}
		$data['title']="Mentor Login";
		$data['view']='mentor_login';
		$this->load->view('frontend/layout',$data);
	}
	


	public function mentor_register_msg(){
		$this->session->set_flashdata('message', 'Registration successful.');
		redirect(base_url('mentor-register'));
	}

	public function mentor_logout() {
        $array_items = array('mentor_id' => '', 'email' => '', 'mentor_logged_frontend'=>'FALSE');
	// print_r ($array_items);  die;
       $this->session->unset_userdata($array_items);
	 $this->session->sess_destroy();
      redirect('mentor-login');
    } 

}

