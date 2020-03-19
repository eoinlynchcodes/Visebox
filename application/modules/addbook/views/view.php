<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Addbook
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Addbook</div>
			
               <a href="<?php echo base_url('addbook/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
		</div>
			  <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($tbl_addbook->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
			
<table class="table table-bordered">
<tr>
	<th>Name of Student</th>
	<td><?php echo $tbl_addbook->username?></td>
</tr>
<tr>
	<th>Name of Book</th>
	<td><?php echo $tbl_addbook->name_of_book?></td>
</tr>
<tr>
	<th>Price</th>
	<td><?php echo $tbl_addbook->price?></td>
</tr>
<tr>
      <th>Author</th>
	  <td><?php echo $tbl_addbook->author?></td>
</tr>
<tr>
      <th>Book Edition</th>
	  <td><?php echo $tbl_addbook->book_edition?></td>
</tr>
<tr>
      <th>Selling From</th>
	  <td><?php echo $tbl_addbook->selling_from?></td>
</tr>
<tr>
      <th>University Used In</th>
	  <td><?php echo $tbl_addbook->university_used?></td>
</tr>
<tr>
      <th>Course Used In</th>
	  <td><?php echo $tbl_addbook->course_used?></td>
</tr>
<tr>
      <th>Module Used In</th>
	  <td><?php echo $tbl_addbook->module_used?></td>
</tr>
<tr>
	<th>Status</th>
	<td><?php echo $status ;?></td>
</tr>

<tr>
<th> Image Of Book </th>
<td><img alt="<?php echo $tbl_addbook->image;?>" src="<?php if($tbl_addbook->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/addbook/'.$tbl_addbook->image);} ?>" height="100" width="100" /></td> </tr>



<tr>
	<th>Created Date</th>
	<td><?php echo date("j-F-Y", strtotime($tbl_addbook->created_on))?></td>
</tr>
<tr>
	<th>Updated Date</th>
	<td><?php echo date("j-F-Y", strtotime($tbl_addbook->updated_on))?></td>
</tr>

</table>
</div>
</div>