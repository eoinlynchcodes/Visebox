<div class="breadcrumb">Home 
	<span class="breadcrumb-devider">/</span>Manage Trustexport
	<span class="breadcrumb-devider">/</span>View
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Trustexport</div>
			
               <a href="<?php echo base_url('trustexport/admin');?>" class="btn btn-primary pull-right">
				<i class="fa fa-hand-o-left"></i> <?php echo lang('Back');?></a>
            
		</div>
			  <div class="row">
      <div class="col-md-12">
        <div class="content-box">
<?php if($trustexports->status  == 1){
			$status='Enable';
			}else{
			$status='Disable';
			}?>
			
<table class="table table-bordered">
	<tr>
	<th>Title</th>
	<td><?php echo $trustexports->title?></td>
</tr>
<tr>
<tr>
	<th>Sub Title</th>
	<td><?php echo $trustexports->sub_title?></td>
</tr>
<tr>
   <th>Description</th>
	<td><?php echo $trustexports->discription ?></td>
</tr>
<tr>
   <th>Meta Keyword</th>
	<td><?php echo $trustexports->meta_keyword ?></td>
</tr>
<tr>
   <th>Meta Title</th>
	<td><?php echo $trustexports->meta_title ?></td>
</tr>
<tr>
   <th>Meta Description</th>
	<td><?php echo $trustexports->meta_description ?></td>
</tr>

<tr>
	<th>Created Date</th>
	<td><?php echo date("j-F-Y", strtotime($trustexports->created_on))?></td>
</tr>
<tr>
	<th>Updated On</th>
	<td><?php echo $trustexports->updated_on?></td>
</tr>
<tr>

</table>
</div>
</div>