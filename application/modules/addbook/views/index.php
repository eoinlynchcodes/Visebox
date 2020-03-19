 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Addbook <span class="breadcrumb-devider">/</span>Addbook List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Addbook</div>
     
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
    var x=confirm("Are you sure to delete blog ?")
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
//print'<pre>';print_r($tbl_addbooks);die;
	$this->table->set_heading('Student Name','Name Of Book','Image','Status','Auther','Price','Edition','Action');
	foreach($tbl_addbooks as $tbl_addbook){
		if($tbl_addbook->image ==''){
			$img =base_url('assets/admin/images/no_image.jpeg');
		}else{
		$img = base_url().'assets/upload/addbook/'.$tbl_addbook->image;
		}
        $image = "<img class='img-circle' src='$img'  width='100px' height=100px >";
		
		if($tbl_addbook->status  == 1){
				$statu =anchor('addbook/admin/setstatus?status=0'.'&'.'id='.$tbl_addbook->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('addbook/admin/setstatus?status=1'.'&'.'id='.$tbl_addbook->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		
		
		$links = anchor(base_url().'addbook/admin/view/'.$tbl_addbook->id,' ',array('title'=>'View add book','class'=>'fa fa-eye fa-lg nav_icon'));
		//$links .= ' | '.anchor(base_url().'addbook/admin/edit/'.$tbl_addbook->id,' ',array('title'=>'Edit tbl_addbook','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links .= ' | '. anchor('addbook/admin/remove/'.$tbl_addbook->id,' ',array('title'=>'remove add book','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$username = anchor(base_url().'user/admin/view/'.$tbl_addbook->student_id,$tbl_addbook->fullname,array('title'=>'View users'));
		$this->table->add_row($username,$tbl_addbook->name_of_book,$image,$statu,$tbl_addbook->author,$tbl_addbook->price,$tbl_addbook->book_edition,$links);
		
	}
?>
<?php echo $this->table->generate();?>
</div>
</div>
