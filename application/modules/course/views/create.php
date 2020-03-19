<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Course<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> <?php// echo 'User Add';?></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Course</div>
      
               <a href="<?php echo base_url('course/admin');?>" class="btn btn-primary pull-right">
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
<?php echo form_open_multipart('course/admin/create','id="addcourse"') ?><div class="form-group">

	
	
<div class="form-group">
<label for="name"> Select Country</label>
<select name="country_id"  id ='country_id' class = "form-control" >
<option  value="">---select country---</option>
<?php  $countrys= get_country_by();	
//print_r($cats);die;
 foreach($countrys as $country){ ?>
<option  value="<?php echo $country->id; ?>"><?php echo $country->country_name; ?></option>
	 <?php }?>
</select>		
</div>

<div class="form-group">
<label for="name"> Select City</label>
<select name="city_id"  id ='city_id' class = "form-control" >
<option  value="">---select city---</option>

</select>		
</div>

<div class="form-group">
<label for="name"> Select University</label>
<select name="university_id"  id ='university_id' class = "form-control" >
<option  value="">---select university---</option>

</select>		
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'course_name',
			'id' 		=> 'course_name',
			'class' => 'form-control',
		);
	?>
    <label for="page_title">Course Name</label>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#addcourse').validate({
			rules:{
				
				course_name:{
					required:true
					
				},
				country_id:{
					required:true
					
				},
				city_id:{
					required:true
					
				},
				university_id:{
					required:true
					
				},
				
			},
			messages:{
				
				course_name:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Course Name </span>"
				},
				country_id:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Select Country Name </span>"
				},	
				city_id:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Select City Name </span>"
				},
				university_id:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Select Course Name </span>"
				},
				
		}
		});
	});
</script>
<script type="text/javascript">  
                  $(document).ready(function() {  
                     $("#country_id").change(function(){  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo  
                        base_url();?>course/admin/GetAllCity",  
                        data: {country_id:  
                           $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#city_id").html(data);  
                     }  
                  });  
               });  
            }); 
</script>
<script type="text/javascript">  
                  $(document).ready(function() {  
                     $("#city_id").change(function(){ 
					 var country_id = $("#country_id").val();  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo  
                        base_url();?>course/admin/GetAllUniversity",  
                        data: {city_id:  
                           $(this).val(),country_id:country_id},  
                        type: "POST",  
                        success:function(data){  
                        $("#university_id").html(data);  
                     }  
                  });  
               });  
            }); 
</script>	
 
