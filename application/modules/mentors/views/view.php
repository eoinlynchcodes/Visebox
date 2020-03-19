<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Mentors
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Mentors</div>
			
               <a href="<?php echo base_url('mentors/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
		</div>
 <div class="row">
      <div class="col-md-12">
        <div class="content-box">
		<?php if($mentors->status  == 1){
			$status='Active';
			}else{
			$status='Inactive';
			} ?>
<table class="table table-bordered">
	
	<?php // echo "<pre>"; print_r ($mentors);  die;?>

<tr>
	<th>First Name</th>
	<td><?php echo $mentors->first_name?></td>
</tr>
<tr>
	<th>Last Name</th>
	<td><?php echo $mentors->last_name?></td>
</tr>
<tr>
	<th>Email</th>
	<td><?php echo $mentors->email?></td>
</tr><tr>
	<th>Phone No</th>
	<td><?php echo $mentors->phone_no?></td>
</tr>
<tr>
	<th>Country</th>
	<td><?php echo $mentors->country_name?></td>
</tr>
<tr>
	<th>City</th>
	<td><?php echo $mentors->city_name?></td>
</tr>
<tr>
	<th>University</th>
	<td><?php echo $mentors->university_name?></td>
</tr>
<tr>
	<th>Bio</th>
	<td><?php echo $mentors->bio?></td>
</tr>
<tr>
	<th>Description</th>
	<td><?php echo $mentors->description?></td>
</tr>
<tr>
	<th>Status</th>
	<td><?php echo $status?></td>
</tr>
<tr>
	<th>Created Date</th>
	<td><?php echo $mentors->created_on ;?></td>
</tr>
<tr>
	<th>Updated Date</th>
	<td><?php echo $mentors->updated_on ;?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>