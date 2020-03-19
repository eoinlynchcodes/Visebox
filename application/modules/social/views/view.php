<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Social link
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Social</div>
			
               <a href="<?php echo base_url('social/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
		</div>
			  <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($tbl_social->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
			
<table class="table table-bordered">
	<tr>
	<th>Title</th>
	<td><?php echo $tbl_social->title?></td>
</tr>
<tr>
      <th>Link</th>
	  <td><?php echo $tbl_social->a_link ?></td>
</tr>
<tr>
	<th>Status</th>
	<td><?php echo $status ;?></td>
</tr>
<tr>
	<th>Created Date</th>
	<td><?php echo date("j-F-Y", strtotime($tbl_social->created_on))?></td>
</tr>
<tr>
<th>Social Image </th>
<td><img alt="" src="<?php if($tbl_social->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/social/'.$tbl_social->image);} ?>" height="100" width="100" /></td> </tr>
</tr>


</table>
</div>
</div>