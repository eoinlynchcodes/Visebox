

    <!-- Demo page code -->

   
<!Doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo site_name();?> | <?php echo lang('forgot_password_heading');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
	 <?php 
	echo link_admin_css(
		array(
			'AdminLTE.min.css',
			'bootstrap/css/bootstrap.min.css'
		)
	);?>
   
  </head>
  <link rel="icon" type="image/ico" href="<?php echo base_url();?>assets/admin/img/favicon.ico">
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b><?php echo lang('forgot_password_heading');?></b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
	  <?php if($this->session->flashdata('message')) { ?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata('message');?>
				<i class="fa fa-times pull-right" data-dismiss="alert"></i>
			</div>
		<?php } ?>
        <p class="login-box-msg"> <?php echo lang('forgot_password_subheading');?> </p>
        <form action="<?php echo base_url('login/forget-password'); ?>" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder=" <?php echo lang('forgot_password_email_identity_label');?>" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<?php echo form_error('email'); ?>
          </div>
         
          <div class="row">
            <div class="col-xs-10">
            
            </div><!-- /.col -->
            <div class="col-xs-6" style="float: right;">
              <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('forgot_password_submit_btn');?></button>
            </div><!-- /.col -->
          </div>
        </form>

     
        <a href="<?php echo base_url('login');?>"><?php echo lang('Sign_in_to_your_account');?></a><br>
     </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <style type="text/css">
    .error{color: rgb(182, 18, 18);}
    </style>
  </body>
</html>

