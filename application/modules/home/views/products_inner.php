 <div class="bannerSec clearfix globalClr">
    <div class="innerBanner"> <img src="<?php echo base_url('assets/front') ?>/images/products2ban.jpg" alt="banner"/> </div>
  </div>
  <?php //echo'<pre>';print_r($products);?>
  <div class="main globalClr clearfix">
    <div class="bradcamp clearfix">
      <div class="mainWrap">
        <ul>
          <li><a href="<?php echo base_url() ?>" title="home">Home</a></li>
          <li title="Our Products"><a href="<?php echo base_url('our-product') ?>">Our Products </a></li>
          <li title="Exterior"><a href="<?php echo base_url('our-product').'/'.$products->category_slug ?>" title="Exterior"><?php echo $products->category_slug ; ?></a></li>
          <li title="<?php echo $products->product_name ; ?>"><span> <?php echo $products->product_name ; ?></span></li>
        </ul>
      </div>
    </div>

    <div class="innerpg textCenter globalClr clearfix">
      <div class="mainWrap globalClr clearfix">
        <h1 class="mainh2"><?php echo $products->category_slug ; ?> Products</h1>
      </div>
    </div>
    <div class="product3page globalClr clearfix">
      <div class="mainWrap">
        <div class="product3fst globalClr clearfix">
          <div class="productlt textCenter leftCls">
            <div class="productImg">
			<?php $available_color=explode(',',$products->available_color);?>
			
              <div class="zoomImg"> <img src="<?php if(!empty($products->image)){ echo base_url('assets/upload/product/'.$products->image) ;} ?>" alt="<?php echo $products->product_name ; ?>"   title="<?php echo $products->product_name ; ?>"/> </div>
            </div>
			<?php if(!empty($products->catalogue)){ ?>
          <a href="<?php echo  base_url('assets/upload/product_catalogue').'/'.$products->catalogue ; ?>" title="Download Catalogue" class="btndow"><img src="<?php echo base_url('assets/front') ?>/images/downBtn.png" alt="Download Catalogue"/></a> 
			<?php } ?>
		 </div> 
          <div class="productrt rightCls">
            <h2 class="productname"><?php echo $products->product_name ; ?></h2>
            <span class="productsub"><?php echo $products->sub_title; ?></span>
            <p class="textJustify"><?php echo $products->description ?>  </p>
			<h3 class="productname nogap">Packing:</h3>
            <p><strong><?php echo $products->packing ?> </strong></p>
            <h3 class="productname nogap"> COLORS AVAILABLE:</h3>
            <ul class="allUl chosetr">
			<?php

				foreach($available_color as $available_colors){ 
			$productavailable_color=get_product_available_colors($available_colors);?>
              <li><a href="#"><img src="<?php if(!empty($productavailable_color->cimage)){ echo base_url('assets/upload/colors/'.$productavailable_color->cimage) ;} ?>" alt="<?php echo $productavailable_color->name ?>" title="<?php echo $productavailable_color->name ?>"/></a></li>
				<?php } ?>
            </ul>
			  <a title="Add Back"href="<?php echo base_url('our-product').'/'.$products->category_slug ?>"  class="btnboder" title="Back">Back</a>
          </div>
        </div>
        <div class="producttabs globalClr clearfix">
          <div id="horizontalTab">
            <ul class="resp-tabs-list">
              <li>Technical Characteristics</li>
              <li>Advised Consumption</li>
              <li>Instruction For Use</li>
            </ul>
            <div class="resp-tabs-container">
              <div>
                <div class="tableSection">
                <p> <?php echo $products->technical_description ?> </p>
                </div>
              </div>
              <div>
                <div class="tabbroder">
                  <p>   <?php echo $products->advised_description ?> </p>
				 </div>
              </div>
              <div>
                <div class="tableSection">
                 <p> <?php echo $products->instruction_discription ?> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="produgal textCenter globalClr clearfix">
          <h3>MONOCOUCHE Gallery</h3>
          <div class="gallery">
            <div class="gallerySlide">
			 <?php $gallery = get_gallery($products->product_id);
               if(!empty($gallery)){
			  foreach($gallery as $galery ){    ?>
	         <div class="gallerybox">
                <div class="galleryimg">
                  <div class="zoomImg"> <a class="fancybox" rel="group" href="<?php echo base_url('assets/upload/gallery/'.$galery->image); ?>"><img src="<?php echo base_url('assets/upload/gallery/'.$galery->image); ?>" alt="<?php echo $galery->title; ?>" title="<?php echo $galery->title; ?>"/></a> </div>
                </div>
              </div>
			
				   <?php } } ?> 

            </div>
          </div>
        </div>
        <div class="relatedpro globalClr clearfix">
        <h3>Related products</h3>
        	<div class="realBox textCenter globalClr clearfix">
            	<div class="realSldier1">
              
				  <?php $releteds=get_releted_product($products->category_slug,$products->product_id);
                        if(!empty($releteds)){
							 foreach($releteds as $releted) {
				  ?>
					<div class="reabox">
					<div class="featurimg">
					<div class="zoomImg"> <a href="<?php echo base_url('product').'/'.$releted->product_slug ;  ?>"><img src="<?php if(!empty($releted->image)){ echo base_url('assets/upload/product/'.$releted->image) ;} ?>" alt="Feature Img"></a> </div>
					</div>
					<h4 class="featurname"><a href="<?php echo base_url('product').'/'.$releted->product_slug  ;?>"><?php echo $releted->product_name ; ?></a></h4>
					<div class="featur">
					<p><?php echo $releted->sub_title; ?></p>
					</div>
					<a href="<?php echo base_url('product').'/'.$releted->product_slug  ;?>" class="btnboder" title="view more">view more</a> 
					</div>
						<?php } } ?>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>