<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Mentors <span class="breadcrumb-devider">/</span>Mentors List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Mentors</div>
     
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

	$this->table->set_heading('Name','Email','Status','Phone Number','City','Country','University','Date','Action');
	foreach($mentors as $mentors){
		
		if($mentors->status  == 1){
				$statu =anchor('mentors/admin/setstatus?status=0'.'&'.'id='.$mentors->mentor_id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('mentors/admin/setstatus?status=1'.'&'.'id='.$mentors->mentor_id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		
		$links = anchor(base_url() .'mentors/admin/view/'.$mentors->mentor_id,' ',array('title'=>'View mentors','class'=>'fa fa-eye fa-lg nav_icon'));
		$links .= ' | '.anchor(base_url() .'mentors/admin/edit/'.$mentors->mentor_id,' ',array('title'=>'Edit mentors','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links.= ' | '.anchor('mentors/admin/remove/'.$mentors->mentor_id,' ',array('title'=>'remove mentors','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($mentors->first_name,$mentors->email,$statu,$mentors->phone_no,$mentors->city_name,$mentors->country_name,$mentors->university_name,$mentors->created_on,$links);
		
	}
?>
<?php echo $this->table->generate();?>

</div>
</div>
</div>
</div>
</div>
</div>