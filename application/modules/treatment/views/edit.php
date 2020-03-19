<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage CMS<span class="breadcrumb-devider">/</span>Modify treatment<span class="breadcrumb-devider"></span> <?php// echo 'User Add';?></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Treatment</div>
      
               <a href="<?php echo base_url('treatment/admin');?>" class="btn btn-primary pull-right">
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
<?php echo form_open_multipart('treatment/admin/edit/'.$pages->id,'id="addPage"') ?>

<?php // print ('<pre>');print_r($pages);  die;?>

<!--<div class="form-group">
	<?php 
		 echo form_label('Parent','parent');	
		 $js = 'id="parent",name="parent",class="form-control", style="width: 200px; background-position: 176px 13px; height: 33px;" ';
		 if((isset($pages->id)) ? $pages->id : ''){
		 $value = $pages->parent;
		 }else{
			 $value = '';
		 }
		 echo form_dropdown('parent', $Cms, $value, $js);

	?>
	</div>-->
<div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
			'value' => $pages->title,
		);
	?>
    <label for="page_title">Title</label>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'description_1',
			'id' 		=> 'description_1',
			'class' => 'form-control',
			'value' => $pages->description_1,
		);
	?>
    <label for="description_1">Description 1</label>
	<?php echo form_textarea(array('name' =>'description_2','id'=>'description_2','class'=>"ckeditor",'value'=>$pages->description_2)); ?>
	<!--<?php echo form_input($input);?>-->
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'sub_title',
			'id' 		=> 'sub_title',
			'class' => 'form-control',
			'value' => $pages->sub_title,
		);
	?>
    <label for="title">Sub Title</label>
	<?php echo form_input($input);?>
</div>


<div class="form-group">
<?php
		$input = array(
			'name' => 'description_2',
			'id' 		=> 'description_2',
			'class' => 'form-control',
			'value' => $pages->description_2,
		);
	?>
	<label for="content">Description 2</label>
     <?php echo form_textarea(array('name' =>'description_2','id'=>'description_2','class'=>"ckeditor",'value'=>$pages->description_2)); ?>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'su_title',
			'id' 		=> 'su_title',
			'class' => 'form-control',
			'value' => $pages->su_title,
		);
	?>
    <label for="title">Su Title</label>
	<?php echo form_input($input);?>
</div>



<div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_keyword',
			'id' 		=> 'meta_keyword',
			'class' => 'form-control',
			'value' => $pages->meta_keyword,
		);
	?>
    <label for="meta_keyword">Meta Keyword</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_description',																	
			'id' 		=> 'meta_description',
			'class' => 'form-control',
			'value' => $pages->meta_description,
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
 <div class="form-group"><img alt="<?php echo $pages->image;?>" src="<?php if($pages->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/package_image/'.$pages->image);} ?>" height="100" width="100" /></div>




<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>
</div>
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
