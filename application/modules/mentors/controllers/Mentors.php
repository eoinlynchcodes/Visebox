<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mentors extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('mentors_model');
		$this->load->helper('url');
		 if($this->session->userdata('mentor_logged_frontend') != TRUE){
		 	 $this->session->set_flashdata('error', "Please Login again.");
			 redirect(base_url('mentor-login'));
		 }
		
	}
	public function index(){
		$data['title'] = 'Mentor Dashboard';
		$data['view']='mentordashboard/view';
        $this->load->view('mentorend/layout', $data);
	}

	public function change_password() {
        if($this->input->post()) {
            
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('old_password', 'old password', 'trim|required|callback_password_check');
            $this->form_validation->set_rules('new_password', 'new password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|matches[new_password]');
            if($this->form_validation->run() == TRUE) {
                $password = $this->input->post('new_password');
                $updated = $this->mentors_model->update_mentor_password($password);
                
                    $this->session->set_flashdata('message', 'Your password is changed.');
                    redirect('mentor-dashboard/change-password');
                
            }
        }
        $this->data['title'] = 'Change Password';
        $this->data['view'] = 'mentordashboard/change_password';
        $this->load->view('mentorend/layout', $this->data);
    }

    public function password_check($param) {
       
        $validate = $this->mentors_model->password_validate_mentor($param);
        if(!empty($validate)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', '%s not validate.');
            return FALSE;
        }
    }


    public function change_profile() {
		  $mentor_id = $this->session->userdata('mentor_id');
          $data['mentor'] = $this->mentors_model->get_mentors($mentor_id);
         //print_r($mentor_id);die;
          if(empty($data['mentor'])){
         show_404();
          }
         if(!empty($_POST) || !empty($_FILES)){
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
            $this->form_validation->set_rules('phone_no', 'Contact number', 'trim|required|is_numeric');
			//$this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('bio', ' bio', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
            if ($this->form_validation->run() === FALSE){		
            }else{	
			$filename=time() . date('Ymd');
			//print_r ($_FILES); die;
             $image='';
             if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
                        $config = array(
                        'upload_path' => "assets/upload/mentor_profile_image",
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => TRUE,
                        'max_size' => "2048000", 
                        'file_name' => $filename
                        );
                        $this->load->library('upload', $config);
                        if($this->upload->do_upload('fileToUpload'))
                        {
                        $data = array('upload_data' => $this->upload->data());
                        $image=$data['upload_data']['file_name'];
                        }
                        else
                        {
                        $error = array('error' => $this->upload->display_errors());
                        echo $error['error'];die;
                        }
             }
			 
                $this->mentors_model->set_mentors($mentor_id,$image);
                $this->session->set_flashdata('message', 'Your profile is Updated.');
                redirect('mentor-dashboard/change-profile');
		   }      
           }
        $data['title'] = 'Change Profile';
        $data['view'] = 'mentordashboard/change_profile';
        $this->load->view('mentorend/layout', $data);
    }
    public function mymentorship(){
        $this->data['mentorships'] = $this->mentors_model->get_mentorship(NULL);
        $this->data['title'] = 'My Mentorship';
        $this->data['view'] = 'mentordashboard/mymentorship';
        $this->load->view('mentorend/layout', $this->data);
    }
   public function mymentorship_add(){

        if(!empty($_POST)){
             $filename=time() . date('Ymd');
             $image='';
             if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
                        $config = array(
                        'upload_path' => "assets/upload/mymentorship",
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => TRUE,
                        'max_size' => "2048000", 
                        'file_name' => $filename
                        );
                        $this->load->library('upload', $config);
                        if($this->upload->do_upload('fileToUpload'))
                        {
                        $data = array('upload_data' => $this->upload->data());
                        $image=$data['upload_data']['file_name'];
                        }
                        else
                        {
                        $error = array('error' => $this->upload->display_errors());
                        echo $error['error'];die;
                        }
             }

            $updated = $this->mentors_model->set_mentorship($image);
            $this->session->set_flashdata('message', 'Mentorship is created waiting for approval.');
            redirect('mentor-dashboard/mymentorship-add');
        }
        $this->data['title'] = 'My Mentorship Add';
        $this->data['view'] = 'mentordashboard/mymentorship_add';
        $this->load->view('mentorend/layout', $this->data);
    }

    public function mymentorship_view($id){
        $this->data['mentorships'] = $this->mentors_model->get_mentorship($id);
        $this->data['title'] = 'My Mentorship';
        $this->data['view'] = 'mentordashboard/mymentorship_view';
        $this->load->view('mentorend/layout', $this->data);
    }

    public function mymentorship_edit($id){

        $this->data['mentorships'] = $this->mentors_model->get_mentorship($id);
        if(!empty($_POST)){
             $filename=time() . date('Ymd');
             $image='';
             if(isset($_FILES['fileToUpload'])&&$_FILES['fileToUpload']['error']=='0'){
                        $config = array(
                        'upload_path' => "assets/upload/mymentorship",
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => TRUE,
                        'max_size' => "2048000", 
                        'file_name' => $filename
                        );
                        $this->load->library('upload', $config);
                        if($this->upload->do_upload('fileToUpload'))
                        {
                        $data = array('upload_data' => $this->upload->data());
                        $image=$data['upload_data']['file_name'];
                        }
                        else
                        {
                        $error = array('error' => $this->upload->display_errors());
                        echo $error['error'];die;
                        }
             }

            $updated = $this->mentors_model->update_mentorship($image,$id);
                
                $this->session->set_flashdata('message', 'Mentorship is updated.');
                redirect('mentor-dashboard/mymentorship-edit/'.$id);
        }
        $this->data['title'] = 'My Mentorship Edit';
        $this->data['view'] = 'mentordashboard/mymentorship_edit';
        $this->load->view('mentorend/layout', $this->data);
    }

    public function mymentorship_remove($id){
        $this->mentors_model->remove_mymentorship($id);
        redirect('mentor-dashboard/mymentorship');
    }

	
}