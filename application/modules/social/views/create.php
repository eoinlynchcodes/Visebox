<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Social link<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> <?php // echo 'User Add';?></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Social</div>
      
               <a href="<?php echo base_url('social/admin');?>" class="btn btn-primary pull-right">
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

<?php echo form_open_multipart('social/admin/create', 'id="addsocial"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
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
			'name' => 'a_link',
			'id' 		=> 'a_link',
			'class' => 'form-control',
			
		);
	?>
    <label for="imageTitle">Link</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
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
		$('#addsocial').validate({
			rules:{
				title:{
					required:true,
				},
			a_link:{
				required:true,
			}
			
				
			},
			messages:{
				title:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter  title </span>"
				},
				a_link:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter link </span>"
				},
			
		}
		});
	});
</script>
