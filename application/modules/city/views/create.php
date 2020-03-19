<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage City<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> <?php // echo 'User Add';?></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">City</div>
      
               <a href="<?php echo base_url('city/admin');?>" class="btn btn-primary pull-right">
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




<?php echo form_open_multipart('city/admin/create','id="addcity"') ?><div class="form-group">

	
	
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
	<?php
		$input = array(
			'name' => 'city_name',
			'id' 		=> 'city_name',
			'class' => 'form-control',
		);
	?>
    <label for="page_title">City Name</label>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#addcity').validate({
			rules:{
				
				city_name:{
					required:true
					
				},
				country_id:{
					required:true
					
				},
				
			},
			messages:{
				
				city_name:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter City Name </span>"
				},
				country_id:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Select Country Name </span>"
				},	
				
				
		}
		});
	});
</script>
 
