<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Setting
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
	 <div class="content-header no-mg-top">
		<i class="fa fa-newspaper-o"></i>
		  <div class="content-header-title">Setting</div>
		<a href="<?php echo base_url('setting/admin/edit/'.$settings->id);?>" class="btn btn-info pull-right">
      <i class="fa fa-pencil fa-lg nav_icon"></i> <?php echo ('Edit');?></a>
    </div>
 <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<table class="table table-bordered">
	
	<?php // echo "<pre>"; print_r ($settings);  die;?>

<tr>
	<th>Phone Number</th>
	<td><?php echo $settings->phone_no?></td>
</tr>
<tr>
	<th>Email</th>
	<td><?php echo $settings->email?></td>
</tr><tr>
	<th>Why ViseBox</th>
	<td><?php echo $settings->why_visebox?></td>
</tr>
<tr>
	<th>Security</th>
	<td><?php echo $settings->security?></td>
</tr>
<tr>
	<th>Earn Money</th>
	<td><?php echo $settings->earn_money?></td>
</tr>
<tr>
	<th>Community</th>
	<td><?php echo $settings->community?></td>
</tr>
<tr>
	<th>Created Date</th>
	<td><?php echo $settings->created_on ;?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>