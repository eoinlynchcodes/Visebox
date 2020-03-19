<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Trustexport<span class="breadcrumb-devider">/</span> Modify<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Trustexport</div>
      
               <a href="<?php echo base_url('trustexport/admin');?>" class="btn btn-primary pull-right">
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

<?php echo form_open_multipart('trustexport/admin/edit/'.$trustexports->id ,'id="addtrustexport"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
			 'rows'=>'3',
			'value' => $trustexports->title,
		);
	?>
    <label for="imageTitle">Title</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'sub_title',
			'id' 		=> 'sub_title',
			'class' => 'form-control',
			'value' => $trustexports->sub_title,
			
		);
	?>
    <label for="imageTitle">Sub Title</label>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'discription',
			'id' 		=> 'discription',
			'class' => 'form-control',
			'value' => $trustexports->discription,
			
		);
	?>
    <label for="imageTitle">Description</label>
	<?php echo form_textarea($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_keyword',
			'id' 		=> 'meta_keyword',
			'class' => 'form-control',
			'value' => $trustexports->meta_keyword,
			
		);
	?>
    <label for="imageTitle">Meta Keyword</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_title',
			'id' 		=> 'meta_title',
			'class' => 'form-control',
			'value' => $trustexports->meta_title,
			
		);
	?>
    <label for="imageTitle">Meta Title</label>
	<?php echo form_input($input);?>
</div>


<div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_description',
			'id' 		=> 'meta_description',
			'class' => 'form-control',
			'value' => $trustexports->meta_description,
			
		);
	?>
    <label for="imageTitle">Meta Description</label>
	<?php echo form_textarea($input);?>
</div>
<div class="form-group">
<?php echo form_submit('submit', 'Update ','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#addtrustexport').validate({
			rules:{
				title:{
					required:true,
				},
			discription:{
				required:true,
			}
			
				
			},
			messages:{
				title:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Product Title </span>"
				},
				discription:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Description </span>"
				},
			
		}
		});
	});
</script>

