<div class="bannerSec clearfix globalClr">
   <?php $product=get_banner_separate($id=10);?>
    <div class="innerBanner"> <img src="<?php echo  base_url('assets/upload/banner_separate_image').'/'.$product->image?>" alt="<?php echo $product->pages_name;?>"/> </div>
</div>
<?php echo $product->page_description;?>

	<?php  //echo '<pre>';  print_r ($clients); die; ?>
	
	
	
    <div class="clientpage globalClr clearfix">
      <div class="mainWrap">
        <div class="clientSlider">
		  <?php if(!empty($clients)) {
				    $i=1;
                   foreach($clients as $client){  	 ?>

          <div class="clientCell">
			  <div class="clientitem">
              <div class="item"><img src="<?php if($client->image == ''){echo base_url('assets/admin/images/no_image.jpeg');}else{echo base_url('assets/upload/testimonial_image/'.$client->image);} ?>" alt="client" title= "<?php echo $client->name ; ?>"/></div>
               </div>
			 
        </div>
		 <?php $i++; } }?>
      </div>
    </div>
  </div>