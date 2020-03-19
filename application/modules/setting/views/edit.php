<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Setting<span class="breadcrumb-devider">/</span>Modify Setting<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Setting</div>
      
               <a href="<?php echo base_url('setting/admin');?>" class="btn btn-primary pull-right">
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
<?php echo form_open_multipart('setting/admin/edit/'.$setting->id,'id="addsetting"') ?>


<div class="form-group">
	<?php
		$input = array(
			'name' => 'phone_no',
			'id' 		=> 'phone_no',
			'class' => 'form-control',
			'value' => $setting->phone_no,
		);
	?>
    <label for="page_title">Phone Number</label>
	<?php echo form_input($input);?>
</div>

<div class="form-group">
	<?php
		$input = array(
			'name' => 'email',
			'id' 		=> 'email',
			'class' => 'form-control',
			'value' => $setting->email,
		);
	?>
    <label for="page_title">Email</label>
	<?php echo form_input($input);?>
</div>
<div class="form-group">
	<label for="content">Why Visebox</label>
     <?php echo form_textarea(array('name' =>'why_visebox','id'=>'why_visebox','class'=>"form-control",'value'=>$setting->why_visebox)); ?>
</div>
<div class="form-group">
	
	<label for="content">Security</label>
     <?php echo form_textarea(array('name' =>'security','id'=>'security','class'=>"form-control",'value'=>$setting->security)); ?>
</div>
<div class="form-group">
	
	<label for="content">Earn Money</label>
     <?php echo form_textarea(array('name' =>'earn_money','id'=>'earn_money','class'=>"form-control",'value'=>$setting->earn_money)); ?>
</div>
<div class="form-group">
	
	<label for="content">Community</label>
     <?php echo form_textarea(array('name' =>'community','id'=>'community','class'=>"form-control",'value'=>$setting->community)); ?>
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
		$('#addsetting').validate({
			rules:{
				
				phone_no:{
					required:true
					
				},
				
				email:{
					required:true,
					email:true
					
				},
				
				
				security:{
					required:true
					
				},
				earn_money:{
					required:true
					
				},
				community:{
					required:true
					
				},
				
			},
			messages:{
				
				phone_no:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Phone Number </span>"
				},
				
				email:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter Email Addresss </span>",
					email:"<span style='font-family:cursive; font-size:12px; color:red;'>Please enter valid Email  </span>"
				},
				
				
				security:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Enter Security </span>"
				},
				earn_money:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Enter Earn Money  </span>"
				},
				community:{
					required:"<span style='font-family:cursive; font-size:12px; color:red;'>Please Enter Community  </span>"
				},
				
		}
		});
	});
</script>
