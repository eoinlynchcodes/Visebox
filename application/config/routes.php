<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|ss
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';

//$route['user'] = 'users';

$route['404_override'] = 'page/show_404';
$route['translate_uri_dashes'] = FALSE;
  
// home page link roots 
$route['our-clients'] = 'home/client';
$route['sitemap'] = 'home/sitemap';
$route['contact-us'] = 'home/contact';
$route['colors'] = 'home/color';
$route['module/(:any)'] = 'home/module/$1';
$route['search'] = 'home/search';
$route['e-services'] = 'home/book_list';
$route['booking/module/(:any)'] = 'home/booking_module/$1';
$route['blogs'] = 'home/blog';
$route['blogs/(:any)'] = 'home/blog_detail/$1';

// student  page link roots 
$route['student-login'] = 'login/auth/student';
$route['student-register'] = 'login/auth/register';
$route['student-register-msg'] = 'login/auth/register_msg';
$route['student-logout'] = 'login/auth/student_logout';
$route['student-dashboard'] = 'user/student';
$route['student/add-book'] = 'user/student/add_book';
$route['student/book-list'] = 'user/student/book_list';

// Mentor  page link roots 
$route['mentor-login'] = 'login/auth/mentor';
$route['mentor-register'] = 'login/auth/mentor_register';
$route['mentor-register-msg'] = 'login/auth/mentor_register_msg';
$route['mentor-logout'] = 'login/auth/mentor_logout';
$route['mentor-dashboard'] = 'mentors/index';
$route['mentor-dashboard/change-password'] = 'mentors/change_password';
$route['mentor-dashboard/change-profile'] = 'mentors/change_profile';
$route['mentor-dashboard/mymentorship'] = 'mentors/mymentorship';
$route['mentor-dashboard/mymentorship-add'] = 'mentors/mymentorship_add';
$route['mentor-dashboard/mymentorship-view/(:any)'] = 'mentors/mymentorship_view/$1';
$route['mentor-dashboard/mymentorship-edit/(:any)'] = 'mentors/mymentorship_edit/$1';
$route['mentor-dashboard/mymentorship-remove/(:any)'] = 'mentors/mymentorship_remove/$1';


$route['product/(:any)'] = 'home/product/$1';

$route['trust-export'] = 'home/exports';
$route['trust-export/(:any)'] = 'home/exports/$1';

$route['our-product/(:any)'] = 'home/our_products/$1';
$route['our-product'] = 'home/our_products';

$route['paint-your-space'] = 'home/paint_your_space';


$route['login'] = 'login/auth';
$route['logout'] = 'login/auth/logout';

$route['admin'] = 'admin/index';

$route['forget-password'] = 'login/auth/forget_password';

$route['users'] = 'users/index';
$route['search'] = 'home/search/$1';
$route['(:any)'] = 'pages/view/$1';



//$route['(:any)'] = 'home/content/$1';

