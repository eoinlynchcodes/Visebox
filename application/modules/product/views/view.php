<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Product
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Product</div>
			
               <a href="<?php echo base_url('product/admin/index');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
		</div>
			  <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($tbl_product->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
			
<table class="table table-bordered">
	<tr>
	<th>Product Name</th>
	<td><?php echo $tbl_product->product_name?></td>
</tr>
<tr>
<th>Category</th>
<td>
<?php 
$cat=get_cat_by($tbl_product->category_slug);?>
<?php echo $cat->name; ?>
</td>
</tr>
<!--<tr>
	<th>Product Slug</th>
	<td><?php// echo $tbl_product->product_slug?></td>
</tr>-->
<tr>
	<th>Sub Title</th>
	<td><?php echo $tbl_product->sub_title?></td>
</tr>
<tr>
	<th>Packing</th>
	<td><?php echo $tbl_product->packing?></td>
</tr>
<tr>
   <th>Description</th>
	<td><?php echo $tbl_product->description ?></td>
</tr>

<tr>
   <th>Technical Description</th>
	<td><?php echo $tbl_product->technical_description ?></td>
</tr>
<tr>
   <th>Advised Description</th>
	<td><?php echo $tbl_product->advised_description ?></td>
</tr>
<tr>
   <th>Instruction Description</th>
	<td><?php echo $tbl_product->instruction_discription ?></td>
</tr>
<tr>
   <th>Featured Products</th>
	<td><?php echo $tbl_product->featured_products ?></td>
</tr>
<tr>
   <th>Meta Keyword</th>
	<td><?php echo $tbl_product->meta_keyword ?></td>
</tr>
<tr>
   <th>Meta Title</th>
	<td><?php echo $tbl_product->meta_title ?></td>
</tr>
<tr>
   <th>Meta Description</th>
	<td><?php echo $tbl_product->meta_description ?></td>
</tr>
<tr>
	<th>Created Date</th>
	<td><?php echo date("j-F-Y", strtotime($tbl_product->created_on))?></td>
</tr>
<tr>
<th>Social Image </th>
<td><img alt="<?php echo $tbl_product->image;?>" src="<?php if($tbl_product->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/product/'.$tbl_product->image);} ?>" height="100" width="100" /></td> </tr>
</tr>
<tr>
	<th>Updated On</th>
	<td><?php echo $tbl_product->updated_on?></td>
</tr>
<tr>

</table>
</div>
</div>