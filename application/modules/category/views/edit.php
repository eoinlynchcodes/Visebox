<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Category<span class="breadcrumb-devider">/</span> Modify<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Category</div>
      
               <a href="<?php echo base_url('category/admin');?>" class="btn btn-primary pull-right">
        <i class="fa fa-hand-o-left"></i> <?php echo lang(' Back');?></a>
            
    </div>
	
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
<?php echo form_open_multipart('category/admin/edit/'.$category->category_id ,'id="addClient"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
			'value' => $category->name,
			//'readonly'=>'readonly',
		);
	?>
    <label for="websiteName">Name</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
	<div class="form-group">
	
	 <label for="content">Description</label>
     <?php echo form_textarea(array('name' =>'description','id'=>'description','class'=>"form-control",'value' => $category->description)); ?>
</div>
<!-- <div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_keyword',
			'id' 		=> 'meta_keyword',
			'class' => 'form-control',
			'value' => $category->meta_keyword,
		);
	?>
	
    <label for="websiteName">Meta Keyword</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_description',
			'id' 		=> 'meta_description',
			'class' => 'form-control',
			'value' => $category->meta_description,
		);
	?>
	
    <label for="websiteName">Meta Description</label>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
 <label for="image">Image</label>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>	
<div class="form-group"><img alt="Image" src="<?php if($category->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/category_image/'.$category->image);} ?>" height="100" width="100" /></div>
 -->
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
		
				
			},
			messages:{
				name:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Name </span>"
				},
				
				
		}
		});
	});
</script>

