
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
							<th><input type="checkbox" onclick="rowcheckbox(<?php echo $i;?>)"></th>
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
                        <?php foreach ($menus as $key => $menu) { ?>
                            <?php if ($menu->parent_id == 0) { ?>
                                <tr class="treegrid-<?php echo $menu->id; ?>">

                                    <th ><i class="fa fa-folder-open"></i> <?php echo $menu->title; ?></th>
                                    <?php $i=1; foreach ($groups as $key => $group) { ?>
                                    <th ><div class="form-group"><input type="checkbox" class="icheckbox rowcheckbox<?php echo $i;?>" name="<?php echo $menu->id; ?>[]" value="<?php echo $group->id; ?>" <?php echo getcheck($menu->id,$group->id);?>></div></th >
                                    <?php $i++; } ?>
									<th><div class="form-group"><input id="selectall" type="checkbox"></div></th>
                                </tr>
                                
                               
                                   <!-- Loop submenu -->
                                <?php $i=1; foreach ($menus as $key => $submenu) { ?>
                                    <?php if ($submenu->parent_id == $menu->id) { ?>
                                        <tr class="treegrid-<?php echo $submenu->id; ?> treegrid-parent-<?php echo $menu->id; ?>">
                                            <td><i class="fa fa-file"></i> <?php echo $submenu->title; ?></td>
                                            <?php foreach ($groups as $key => $group) { ?>
                                    <th ><div class="form-group"><input type="checkbox" class="icheckbox rowcheckbox<?php echo $i;?>" name="<?php echo $submenu->id; ?>[]" value="<?php echo $group->id; ?>" <?php echo getcheck($submenu->id,$group->id);?>></div></th >
                                    <?php } ?>
									<th><div class="form-group"><input value="" type="checkbox" id="selectall"></div></th>
                                        </tr>
                                    <?php } ?>
                                <?php $i++; } ?>
                            <?php } ?>
                        <?php } ?>
						
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

<script type="text/javascript">
    function rowcheckbox(checkId){
		
        var inputs = document.getElementsByClassName("rowcheckbox"+checkId);
        for (var i = 1; i < inputs.length; i++) { 
            if (inputs[i].type == "checkbox" && inputs == checkId) { 
                if(inputs[i].checked == true) {
                    inputs[i].checked = false ;
                } else if (inputs[i].checked == false ) {
                    inputs[i].checked = true ;
                }
            }  
        }  
    }
</script>
 