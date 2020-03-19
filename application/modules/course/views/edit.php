<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Course<span class="breadcrumb-devider">/</span>Modify Course<span class="breadcrumb-devider"></span> </div>
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
<?php echo form_open_multipart('course/admin/edit/'.$courses->id,'id="addcourse"') ?>

<?php // print ('<pre>');print_r($pages);  die;?>

<div class="form-group">
		<label for="name" >Select Country</label>
				<select name="country_id"  id ='country_id' class = "form-control" >
				<option  value="">---select country---</option>
					<?php  $countrys= get_country_by();?>	
					<?php foreach($countrys as $country){ ?>
		<option  value="<?php echo $country->id; ?>" <?php  if($country->id ==$courses->country_id){echo 'selected';}; ?>><?php echo $country->country_name; ?></option>
		<?php }?>
		</select>
</div>

<div class="form-group">
<label for="name"> Select City</label>
<select name="city_id"  id ='city_id' class = "form-control" >
<option  value="">---select city---</option>
<?php  $citys = get_City_by_country($courses->country_id);?>
<?php foreach($citys as $city){ ?>	
<option  value="<?php echo $city->id; ?>" <?php  if($city->id ==$courses->city_id){echo 'selected';}; ?>><?php echo $city->city_name; ?></option>
<?php }?>
</select>		
</div>

<div class="form-group">
<label for="name"> Select University</label>
<select name="university_id"  id ='university_id' class = "form-control" >
<option  value="">---select university---</option>
<?php  $universitys = get_City_by_country_university($courses->country_id,$courses->city_id);?>
<?php foreach($universitys as $university){ ?>	
<option  value="<?php echo $university->id; ?>" <?php  if($university->id ==$courses->university_id){echo 'selected';}; ?>><?php echo $university->university_name; ?></option>
<?php }?>
</select>		
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'course_name',
			'id' 		=> 'course_name',
			'class' => 'form-control',
			'value' => $courses->course_name,
		);
	?>
    <label for="page_title">Course Name</label>
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