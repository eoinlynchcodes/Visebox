<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Social link<span class="breadcrumb-devider">/</span> Modify<span class="breadcrumb-devider"></span> </div>
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
<?php 
	$validation_error = validation_errors(); 
	if(!empty($validation_error)){
		?>
		<div class="alert alert-danger"><?php echo $validation_error ?></div>
		<?php
	}
?>

<?php echo form_open_multipart('social/admin/edit/'.$tbl_social->id ,'id="addsocial"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
			 'rows'=>'3',
			'value' => $tbl_social->title,
		);
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
			'value' => $tbl_social->a_link,
		);
	?>
    <label for="imageTitle">Link</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
	


<div class="form-group">
	
	<label for="status" >Status</label>
	<select name="status" id = "status" class ="form-control">
		
		 <option value="1" <?php if ($tbl_social->status=='1') echo 'selected' ; ?>>Enable </option>
		  <option value="0" <?php if ($tbl_social->status=='0') echo 'selected' ; ?>>Disable</option>
		  
    </select>
</div>


<div class="form-group">
 <label for="image">Image</label>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>	



<div class="form-group"><img alt="<?php echo $tbl_social->image;?>" src="<?php if($tbl_social->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/social/'.$tbl_social->image);} ?>" height="100" width="100" /></div>
<div class="form-group">
<?php echo form_submit('submit', 'Update ','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
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
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter title </span>"
				},
				a_link:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter link </span>"
				},
			
		}
		});
	});
</script>

