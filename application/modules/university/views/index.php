 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage University <span class="breadcrumb-devider">/</span>University List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">University</div>
     
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

	$this->table->set_heading('Country Name','City Name','University Name','Status','Created On','Updated On','Action');
	foreach($universitys as $university){
		
		if($university->status  == 1){
				$statu =anchor('university/admin/setstatus?status=0'.'&'.'id='.$university->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('university/admin/setstatus?status=1'.'&'.'id='.$university->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		
		$links = anchor(base_url() .'university/admin/view/'.$university->id,' ',array('title'=>'View university','class'=>'fa fa-eye fa-lg nav_icon'));
		$links .= ' | '.anchor(base_url() .'university/admin/edit/'.$university->id,' ',array('title'=>'Edit university','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links .= ' | '.anchor('university/admin/remove/'.$university->id,' ',array('title'=>'remove university','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($university->country_name,$university->city_name,$university->university_name,$statu,$university->created_on,$university->updated_on,$links);
		
	}
?>
<?php echo $this->table->generate();?>

</div>
</div>