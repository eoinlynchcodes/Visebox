<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// ------------------------------------------------------------------------

/**
 * @access	public
 * @param	mixed	Script src's or an array
 * @param	string	language
 * @param	string	type
 * @param	string	title
 * @param	boolean	should index_page be added to the script path
 * @return	string
 */
 // mail function ----
 function send_mail($email,$subject,$message){
   // echo 'emailid - '.$email;  echo ' Subject -'. $subject; echo $message;  die;   
 	$from = "support@wiesoftware.com";
	$sender_name = "Fleet";
	$ci = &get_instance();
	$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://sg2plcpnl0219.prod.sin2.secureserver.net',
		'smtp_port' => 465,
		'smtp_user' => 'support@wiesoftware.com',
		'smtp_pass' => 'wie@123',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1'
		);
	$ci->load->library('email');	
	$ci->email->initialize($config);
	$ci->email->from($from, $sender_name);
	$ci->email->to(trim($email)); 			
	$ci->email->subject($subject);

	//$data = $ci->load->view('template/templete_layout',$ci->data, TRUE);
	$ci->email->message($message);
	if($ci->email->send()){
		return true;
	}else{
		return false;
	}	
}

/* show header content  function  by ritesh (wie.software45)  */

  function get_header(){
	$ci = &get_instance();
	//$ci->db->where('status','1');
	return $ci->db->get('tbl_header')->row();
} 

 function get_home_about(){
	$ci = &get_instance();
    $ci->db->where('slug','about-us');
	return $ci->db->get('tbl_pages')->row();
} 

 function get_footer(){
	$ci = &get_instance();
	return $ci->db->get('tbl_footer')->row();
} 
// social link with image front 
 function get_social(){
	$ci = &get_instance();
	return $ci->db->get('tbl_social_link')->result();
} 

/* show home page banner function  by ritesh (wie.software45)  */

  function get_banner(){
	$ci = &get_instance();
	$ci->db->where('status','1');
	return $ci->db->get('tbl_banner')->result();
}

 
 // CMS  page link 
  function get_cms(){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_pages');
	$ci->db->where('status', '1');
	//$ci->db->limit('4');
	return $ci->db->get()->result();
}   

function get_banner_separate($id)
{
	$ci=&get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_banner_separate');
	$ci->db->where('id',$id);
	$ci->db->where('status', '1');
	return $ci->db->get()->row();
}

function get_colors()
{
	$ci=&get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_colors');
	$ci->db->where('type','Colors');
	//$ci->db->where('status', '1');
	return $ci->db->get()->result();
}

function get_product_available_colors($id)
{
	$ci=&get_instance();
	$ci->db->select('tbl_colors.image as cimage , name');
	$ci->db->where('tbl_colors.id',$id);
	//$ci->db->where('status', '1');
	return $ci->db->get('tbl_colors')->row();
}


 
  // get_featured_products  page link 
  function get_featured_products(){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_product');
	$ci->db->where('status', '1');
	$ci->db->where('featured_products', 'Yes');
	$ci->db->limit('8');
	return $ci->db->get()->result();
} 
  // get_trustexports  page link 
  function get_trustexports(){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_trustexports');
	$ci->db->where('status', '1');
	
	return $ci->db->get()->result();
} 
 // get_releted_product by category  page link 
  function get_releted_product($category_slug,$product_id){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_product');
	$ci->db->where('category_slug',$category_slug);
	$ci->db->where('product_id !=',$product_id);
	$ci->db->where('status', '1');
	return $ci->db->get()->result();
} 
 
 //get course name
function get_course_by(){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_course');
	$ci->db->where('status','1');
	return $ci->db->get()->result();
} 


function get_module_mymembership($mentorships_id){
	$ci = &get_instance();
	$ci->db->select('tbl_module.*,tbl_mentor_module.module_id');
	$ci->db->from('tbl_mentor_module');
	$ci->db->join('tbl_module','tbl_module.id=tbl_mentor_module.module_id');
	$ci->db->where('mentorship_id',$mentorships_id);
	$results=$ci->db->get()->result();
	if(!empty($results)){
		$module=array();
		foreach ($results as $result) {
			$module[]= $result->id;
		}
		return $module;
	}
}

 //get get_citys
