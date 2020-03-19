<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Users <span class="breadcrumb-devider">/</span>Users List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Users</div>
     
      </div>
        <div class="row">
      <div class="col-md-12">
        <div class="content-box">
          <div class="table-responsive">
<!--<a href="<?php //echo base_url('contact/admin/cnt_explode')?>" class="btn btn-info"> <i class="fa fa-download" aria-hidden="true"></i>
		 CSV <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>-->
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

	$this->table->set_heading('Name','Email','Country','Last Login','IP','Date','Active','Action');
	foreach($users as $users){
		
		if($users->active  == 1){
				$statu =anchor('user/admin/setstatus?status=0'.'&'.'id='.$users->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('user/admin/setstatus?status=1'.'&'.'id='.$users->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		
		$links = anchor(base_url() .'user/admin/view/'.$users->id,' ',array('title'=>'View users','class'=>'fa fa-eye fa-lg nav_icon'));
		$links.= ' | '.anchor('user/admin/remove/'.$users->id,' ',array('title'=>'remove users','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($users->fullname,$users->email,$users->country_name,date('d-m-Y',$users->last_login),$users->ip_address,date('d-m-Y',$users->created_on),$statu,$links);
		
	}
?>
<?php echo $this->table->generate();?>

</div>
</div>
</div>
</div>
</div>
</div>