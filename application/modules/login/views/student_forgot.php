   <?php $this->load->view('backend/header'); ?>
<div class="auth-wrapper">
    <form id="form-signin" action="<?php echo base_url('forget-password'); ?>" method="post">
        <div class="auth-header">
            <div class="auth-title"><?php echo SITE_NAME;?></div>
         
            <div class="auth-label">Admin Forgot Password</div>
        </div>
        <div class="auth-body">
         <?php if($this->session->flashdata('error_message')) { ?>
      <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error_message');?>
        <i class="fa fa-times pull-right" data-dismiss="alert"></i>
      </div>
    <?php } ?> 
    <?php if($this->session->flashdata('success_message')) { ?>
      <div class="alert alert-info">
        <?php echo $this->session->flashdata('success_message');?>
        <i class="fa fa-times pull-right" data-dismiss="alert"></i>
      </div>
    <?php } ?>
            <div class="auth-content">
                <div class="form-group">
                    <label for=""><?php echo ('Enter Email');?></label>
                    <input class="form-control" placeholder="<?php echo ('Enter Email');?>" name="email" type="text" value="">
                     <div class="validation-message" data-field="email"> <?php echo form_error('email'); ?></div>
                </div>
            </div>
            <div class="auth-footer">
                <button class="btn btn-primary" id="sign-in" type="submit"><?php echo ('Send');?></button>
                <a class="btn btn-primary" id="sign-up" href="<?php echo base_url('login') ;?>">Login</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#login').validate({
		             rules: {
							mobile:{
					          required:true,
                              number:true,
							  remote: '<?php echo  base_url('login/auth/check_mobile') ;  ?>',
							  maxlength: 10,
							  minlength: 10,
							  
						    },
					 },
						messages: {
							
							mobile:{
								required: "<span  class='text-danger' style='font-family:cursive; font-size:12px; color:red;'>Mobile Number is Compulsory.</span>",
								number: "<span style='font-family:cursive; font-size:12px; color:red;'>Please enter only 0 to 9.</span>",
								maxlength:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter only 10 degite number.</span>",
								minlength:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter only 10 degite number.</span>",
								remote: "<span style='font-family:cursive; font-size:12px; color:red;'>Sorry, This Mobile Number Not Register. </span>"
				            },
							
				         },
						submitHandler: function(form) {
						form.submit();
						}
			     
         });
	});
</script>
<?php $this->load->view('backend/footer'); ?>