 <div class="bannerSec clearfix globalClr">
    <?php $product=get_banner_separate($id=11);?>
    <div class="innerBanner"> <img src="<?php echo  base_url('assets/upload/banner_separate_image').'/'.$product->image?>" alt="<?php echo $product->pages_name;?>"/> </div>
  </div>
  <div class="main globalClr clearfix">
    <div class="bradcamp clearfix">
      <div class="mainWrap">
        <ul>
          <li><a href="<?php echo base_url();  ?>" title="home">Home</a></li>
          <li title="sitemap"><span>sitemap</span></li>
        </ul>
      </div>
    </div>
    <div class="innerpg trustpg textCenter globalClr clearfix">
      <div class="mainWrap globalClr clearfix">
        <h1 class="mainh2">sitemap</h1>
      </div>
    </div>
    <div class="sitemap globalClr clearfix">
      <div class="mainWrap globalClr clearfix">
        <ul class="allUl site1 leftCls">
          <li title="Home"><a href="<?php echo base_url();  ?>">Home</a></li>
		  <li title="Products/solutions"  class="subli"><a href="<?php echo base_url('our-product'); ?>">Products/solutions <span class="arrowOpen"></span></a></li>
        
          <div class="listCont globalClr clearfix">
              <ul class="leftCls">
			  <?php  $cats= get_cat();	 
			  if(!empty($cats)){
              foreach($cats as $cat){ ?>
              <li title="<?php echo $cat->name; ?>"><a href="<?php echo base_url('our-product').'/'.$cat->slug ?>"><?php echo $cat->name; ?> </a></li>
			  <?php } }?>

              </ul>
            </div> 
          </li>
        </ul>
        <ul class="allUl site1 site2 leftCls">
          <?php $menu=get_cms();
			       if(!empty($menu)){
				  foreach ($menu as $key) { ?>
				<li <?php if(current_url()==base_url(''.$key->slug)) {echo 'class="active"';}  ?> title="<?php echo $key->page_title;?>"><a href="<?php echo base_url(''.$key->slug); ?>"><?php echo $key->page_title;?> </a></li> 
				   <?php } }?>
			  
           
        </ul>
        <ul class="allUl site1 rightCls">
          
              <li title="Trust Export" <?php if(current_url()==base_url('trust-export')) {echo 'class="active"';}  ?> ><a href="<?php echo base_url('trust-export'); ?>">Trust Export</a></li>
              <li title="Colors" <?php if(current_url()==base_url('colors')) {echo 'class="active"';}  ?>><a href="<?php echo base_url('colors'); ?>">Colors</a></li>
              <li title="Paint Your Space" <?php if(current_url()==base_url('paint-your-space')) {echo 'class="active"';}  ?>><a href="<?php echo base_url('paint-your-space'); ?>">Paint Your Space</a></li>
        </ul>
      </div>
    </div>
  </div>