function get_citys(){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_city');
	$ci->db->where('status','1');
	return $ci->db->get()->result();
} 

 
 function get_module_mymembershipby_category($category_id){
 		$ci = &get_instance();
        $ci->db->select('*');
        $ci->db->from('tbl_module');
        $ci->db->where('status', '1');
		$ci->db->where('category_id',$category_id);
        $query = $ci->db->get();
        return $query->result();
    }


function get_blog_recent(){
		$ci = &get_instance();
        $ci->db->select('*');
        $ci->db->from('tbl_blog');
        $ci->db->where('status',1);
        $ci->db->order_by('id','DESC');
        $ci->db->limit(5);
        $query = $ci->db->get();
        return $query->result();
    }


//---------------------------------backed--------------------------------------------------
/*
 * Get all the default user defined properties (Not Used)
 */
// if (!function_exists('_properties')) {

    // function _properties() {
        // $ci = & get_instance();
        // $properties = $ci->config->item('properties');
        // return $properties;
    // }

// }


/*
 * Get the site name
 */
if (!function_exists('site_name')) {

    function site_name() {
        $properties = _properties();
        $site_name = $properties->properties;
        return $site_name->site_name;
    }

}

/// category

function get_cat(){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_category');
	$ci->db->where('status','1');
	return $ci->db->get()->result();

}
//get  country name 

function get_country_by(){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_country');
	$ci->db->where('status','1');
	return $ci->db->get()->result();
}
//get city by countey
function get_City_by_country($country_id){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_city');
	$ci->db->where('status','1');
	$ci->db->where('country_id',$country_id);
	return $ci->db->get()->result();
}  
//get city by countey by university
function get_City_by_country_university($country_id,$city_id){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_university');
	$ci->db->where('status','1');
	$ci->db->where('country_id',$country_id);
	$ci->db->where('city_id',$city_id);
	return $ci->db->get()->result();
}  

function get_cat_by($slug){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_category');
	$ci->db->where('slug',$slug);
	return $ci->db->get()->row();
  }

//----------------image on product page --------------------
function get_gallery($product_id){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_gallery');
	$ci->db->where('product_id',$product_id);
	$ci->db->where('status','1');
	return $ci->db->get()->result();
  }
  
    function get_contact_count() {
		$ci = &get_instance();
		$ci->db->select('count(id) as total');
		$ci->db->from('tbl_contact');
		return $ci->db->get()->row();

	}
 function get_product_count() {
		$ci = &get_instance();
		$ci->db->select('count(product_id) as total');
		$ci->db->from('tbl_product');
		return $ci->db->get()->row();
	}


function get_student_loged_id() {
		$ci = &get_instance();
		return $ci->session->userdata('student_id');
	}

function get_student_detail() {
		$ci = &get_instance();
		$ci->db->select('*');
		$ci->db->where('id',$ci->session->userdata('student_id'));
		$ci->db->from('users');
		return $ci->db->get()->row();
		
	}

function get_mentor_detail() {
		$ci = &get_instance();
		$ci->db->select('*');
		$ci->db->where('mentor_id',$ci->session->userdata('mentor_id'));
		$ci->db->from('tbl_mentors');
		return $ci->db->get()->row();
		
	}

function get_modules($mentorship_id) {
		$ci = &get_instance();
		$ci->db->select('tbl_module.module_name');
		$ci->db->join('tbl_module','tbl_module.id=tbl_mentor_module.module_id');
		$ci->db->where('mentorship_id',$mentorship_id);
		$ci->db->from('tbl_mentor_module');
		$results=$ci->db->get()->result();
		$mudulename='';
		$i=1; foreach ($results as $result) {
			$mudulename.='<b>'.$i.'.</b> '.$result->module_name.'</br>';
		$i++; }
		 return $mudulename;
		
	}



function get_city_name($city_id){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_city');
	$ci->db->where('id',$city_id);
	$row=$ci->db->get()->row();
	return $row->city_name;
} 

 function get_city(){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_city');
	$ci->db->where('status','1');
	return $ci->db->get()->result();
}

function get_university(){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_university');
	$ci->db->where('status','1');
	return $ci->db->get()->result();
	
} 

function get_university_name($university_id){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_university');
	$ci->db->where('id',$university_id);
	$row=$ci->db->get()->row();
	return $row->university_name;
}  


