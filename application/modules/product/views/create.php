<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Product<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Product</div>
      
               <a href="<?php echo base_url('product/admin/index');?>" class="btn btn-primary pull-right">
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

<?php echo form_open_multipart('product/admin/create', 'id="product"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'product_name',
			'id' 		=> 'product_name',
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
    <label for="imageTitle">Product name</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
<label for="name" >Category</label>
<select name="category_slug"  id ='category_slug' class = "form-control" >
<?php  $cats= get_cat();	
 foreach($cats as $cat){ ?>
<option  value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
	 <?php }?>
</select>		
</div>


<div class="form-group">
	<?php
		$input = array(
			'name' => 'sub_title',
			'id' 		=> 'sub_title',
			'class' => 'form-control',
			
		);
	?>
    <label for="imageTitle">Sub Title</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'packing',
			'id' 		=> 'packing',
			'class' => 'form-control',
			
		);
	?>
    <label for="imageTitle">Packing</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'description',
			'id' 		=> 'description',
			'class' => 'form-control',
			
			
		);
	?>
    <label for="imageTitle">Description</label>
	<?php echo form_textarea($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'technical_description',
			'id' 		=> 'technical_description',
			'class' => 'form-control',
			
		);
	?>
    <label for="imageTitle">Technical Description</label>
	<?php echo form_textarea($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'advised_description',
			'id' 		=> 'advised_description',
			'class' => 'form-control',
			
		);
	?>
    <label for="imageTitle">Advised Description</label>
	<?php echo form_textarea($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'instruction_discription',
			'id' 		=> 'instruction_discription',
			'class' => 'form-control',
			
		);
	?>
    <label for="imageTitle">Instruction Description</label>
	<?php echo form_textarea($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_keyword',
			'id' 		=> 'meta_keyword',
			'class' => 'form-control',
			
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
			
		);
	?>
    <label for="imageTitle">Meta Description</label>
	<?php echo form_textarea($input);?>
</div>
 <label for="imageTitle">Featured Products : </label>
<input type="checkbox" name="featured_products" value="Yes" >

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
		$('#product').validate({
			rules:{
				product_name:{
					required:true,
				},
			description:{
				required:true,
			}
			
				
			},
			messages:{
				product_name:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Product Name </span>"
				},
				description:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Description </span>"
				},
			
		}
		});
	});
</script>
