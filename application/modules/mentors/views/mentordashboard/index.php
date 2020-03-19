<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Admin<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Admin</div>
      
             <a href="<?php echo base_url('admin/create');?>" class="btn btn-info pull-right">
                <i class="fa fa-plus-circle"></i> <?php echo ('Add');?></a>
            
    </div>
<!-- Main content -->
   <div class="row">
      <div class="col-md-12">
        <div class="content-box">
                                                                      
                                    <?php
            $template = array(
                'table_open'            => '<table id="customers2" class="table datatable">',

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

            $this->table->set_heading('Group','Firstname','Lastname','Email','Last Logon Time ','Action');
            foreach($all_users as $admin){
                /*$links = anchor('admin/view/'.$admin->user_id,' ',array('title'=>'View User','class'=>'glyphicon glyphicon-eye-open'));*/
                $links=anchor('admin/edit/'.$admin->user_id,' ',array('title'=>'Edit User','class'=>'fa fa-pencil fa-lg nav_icon'));
                $links.= ' | '.anchor('admin/remove/'.$admin->user_id,' ',array('title'=>'Remove User','class'=>'fa fa-trash fa-lg nav_icon','onClick'=>"javascript:return confirm('Are you sure you want to Delete?');"));
                
                
                $this->table->add_row($admin->group_name,$admin->firstname,$admin->lastname,$admin->email,date(" D, h:i:sa d M Y", strtotime($admin->last_login_date)),$links);
                
            }
        ?>
        <?php echo $this->table->generate();?>
			</div>
		</div>
		<!-- END DATATABLE EXPORT -->                            
		
		

	</div>
</div>

</div>         
<!-- END PAGE CONTENT WRAPPER -->