function get_cat_name($category_id){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_category');
	$ci->db->where('category_id',$category_id);
	$row=$ci->db->get()->row();
	return $row->name;
}

function get_modules_count($mentorship_id) {
	$ci = &get_instance();
	$ci->db->select('count(id) as mocount');
	$ci->db->where('mentorship_id',$mentorship_id);
	$ci->db->from('tbl_mentor_module');
	$row=$ci->db->get()->row();
	return $row->mocount;
	
}

function get_category_module($mymember_category_id,$mentor_id){
	$ci = &get_instance();
	$ci->db->select('tbl_mentors.*,tbl_mymentorship.title,tbl_mymentorship.slug,tbl_mymentorship.price,tbl_mymentorship.image as mymeberimage,tbl_mymentorship.category_id as mymember_category_id,tbl_mymentorship.id as mymeberid');
    $ci->db->from('tbl_mymentorship');
    $ci->db->join('tbl_mentors','tbl_mentors.mentor_id=tbl_mymentorship.mentor_id');
    $ci->db->where('tbl_mymentorship.status', '1');
	$ci->db->where('tbl_mymentorship.category_id',$mymember_category_id);
	$ci->db->where('tbl_mymentorship.mentor_id !=',$mentor_id);
    $query = $ci->db->get();
    return $query->result();
}


function get_modules_profile($mentorship_id) {
	$ci = &get_instance();
	$ci->db->select('tbl_module.*');
	$ci->db->join('tbl_module','tbl_module.id=tbl_mentor_module.module_id');
	$ci->db->where('tbl_mentor_module.mentorship_id',$mentorship_id);
	$ci->db->from('tbl_mentor_module');
	return $ci->db->get()->result();
	
}

function get_mymentorshipIdBySlug($slug) {
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->where('slug',$slug);
	$ci->db->from('tbl_mymentorship');
	return $ci->db->get()->row();
	
}

function get_mentorList_home(){
	$ci = &get_instance();
	$ci->db->select('tbl_mentors.*,tbl_mymentorship.title,tbl_mymentorship.slug,tbl_mymentorship.price,tbl_mymentorship.image as mymeberimage,tbl_mymentorship.category_id as mymember_category_id,tbl_mymentorship.id as mymeberid');
    $ci->db->from('tbl_mentors');
    $ci->db->join('tbl_mymentorship','tbl_mymentorship.mentor_id=tbl_mentors.mentor_id');
    //$ci->db->join('tbl_mentor_module','tbl_mentor_module.mentor_id=tbl_mentors.mentor_id');
    //$ci->db->join('tbl_module','tbl_module.id=tbl_mentor_module.module_id');
    $ci->db->where('tbl_mentors.status', '1');
    $ci->db->limit('8');
    $ci->db->order_by('tbl_mymentorship.id','DESC');
    $query = $ci->db->get();
    return $query->result();
}

//-----------------------------------------------------------------------
/*
 * Get module name (Used)
 */
if (!function_exists('get_module_name')) {

    function get_module_name() {
        $ci = & get_instance();
        return $ci->router->fetch_module();
    }

}
//-----------------------------------------------------------------------
/*
 * Get class method (Used)
 */
if (!function_exists('get_method')) {

    function get_method() {
        $ci = & get_instance();
        return $ci->router->fetch_method();
    }

}

//--------------------------------------------------------------------------------------
/*
 * Check user login (Not Used)
 */
