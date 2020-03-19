 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Client <span class="breadcrumb-devider">/</span>Client View</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Client</div>
     
      </div>
        <div class="row">
      <div class="col-md-12">
        <div class="content-box">

<?php if($tbl_client->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
			
<table class="table table-bordered">
<tr>
	<th>Name</th>
	<td><?php echo $tbl_client->name?></td>
</tr>
<!--<tr>
	<th>Designation</th>
	<td><?php echo $tbl_client->designation?></td>
</tr>
<tr>
	<th>Description</th>
	<td><?php echo $tbl_client->description?></td>
</tr>

<tr>
	<th>Created Date</th>
	<td><?php echo date("j-F-Y", strtotime($tbl_banner->created_on))?></td>
	</tr>
<tr>
-->
	<th>Status</th>
	<td><?php echo $status?></td>
</tr>
<th>client Image  </th>
<td><img alt="<?php echo $tbl_client->image;?>" src="<?php if($tbl_client->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/testimonial_image/'.$tbl_client->image);} ?>" height="100" width="100" /></td> </tr>
<tr>

</table>
</div>
</div>