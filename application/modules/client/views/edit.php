<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Client<span class="breadcrumb-devider">/</span> Modify<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Client</div>
      
               <a href="<?php echo base_url('client/admin');?>" class="btn btn-primary pull-right">
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

<?php echo form_open_multipart('client/admin/edit/'.$tbl_client->id ,'id="addClient"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
			'value' => $tbl_client->name,
		);
	?>
    <label for="websiteName">Name</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
<!--
<div class="form-group">
	<?php
		$input = array(
			'name' => 'designation',
			'id' 		=> 'designation',
			'class' => 'form-control',
			'value' => $tbl_client->designation,
		);
		?>
	
    <label for="websiteName">Designation</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
	<div class="form-group">
	
	 <label for="content">Description</label>
     <?php echo form_textarea(array('name' =>'description','id'=>'description','class'=>"ckeditor",'value' => $tbl_client->description)); ?>
</div>

-->	


<div class="form-group">
	
	<label for="status" >Status</label>
	<select name="status" id = "status" class ="form-control">
		 <option value="1" <?php if ($tbl_client->status=='1') echo 'selected' ; ?>>Enable </option>
		  <option value="0" <?php if ($tbl_client->status=='0') echo 'selected' ; ?>>Disable</option>
    </select>
</div>

<div class="form-group">
 <label for="image">Image</label>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>	



<div class="form-group"><img alt="<?php echo $tbl_client->image;?>" src="<?php if($tbl_client->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/testimonial_image/'.$tbl_client->image);} ?>" height="100" width="100" /></div>
<div class="form-group">
<?php echo form_submit('submit', 'Update ','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#addClient').validate({
			rules:{
				name:{
					required:true,
				},
				designation:{
					required:true,
				},
				description:{
					required:true,
				},
			
				
			},
			messages:{
				name:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Name </span>"
				},
				designation:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter designation </span>"
				},
				description:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter description </span>"
				},
				
		}
		});
	});
</script>

