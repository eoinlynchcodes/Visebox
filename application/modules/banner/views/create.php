<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Banaer<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> <?php // echo 'User Add';?></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Banner</div>
      
               <a href="<?php echo base_url('banner/admin');?>" class="btn btn-primary pull-right">
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

<?php echo form_open_multipart('banner/admin/create', 'id="addBanner"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'image_title',
			'id' 		=> 'image_title',
			'class' => 'form-control',
		);
	?>
	<?php 
	$validation_error = validation_errors(); 
	if(!empty($validation_error)){
		?>
		<div class="alert alert-danger"><?php echo $validation_error ?></div>
		<?php
	}
?>
    <label for="imageTitle">Title</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'description',
			'id' 		=> 'description',
			'class' => 'form-control',
			 'rows'=>'3',
		);
	?>
    <label for="imageTitle">Description</label><span style="color:red">*</span>
	<?php echo form_textarea($input);?>
</div>
<div class="form-group">
	
	<label for="status" >Status</label>
	<select name="status" id = "status" class ="form-control">
		  <option value="1" selected>Enable</option>
		  <option value="0">Disable</option>
    </select>
</div>
<div class="form-group">
 <label for="image">Image</label>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<?php echo form_submit('submit', 'Add','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#addBanner').validate({
			rules:{
				image_title:{
					required:true,
				},
			description:{
				required:true,
			}
			
				
			},
			messages:{
				image_title:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter  title </span>"
				},
				description:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter description </span>"
				},
			
		}
		});
	});
</script>
