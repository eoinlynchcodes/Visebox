<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage My mentorship<span class="breadcrumb-devider">/</span> Edit<span class="breadcrumb-devider"></span> <?php // echo 'User Add';?></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">My mentorship</div>
      
               <a href="<?php echo base_url('mentors/admin/mymentorship');?>" class="btn btn-primary pull-right">
        <i class="fa fa-hand-o-left"></i> <?php echo lang(' Back');?></a>
            
    </div>
<!-- Main content -->
   <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php 
 $message = $this->session->flashdata('message');
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info"><?php echo $message ?></div>
		<?php
			}
?>

<?php echo form_open_multipart('mentors/admin/mymentorshipedit/'.$mentorships->id, 'id="mymentorship"') ?>
	<div class="form-group">
	<?php
		$input = array(
			'name' => 'title',
			'id' 		=> 'title',
			'class' => 'form-control',
			'value' => $mentorships->title,
		);
	?>
	
    <label for="imageTitle">Title</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'price',
			'id' 		=> 'price',
			'class' => 'form-control',
			'type' => 'number',
			'placeholder' => '1.00€ - 10,000.00€',
			'value' => $mentorships->price,
		);
	?>
	
    <label for="imageTitle">Price (EUR)</label><span style="color:red">*</span>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
		
								
							<label for="category_id">Category</label>
							<select class="form-control" id="category_id" name="category_id">
								<option  value="">Select Category</option>
								<?php  $categorys= get_cat();	
								//print_r($courses);die;
								 foreach($categorys as $category){ ?>
								<option  value="<?php echo $category->category_id; ?>" <?php if($mentorships->category_id==$category->category_id) echo'selected'?>><?php echo $category->name; ?></option>
									 <?php }?>
								</select>
						  </div>
						   <div class="form-group ">
							<label for="course">Module</label></br>
							<?php 
							$module_mymembershipby_categorys=get_module_mymembershipby_category($mentorships->category_id);
							$module_mymembership=get_module_mymembership($mentorships->id);
							?>
							<select class="form-control select2" id="module_id" multiple="multiple" required name="module_id[]">
								<?php foreach($module_mymembershipby_categorys as $module_mymembershipby_category){ ?>
								<option  value="<?php echo $module_mymembershipby_category->id; ?>" <?php if(in_array($module_mymembershipby_category->id,$module_mymembership)) echo'selected'; ?>><?php echo $module_mymembershipby_category->module_name; ?></option>
									 <?php } ?>
								
								</select>
						  </div>
<div class="form-group">
	
	<label for="description">Description</label>
     <?php echo form_textarea(array('name' =>'description','id'=>'description','class'=>"form-control",'cols' => '40','rows' => '10','style'=>'height:270px','class'=>"ckeditor",'value' => $mentorships->description)); ?>
</div>
<div class="form-group">
	
	<label for="op_msg">Opening message</label>
     <?php echo form_textarea(array('name' =>'op_msg','id'=>'op_msg','class'=>"form-control",'cols' => '30','rows' => '5','style'=>'height:200px','class'=>"form-control",'value' => $mentorships->op_msg)); ?>
</div>


<div class="form-group">
 <label for="image">Image</label>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<div class="form-group"><img alt="<?php echo $mentorships->image;?>" src="<?php if($mentorships->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/mymentorship/'.$mentorships->image);} ?>" height="100" width="100" /></div>
<?php echo form_submit('submit', 'Update','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#mymentorship').validate({
			rules:{
				title:{
					required:true,
				},
				price:{
					required:true,
				},
			description:{
				required:true,
			},
			category_id: {
                        required:true,
                },
            module_id: {
                        required:true,
                }, 
            op_msg: {
                        required:true,
                },
			
			
				
			},
			messages:{
				title:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter  title </span>"
				},
				price:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter  price </span>"
				},
				description:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter description </span>"
				},
				 category_id: {
                        required:"<span style='font-family:cursive; font-size:12px; color:red;'>category is required.</span>",
                },
                module_id: {
                        required:"<span style='font-family:cursive; font-size:12px; color:red;'>Module is required.</span>",
                },
                 op_msg: {
                        required:"<span style='font-family:cursive; font-size:12px; color:red;'>Opening message is required.</span>",
                },
			 
			
		}
		});
	});


	  $(document).ready(function() {  
    $("#category_id").change(function(){ 
                     
                     $.ajax({  
                        url:"<?php echo  base_url();?>home/GetAllModule",  
                        data: {category_id:  
                           $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#module_id").html(data);  
                     }  
                  });  
               }); 
               }); 




</script>