if (!function_exists('is_login')) {

    function is_login() {
        $ci = & get_instance();
        $ci->load->library('auth/ion_auth');
        if (!$ci->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

}
//--------------------------------------------------------------------------------------
/*
 * Check user login (Not Used)
 */
if (!function_exists('is_admin')) {

    function is_admin() {
        $ci = & get_instance();
        $ci->load->library('auth/ion_auth');
        if (!$ci->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        }
    }

}
//--------------------------------------------------------------------------------------
/*
 * Get all the default user defined properties (Used)
 */
if (!function_exists('get_properties')) {

    function get_properties() {
        $ci = & get_instance();
        $properties = _properties()->properties;
        return $properties;
    }

}

	// get_groups  show 
  function get_groups(){
	$ci = &get_instance();
	return $ci->db->get('groups')->result();
} 
// get_product  show 
 function get_product_by($id){
	$ci = &get_instance();
	$ci->db->select('*');
	$ci->db->from('tbl_product');
	$ci->db->where('product_id',$id);
	return $ci->db->get()->row();
  }
// get_Products  show 
  function get_products(){
	$ci = &get_instance();
	$ci->db->from('tbl_product');
	$result=$ci->db->get()->result();
	return $result;
} 


// get group name show on backed 
function get_group_name($id){
	$ci = &get_instance();
	$ci->db->where('id',$id);
	return $ci->db->get('groups')->row();
}
  function get_menu()
    {
    	$ci = &get_instance();
    	$group_id = $ci->session->userdata('group_id');
    	$list_menu = $ci->db->from('privileges as p')
							  ->join('menus as m', 'm.id = p.menu_id', 'left')
							  ->where('p.group_id',$group_id)
							  ->order_by('m.id', 'ASC')
							  ->select('*')
							  ->get()
							  ->result();

		$active_menu = active_menu($list_menu);

		return [ 
			'menu' => $list_menu, 
			'active_menu' => $active_menu
		];
    }

    /**
     * Get Active Menu
     *
     * @access 	public
     * @param 	
     * @return 	active menu
     */

    function active_menu($list_menu)
	{
		$ci = &get_instance();
		$active_menu = 0;
		foreach ($list_menu as $menu) {
			if ($ci->uri->segment(1) == $menu->link || $ci->uri->segment(1) . '/' . $ci->uri->segment(2) == $menu->link) {
				if ($menu->parent_id != 0 && $menu->is_have_child == 0) {
					$active_menu = $menu->parent_id;
				} else if ($menu->parent_id == 0 && $menu->is_have_child == 0) {
					$active_menu = $menu->id;
				}
			}
		}
		return $active_menu;
	}

 

 /**** 

 get munu checked 


 ****/


  function visiteIp(){
 $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
	return $ipaddress;
    //echo '<pre>';print_r($ipaddress);echo'</br>';
    //echo '<pre>';print_r($this->input->ip_address());echo'</br>';
  }
 


	function getcheck($menu_id,$group_id){

		$ci = &get_instance();
		$ci->db->select('*');
    	$ci->db->from('privileges');
		$ci->db->where('menu_id',$menu_id);
		$ci->db->where('group_id',$group_id);
		$result=$ci->db->get()->row();
			if(empty($result)){
				return '';
			}else{
				return 'checked';
			}				  
	}

if (!function_exists('lang')) {

    function lang($string) {
        $skyless->ci = & get_instance();
        $lang = $skyless->ci->lang->line($string);
        return $lang;
    }

}

/*
 * Project define functions
 */
if(!function_exists('check_user_logged')) {
    function check_user_logged(){
        $aroma = &get_instance();
        if($aroma->session->userdata('logged_admin')) {
            redirect('admin');
        }
    }
}
if(!function_exists('check_logged_user')) {
    function check_logged_user() {
        $aroma = & get_instance();
       if(!$aroma->session->userdata('logged_admin')){
         redirect('login');
       }
    }
}
if (!function_exists('script_tag')) {

    function script_tag ($src = '', $language = 'javascript', $type = 'text/javascript', $index_page = FALSE) {
        $CI = & get_instance();

        $script = '<script ';

        if (is_array($src)) {
            foreach ($src as $k => $v) {
                if ($k === 'src' AND strpos($v, '://') === FALSE) {
                    if ($index_page === TRUE) {
                        $script .= 'src="' . $CI->config->site_url($v) . '" ';
                    } else {
                        $script .= 'src="' . $CI->config->slash_item('base_url') . $v . '" ';
                    }
                } else {
                    $script .= "$k=\"$v\" ";
                }
            }

            $script .= "></script>";
        } else {
            if (strpos($src, '://') !== FALSE) {
                $script .= 'src="' . $src . '" ';
            } elseif ($index_page === TRUE) {
                $script .= 'src="' . $CI->config->site_url($src) . '" ';
            } else {
                $script .= 'src="' . $CI->config->slash_item('base_url') . $src . '" ';
            }

            $script .= 'language="' . $language . '" type="' . $type . '" ';

            $script .= '></script>';
        }


        return $script;
    }

}