<?php
	function get_admin_name($user_id = -1){
 $ci = & get_instance();
 $sql = "SELECT firstname FROM tbl_login WHERE user_id = ".$user_id;
 $query = $ci->db->query($sql);
 $result = $query->row();
 if(empty($result)){
  return '';
 }
 return $result->firstname;
}
function get_user_profile($user_id  = -1){
	$ci = & get_instance();
	$sql = "SELECT image FROM tbl_user WHERE user_id = ".$user_id;
	$query = $ci->db->query($sql);
	$result = $query->row();
	if($result->image==NULL){
		return base_url('assets/admin/images/profile_pic.png');
	}
	return $result->image;
}
function get_user_name($user_id  = -1){
	$ci = & get_instance();
	$sql = "SELECT name FROM tbl_user WHERE user_id = ".$user_id;
	$query = $ci->db->query($sql);
	$result = $query->row();
	if(empty($result)){
		return '';
	}
	return $result->name;
}