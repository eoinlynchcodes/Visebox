<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Email<span class="breadcrumb-devider">/</span> Modify<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Email</div>
      
               <a href="<?php echo base_url('email/admin');?>" class="btn btn-primary pull-right">
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

<?php echo form_open_multipart('email/admin/edit/'.$tbl_email->id ,'id="addClient"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
			'value' => $tbl_email->title,
		);
	?>
    <label for="websiteName">Title</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'subject',
			'id' 		=> 'subject',
			'class' => 'form-control',
			'value' => $tbl_email->subject,
		);
		?>
	
    <label for="websiteName">Subject</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
	<div class="form-group">
	
	 <label for="content">Description</label>
     <?php echo form_textarea(array('name' =>'description','id'=>'description','class'=>"ckeditor",'value' => $tbl_email->description)); ?>
</div>


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
				title:{
					required:true,
				},
				subject:{
					required:true,
				},
				description:{
					required:true,
				},
			
				
			},
			messages:{
				title:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Title </span>"
				},
				subject:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Subject </span>"
				},
				description:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter description </span>"
				},
				
		}
		});
	});
</script>

