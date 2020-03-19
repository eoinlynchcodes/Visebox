 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Product<span class="breadcrumb-devider">/</span>Product List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Product</div>
     
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
    var x=confirm("Are you sure to delete product ?")
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
//print'<pre>';print_r($ tbl_products);die;
	$this->table->set_heading('Product Name','Category','Action');
	foreach($tbl_products as $tbl_product){
		$links = anchor(base_url().'product/admin/view/'.$tbl_product->product_id,' ',array('title'=>'View Tbl_product','class'=>'fa fa-eye fa-lg nav_icon'));
		$links .= ' | '.anchor(base_url().'product/admin/edit/'.$tbl_product->product_id,' ',array('title'=>'Edit Tbl_product','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links .= ' | '. anchor('product/admin/remove/'.$tbl_product->product_id,' ',array('title'=>'remove Tbl_package','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$cat=get_cat_by($tbl_product->category_slug);
		
		$this->table->add_row($tbl_product->product_name,$cat->name,$links);
		
	}
?>
<?php echo $this->table->generate();?>

</div>
</div>
