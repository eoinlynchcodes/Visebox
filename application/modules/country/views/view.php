<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Country
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Country</div>
               <a href="<?php echo base_url('country/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
		</div>
	 <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($countrys->status  == 1){
			$status='Active';
			}else{
			$status='Inactive';
			} ?>
<table class="table table-bordered">

<tr>
	<th>Country Name</th>
	<td><?php echo $countrys->country_name?></td>
</tr>
<tr>
	<th>Status</th>
	<td><?php echo $status?></td>
</tr><tr>
	<th>Created On</th>
	<td><?php echo $countrys->created_on?></td>
</tr><tr>
	<th>Updated On</th>
	<td><?php echo $countrys->updated_on?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>