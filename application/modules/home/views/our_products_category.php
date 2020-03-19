 <div class="bannerSec clearfix globalClr">
 <?php $product=get_banner_separate($id=5);?>
    <div class="innerBanner"> <img src="<?php echo  base_url('assets/upload/banner_separate_image').'/'.$product->image?>" alt="<?php echo $product->pages_name;?>"/> </div>
  </div>
  <div class="main globalClr clearfix">
   <?php  print_r($product->page_description); ?>
    
    <div class="product product1 globalClr clearfix">
      <div class="mainWrap">
        <div class="productbox globalClr clearfix">
		 <?php if(!empty($categorys)){
              foreach($categorys as $category)   {
          ?>
          <div class="productBox">
            <div class="productimg">
              <div class="zoomImg"> <a href="<?php echo base_url('our-product').'/'.$category->slug ?>"><img src="<?php if(!empty($category->image)){ echo base_url('assets/upload/category_image/'.$category->image) ;} ?>" alt="<?php echo $category->name  ?>" title="<?php echo $category->name  ?>"/></a> </div>
            </div>
            <h2 class="featurname"><a href="<?php echo base_url('our-product').'/'.$category->slug ?>"><?php  echo $category->name ?></a></h2>
            <a href="<?php echo base_url('our-product').'/'.$category->slug ?>" class="btnboder" title="view products">view products</a>
		  </div>
		 <?php  } } ?>
        </div>
      <!--  <div class="pagination globalClr clearfix">
          <ul class="pageno">
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"> <a class="page-link" href="#">2 </a> </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item last"><a class="page-link" href="#">4</a></li>
          </ul>
        </div>  -->
      </div> 
    </div>
  </div>