  <?php $this->load->view('backend/header'); ?>
<div class="auth-wrapper"style= >
    <form id="form-signin" action="<?php echo base_url('login/auth/process'); ?>" method="post">
        <div class="auth-header">
            <div class="auth-title"><?php echo SITE_NAME;?></div>
            <div class="auth-subtitle">Admin Your Dashboard </div>
            <div class="auth-label"><?php echo ('Admin Login');?></div>
        </div>
        <div class="auth-body">
           <?php if($this->session->flashdata('message')) { ?>
      <div class="alert alert-danger">
        <?php echo $this->session->flashdata('message');?>
        <i class="fa fa-times pull-right" data-dismiss="alert"></i>
      </div>
    <?php } ?>
            <div class="auth-content">
                <div class="form-group">
                    <label for=""><?php echo lang('user_name');?></label>
                    <input class="form-control" placeholder="<?php echo lang('user_name');?>" name="username" type="text" value="">
                     <div class="validation-message" data-field="username"> <?php echo form_error('username'); ?></div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" placeholder="<?php echo lang('password');?>" name="password" type="password" value="">
                    <div class="validation-message" data-field="password"> <?php echo form_error('password'); ?></div>
                </div>
            </div>
            <div class="auth-footer">
                <button class="btn btn-primary" id="sign-in" type="submit"><?php echo lang('login');?></button>
                <div class="pull-right auth-link">
                    <!--<label class="check-label"><input type="checkbox" name="keep_login" value="true"><?php echo lang('remember_me');?></label>-->
                    <div class="devider"></div>
                    <a href="<?php echo base_url('forget-password'); ?>"><?php echo lang('login_forgot_password');?></a>
                </div>
            </div>
        </div>
    </form>
	<!-- <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?php echo date('Y') ?> @<?php echo SITE_NAME;?> All Rights Reserved. VERSION: <?php echo CI_VERSION;?>
                    </div>
      </div>-->
	
</div>

<?php $this->load->view('backend/footer'); ?>