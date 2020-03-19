<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Category<span class="breadcrumb-devider">/</span> View<span class="breadcrumb-devider"></span> <?php// echo 'User Add';?></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Category</div>
      
               <a href="<?php echo base_url('category/admin');?>" class="btn btn-primary pull-right">
        <i class="fa fa-hand-o-left"></i> <?php echo lang(' Back');?></a>
            
    </div>
			  <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($category->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
			
<table class="table table-bordered">
<tr>
	<th>Name</th>
	<td><?php echo $category->name?></td>
</tr>
<tr>
	<th>Description</th>
	<td><?php echo $category->description?></td>
</tr>
<!-- <tr>
	<th>Meta Keyword</th>
	<td><?php echo $category->meta_keyword?></td>
</tr>
<tr>
	<th>Meta Description</th>
	<td><?php echo $category->meta_description?></td>
</tr>
<th>Image</th>
<td><img alt="<?php echo $category->image;?>" src="<?php if($category->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/category_image/'.$category->image);} ?>" height="100" width="100" /></td> </tr>
<tr>
	<tr>
	<th>Status</th>
	<td><?php echo $status ;?></td>
</tr> -->


</table>
</div>
</div>