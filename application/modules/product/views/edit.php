<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Product<span class="breadcrumb-devider">/</span> Modify<span class="breadcrumb-devider"></span> </div>
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
<?php 
	$validation_error = validation_errors(); 
	if(!empty($validation_error)){
		?>
		<div class="alert alert-danger"><?php echo $validation_error ?></div>
		<?php
	}
?>

<?php echo form_open_multipart('product/admin/edit/'.$tbl_product->product_id ,'id="product"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'product_name',
			'id' 		=> 'product_name',
			'class' => 'form-control',
			 'rows'=>'3',
			'value' => $tbl_product->product_name,
		);
	?>
    <label for="imageTitle">Product Name</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>

	
<div class="form-group">
		<label for="name" >Category</label>
				<select name="category_slug"  id ='category_slug' class = "form-control" >
				
					<?php  $cats= get_cat();?>	
					<?php foreach($cats as $cat){ ?>
		<option  value="<?php echo $cat->slug; ?>" <?php  if($cat->slug ==$tbl_product->category_slug){echo 'selected';}; ?>><?php echo $cat->name; ?></option>
		<?php }?>
		</select>
</div>


<div class="form-group">
	<?php
		$input = array(
			'name' => 'sub_title',
			'id' 		=> 'sub_title',
			'class' => 'form-control',
			'value' => $tbl_product->sub_title,
			
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
			'value' => $tbl_product->packing,
			
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
			'value' => $tbl_product->description,
			
		);
	?>
    <label for="imageTitle">Description</label><span style="color:red">*</span>
	<?php echo form_textarea($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_keyword',
			'id' 		=> 'meta_keyword',
			'class' => 'form-control',
			'value' => $tbl_product->meta_keyword,
			
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
			'value' => $tbl_product->meta_title,
			
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
			'value' => $tbl_product->meta_description,
			
		);
	?>
    <label for="imageTitle">Meta Description</label>
	<?php echo form_textarea($input);?>
</div>
<div class="form-group">
	<?php
		$input = array(
			'name' => 'technical_description',
			'id' 		=> 'technical_description',
			'class' => 'form-control',
			'value' => $tbl_product->technical_description,
			
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
			'value' => $tbl_product->advised_description,
			
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
			'value' => $tbl_product->instruction_discription,
			
		);
	?>
    <label for="imageTitle">Instruction Description</label>
	<?php echo form_textarea($input);?>
</div>
 <label for="imageTitle">Featured Products : </label>
<input type="checkbox" name="featured_products" value="Yes" <?php if($tbl_product->featured_products=="Yes") { echo 'checked'; } ?> >
<div class="form-group">
 <label for="image">Image</label>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>	



<div class="form-group"><img alt="<?php echo $tbl_product->image;?>" src="<?php if($tbl_product->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/product/'.$tbl_product->image);} ?>" height="100" width="100" /></div>

<div class="form-group">
<?php echo form_submit('submit', 'Update ','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
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

