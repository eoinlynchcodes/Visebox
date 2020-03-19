 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Country <span class="breadcrumb-devider">/</span>Country List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Country</div>
     
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

	$this->table->set_heading('Country Name','Status','Created On','Updated On','Action');
	foreach($countrys as $country){
		
		if($country->status  == 1){
				$statu =anchor('country/admin/setstatus?status=0'.'&'.'id='.$country->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('country/admin/setstatus?status=1'.'&'.'id='.$country->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		
		$links = anchor(base_url() .'country/admin/view/'.$country->id,' ',array('title'=>'View country','class'=>'fa fa-eye fa-lg nav_icon'));
		$links .= ' | '.anchor(base_url() .'country/admin/edit/'.$country->id,' ',array('title'=>'Edit country','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links .= ' | '.anchor('country/admin/remove/'.$country->id,' ',array('title'=>'remove country','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($country->country_name,$statu,$country->created_on,$country->updated_on,$links);
		
	}
?>
<?php echo $this->table->generate();?>

</div>
</div>