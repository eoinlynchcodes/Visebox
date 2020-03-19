<div class="breadcrumb">Home 
  <span class="breadcrumb-devider">/</span>Manage mentorships
  <span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">mentorships</div>
      
               <a href="<?php echo base_url('mentor-dashboard/mymentorship');?>" class="btn btn-primary pull-right">
        <i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
    </div>
 <div class="row">
      <div class="col-md-12">
        <div class="content-box">
    <?php if($mentorships->status  == 1){
      $status='Active';
      }else{
      $status='Inactive';
      } ?>
<table class="table table-bordered">
  
  <?php // echo "<pre>"; print_r ($mentorships);  die;?>

<tr>$mentorship->name
  <th>Title</th>
  <td><?php echo $mentorships->title?></td>
</tr>
<tr>
  <th>Price</th>
  <td><?php echo $mentorships->price?></td>
</tr>
<tr>
  <th>Category</th>
  <td><?php echo $mentorships->name?></td>
</tr>

<tr>
  <th>Module</th>
  <td><?php echo get_modules($mentorships->id); ?></td>
</tr>
<tr>
  <th>Description</th>
  <td><?php echo $mentorships->description?></td>
</tr><tr>
  <th>Message</th>
  <td><?php echo $mentorships->op_msg?></td>
</tr>
<tr>
<th>Image  </th>
<td><img alt="<?php echo $mentorships->image;?>" src="<?php if($mentorships->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/mymentorship/'.$mentorships->image);} ?>" height="100" width="100" />
</td> 
</tr>
<tr>
  <th>Status</th>
  <td><?php echo $status?></td>
</tr>
<tr>
  <th>Created Date</th>
  <td><?php echo $mentorships->created_on ;?></td>
</tr>
<tr>
  <th>Updated Date</th>
  <td><?php echo $mentorships->updated_on ;?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>