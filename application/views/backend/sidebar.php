<div class="wrapper">
  <aside class="side-nav">
    <div class="logo-wrapper">
      <a href="<?php echo base_url('admin'); ?>">
	    <?php $header=get_header();  ?>
      <img src="<?php echo base_url() . 'assets/admin/images/logo.png'; ?>" style="width: 50%!important;">
        <div class="logo-title"><?php echo $header->site_name; ?></div>
        <div class="logo-subtitle"></div>
      </a>
      <div class="mobile-nav pull-right">
        <i class="fa fa-bars"></i>
      </div>
    </div>
   <div class="user-side-profile">
      <div class="user-image">
        <div class="user-on"></div>
        <img src="<?php echo base_url() . 'assets/admin/images/logo.png'; ?>">
      </div>
      <div class="clear">
        <div class="user-name"><?php echo $this->session->userdata('first_name');?></div>
        <div class="user-group">Administrator</div>
        <ul class="user-side-menu">
         <!--  <li><a href="<?php echo base_url() . 'profile'; ?>">Profile <div class="badge badge-yellow pull-right">2</div></a></li>
          <li><a href="<?php echo base_url() . 'settings'; ?>">Settings</a></li> -->
          <li><a href="<?php echo base_url() . 'admin/change_password'; ?>">Change Password</a></li>
          <li><a href="<?php echo base_url() . 'logout'; ?>">Logout</a></li>
        </ul>
      </div>
    </div>

 <!-- Menu -->
    <div class="main-menu-title"></div>
   <div class="main-menu">
      <ul>
        <li>
          <a href="<?php echo base_url('admin'); ?>">
            <i class="fa fa-bars"></i> 
            <span><?php echo lang('dashboard');?></span>
          </a>
        </li>

<!-- Manage country -->
	<li class="<?php if(current_url()==base_url('country/admin')||current_url()==base_url('country/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-globe"></i> 
                      <span>Manage Country</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('country/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			<li><a href="<?php echo base_url('country/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
			</ul>
            </li>				
<!-- Manage City -->
	<li class="<?php if(current_url()==base_url('city/admin')||current_url()==base_url('city/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-home"></i> 
                      <span>Manage City</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('city/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			<li><a href="<?php echo base_url('city/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
			</ul>
            </li>

<!-- Manage University -->
	<li class="<?php if(current_url()==base_url('university/admin')||current_url()==base_url('university/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-university"></i> 
                      <span>Manage University</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('university/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			<li><a href="<?php echo base_url('university/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
			</ul>
            </li>		
<!-- Manage Course -->
	<!--<li class="<?php if(current_url()==base_url('course/admin')||current_url()==base_url('course/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-book"></i> 
                      <span>Manage Course</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>-->
 <!-- Print submenu -->
         <!--   <li><a href="<?php echo base_url('course/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			<li><a href="<?php echo base_url('course/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
			</ul>
            </li>		-->
		
<!-- Manage Category -->
<li class="<?php if(current_url()==base_url('category/admin') || current_url()==base_url('category/admin/create')) echo 'active';?>">
                        <a href="">
                          <i class="fa fa-cubes  nav_icon"></i> 
						  <span>Manage Category</span>
                          <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
<!-- Print submenu -->
               <li><a href="<?php echo base_url('category/admin'); ?>"><i class="fa fa-list  text-yellow"></i >List</a></li>
			  <li><a href="<?php echo base_url('category/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
						</ul>
                    </li>
					
<!-- Manage Category -->

<!-- Manage Module-->
  <li class="<?php if(current_url()==base_url('module/admin')||current_url()==base_url('module/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-maxcdn"></i> 
                      <span>Manage Modules</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('module/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
      <li><a href="<?php echo base_url('module/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
      </ul>
            </li> 



<!-- Manage Mentors -->
  <li class="<?php if(current_url()==base_url('mentors/admin/mymentorship')||current_url()==base_url('mentors/admin/mymentorship')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-maxcdn"></i> 
                      <span>Manage my mentorship</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('mentors/admin/mymentorship'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
      
      </ul>
            </li>




	<li class="<?php if(current_url()==base_url('banner/admin')||current_url()==base_url('banner/admin/create')) echo 'active';?>">
                        <a href="">
                          <i class="fa fa-bold"></i> 
                          <span>Manage Banner</span>
                         <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
   <!-- Print submenu -->
         <li><a href="<?php echo base_url('banner/admin'); ?>"><i class="fa fa-list text-yellow"></i >List</a></li>
        <li><a href="<?php echo base_url('banner/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
						
           </ul>
           </li>
				 
<!-- Manage Page -->
	<li class="<?php if(current_url()==base_url('pages/admin')||current_url()==base_url('pages/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-file-text-o"></i> 
                      <span>Manage Pages</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('pages/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			<li><a href="<?php echo base_url('pages/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
			</ul>
            </li>
			

			
<!-- Users -->
	<li class="<?php if(current_url()==base_url('user/admin')||current_url()==base_url('user/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-user"></i> 
                      <span> Manage Users</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('user/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			</ul>
            </li>			
<!-- Manage Mentors -->
	<li class="<?php if(current_url()==base_url('mentors/admin')||current_url()==base_url('mentors/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-maxcdn"></i> 
                      <span>Manage Mentors</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('mentors/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			
			</ul>
            </li>
			<!-- Add Book -->
	<li class="<?php if(current_url()==base_url('addbook/admin')||current_url()==base_url('addbook/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-book"></i> 
                      <span>Manage Book</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('addbook/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			</ul>
            </li>	
		
<!-- Manage Blog -->
	<li class="<?php if(current_url()==base_url('blog/admin')||current_url()==base_url('blog/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-bold"></i> 
                      <span>Manage Blogs</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('blog/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			<li><a href="<?php echo base_url('blog/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
			</ul>
            </li>

<!-- Newsletter -->
	<li class="<?php if(current_url()==base_url('newsletter/admin')||current_url()==base_url('newsletter/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-newspaper-o"></i> 
                      <span>Newsletter</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('newsletter/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			</ul>
            </li>

<!-- Contact-us -->
	<li class="<?php if(current_url()==base_url('contact/admin')||current_url()==base_url('contact/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-envelope"></i> 
                      <span>Contact Us</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('contact/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			</ul>
            </li>
				
<!-- Manage Social-->
	<li class="<?php if(current_url()==base_url('social/admin')||current_url()==base_url('social/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-scribd"></i> 
                      <span>Manage Social</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('social/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			<li><a href="<?php echo base_url('social/admin/create'); ?>"><i class="fa fa-plus-circle text-yellow"></i >Create</a></li>
			</ul>
            </li>	
<!-- Manage Setting-->
	<li class="<?php if(current_url()==base_url('setting/admin')||current_url()==base_url('setting/admin/create')) echo 'active';?>">
                    <a href="">
                    <i class="fa fa-scribd"></i> 
                      <span>Manage Setting</span>
                     <div class="badge badge-red pull-right"></div>
                        </a>
                      <ul>
 <!-- Print submenu -->
            <li><a href="<?php echo base_url('setting/admin'); ?>"><i class="fa fa-list-alt  text-yellow"></i >List</a></li>
			</ul>
            </li>			
<!-- Logout -->	
		
	<li>
	<a href="<?php echo base_url('logout'); ?>">
	<i class="fa fa-sign-out "></i> 
   <span>Logout</span></a>
   </li>
   </ul>
   </div>
</aside>
