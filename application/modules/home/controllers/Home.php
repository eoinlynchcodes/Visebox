<?php
//error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('contact/contact_model');
		$this->load->model('product/product_model');
		$this->load->model('course/course_model');
	}
	public function index(){ 
          	$data['home']=$this->home_model->get_header();  	
			$data['title']=$data['home']->meta_title;
			$data['keywords']=$data['home']->meta_keyword;
			$data['description']=$data['home']->meta_description;
			$data['view']='main';
			$this->load->view('frontend/layout',$data);
			//echo 'comming soon......';
	}
		// contact us page ...
	 public function contact()
	   {
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		if(isset($_POST)&&!empty($_POST)){
		 $this->form_validation->set_rules('f_name', 'Name', 'required');
		
		if ($this->form_validation->run() === FALSE){	
		}else{
			$this->contact_model->set_contact();
			$this->session->set_flashdata('message', ('Thank you for contacting. We will soon get back to you '));
			// mail function 
			        $contacts=$this->home_model->get_contactusbranches();
		             $email =$contacts->email;
					 $header = $contacts->header;
					 $mail = array(
							'name' => $this->input->post('f_name'),
							'email' => $this->input->post('email'),
							'mobile_no' => $this->input->post('mobile_no'),
							'description' => $this->input->post('description'),
		                  );		
					$message = $this->load->view('mail_contact_us', $mail, true);
					@send_mail($email,$header,$message);
					$email_user =$this->input->post('email');
					$header_res = $contacts->header;
					$message_res=$this->load->view('mail_response', $mail, true);
					@send_mail($email_user,$header_res,$message_res);	
					 redirect(base_url('contact-us'));
		   }  
	  }	
	    $data['title']="Contact";
		$data['view']='contact';
		$this->load->view('frontend/layout',$data);
}
 
	 public function client()
	{ 
		$data['title']="Clients";
		$data['keywords']="Clients";
		$data['description']="Clients";
		$data['clients']=$this->home_model->get_clients();
		$data['view']='clients';
		$this->load->view('frontend/layout',$data);
	}
	
	// color list
	public function color()
	{ 
		$data['title']="color";
		$data['keywords']="color";
		$data['description']="color";
		$data['colors']=$this->home_model->get_color1();
		$data['designs']=$this->home_model->get_color2();
		$data['view']='color';
		$this->load->view('frontend/layout',$data);
	}
	
	
	// exports inner page  details 
	public function exports($slug=Null)
	{ 
	   if($slug!=''){
		    $data['exports']=$this->home_model->get_exports($slug);
			$data['title']=$data['exports']->meta_title;
			$data['keywords']=$data['exports']->meta_keyword;
			$data['description']=$data['exports']->meta_description;
			$data['view']='trust_exports_inner';
			$this->load->view('frontend/layout',$data);
	   }else{
		   $data['title']='trust-export';
			$data['exports']=$this->home_model->get_exports_list();
			$data['view']='trust_export_list';
			$this->load->view('frontend/layout',$data);	
	  }
	}
	// exports inner page  details 
	public function product($slug)
	{ 
	    $data['products']=$this->home_model->get_product_details($slug);
		$data['title']=$data['products']->meta_title;
		$data['keywords']=$data['products']->meta_keyword;
		$data['description']=$data['products']->meta_description;
		$data['view']='products_inner';
		$this->load->view('frontend/layout',$data);
	}
	
	// exports inner page  details 
	public function our_products($slug=Null)
	{ 
	   if($slug!=''){
		$data['products']=$this->home_model->get_product_list_cat($slug);
		$data['title']='Our-product';
		//$data['keywords']='';
		//$data['description']='';
		$data['slug']=$slug;
		$data['view']='our_products_list';
		$this->load->view('frontend/layout',$data);  
	  }else{
	    $data['categorys']=$this->home_model->get_product_category();
		$data['title']='Our-product';
		//$data['keywords']='';
		//$data['description']='';
		$data['view']='our_products_category';
		$this->load->view('frontend/layout',$data);
	  }
	}
	
	// site map list
	public function sitemap()
	{ 
		$data['title']="Sitemap";
		$data['keywords']="sitemap";
		$data['description']="sitemap";
		//$data['clients']=$this->home_model->get_clients();
		$data['view']='sitemap';
		$this->load->view('frontend/layout',$data);
	}
	// paint your space page
	public function paint_your_space()
	{ 
		$data['title']="Paint Your Space";
		//$data['keywords']="sitemap";
		//$data['description']="sitemap";
		//$data['clients']=$this->home_model->get_clients();
		$data['view']='paint_your_space';
		$this->load->view('frontend/layout',$data);
	}
	/*public function search()
	{ 
		$data['title']="Search";
		$keyword=$_GET['keyword'];
		$data['products']=$this->product_model->get_product_search($keyword);
		//echo'<pre>';print_r($data['products']);die;
		$data['view']='search';
		$data['slug']=$keyword;
		$this->load->view('frontend/layout',$data);
	}*/

	//get city by ajax call
	public function GetAllCity(){
		 //echo"ok";die;
		$country_id = $this->input->post('country_id',TRUE); 
        $results = $this->home_model->get_City($country_id);
        echo'<option value="">---select City---</option>';
        foreach ($results as $result) {
        echo '<option value="'.$result->id.'">'.$result->city_name.'</option>';
        }
		
    }
	//get city by ajax call
	public function GetAllUniversity(){
		 //echo"ok";die;
		$city_id = $this->input->post('city_id',TRUE); 
		$country_id = $this->input->post('country_id',TRUE); 
		$results = $this->home_model->get_University($country_id,$city_id);
        echo'<option value="">---select University---</option>';
        foreach ($results as $result) {
        echo '<option value="'.$result->id.'">'.$result->university_name.'</option>';
        }
		
    }

    public function GetAllUniversityFilter(){
		 //echo"ok";die;
		$city_id = $this->input->post('city_id',TRUE); 
		$country_id = $this->input->post('country_id',TRUE); 
		$results = $this->home_model->get_UniversityFilter($country_id,$city_id);
        echo'<option value="">Select University</option>';
        foreach ($results as $result) {
        echo '<option value="'.$result->id.'">'.$result->university_name.'</option>';
        }
		
    }

    //get city by ajax call
	public function GetAllUniversityHome(){
		 //echo"ok";die;
		$city_id = $this->input->post('city_id',TRUE); 
		 
		$results = $this->home_model->get_UniversityHome($city_id);
        echo'<option value="">Select University</option>';
        foreach ($results as $result) {
        echo '<option value="'.$result->id.'">'.$result->university_name.'</option>';
        }
		
    }
    //get course by ajax call
	public function GetAllModuleFilter(){
		 //echo"ok";die;
		$category_id = $this->input->post('category_id',TRUE); 
		$results = $this->home_model->get_Module($category_id);
       	echo'<option value="">Select Module</option>';
        foreach ($results as $result) {
        echo '<option value="'.$result->id.'">'.$result->module_name.'</option>';
        }
		
    }

    //get course by ajax call
	public function GetAllModule(){
		 //echo"ok";die;
		$category_id = $this->input->post('category_id',TRUE); 
		$results = $this->home_model->get_Module($category_id);
       
        foreach ($results as $result) {
        echo '<option value="'.$result->id.'">'.$result->module_name.'</option>';
        }
		
    }

    public function search(){
    	// /echo'<pre>';print_r($_POST);
    	//$search_sess=$this->session->userdata('search_sess');
    	//if(empty($search_sess)){
	    	$mentor_keyword=$this->input->post('mentor_keyword'); 
	    	$city_id=$this->input->post('city_id'); 
	    	$university_id=$this->input->post('university_id'); 
	    	$searchdata = array();
	        $searchdata['mentor_keyword'] = $mentor_keyword;
	        $searchdata['city_id'] = $city_id;
	        $searchdata['university_id'] = $university_id;
	        $searchdata['search_sess'] = true;
	        $this->session->set_userdata($searchdata);
    	//}
			
        //if(!empty($search_sess)){
        	//$mentor_keyword=$this->session->userdata('mentor_keyword');
        	//$city_id=$this->session->userdata('city_id');
        	//$university_id=$this->session->userdata('university_id');
        //}
        
    	$data['mentors']=$this->home_model->get_mentor_search($mentor_keyword,$city_id,$university_id);
		//echo'<pre>';print_r($data['mentors']);die;
		$data['city_id']=$city_id;
		$data['university_id']=$university_id;
		$data['title']="Show Mentors List";
		$data['view']='search_mentors';
		$this->load->view('frontend/layout',$data);
    }

    public function module($slug){

    	$mymentorshipId=get_mymentorshipIdBySlug($slug);
    	if(empty($mymentorshipId)){
			show_404();
		}
		 $this->session->set_userdata('last_page', current_url());
    	$data['mentor']=$this->home_model->get_mentor_profile($mymentorshipId->id);
    	//echo'<pre>';print_r($data['mentor']);die;
    	$data['title']="Tutor Profile";
    	$data['view']='mentor_profile';
		$this->load->view('frontend/layout',$data);

    }

    public function filter(){
    	//echo'<pre>';print_r($_POST);
    	$data['mentors']=$this->home_model->get_mentor_search_filter();
    	$data['city_id']='';
		$data['university_id']='';
		$this->load->view('search_mentors_filter',$data);
    }


    public function booking_module($mymentershipId){
    	if($this->session->userdata('student_logged_frontend') != TRUE){
			 redirect(base_url('student-login'));
		 }
    	/*$mymentershipId=$this->input->post('mymentershipId'); 
	    $mentor_id=$this->input->post('mentor_id'); 
		    if(!empty($_POST))
			    $searchdata = array();
		        $searchdata['book_mymentershipId'] = $mymentershipId;
		        $searchdata['book_mentor_id'] = $mentor_id;
		        $this->session->set_userdata($searchdata);	
	        } 
	    $book_mymentershipId=$this->session->userdata('book_mymentershipId');*/
    	$data['mentor']=$this->home_model->get_mentor_by_mymentershipId($mymentershipId);
    	if(empty($data['mentor'])){
			show_404();
		}
		$data['title']="Booking Mentors";
		$data['view']='mentor_booking_module';
		$this->load->view('frontend/layout',$data);

    }


    public function book_list(){

    	$data['books']=$this->home_model->get_book();
    	//echo'<pre>';print_r($data['books']);die;
		$data['title']='Available Books List';
		$data['view']='book_list';
		$this->load->view('frontend/layout',$data);

    } 

    public function show_seller(){
    	$book_id = $this->input->post('book_id',TRUE); 
		$data['show_seller'] = $this->home_model->get_show_seller($book_id);
		$this->load->view('show_book_seller',$data);
    }

    public function blog(){

    	$data['blogs']=$this->home_model->get_blog();
    	//echo'<pre>';print_r($data['blogs']);die;
		$data['title']='Blogs';
		$data['view']='blog_list';
		$this->load->view('frontend/layout',$data);

    }

    public function blog_detail($slug){

    	$data['blog']=$this->home_model->get_blog_by_slug($slug);
    	if(empty($data['blog'])){
			show_404();
		}
		$data['title']=$data['blog']->title;
		$data['view']='blog_detail';
		$this->load->view('frontend/layout',$data);

    }

     public function payment(){
    	//echo'<pre>'; print_r($_POST);die;
    	if($this->session->userdata('student_logged_frontend') != TRUE){
			 redirect(base_url('student-login'));
		 }
		 if(empty($_POST)){
			 show_404();
		 }


		$data['title']='Payment Appoiment';
		$data['view']='payment';
		$this->load->view('frontend/layout',$data);

    }


    // subscribe code

  public function subscribe(){
    if(!empty($_POST)){
    $email = $this->input->post('email',TRUE);
    $resultsubscribe=$this->home_model->Get_Subscriber($email);
    if(empty($resultsubscribe)){
    $subscribe=$this->home_model->setSubscribe($email);
    if($subscribe){
                    $header = 'Visebox';
                    $mail = array();
                    $mail['email'] = $email;
                    $message = $this->load->view('mail_subscribe', $mail, true);
                   // echo'<pre>';print_r($message) ;die;
                    @send_mail($email,$header,$message);
                    echo '<span style="color:green"> Thank you for Subscribe.</span>';
             
          
                  }
                }else{

                   echo '<span style="color:#bd3434"> You are already Subscribed.</span>';
                }
      }else{

        redirect(base_url());
      }
  }

   
	
}
