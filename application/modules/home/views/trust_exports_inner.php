 <div class="bannerSec clearfix globalClr">
    <div class="innerBanner"> <img src="<?php echo base_url('assets/front') ?>/images/trustexports.jpg" alt="banner"/> </div>
  </div>
  <div class="main globalClr clearfix">
    <div class="bradcamp clearfix">
      <div class="mainWrap">
        <ul>
          <li><a href="<?php echo base_url() ?>" title="home">Home</a></li>
          <li><a href="<?php echo base_url('trust-export') ?>" title="Trust Paint & Exports">Trust Paint & Exports</a></li>
          <li title="Sierra Motors"><span><?php  echo $exports->title; ?></span></li>
        </ul>
      </div> 
	  <?php  //print_r($exports); die; ?>
    </div>
    <div class="innerpg trustpg textCenter globalClr clearfix">
      <div class="mainWrap globalClr clearfix">
        <h1 class="mainh2">Trust Paint & Trust Exports</h1>
        <p class="black">TRUST is divided into two parts:</p>
        <span class="subhd2">TRUST PAINTS: Paints Manufacturer and Supplier  |  TRUST EXPORT: Shipping and Trading</span> </div>
    </div>
    <div class="trustinn globalClr clearfix">
      <div class="mainWrap">
        <div class="trustInn globalClr clearfix">
          <div class="trustlt leftCls">
            <div class="exportbox textCenter">
              <div class="export" title="<?php  echo $exports->title; ?>">
                <div class="exportin">
                  <h4><?php  echo $exports->title; ?></h4>
                  <p><?php  echo $exports->sub_title; ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="trustrt textJustify rightCls">
		   <p><?php  echo $exports->discription; ?>  </p>
            <a title="Add Back"href="<?php echo base_url('trust-export'); ?>" class="margin30">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>