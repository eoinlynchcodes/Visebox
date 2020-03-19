<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Users
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Users</div>
			
               <a href="<?php echo base_url('user/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
		</div>
 <div class="row">
      <div class="col-md-12">
        <div class="content-box">
		<?php if($users->active  == 1){
			$status='Active';
			}else{
			$status='Inactive';
			} ?>
<table class="table table-bordered">
	
	<?php // echo "<pre>"; print_r ($users);  die;?>

<tr>
	<th>Name</th>
	<td><?php echo $users->fullname?></td>
</tr>
<tr>
	<th>Email</th>
	<td><?php echo $users->email?></td>
</tr><!-- <tr>
	<th>College</th>
	<td><?php echo $users->college?></td>
</tr> -->
<!-- <tr>
	<th>City</th>
	<td><?php echo $users->city_name?></td>
</tr> -->
 <tr>
	<th>Country</th>
	<td><?php echo $users->country_name?></td>
</tr> 
<!-- <tr>
	<th>University</th>
	<td><?php echo $users->university_name?></td>
</tr> -->
<!-- <tr>
	<th>Course</th>
	<td><?php echo $users->course_name?></td>
</tr> -->
<tr>
	<th>Status</th>
	<td><?php echo $status?></td>
</tr>
<tr>
	<th>Date</th>
	<td><?php echo date('d-m-y',$users->created_on) ;?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>