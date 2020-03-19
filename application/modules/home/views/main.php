<!--slider-->
        <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Third Slide -->
                <?php $banners=get_banner();?>
                 <?php  
                        $active=true; 
                         
                            foreach($banners as $banner) {  
                        ?>
                <div class="item <?php if($active==true) echo 'active'; else echo ''; ?>">

                    <!-- Slide Background -->
                    <img src="<?php echo base_url('assets/upload/banner').'/'.$banner->image;?>" alt="<?php echo $banner->title;?>"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_center">
                                <h1 data-animation="animated zoomInRight"><?php echo $banner->description;?></h1>
                                <p data-animation="animated fadeInLeft">Choose a mentor that suits you. Pay as you go.</p>
                               

                            </div>
                        </div>
                    </div>
                </div>
                <?php $active=false; } ?>
                <!-- End of Slide -->

            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End of Slider -->
    <!--search box-->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="outer-form-search">
              <form action="<?php echo base_url('search');?>" method="POST">
               <span class="text1">Search for Mentors</span>
               <input type="text" name="mentor_keyword" class="text-search-home" placeholder="   Search for Advice topics">
              <!--dropdown for city-->
              <select class="select-brdr" id="city_id" name="city_id">
                <option value="" selected disabled>Select Topic</option>
               <?php $citys=get_citys();
                      foreach ($citys as $city) : ?>

                       <option value="<?php echo  $city->id;?>"><?php echo  $city->city_name;?></option>
                     <?php endforeach;?>
                        
              </select>
              <!--dropdown for university-->
              <select class="select-brdr" id="university_id" name="university_id">
                <option value="" selected disabled>Select Location</option>
                
              </select>
          
               <button class="btn-diplomat btn-find btn- waves-effect waves-light" type="submit"><div class="search-title"><span class="text-search">Search</span></div></button>
         </form>
        </div>
          </div>
        </div>
      </div>
    <!--end of searchbox-->

        <section id="features" class="features sections">
            <div class="container">
                <div class="row">
                    <div class="main_features_content2">


                        <div class="col-sm-12 margin-top-60">
                            <div class="single_features_right ">
                                <h2>What is <span class="vise">Visebox ?</span></h2>
                <div class="border-btm"></div>
                                <p>Visebox lets you speak to people that have done what you aspire to do. For when you want to speak to someone that has "been there and done that" before, For things like starting a business, studying a degree or moved to a new city. You can become a mentor on Visebox and Earn Money. For starting a business, career advice, succeeding in sport or even moving to a new city our Mentors can give you the advice and inspiration to succeed.</p>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section><!--End of Features 2 Section -->
    <!--mentor section-->
        <section  class="features-1">
            <div class="container">
                <div class="row">
                    <div class="container">
            <div class="col-md-12">
              <h6 class="mentor-title">Mentor List</h6>
            </div>  
          </div>
          <?php $mentorLists=get_mentorList_home();?>
          <?php foreach ($mentorLists as $mentor) : ?>
        
          <div class="col-md-3">
            <div class="mentor-sec">
                <div class="mentor-img">
                 <img class="img-circle" src="<?php if(!empty($mentor->image)) { echo base_url('assets/upload/mentor/'.$mentor->image); } else{ echo base_url('assets/upload/mymentorship/'.$mentor->mymeberimage); } ?>">
                </div>
                <div class="mentor-title1">
                    <h6 class="text-center" style="color: #31a6dc;"><?php echo $mentor->fullname;?></h6>
                   
                  </div>
                  <div class="mentor-title1">
                    
                    <h6><?php echo get_city_name($mentor->city_id);?> City  <?php echo get_university_name($mentor->university_id);?></h6>
                  </div>
                    <div class="mentor-auth">
                      <span><?php echo get_cat_name($mentor->mymember_category_id);?></span>
                    </div>
                      <div class="item-price">
                        <span class="start-price-title">Starting from:</span>
                        <span class="start-price-amt"><?php echo number_format($mentor->price,2);?><sup>€</sup></span>
                      </div>
                        <div class="mjob-item__bottom clearfix">
                                <div class="mjob-item__rating" style="float: right; padding: 15px 10px;">
                            <div class="rate-it star" data-score="0" title="Not rated yet!" style="float: left;">
                              <i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                              <i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                              <i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                              <i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                              <i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>
                              <input name="score" type="hidden" readonly="">
                            </div>
                            <span class="total-review">(0)</span></div>
                          </div><!-- end .mjob-item__ratings -->
                      <div class="mentor-btm">
                        <span class="view"><a href="<?php echo base_url('module/'.$mentor->slug);?>">view profile</a></span>
                        <span class="view"><a href="#">message</a></span>
                      </div>
              </div>
          </div>
         
          <?php endforeach;?>
            
          </div>
                </div>
            
        </section><!--End of mentor section -->
    <!--why section-->
    <div class="container">
      <div class="row">
        <div class="col-md-12 margin-top-60">
          <div class="top-heading">
            <h2>Why <span class="vise">Visebox ?</span> </h2>
            <div class="border-btm"></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="content-sec">
            <div class="content-sec-img">
              <img src="<?php echo base_url('assets/front')?>/images/why-icon-1.png">
            </div>
            <div class="why-title">
              <p class="para-title">Security</p>
              <p>We use Paypal for secure payments. Mentorship sessions are private can only be viewed by you and your Mentor.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="content-sec">
            <div class="content-sec-img">
              <img src="<?php echo base_url('assets/front')?>/images/why-icon-2.png">
            </div>
            <div class="why-title">
              <p class="para-title">Earn Money</p>
              <p>Mentors Earn Money on Visebox. Become a Mentor.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="content-sec">
            <div class="content-sec-img">
              <img src="<?php echo base_url('assets/front')?>/images/why-icon-3.png">
            </div>
            <div class="why-title">
              <p class="para-title">Community</p>
              <p>Connect and Communicate with like minded people. Learn from them to help you do what you want to do.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--join section-->
       <section class="join-us">
      <div class="container">
        <div class="new-signup">
          <p class="new-signup-title">Join Now</p>
          <p class="sub-title">Thank you for showing interest in Visebox</p>
         <a class="btn btn-primary btn-new" href="<?php echo base_url('mentor-register');?>">BECOME A MENTOR<span class="r-icon"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
         </div>
      </div>
     </section>    
     <!--end of join section-->


     <script type="text/javascript">
     $(document).ready(function() {  
    $("#city_id").change(function(){ 
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo  
                        base_url();?>home/GetAllUniversityHome",  
                        data: {city_id:  
                           $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#university_id").html(data);  
                     }  
                  });  
               });  
            }); 

     </script>