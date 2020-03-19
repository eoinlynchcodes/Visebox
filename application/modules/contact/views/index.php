<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Contact <span class="breadcrumb-devider">/</span>Contact List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Contact</div>
     
      </div>
        <div class="row">
      <div class="col-md-12">
        <div class="content-box">
          <div class="table-responsive">
<a href="<?php echo base_url('contact/admin/cnt_explode')?>" class="btn btn-info"> <i class="fa fa-download" aria-hidden="true"></i>
		 CSV <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
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

	$this->table->set_heading('Name','Email','mobile','Date','Action');
	foreach($pages as $pages){
		
		/*if($pages->status  == 1){
				$statu =anchor('pages/admin/setstatus?status=0'.'&'.'id='.$pages->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('pages/admin/setstatus?status=1'.'&'.'id='.$pages->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}*/
		
		$links = anchor(base_url() .'contact/admin/view/'.$pages->id,' ',array('title'=>'View pages','class'=>'fa fa-eye fa-lg nav_icon'));
		$links.= ' | '.anchor('contact/admin/remove/'.$pages->id,' ',array('title'=>'remove pages','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($pages->name,$pages->email,$pages->mobile_no,$pages->created_on,$links);
		
	}
?>
<?php echo $this->table->generate();?>

</div>
</div>
</div>
</div>
</div>
</div>