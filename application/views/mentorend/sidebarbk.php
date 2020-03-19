<div class="wrapper">
  <aside class="side-nav">
    <div class="logo-wrapper">
      <a href="<?php echo base_url('mentor-dashboard'); ?>">
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
        <div class="user-name"><?php $mentor_detail=get_mentor_detail(); echo $mentor_detail->fullname;?></div>
        <div class="user-group"></div>
        <ul class="user-side-menu">
         <!--  <li><a href="<?php echo base_url() . 'profile'; ?>">Profile <div class="badge badge-yellow pull-right">2</div></a></li>
          <li><a href="<?php echo base_url() . 'settings'; ?>">Settings</a></li> -->
          <li><a href="<?php echo base_url() . 'mentor-dashboard/change-password'; ?>">Change Password</a></li>
          <li><a href="<?php echo base_url() . 'mentor-logout'; ?>">Logout</a></li>
        </ul>
      </div>
    </div>

 <!-- Menu -->
    <div class="main-menu-title"></div>
   <div class="main-menu">
      <ul>
        <li>
          <a href="<?php echo base_url('mentor-dashboard'); ?>">
            <i class="fa fa-bars"></i> 
            <span><?php echo lang('dashboard');?></span>
          </a>
        </li>


         <li>
          <a href="<?php echo base_url('mentor-dashboard/mymentorship'); ?>">
            <i class="fa fa-user"></i> 
            <span>My Mentorship</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url('mentor-dashboard/change-profile'); ?>">
            <i class="fa fa-user"></i> 
            <span>Change Profile</span>
          </a>
        </li>

		 <li>
          <a href="<?php echo base_url('mentor-dashboard/change-password'); ?>">
            <i class="fa fa-key"></i> 
            <span>Change Password</span>
          </a>
        </li>
        
<!-- Logout -->	
		
	<li>
	<a href="<?php echo base_url('mentor-logout'); ?>">
	<i class="fa fa-sign-out "></i> 
   <span>Logout</span></a>
   </li>
   </ul>
   </div>
</aside>
