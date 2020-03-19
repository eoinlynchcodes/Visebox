 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Newsletter <span class="breadcrumb-devider">/</span>Newsletter List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Newsletter</div>
     
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
	
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
  }
  </script>
</head>
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

	$this->table->set_heading('Email','Status','Created On','Action');
	foreach($newsletters as $newsletter){
		
		if($newsletter->status  == 1){
				$statu =anchor('newsletter/admin/setstatus?status=0'.'&'.'id='.$newsletter->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('newsletter/admin/setstatus?status=1'.'&'.'id='.$newsletter->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		
		$links = anchor(base_url() .'newsletter/admin/view/'.$newsletter->id,' ',array('title'=>'View Newsletter','class'=>'fa fa-eye fa-lg nav_icon'));
		//$links .= ' | '.anchor(base_url() .'newsletter/admin/edit/'.$newsletter->id,' ',array('title'=>'Edit Newsletter','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links .= ' | '.anchor('newsletter/admin/remove/'.$newsletter->id,' ',array('title'=>'remove Newsletter','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($newsletter->email,$statu,$newsletter->created_on,$links);
		
	}
?>
<?php echo $this->table->generate();?>

</div>
</div>