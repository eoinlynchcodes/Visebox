 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Social link <span class="breadcrumb-devider">/</span>Social List</div>
  <div class="content">
    <div class="panel">
      <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Social</div>
     
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
    var x=confirm("Are you sure to delete social ?")
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
//print'<pre>';print_r($ tbl_socials);die;
	$this->table->set_heading('Title','Link','Image','Action');
	foreach($tbl_socials as $tbl_social){
		if($tbl_social->image ==''){
			$img =base_url('assets/admin/images/no_image.jpeg');
		}else{
		$img = base_url().'assets/upload/social/'.$tbl_social->image;
		}
        $image = "<img class='img-circle' src='$img'  width='100px' height=100px >";
		$links = anchor(base_url().'social/admin/view/'.$tbl_social->id,' ',array('title'=>'View Tbl_social','class'=>'fa fa-eye fa-lg nav_icon'));
		$links .= ' | '.anchor(base_url().'social/admin/edit/'.$tbl_social->id,' ',array('title'=>'Edit Tbl_social','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links .= ' | '. anchor('social/admin/remove/'.$tbl_social->id,' ',array('title'=>'remove Tbl_package','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($tbl_social->title,$tbl_social->a_link,$image,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<!--ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('tbl_package/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul-->
</div>
</div>
