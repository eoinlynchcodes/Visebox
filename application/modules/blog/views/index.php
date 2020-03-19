 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Blog <span class="breadcrumb-devider">/</span>Blog List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Blog</div>
     
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
//print'<pre>';print_r($tbl_blogs);die;
	$this->table->set_heading('Title','Image','Status','Action');
	foreach($tbl_blogs as $tbl_blog){
		if($tbl_blog->image ==''){
			$img =base_url('assets/admin/images/no_image.jpeg');
		}else{
		$img = base_url().'assets/upload/blog/'.$tbl_blog->image;
		}
        $image = "<img class='img-circle' src='$img'  width='100px' height=100px >";
		
		if($tbl_blog->status  == 1){
				$statu =anchor('blog/admin/setstatus?status=0'.'&'.'id='.$tbl_blog->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
		}else{
				$statu =anchor('blog/admin/setstatus?status=1'.'&'.'id='.$tbl_blog->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));	
		}
		
		
		$links = anchor(base_url().'blog/admin/view/'.$tbl_blog->id,' ',array('title'=>'View Tbl_blog','class'=>'fa fa-eye fa-lg nav_icon'));
		$links .= ' | '.anchor(base_url().'blog/admin/edit/'.$tbl_blog->id,' ',array('title'=>'Edit Tbl_blog','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links .= ' | '. anchor('blog/admin/remove/'.$tbl_blog->id,' ',array('title'=>'remove Tbl_blog','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($tbl_blog->title,$image,$statu,$links);
		
	}
?>
<?php echo $this->table->generate();?>
</div>
</div>
