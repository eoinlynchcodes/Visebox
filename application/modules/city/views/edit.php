<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage City<span class="breadcrumb-devider">/</span>Modify City<span class="breadcrumb-devider"></span> </div>
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
<?php echo form_open_multipart('city/admin/edit/'.$citys->id,'id="addcity"') ?>

<?php // print ('<pre>');print_r($pages);  die;?>

<div class="form-group">
		<label for="name" >Select Country</label>
				<select name="country_id"  id ='country_id' class = "form-control" >
				<option  value="">---select country---</option>
					<?php  $countrys= get_country_by();?>	
					<?php foreach($countrys as $country){ ?>
		<option  value="<?php echo $country->id; ?>" <?php  if($country->id ==$citys->country_id){echo 'selected';}; ?>><?php echo $country->country_name; ?></option>
		<?php }?>
		</select>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'city_name',
			'id' 		=> 'city_name',
			'class' => 'form-control',
			'value' => $citys->city_name,
		);
	?>
    <label for="page_title">City Name</label>
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
