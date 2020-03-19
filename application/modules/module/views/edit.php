<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Module<span class="breadcrumb-devider">/</span>Modify Module<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Module</div>
      
               <a href="<?php echo base_url('module/admin');?>" class="btn btn-primary pull-right">
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
<?php echo form_open_multipart('module/admin/edit/'.$modules->id,'id="addmodule"') ?>

<?php // print ('<pre>');print_r($pages);  die;?>

<div class="form-group">
<label for="name"> Select Category</label>
<select name="category_id"  id ='category_id' class = "form-control" >
<option  value="">---select Category---</option>
<?php  $categorys= get_cat();	
//print_r($courses);die;
 foreach($categorys as $category){ ?>
<option  value="<?php echo $category->category_id; ?>" <?php  if($category->category_id ==$modules->category_id){echo 'selected';}; ?>><?php echo $category->name; ?></option>
	 <?php }?>
</select>		
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'module_name',
			'id' 		=> 'module_name',
			'class' => 'form-control',
			'value' => $modules->module_name,
		);
	?>
    <label for="page_title">Module Name</label>
	<?php echo form_input($input);?>
</div>


<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#addmodule').validate({
			rules:{
				
				module_name:{
					required:true
					
				},
				course_id:{
					required:true
					
				},
				
			},
			messages:{
				
				module_name:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter module Name </span>"
				},
				course_id:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Select Course Name </span>"
				},	
				
				
		}
		});
	});
</script>
