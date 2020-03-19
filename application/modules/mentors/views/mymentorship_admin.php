 <!-- Table -->
<section class="datagrid-panel">
  <div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage my mentorship <span class="breadcrumb-devider">/</span>My Mentorship List</div>
  <div class="content">
    <div class="panel">
      <!-- <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">My Mentorship</div>
     <a href="<?php echo base_url('mentor-dashboard/mymentorship-add');?>" class="btn btn-primary pull-right">
       <h4>Add Mentorship</h4></a>
      </div> -->
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
//print'<pre>';print_r($mentorships);die;
	$this->table->set_heading('Mentor Name','Title','Image','Category Name','Modules','Status','Action');
	foreach($mentorships as $mentorship){
		if($mentorship->image ==''){
			$img =base_url('assets/admin/images/no_image.jpeg');
		}else{
		$img = base_url().'assets/upload/mymentorship/'.$mentorship->image;
		}
        $image = "<img class='img-circle' src='$img'  width='100px' height=100px >";
		
		if($mentorship->status  == 1){
				$statu =anchor('mentors/admin/mymentorshipstatus/0/'.$mentorship->id,'Active',array('title'=>'Enable','class'=>'btn btn-sm btn-info "'));
    }else{
        $statu =anchor('mentors/admin/mymentorshipstatus/1/'.$mentorship->id,'Inactive',array('title'=>'Disable','class'=>'btn btn-sm btn-danger '));  
    }
		
    $modules=get_modules($mentorship->id);
		
		$links = anchor(base_url().'mentors/admin/mymentorshipview/'.$mentorship->id,' ',array('title'=>'View mentorship','class'=>'fa fa-eye fa-lg nav_icon'));
		$links .= ' | '.anchor(base_url().'mentors/admin/mymentorshipedit/'.$mentorship->id,' ',array('title'=>'Edit mentorship','class'=>'fa fa-pencil fa-lg nav_icon'));
		$links .= ' | '. anchor('mentors/admin/mymentorshipremove/'.$mentorship->id,' ',array('title'=>'remove mentorship','class'=>'fa fa-trash fa-lg nav_icon','onclick'=>"return ConfirmDialog()"));
		$this->table->add_row($mentorship->fullname,$mentorship->title,$image,$mentorship->name,$modules,$statu,$links);
		
	}
?>
<?php echo $this->table->generate();?>
</div>
</div>
