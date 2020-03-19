
<div class="breadcrumb">Home 
  <span class="breadcrumb-devider">/</span>   <?php echo 'Mentor Dashboard';?> 
  <span class="breadcrumb-devider">/</span> <?php echo lang('change_password_heading');?>

</div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title"><?php echo lang('change_password_heading');?></div>
      
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
                         <?php echo form_open('mentor-dashboard/change-password', array("class" => 'form'))?>
                                <div class="form-group">
                                    <label> <?php echo lang('change_password_old_password_label');?><abbr class="required"><i class="fa fa-asterisk"></i></abbr></label>
                                    <input type="password" class="form-control span12" name="old_password" placeholder="Old password" />
                                    <?php echo form_error('old_password');?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo lang('change_password_new_password_label');?><abbr class="required"><i class="fa fa-asterisk"></i></abbr></label>
                                    <input type="password" class="form-control span12" name="new_password" placeholder="<?php echo lang('change_password_new_password_label');?>"/>
                                    <?php echo form_error('new_password');?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo lang('change_password_new_password_confirm_label');?><abbr class="required"><i class="fa fa-asterisk"></i></abbr></label>
                                    <input type="password" class="form-control span12" name="confirm_password" placeholder="<?php echo lang('change_password_new_password_confirm_label');?>" />
                                    <?php echo form_error('confirm_password');?>
                                </div>
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