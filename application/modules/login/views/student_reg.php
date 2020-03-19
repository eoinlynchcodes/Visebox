
<div class="container">
			<div class="row">
				<div class="col-md-12 margin-top-60">
					<h2 span class="vise-1">Student Signup</h2>
					<div class="border-btm"></div>
				</div>
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
	<form  action="<?php echo base_url('student-register');?>" method="POST" id="student_register">
				<div class="col-md-6 col-md-offset-3">
					
					<div class="wizard">
					
				
            
                
                   <div>
                        <h4 class="signup-title">Your Details</h4>
                    </div>
                        <div class="form-group">
							<label for="name">Your Name :</label>
							<input type="text" class="form-control" id="name" placeholder="Enter Your Fast Name" name="fname">
						  </div>
						  <div class="form-group">
							<label for="last-name">Your Last Name :</label>
							<input type="text" class="form-control" id="last-name" placeholder="Enter Your Last Name" name="lname">
						  </div>
						  <div class="form-group">
							<label for="phone">Your Phone Number :</label>
							<input type="tel" class="form-control" id="phone" placeholder="Enter Your Phone Number" name="phone">
						  </div>
                       
                  <div>
                        <h4 class="signup-title">Your Account</h4>
                    </div>
                        <div class="form-group">
							<label for="email">Your Email :</label>
							<input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email">
						  </div>
						  <div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password">
						  </div>
						  <div class="form-group">
							<label for="conpassword">Confirm Your Password:</label>
							<input type="password" class="form-control" id="conpassword" placeholder="Confirm Your Password" name="conpassword">
						  </div>
						  <div class="form-group">
							<label for="country_id">Country</label>
							<select class="form-control" id="country_id" name="country" >
								<?php $countrys=get_country_by();?>
									<option value="">Select country</option>
								<?php foreach ($countrys as $country) : ?>
								
									<option value="<?php echo $country->id;?>"><?php echo $country->country_name;?></option>

								<?php endforeach;?>
								</select>
								
						  </div>
						  <div>
						   <ul class="list-inline pull-right">
                       
                            <li><button  type="submit" class="btn btn-primary btn-info-full next-step">Submit</button></li>
                        </ul>
                    </div>
                 
                    
                   
                
            
        </div>
        
				</div>
				</form>
			</div>
		</div>  
		<div class="alert alert-danger" id="snackbar"> 
			<span class="glyphicon glyphicon-info-sign"></span> 
			&nbsp; Sorry, This email Already Register. !
		</div>
		
<style type="text/css">
.error{
	color: #a94442;
}

#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #009bcc;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 345px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
</style>
