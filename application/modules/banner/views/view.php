<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Banner
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Banner</div>
			
               <a href="<?php echo base_url('banner/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
		</div>
			  <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($tbl_banner->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
			
<table class="table table-bordered">
	<tr>
	<th>Title</th>
	<td><?php echo $tbl_banner->title?></td>
</tr>
<tr>
      <th>Description</th>
	  <td><?php echo $tbl_banner->description ?></td>
</tr>
<tr>
	<th>Status</th>
	<td><?php echo $status ;?></td>
</tr>
<tr>
	<th>Created Date</th>
	<td><?php echo date("j-F-Y", strtotime($tbl_banner->created_on))?></td>
</tr>
<tr>
<th>Banner Image  </th>
<td><img alt="<?php echo $tbl_banner->image;?>" src="<?php if($tbl_banner->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/banner/'.$tbl_banner->image);} ?>" height="100" width="100" /></td> </tr>
</tr>


</table>
</div>
</div>