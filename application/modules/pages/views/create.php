<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage CMS<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> <?php // echo 'User Add';?></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">CMS</div>
      
               <a href="<?php echo base_url('pages/admin');?>" class="btn btn-primary pull-right">
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




<?php echo form_open_multipart('pages/admin/create','id="addPage"') ?><div class="form-group">

	<!--<div class="form-group">
	<?php 
		
		 echo form_label('Parent','parent');	
		 $js = 'id="parent", name="parent", class="form-control", style="width: 200px; background-position: 176px 13px; height: 33px;"';
		if((isset($record->id)) ? $record->id : ''){
			 $value = $record->parent;
		 }else{
			 $value = '';
		}
		echo form_dropdown('parent', $Cms, $value, $js);

	?>
	</div>-->
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'page_title',
			'id' 		=> 'page_title',
			'class' => 'form-control',
		);
	?>
    <label for="page_title">Page Title</label>
	<?php echo form_input($input);?>
</div><!--<div class="form-group">
	<?php
		$input = array(
			'name' => 'slug',
			'id' 		=> 'slug',
			'class' => 'form-control',
		);
	?>
    <label for="slug">Slug</label>
	<?php echo form_input($input);?>
</div>-->


<div class="form-group">
	<?php
		$input = array(
			'name' => 'short_content',
			'id' 		=> 'short_content',
			'class' => 'form-control',
		);
	?>
    <label for="short_content">Short Content</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<!-- <?php
		$input = array(
			'name' => 'content',
			'id'   => 'content1',
			'class' => 'form-control',
		);
	?>
    <label for="content">Content</label>
	<?php echo form_textarea($input);?> -->
	<!-- <label for="content">Content</label>
	<textarea class="form-control" rows="5" id="comment" name="content"></textarea> -->
	 <label for="content">Content</label>
     <?php echo form_textarea(array('name' =>'content','id'=>'content','class'=>"ckeditor")); ?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_keyword',
			'id' 		=> 'meta_keyword',
			'class' => 'form-control',
		);
	?>
    <label for="meta_keyword">Meta Keyword</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_description',
			'id' 		=> 'meta_description',
			'class' => 'form-control',
		);
	?>
    <label for="meta_description">Meta Description</label>
	<?php echo form_input($input);?>
</div>
 <div class="form-group">
      <?php
		$input = array(
		    
			'name' => 'image',
			'type'=>'file',
			'id'   => 'image',
			'class' => 'form-control',
		);
	?>
	<label for="meta_description">Select Image:</label>
	<?php echo form_input($input);?>
 </div>

<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#addPage').validate({
			rules:{
				
				page_title:{
					required:true
					
				},
				
				
			},
			messages:{
				
				page_title:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter page title </span>"
				},
					
				
				
		}
		});
	});
</script>
 
