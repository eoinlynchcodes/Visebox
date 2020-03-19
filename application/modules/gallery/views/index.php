<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Gallery<span class="breadcrumb-devider"><span class="breadcrumb-devider"></span></div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Gallery</div>
      
               <a href="<?php echo base_url('gallery/admin');?>" class="btn btn-primary pull-right">
        <i class="fa fa-hand-o-left"></i> <?php echo lang(' Back');?></a>
            
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
//print'<pre>';print_r($tbl_gallerys);die;
	$this->table->set_heading('Image Title','Image','Action');
	foreach($tbl_gallerys as $tbl_gallery){
		if($tbl_gallery->image ==''){
			$img =base_url('assets/admin/images/no_image.jpeg');
		}else{
		$img = base_url().'assets/upload/gallery/'.$tbl_gallery->image;
		}
        $image = "<img class='img-circle' src='$img'  width='100px' height=100px >";
		$links = anchor(base_url().'gallery/admin/view/'.$tbl_gallery->id,' ',array('title'=>'View Tbl_gallery','class'=>'fa fa-eye fa-lg nav_icon'));
		$links .= ' | '. anchor('gallery/admin/remove/'.$tbl_gallery->id,' ',array('title'=>'remove Tbl_package','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		
		$this->table->add_row($tbl_gallery->title,$image,$links);
		
	}
?>
<?php echo $this->table->generate();?>

</div>
</div>
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