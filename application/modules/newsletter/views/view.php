<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Newsletter
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Newsletter</div>
               <a href="<?php echo base_url('newsletter/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
		</div>
	 <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($newsletters->status  == 1){
			$status='Active';
			}else{
			$status='Inactive';
			} ?>
<table class="table table-bordered">

<tr>
	<th>Email</th>
	<td><?php echo $newsletters->email?></td>
</tr>
<tr>
	<th>Status</th>
	<td><?php echo $status?></td>
</tr><tr>
	<th>Created On</th>
	<td><?php echo $newsletters->created_on?></td>
</tr><tr>
	<th>Updated On</th>
	<td><?php echo $newsletters->updated_on?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>