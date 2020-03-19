 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Category <span class="breadcrumb-devider">/</span>Category List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Category</div>
     <a href="<?php echo base_url('category/admin/create');?>" class="btn btn-info pull-right">
                <i class="fa fa-plus-circle"></i> <?php echo ('Add');?></a>
      </div>
        <!-- Main content -->
   <div class="row">
      <div class="col-md-12">
        <div class="content-box">
 <script>
    
$(document).ready( function () {
    $('#table_id').DataTable();
	} );
</script>
<script type="text/javascript">
  function ConfirmDialog() {
	  
    var x=confirm("Are you sure to delete ?")
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
        'heading_cell_start'       => '<th>',
        'heading_cell_end'       => '</th>',
        'tbody_open'             => '<tbody>',
        'tbody_close'            => '</tbody>',
        'row_start'              => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'              => '<td>',
        'cell_end'              => '</td>',
        'row_alt_start'           => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'          => '<td>',
        'cell_alt_end'           => '</td>',
        'table_close'           => '</table>'
);
$this->table->set_template($template);
//print'<pre>';print_r($tbl_banners);die;
	$this->table->set_heading('Name','Action');
	foreach($category as $category){
		if($category->image ==''){
			$img =base_url('assets/admin/images/no_image.jpeg');
		}else{
		$img = base_url().'assets/upload/category_image/'.$category->image;
		}
        $image = "<img class='img-circle' src='$img'  width='100px' height=100px >";
		$links = anchor(base_url().'category/admin/view/'.$category->category_id,' ',array('websitename'=>'View category','class'=>'fa fa-eye fa-lg nav_icon'));
		$links .= ' | '.anchor(base_url().'category/admin/edit/'.$category->category_id,' ',array('websitename'=>'Edit category','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links .= ' | '.anchor('category/admin/remove/'.$category->category_id,' ',array('websitename'=>'remove category','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($category->name,$links);
	}
?>
<?php echo $this->table->generate();?>

</div>
</div>
