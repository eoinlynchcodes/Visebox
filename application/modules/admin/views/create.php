<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Admin<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Admin</div>
      
               <a href="<?php echo base_url('admin');?>" class="btn btn-primary pull-right">
        <i class="fa fa-hand-o-left"></i> <?php echo lang(' Back');?></a>
            
    </div>
<!-- Main content -->
   <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php 
     error_reporting (0);
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Heads up!  </strong><?php echo $message ?>
    	</div>
		<?php
	}
?>
<?php 
	$validation_error = validation_errors(); 
	if(!empty($validation_error)){
		?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Oh snap!  </strong><?php echo $validation_error ?>
	    </div>
		<?php
	}
	$groups=get_groups();
//print'<pre>';print_r($groups);die;?>
<?php echo form_open('admin/create','id="add_admin"') ?>
<div class="form-group">
		<label for=""> Group</label><span style="color:red">*</span>
		<select name="group_id" class="form-control">
			<option value="" selected disabled>--select group--</option>
			<?php foreach ($groups as $group) { ?>
				<option value="<?php echo $group->id; ?>"><?php echo $group->group_name; ?></option>
			<?php } ?>
		</select>
		
	</div>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'firstname',
			'id' 		=> 'firstname',
			'class' => 'form-control',
		);
	?>
    <label for="firstname">Firstname</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'lastname',
			'id' 		=> 'lastname',
			'class' => 'form-control',
		);
	?>
    <label for="lastname">Lastname</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	    <label for="password">Password</label><span style="color:red">*</span>
	<input type="password" name ="password" id ="password" class ="form-control">

</div>

<div class="form-group">
    <label for="password">Confirm Password</label><span style="color:red"  >*</span>
	<input type="password" name ="passconf" id ="passconf" class ="form-control"><span id='message'></span>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'email',
			'id' 		=> 'email',
			'class' => 'form-control',
		);
	?>
    <label for="email">Email</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Create','class="btn btn-primary" ');?>
<?php echo form_close();?>
	</div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                            
                            

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
<script>
$('#passconf').on('keyup', function () {
    if ($('#password').val() == $('#passconf').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
});
</script>
<script>
	$(document).ready(function(){
		//var get_Base_Url = $('#get_base_url').val();
		$(function(){
		$('#add_admin').validate({
		errorElement: "label",
						rules: {
							firstname:{
					           required:true
				              },
							lastname:{
								required:true
							   },
						email: {
						   required:true,
						   email:true,
						    remote: '<?php echo base_url("admin/admin/chackmail"); ?>'
						     },
						password: {
						   required:true,
						    },
						passconf: {
						    required:true,
						    },
						},
						messages: {
							firstname:{
							required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter first name </span>"
							},
							lastname:{
							required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter last name</span>"
							},
						email:{
						required: "<span style='font-family:cursive; font-size:12px; color:red;'>Please enter email id. </span>",
						email :"<span style='font-family:cursive; font-size:12px; color:red;'>Type Only Valid Email.</span>",
						remote: "<span style='font-family:cursive; font-size:12px; color:red;'>Sorry, Email id already exists. </span>"
						},
						password:{
						required: "<span style='font-family:cursive; font-size:12px; color:red;'>Please enter password .</span>",
						},
						passconf:{
						required: "<span style='font-family:cursive; font-size:12px; color:red;'>Please enter confirm password .</span>",
						},
						
						
				},
				
				submitHandler: function(form) {
				form.submit();
				}
        });
    });
 });
</script>
