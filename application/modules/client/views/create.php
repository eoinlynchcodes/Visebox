<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Client<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> <?php // echo 'User Add';?></div>
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

<?php echo form_open_multipart('client/admin/create', 'id="addClient"') ?>

    <div class="form-group">
	<?php
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
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
		);
	?>
	
    <label for="websiteName">Designation</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
	<div class="form-group">
	
	 <label for="content">Description</label>
     <?php echo form_textarea(array('name' =>'description','id'=>'description','class'=>"ckeditor")); ?>
</div>
-->
<div class="form-group">
	
	<label for="status" >Status</label>
	<select name="status" id = "status" class ="form-control">
		  <option value="1" selected>Enable</option>
		  <option value="0">Disable</option>
    </select>
</div>

<div class="form-group">
 <label for="image">Image</label>
<input type="file" name="image" id="image">
</div>


<?php echo form_submit('submit', 'Add','class="btn btn-primary" ');?>
<?php echo form_close();?>
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
