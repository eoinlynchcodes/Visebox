<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Contact
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Contact</div>
			
               <a href="<?php echo base_url('contact/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
		</div>
 <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<table class="table table-bordered">
	
	<?php // echo "<pre>"; print_r ($pages);  die;?>

<tr>
	<th>Name</th>
	<td><?php echo $pages->name?></td>
</tr>
<tr>
	<th>Email</th>
	<td><?php echo $pages->email?></td>
</tr><tr>
	<th>Mobile No</th>
	<td><?php echo $pages->mobile_no?></td>
</tr>
<!--<tr>
	<th>City</th>
	<td><?php echo $pages->city?></td>
</tr>
<tr>
	<th>Location</th>
	<td><?php echo $pages->location?></td>
</tr>-->
<tr>
	<th>Description</th>
	<td><?php echo $pages->description?></td>
</tr>
<tr>
	<th>Send Date</th>
	<td><?php echo $pages->created_on ;?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>