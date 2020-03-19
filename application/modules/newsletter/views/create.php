<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Country<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> <?php// echo 'User Add';?></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Country</div>
       <a href="<?php echo base_url('country/admin');?>" class="btn btn-primary pull-right">
      <i class="fa fa-hand-o-left"></i> <?php echo lang(' Back');?></a>
</div>
<!-- Main content -->
   <div class="row">
   <div class="col-md-12">
   <div class="content-box">
<?php 
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info"><?php echo $message ?></div>
		<?php
	}
?>
<?php 
	$validation_error = validation_errors(); 
	if(!empty($validation_error)){
		?>
		<div class="alert alert-danger"><?php echo $validation_error ?></div>
		<?php
	}
?>

<?php echo form_open_multipart('country/admin/create','id="addcountry"') ?><div class="form-group">

	
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'country_name',
			'id' 		=> 'country_name',
			'class' => 'form-control',
		);
	?>
    <label for="page_title">Country Name</label>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#addcountry').validate({
			rules:{
				
				country_name:{
					required:true
					
				},
				
				
			},
			messages:{
				
				country_name:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Country Name </span>"
				},
					
				
				
		}
		});
	});
</script>
 
