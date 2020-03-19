<div class="breadcrumb">Home 
  <span class="breadcrumb-devider">/</span>   <?php echo 'Mentor Dashboard';?> 
  <span class="breadcrumb-devider">/</span> <?php echo 'Change Profile';?>

</div>
<div class="content">
 <?php //echo'<pre>';print_r($mentor);die; ?>
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title"><?php echo 'Change Profile';?></div>
      <a href="<?php echo base_url('mentor-dashboard');?>" class="btn btn-primary pull-right">
      <i class="fa fa-hand-o-left"></i> <?php echo lang(' Back');?></a>
    </div>

<!-- Main content -->
   <div class="row">
      <div class="col-md-12">
        <div class="content-box">
  
        <?php if($this->session->flashdata('message')!='') { ?>
                <div class="alert alert-success">
	<strong>Well done!</strong> <?php echo $this->session->flashdata('message');?>
                        <i class="fa fa-times pull-right alert-dismiss" data-dismiss="alert"></i>
                </div>
        <?php } ?>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                         <?php echo form_open_multipart('mentor-dashboard/change-profile', array("class" => 'form')) ?>
                                <div class="form-group">
                                    <label> First Name
                                      <abbr class="required"><i class="fa fa-asterisk"></i></abbr>
                                    </label>
                                    <input type="text" class="form-control span12" name="first_name" value="<?php echo $mentor->first_name;?>" placeholder="First Name" />
                                    <?php echo form_error('first_name');?>
                                </div>
                                <div class="form-group">
                                    <label> Last Name
                                      <abbr class="required"><i class="fa fa-asterisk"></i></abbr>
                                    </label>
                                    <input type="text" class="form-control span12" name="last_name" value="<?php echo $mentor->last_name;?>" placeholder="Last Name" />
                                    <?php echo form_error('last_name');?>
                                </div>
								<div class="form-group">
                                    <label>Email
                                      <abbr class="required"><i class="fa fa-asterisk"></i></abbr>
                                    </label>
                                    <input type="text" class="form-control span12" name="email" value="<?php echo $mentor->email;?>" placeholder="email" readonly/>
                                    <?php echo form_error('email');?>
                                </div>
                                <div class="form-group">
                                    <label> Contact No.
                                      <abbr class="required"><i class="fa fa-asterisk"></i></abbr>
                                    </label>
                                    <input type="text" class="form-control span12" name="phone_no" value="<?php echo $mentor->phone_no;?>" placeholder="Contact Number" />
                                    <?php echo form_error('phone_no');?>
                                </div>
                                <div class="form-group">
                                    <label>Bio
                                      <abbr class="required"><i class="fa fa-asterisk"></i></abbr>
                                    </label>
                                    <textarea class="form-control span12" name="bio" placeholder="Bio"/><?php echo $mentor->bio;?></textarea>
                                    <?php echo form_error('bio');?>
                                </div>
                                <div class="form-group">
                                    <label>Description
                                      <abbr class="required"><i class="fa fa-asterisk"></i></abbr>
                                    </label>
                                    <textarea class="form-control span12" name="description" placeholder="Description"/><?php echo $mentor->description;?></textarea>
                                    <?php echo form_error('description');?>
                                </div>
                                <div class="form-group">
                                    <label>Image
                                      <abbr class="required"><i class="fa fa-asterisk"></i></abbr>
                                    </label>
                                    <input type="file" class="form-control span12" name="fileToUpload" />
                                    <?php //echo form_error('phone_no');?>
                                </div>
								<!--<div class="form-group"><img alt="<?php //echo $mentor->image;?>" src="<?php// if($mentor->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}//{echo base_url('assets/upload/mentor_profile_image/'.$mentor->image);} ?>" height="100" width="100" /></div>-->
                        <button name="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i><?php echo lang('update');?></button>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.error{color:red}
.required{color: red;font-size: 9px;
}
</style>