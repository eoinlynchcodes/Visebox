<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage University<span class="breadcrumb-devider">/</span>Modify University<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">University</div>
      
               <a href="<?php echo base_url('university/admin');?>" class="btn btn-primary pull-right">
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
<?php echo form_open_multipart('university/admin/edit/'.$universitys->id,'id="adduniversity"') ?>

<?php // print ('<pre>');print_r($pages);  die;?>

<div class="form-group">
		<label for="name" >Select Country</label>
				<select name="country_id"  id ='country_id' class = "form-control" >
				<option  value="">---select country---</option>
					<?php  $countrys= get_country_by();?>	
					<?php foreach($countrys as $country){ ?>
		<option  value="<?php echo $country->id; ?>" <?php  if($country->id ==$universitys->country_id){echo 'selected';}; ?>><?php echo $country->country_name; ?></option>
		<?php }?>
		</select>
</div>

<div class="form-group">
<label for="name"> Select City</label>
<select name="city_id"  id ='city_id' class = "form-control" >
<option  value="">---select city---</option>
<?php  $citys = get_City_by_country($universitys->country_id);?>
<?php foreach($citys as $city){ ?>	
<option  value="<?php echo $city->id; ?>" <?php  if($city->id ==$universitys->city_id){echo 'selected';}; ?>><?php echo $city->city_name; ?></option>
<?php }?>
</select>		
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'university_name',
			'id' 		=> 'university_name',
			'class' => 'form-control',
			'value' => $universitys->university_name,
		);
	?>
    <label for="page_title">University Name</label>
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
		$('#adduniversity').validate({
			rules:{
				
				university_name:{
					required:true
					
				},
				country_id:{
					required:true
					
				},
				city_id:{
					required:true
					
				},
				
			},
			messages:{
				
				university_name:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter University Name </span>"
				},
					country_id:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Select Country Name </span>"
				},
				city_id:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Select City  Name </span>"
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
                        base_url();?>university/admin/GetAllCity",  
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