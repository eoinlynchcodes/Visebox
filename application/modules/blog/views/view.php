<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Blog
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Blog</div>
			
               <a href="<?php echo base_url('blog/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
		</div>
			  <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($tbl_blog->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
			
<table class="table table-bordered">
	<tr>
	<th>Title</th>
	<td><?php echo $tbl_blog->title?></td>
</tr>
<tr>
      <th>Description</th>
	  <td><?php echo $tbl_blog->description ?></td>
</tr>
<tr>
	<th>Status</th>
	<td><?php echo $status ;?></td>
</tr>

<tr>
<th>Blog Image  </th>
<td><img alt="<?php echo $tbl_blog->image;?>" src="<?php if($tbl_blog->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/blog/'.$tbl_blog->image);} ?>" height="100" width="100" /></td> </tr>
</tr>
<tr>
	<th>Created Date</th>
	<td><?php echo date("j-F-Y", strtotime($tbl_blog->created_on))?></td>
</tr>
<tr>
	<th>Updated Date</th>
	<td><?php echo date("j-F-Y", strtotime($tbl_blog->updated_on))?></td>
</tr>

</table>
</div>
</div>