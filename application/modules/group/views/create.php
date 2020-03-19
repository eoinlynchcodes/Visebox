<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Group<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Group</div>
      
               <a href="<?php echo base_url('group/admin');?>" class="btn btn-primary pull-right">
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
<?php echo form_open('group/admin/create','id="add_admin"') ?>

	<div class="form-group">
	<?php
		$input = array(
			'name' => 'group_name',
			'id' 		=> 'group_name',
			'class' => 'form-control',
		);
	?>
    <label for="group_name">Group name</label><span style="color:red">*</span>
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
