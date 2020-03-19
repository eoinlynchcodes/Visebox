 <div class="bannerSec clearfix globalClr">
 
    <div class="innerBanner"> <img src="<?php echo base_url('assets/front') ?>/images/products2ban.jpg" alt="banner"/> </div>
  </div>
  <div class="main globalClr clearfix">
    <div class="bradcamp clearfix">
      <div class="mainWrap">
        <ul>
          <li><a href="<?php echo base_url() ?>" title="home">Home</a></li>
          <li title="Our Products"><a href="<?php echo base_url('our-product') ?>">Our Products </a></li>
          <li title="Exterior"><span><?php echo $slug ?></span></li>
        </ul>
      </div>
    </div>
    <div class="innerpg textCenter globalClr clearfix">
      <div class="mainWrap globalClr clearfix">
        <h1 class="mainh2"><?php echo $slug ?> Products</h1>
      </div>
    </div>
    <div class="productInner globalClr clearfix">
      <div class="mainWrap">
	    <?php if(!empty($products)){
              foreach($products as $product){
		?>
        <div class="prodbox globalClr clearfix">
          <div class="prodlt leftCls">
            <div class="productimg">
			 <div class="zoomImg"> <a href="<?php echo base_url('product').'/'.$product->product_slug  ?>"><img src="<?php if(!empty($product->image)){ echo base_url('assets/upload/product/'.$product->image) ;} ?>" alt="<?php echo $product->product_name ?>" title="<?php echo $product->product_name  ?>"/></a> </div>
             
            </div>
          </div>
          <div class="prodrt rightCls">
            <h2 class="featurname"><a title="<?php echo $product->product_name  ?> "href="<?php echo base_url('product').'/'.$product->product_slug  ?>"><?php echo $product->product_name  ?></a></h2>
            <div class="prodText"><?php echo $product->description  ?></div>
            <a href="<?php echo base_url('product').'/'.$product->product_slug  ?>" class="btnboder" title="view details">view details</a> </div>
        </div>
		<?php }} ?>
	
      </div>
    </div>
  </div>