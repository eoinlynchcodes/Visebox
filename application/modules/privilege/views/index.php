
<div class="breadcrumb">Home <span class="breadcrumb-devider">/</span>Manage Group<span class="breadcrumb-devider">/</span> Create<span class="breadcrumb-devider"></span> </div>
<div class="content">
  <div class="panel">
    <div class="content-header no-mg-top">
      <i class="fa fa-newspaper-o"></i>
      <div class="content-header-title">Group</div>
      
               <a href="<?php echo base_url('group/admin');?>" class="btn btn-primary pull-right">
        <i class="fa fa-hand-o-left"></i> <?php echo lang(' Back');?></a>
            
    </div>
  <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    <form action="<?php echo base_url('privilege/admin/edit');?>" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"></h3>
                                    <div class="btn-group pull-left">
                                         <button type="submit" class="btn btn-info pull-right">
                <i class="fa fa-plus-circle"></i> <?php echo ('Update');?></button>
                                    </div>                                    
                                    
                                </div>
                                 
                                <div class="panel-body">
                                                                      
<div class="content">
    <div class="panel">
        <div class="row">
            <div class="col-md-12">
                <div class="content-box">
                    <table class="table table-bordered table-striped">
                            <thead>
							<tr>
							<th></th>
							<?php $i=1; foreach ($groups as $key => $group) { ?>
							<th><input type="checkbox" id="colcheckbox<?php echo $i;?>"  class="colbox" rel="<?php echo $i;?>"></th>
							<?php $i++; } ?>
							</tr>
                                <tr>
                                    <th></th>
									
                                   <?php foreach ($groups as $key => $group) { ?>
                                        <th> <?php echo $group->group_name; ?></th>
                                    <?php } ?>
                                    
                                </tr>
                            </thead>
                            <tbody>
                
                            <!-- Loop menu -->
                        <?php  $j=1;foreach ($menus as $key => $menu) { ?>
                            <?php if ($menu->parent_id == 0) { ?>
                                <tr class="treegrid-<?php echo $menu->id; ?>">

                                    <th ><i class="fa fa-folder-open"></i> <?php echo $menu->title; ?></th>
                                    <?php $i=1; foreach ($groups as $key => $group) { ?>
                                    <th ><div class="form-group"><input type="checkbox" class="icheckbox colcheckbox<?php echo $i;?> rowcheckboxmain<?php echo $j;?>" name="<?php echo $menu->id; ?>[]" value="<?php echo $group->id; ?>" <?php echo getcheck($menu->id,$group->id);?>></div></th >
                                    <?php $i++; } ?>
									<th><input type="checkbox" id="rowcheckbox<?php echo $j;?>"  class="rowboxmain" rel="<?php echo $j;?>"></th>
                                </tr>
                                
                               
                                   <!-- Loop submenu -->
                                <?php $i=1; foreach ($menus as $key => $submenu) { ?>
                                    <?php if ($submenu->parent_id == $menu->id) { ?>
                                        <tr class="treegrid-<?php echo $submenu->id; ?> treegrid-parent-<?php echo $menu->id; ?>">
                                            <td><i class="fa fa-file"></i> <?php echo $submenu->title; ?></td>
                                            <?php $i=1; foreach ($groups as $key => $group) { ?>
                                    <th ><div class="form-group"><input type="checkbox" class="icheckbox colcheckbox<?php echo $i;?> rowcheckbox<?php echo $j;?>" name="<?php echo $submenu->id; ?>[]" value="<?php echo $group->id; ?>" <?php echo getcheck($submenu->id,$group->id);?>></div></th >
                                    <?php $i++; } ?>
									<th><input type="checkbox" id="rowcheckbox<?php echo $j;?>"  class="rowbox" rel="<?php echo $j;?>"></th>
                                        </tr>
                                    <?php } ?>
                                <?php $i++; } ?>
                            <?php } ?>
                        <?php $j++; } ?>
						
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="panel-heading">
                                    <h3 class="panel-title"></h3>
                                    <div class="btn-group pull-left">
                                         <button type="submit" class="btn btn-info pull-right">
                <i class="fa fa-plus-circle"></i> <?php echo ('Update');?></button>
                                    </div>                                    
                                    
                                </div>
                                 
                </div>
            </div>
            <!-- END DATATABLE EXPORT --> 

        </div>
    </form>
    </div>
 </div>

</div>         
<!-- END PAGE CONTENT WRAPPER -->


<script>
 $(document).ready(function () {
    $(".colbox").click(function () {
     var id=$(this).attr('rel');
        $(".colcheckbox"+id).prop('checked', $(this).prop('checked'));
    });
});
 </script>
 <script>
 $(document).ready(function () {
	 
    $(".rowboxmain").click(function () {
		
     var id=$(this).attr('rel');
	// alert(id);
        $(".rowcheckboxmain"+id).prop('checked', $(this).prop('checked'));
    });
});
 </script>
 <script>
 $(document).ready(function () {
	 
    $(".rowbox").click(function () {
		
     var id=$(this).attr('rel');
	// alert(id);
        $(".rowcheckbox"+id).prop('checked', $(this).prop('checked'));
    });
});
 </script>