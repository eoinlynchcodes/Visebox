<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage University
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">University</div>
               <a href="<?php echo base_url('university/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
		</div>
	 <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($universitys->status  == 1){
			$status='Active';
			}else{
			$status='Inactive';
			} ?>
<table class="table table-bordered">
<tr>
	<th>Country Name</th>
	<td><?php echo $universitys->country_name?></td>
</tr>
<tr>
	<th>City Name</th>
	<td><?php echo $universitys->city_name?></td>
</tr>
<tr>
	<th>University Name</th>
	<td><?php echo $universitys->university_name?></td>
</tr>
<tr>
	<th>Status</th>
	<td><?php echo $status?></td>
</tr><tr>
	<th>Created On</th>
	<td><?php echo $universitys->created_on?></td>
</tr><tr>
	<th>Updated On</th>
	<td><?php echo $universitys->updated_on?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>