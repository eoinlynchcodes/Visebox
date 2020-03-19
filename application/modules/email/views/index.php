 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Email <span class="breadcrumb-devider">/</span>Email List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Email</div>
     
      </div>
        <div class="row">
      <div class="col-md-12">
        <div class="content-box">
          <div class="table-responsive">
 <script>
    
$(document).ready( function () {
    $('#table_id').DataTable();
	} );
</script>
<script type="text/javascript">
  function ConfirmDialog() {
	  
    var x=confirm("Are you sure to delete client ?")
    if (x) {
      return true;
    } else {
      return false;
    }
    }
    </script>
<?php
	$template = array(
        'table_open'            => '<table class="dataTable table table-striped"  id="table_id" >',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

	$this->table->set_template($template);
//print'<pre>';print_r($tbl_email);die;
	$this->table->set_heading('Title','Subject','Status','Action');
	foreach($tbl_email as $tbl_emails){
		if($tbl_emails->status  == 1){
				$statu =anchor('email/admin/setstatus?status=0'.'&'.'id='.$tbl_emails->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('email/admin/setstatus?status=1'.'&'.'id='.$tbl_emails->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		
		$links = anchor(base_url().'email/admin/view/'.$tbl_emails->id,' ',array('websitename'=>'View Tbl_email','class'=>'fa fa-eye fa-lg nav_icon'));
		$links.= ' | '.anchor(base_url().'email/admin/edit/'.$tbl_emails->id,' ',array('websitename'=>'Edit Tbl_email','class'=>'fa fa-pencil fa-lg nav_icon'));
	    $links .= ' | '. anchor('email/admin/remove/'.$tbl_emails->id,' ',array('websitename'=>'remove Tbl_email','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($tbl_emails->title,$tbl_emails->subject,$statu,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<!--ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('tbl_package/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul-->
</div>
</div>
