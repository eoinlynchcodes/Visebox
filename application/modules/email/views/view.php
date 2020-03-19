 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Email <span class="breadcrumb-devider">/</span>Email View</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Email</div>
     
      </div>
        <div class="row">
      <div class="col-md-12">
        <div class="content-box">

<?php //if($tbl_email->status  == 1){
			//$status='Enable';
			//}else{
			//$status='Disable';
			//}?>
			
<table class="table table-bordered">
<tr>
	<th>Title</th>
	<td><?php echo $tbl_email->title?></td>
</tr>
<tr>
	<th>Subject</th>
	<td><?php echo $tbl_email->subject?></td>
</tr>
<tr>
	<th>Description</th>
	<td><?php echo $tbl_email->description?></td>
</tr>

<tr>
	<th>Created Date</th>
	<td><?php echo date("j-F-Y H:i:s", strtotime($tbl_email->created_on))?></td>
</tr>
<!--<tr>
	<th>Updated Date</th>
	<td><?php //echo date("d-m-y", strtotime($tbl_email->updated_on))?></td>
</tr>-->
</table>
</div>
</div>