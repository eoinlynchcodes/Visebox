<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Email<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span></div>
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

<?php echo form_open_multipart('email/admin/create', 'id="addClient"') ?>

    <div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
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
		);
	?>
	
    <label for="websiteName">Subject</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
	<div class="form-group">
	
	 <label for="content">Description</label>
     <?php echo form_textarea(array('name' =>'description','id'=>'description','class'=>"ckeditor")); ?>
</div>

<!--<div class="form-group">
	
	<label for="status" >Status</label>
	<select name="status" id = "status" class ="form-control">
		  <option value="1" selected>Enable</option>
		  <option value="0">Disable</option>
    </select>
</div>-->




<?php echo form_submit('submit', 'Add','class="btn btn-primary" ');?>
<?php echo form_close();?>
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
