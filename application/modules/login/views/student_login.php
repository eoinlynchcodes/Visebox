<div class="container">
      <div class="row">
        <div class="col-md-12 margin-top-60">
        
          <h2 span class="vise-1">Student Login</h2>
          <div class="border-btm"></div>
        </div>
        
        <div class="col-md-6 col-md-offset-3">
          <div class="col-xs-12 col-lg-12 col-lg-12">
                      <div class="form-group label-floating inpt_50">
                      <?php
                                                    $error = $this->session->flashdata('error');
                                                    $message = $this->session->flashdata('message');
                                                    if(!empty($error)){
                                                        echo '<div class="alert alert-danger alert-dismissible fade show">'.$error.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
                                                    }
                                                    if(!empty($message)){
                                                        echo '<div class="alert alert-info alert-dismissible fade show">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
                                                    }
                                                    
                                                ?>
                      </div>

                    </div>
          <div class="login-form">
            <form action="<?php echo base_url('student-login');?>" method="POST" id="student_login" >
              <div class="form-group">
              <label for="email">Your Email :</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email">
              </div>
              <div class="form-group">
              <label for="pwd">Your Password:</label>
              <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter Your Password">
              </div>
              <!-- <div class="checkbox">
              <label><input type="checkbox"> Remember me</label>
              </div> -->
              <button class="btn btn-primary btn-log" type="submit">login</button>
              <div class="bottom-link">
              <span class="reg"><a href="<?php echo base_url('student-register');?>">Register as a student</a></span>
              <span class="change-pwd"><a href="#">Reset your password?</a></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>    
<style type="text/css">
.error{
  color: #a94442;
}
</style>