<div class="bannerSec clearfix globalClr">
  <?php $product=get_banner_separate($id=8);?>
    <div class="innerBanner"> <img src="<?php echo  base_url('assets/upload/banner_separate_image').'/'.$product->image?>" alt="<?php echo $product->pages_name;?>"/> </div>
</div>
<div class="main globalClr clearfix">
<!--<?php  print_r($product->page_description); ?>-->

  <div class="bradcamp clearfix">
    <div class="mainWrap">
      <ul>
        <li><a href="<?php echo base_url()?>" title="home">Home</a></li>
        <li title="Colors"><span>Colors</span></li>
      </ul>
    </div>
  </div>
  <div class="innerpg trustpg textCenter globalClr clearfix">
    <div class="mainWrap globalClr clearfix">
      <h1 class="mainh2">Colors</h1>
    </div>
    <div class="colorpage textCenter globalClr clearfix">
      <div class="mainWrap">
        <div class="colortabs">
          <input id="tab1" type="radio" name="tabs" checked>
          <label for="tab1">Available Colors</label>
          <input id="tab2" type="radio" name="tabs">
          <label for="tab2">Texture Design</label>
          <div class="colorContent">
            <div id="content1">
              <div class="colorImg">
			  <?php if(!empty($colors)){ 
			    foreach($colors as $color) {
			  ?>
              	<span><img src="<?php echo base_url('assets/upload/colors/').'/'.$color->image; ?>"  title="<?php echo $color->name ;?>" alt="<?php echo $color->name ;?>"/></span>
			  <?php }  } ?>
                
              </div>
            </div>
            <div id="content2">
              <div class="color2 colorImg">
              	 <?php if(!empty($designs)){ 
			    foreach($designs as $design) {
			  ?>
              	<span><img src="<?php echo base_url('assets/upload/colors/').'/'.$design->image; ?>"  title="<?php echo $design->name; ?>" alt="<?php echo $design->name; ?>"/></span>
			  <?php } } ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>