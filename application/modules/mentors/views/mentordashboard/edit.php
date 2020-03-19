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
//print'<pre>';print_r($tbl_login);die;?>
<?php echo form_open('admin/edit/'.$tbl_login->user_id) ?>
<div class="form-group">
		<label for=""> Group</label><span style="color:red">*</span>
		<select name="group_id" class="form-control">
			<option value="">--select group--</option>
			<?php foreach ($groups as $group) { ?>
				<option value="<?php echo $group->id; ?>"<?php if($group->id==$tbl_login->group_id) echo'selected';?>><?php echo $group->group_name; ?></option>
			<?php } ?>
		</select>
		
	</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'firstname',
			'id' 		=> 'firstname',
			'class' => 'form-control',
			'value' => $tbl_login->firstname,
		);
	?>
    <label for="firstname">Firstname</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'lastname',
			'id' 		=> 'lastname',
			'class' => 'form-control',
			'value' => $tbl_login->lastname,
		);
	?>
    <label for="lastname">Lastname</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'password',
			'id' 		=> 'password',
			'class' => 'form-control',
			
		);
	?>
    <label for="password">Password</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'email',
			'id' 		=> 'email',
			'class' => 'form-control',
			'value' => $tbl_login->email,
		);
	?>
    <label for="email">Email</label>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
	 </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                            
                            

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->