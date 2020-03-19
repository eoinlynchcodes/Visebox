<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage CMS
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">CMS</div>
               <a href="<?php echo base_url('banner/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
		</div>
	 <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($pages->status  == 1){
			$status='Active';
			}else{
			$status='Inactive';
			} ?>
<table class="table table-bordered">

<tr>
	<th>Page Title</th>
	<td><?php echo $pages->page_title?></td>
</tr>
<tr>
	<th>Short Content</th>
	<td><?php echo $pages->short_content?></td>
</tr><tr>
	<th>Content</th>
	<td><?php echo $pages->content?></td>
</tr>
<tr>
	<th>Meta Keyword</th>
	<td><?php echo $pages->meta_keyword?></td>
</tr><tr>
	<th>Meta Description</th>
	<td><?php echo $pages->meta_description?></td>
</tr><tr>
	<th>Status</th>
	<td><?php echo $status?></td>
</tr><tr>
	<th>Created On</th>
	<td><?php echo $pages->created_on?></td>
</tr><tr>
	<th>Updated On</th>
	<td><?php echo $pages->updated_on?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>