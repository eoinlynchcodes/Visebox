 
<div class="container">
			<div class="row">
				<div class="col-md-12 margin-top-60">
					<h2 span class="vise-1">Mentor Signup</h2>
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
					<div class="wizard">
						
           <form action="<?php echo base_url('mentor-register');?>" method="POST" id="mentor_register" >
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="form-group">
							<label for="name">Your First Name</label>
							<input type="text" class="form-control" id="name" placeholder="Enter Your First Name" name="fname">
						  </div>
						  <div class="form-group">
							<label for="last-name">Your Last Name</label>
							<input type="text" class="form-control" id="last-name" placeholder="Enter Your Last Name" name="lname">
						  </div>
						  <div class="form-group">
							<label for="email">Your Email</label>
							<input type="text" class="form-control" id="email" placeholder="Enter Your Email" name="email">
						  </div>
						  <div class="form-group">
							<label for="phone">Your Phone Number</label>
							<input type="tel" class="form-control" id="phone" placeholder="Enter Your Phone Number" name="phone">
						  </div>
						  <div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password">
						  </div>
						  <div class="form-group">
							<label for="conpassword">Confirm Your Password</label>
							<input type="password" class="form-control" id="conpassword" placeholder="Confirm Your Password" name="conpassword">
						  </div>
                    </div>
                  <!--   <div class="form-group">
							<label for="category_id">Category</label>
							<select class="form-control" id="category_id" name="category_id">
								<option  value="">Select Category</option>
								<?php  $categorys= get_cat();	
								//print_r($courses);die;
								 foreach($categorys as $category){ ?>
								<option  value="<?php echo $category->category_id; ?>"><?php echo $category->name; ?></option>
									 <?php }?>
								</select>
						  </div>
						   <div class="form-group ">
							<label for="course">Module</label></br>
							<select class="form-control SlectBox1" id="module_id" multiple="multiple" required name="module_id[]">
								<option  value=""  disabled>Select Module</option>
								</select>
						  </div> -->
                       <div class="form-group">
							<label for="country_id">Country</label>
							<select class="form-control" id="country_id" name="country">
								<?php $countrys=get_country_by();?>
									<option value="">Select country</option>
								<?php foreach ($countrys as $country) : ?>
								
									<option value="<?php echo $country->id;?>"><?php echo $country->country_name;?></option>

								<?php endforeach;?>
								</select>
						  </div>
						 <div class="form-group">
							<label for="city_id">City</label>
							<select class="form-control" id="city_id" name="city">
								<option value="">Select city</option>
								
								</select>
						  </div>
						  <div class="form-group">
							<label for="university_id">University</label>
							<select class="form-control" id="university_id" name="university">
								<option value="">Select university</option>
								</select>
						  </div>
						 
                    <div class="form-group">
							<label for="ref">Your bio</label>
							<textarea  class="form-control" id="bio" name="bio" placeholder="Your bio"></textarea>
						  </div>
						  <div class="form-group">
							<label for="about_us">How you found us</label>
							<textarea  class="form-control" id="about_us" placeholder="How did you find out about us?" name="about_us"></textarea>
						  </div>
						  <div>
                   
                       <button class="btn btn-primary btn-log" type="submit">Submit</button>
		              <div class="bottom-link">
		              <span class="reg"><a href="<?php echo base_url('mentor-login');?>">Mentor Login</a></span>
		              <span class="change-pwd"><a href="#">Reset your password?</a></span>
		              </div>
		                    
                    <div class="clearfix"></div>
                </div>
                </div>
            </form>
        </div>
				</div>
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

.SumoSelect > .CaptionCont{
	width: 552px;
height: 43px;
}
</style>

<script type="text/javascript">
 

$("#country_id").change(function(){  
        //alert('fff');
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo base_url();?>home/GetAllCity",  
                        data: {country_id:  
                           $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#city_id").html(data);  
                     }  
                  });  
               });  
             

 $(document).ready(function() {  
    $("#city_id").change(function(){ 
                     var country_id = $("#country_id").val();  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo  
                        base_url();?>home/GetAllUniversity",  
                        data: {city_id:  
                           $(this).val(),country_id:country_id},  
                        type: "POST",  
                        success:function(data){  
                        $("#university_id").html(data);  
                     }  
                  });  
               });  
            }); 
             
    
    /* $(document).ready(function() {  
    $("#category_id").change(function(){ 
                     
                     $.ajax({  
                        url:"<?php echo  base_url();?>home/GetAllModule",  
                        data: {category_id:  
                           $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#module_id").html(data);  
                     }  
                  });  
               }); 
               }); */



    </script>


