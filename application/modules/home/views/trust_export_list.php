<div class="bannerSec clearfix globalClr">

    <?php $product=get_banner_separate($id=7);?>
    <div class="innerBanner"> <img src="<?php echo  base_url('assets/upload/banner_separate_image').'/'.$product->image?>" alt="<?php echo $product->pages_name;?>"/> </div> </div>
  <div class="main globalClr clearfix">
  <?php  print_r($product->page_description); ?>
   
    <div class="trustpage globalClr clearfix">
    	<div class="mainWrap">
        <div class="trustPage textCenter globalClr clearfix">
		<?php if(!empty($exports)){
            foreach($exports  as $export){  ?>
          <div class="exportbox">
            <div class="export" title="<?php  echo $export->title; ?>">
              <div class="exportin">
                <h2><?php  echo $export->title; ?></h2>
                <p><?php  echo $export->sub_title; ?></p>
                <a href="<?php echo base_url('trust-export').'/'.$export->slug  ?>" class="plusicon">+</a> </div>
            </div>
          </div>
		<?php } } ?>
		</div>
        </div>
    </div>
  </div>