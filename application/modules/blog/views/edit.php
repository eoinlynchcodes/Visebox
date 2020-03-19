<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Blog<span class="breadcrumb-devider">/</span> Modify<span class="breadcrumb-devider"></span></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Blog</div>
      
               <a href="<?php echo base_url('blog/admin');?>" class="btn btn-primary pull-right">
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

<?php echo form_open_multipart('blog/admin/edit/'.$tbl_blog->id ,'id="addblog"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
			 'rows'=>'3',
			'value' => $tbl_blog->title,
		);
	?>
    <label for="imageTitle">Title</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	
	<label for="content">Description</label>
     <?php echo form_textarea(array('name' =>'description','id'=>'description','class'=>"form-control",'cols' => '40','rows' => '10','style'=>'height:270px','value'=>$tbl_blog->description ,'class'=>"ckeditor")); ?>
</div>
	


<div class="form-group">
	
	<label for="status" >Status</label>
	<select name="status" id = "status" class ="form-control">
		
		 <option value="1" <?php if ($tbl_blog->status=='1') echo 'selected' ; ?>>Enable </option>
		  <option value="0" <?php if ($tbl_blog->status=='0') echo 'selected' ; ?>>Disable</option>
		  
    </select>
</div>


<div class="form-group">
 <label for="image">Image</label>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>	



<div class="form-group"><img alt="<?php echo $tbl_blog->image;?>" src="<?php if($tbl_blog->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/blog/'.$tbl_blog->image);} ?>" height="100" width="100" /></div>
<div class="form-group">
<?php echo form_submit('submit', 'Update ','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#addblog').validate({
			rules:{
				title:{
					required:true,
				},
			description:{
				required:true,
			}
			
				
			},
			messages:{
				title:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter title </span>"
				},
				description:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter description </span>"
				},
			
		}
		});
	});
</script>

