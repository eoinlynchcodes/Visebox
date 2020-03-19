<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Gallery<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Gallery</div>
      
               <a href="<?php echo base_url('gallery/admin');?>" class="btn btn-primary pull-right">
        <i class="fa fa-hand-o-left"></i> <?php echo lang(' Back');?></a>
            
    </div>
<!-- Main content -->
   <div class="row">
      <div class="col-md-12">
        <div class="content-box">

<?php if($tbl_gallery->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
			
<table class="table table-bordered">
<tr>
	<th>Image Title</th>
	<td><?php echo $tbl_gallery->title?></td>
</tr>
<tr>
	<th>Product Name</th>
	<?php $product=get_product_by($tbl_gallery->product_id);?>
	<td><?php echo $product->product_name?></td>
</tr>

<tr>
	<th>Created Date</th>
	<td><?php echo date("j-F-Y", strtotime($tbl_gallery->created_on))?></td>
	</tr>
<tr>
	<th>Status</th>
	<td><?php echo $status?></td>
</tr>

<th>Gallery Image  </th>
<td><img alt="<?php echo $tbl_gallery->image;?>" src="<?php if($tbl_gallery->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/gallery/'.$tbl_gallery->image);} ?>" height="100" width="100" /></td> </tr>
<tr>

</table>
</div>
</div>