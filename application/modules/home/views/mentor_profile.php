<!--profile section-->
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="profile-left">
            <div class="profile-image">
              <img class="img-circle" style="width: 251px;" src="<?php if(!empty($mentor->image)) { echo base_url('assets/upload/mentor/'.$mentor->image); } else{ echo base_url('assets/upload/mymentorship/'.$mentor->mymeberimage); } ?>">
            </div>
            <div class="price-sec">
              <div class="price-heading">Lesson Price</div>
              <div class="price-description">
                <ul>
                  <li>€<?php echo number_format($mentor->price,2);?></li>
                  <!-- <li>Group lesson price: €26</li> -->
                </ul>
              </div>
            </div>
            <?php if($this->session->userdata('student_logged_frontend') == TRUE){ ?>
           
              <input type="hidden" value="<?php echo $mentor->mentor_id;?>" name="mentor_id">
              <input type="hidden" value="<?php echo $mentor->mymeberid;?>" name="mymentershipId">
       
              <a href="<?php echo base_url('booking/module/'.$mentor->mymeberid.'?group_lesson=false');?>"><button class="btn btn-primary profile-btn">Book 1-1 Lesson</button></a>
           
             <!--  <a href="schedule-lesson.html"><button class="btn btn-primary profile-btn">Book Group Lesson</button></a> -->
              <button class="btn btn-primary profile-btn" data-toggle="modal" data-target="#myModal">Message</button>
              <?php }else{ ?>
               <a href="<?php echo base_url('student-login');?>"><button class="btn btn-primary profile-btn">Book 1-1 Lesson</button></a>
              
              <?php } ?>
            <div class="profile-star">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="price-heading">Reviews</div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="profile-right">
            <div class="col-md-10">
              <div class="profile-user-name">
                <h2><?php echo $mentor->fullname;?></h2>
              </div>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary profile-btn btn-2">Favourite</button>
            </div>
          </div>
          <div class="col-md-12">
            <p>
              <ul>
                <li><?php echo get_city_name($mentor->city_id);?> City  <?php echo get_university_name($mentor->university_id);?></li>
                <li><?php echo get_cat_name($mentor->mymember_category_id);?></li>
              </ul>
            </p>
          </div>
          <div class="col-md-12">
            <div class="price-heading biography">Biography & Experience</div>
            <div class="biography-details">
            <p><?php echo $mentor->bio;?></p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="price-heading biography">Modules I'm Tutoring</div> 
            <div class="price-heading biography module module-data">
              <?php $modulesalls= get_modules_profile($mentor->mymeberid);?>
              <?php foreach ($modulesalls as $modulesall) : ?>
              
              <div class="col-md-4 p-0"><?php echo $modulesall->module_name;?></div>
            <?php endforeach;?>
            </div>
            
          </div>
          <div class="col-md-12">
            <div class="price-heading biography other-tutor">Other Tutors Like <?php echo get_cat_name($mentor->mymember_category_id);?></div>
          
          <!--other tutor section-->
          <?php  $category_module=get_category_module($mentor->mymember_category_id,$mentor->mentor_id);?>
           <?php if(!empty($category_module)) { ?>
           <?php foreach ($category_module as $mentor) : ?>
             <div class="col-md-4 m-50">
            <div class="profile-sec">
              <div class="profile-cover"></div>
              <div class="profile-picture">
                <img class="img-circle" src="<?php if(!empty($mentor->image)) { echo base_url('assets/upload/mentor/'.$mentor->image); } else{ echo base_url('assets/upload/mymentorship/'.$mentor->mymeberimage); } ?>">
              </div>
              <div class="title-name">
                <h4>
                  <?php echo $mentor->fullname;?>
                    <a data-tooltip="This tutor typically responds in under 30 minutes">
                      <i class="fa fa-bolt avg-response-time-bolt" aria-hidden="true"></i>
                    </a>
                </h4>
                <p> <?php echo get_city_name($mentor->city_id);?> City  <?php echo get_university_name($mentor->university_id);?></p>
                <p><?php echo get_modules_count($mentor->mymeberid);?> modules including <?php echo get_cat_name($mentor->mymember_category_id);?></p>
                <div class="rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p><i class="fa fa-check-square" style="color:#31A6DC;" aria-hidden="true"></i>
Verified by Visebox</p>
                <ul class="panel-menu">
                  <li class="panel-menu-item">
                    <span class="text-inherit1">
                    Modules
                    <h5 class="m-y-0"><?php echo get_modules_count($mentor->mymeberid);?></h5>
                    </span>
                  </li>

                  <li class="panel-menu-item">
                    <span class="text-inherit1">
                    Price
                    <h5 class="m-y-0 nobr"><?php echo '€'.number_format($mentor->price,2);?></h5>
                    </span>
                  </li>
                </ul>
                <div class="profile-btm">
                    <span class="view"><a href="<?php echo base_url('module/'.$mentor->slug);?>" target="_blank">view profile</a></span>
                    <span class="view"><a href="#">message</a></span>
                  </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>
<?php } else { ?>
         <div class="alert alert-info m-top" role="alert">no any related tutors.
          </div>
          <?php } ?>
         
         
        </div>
        </div>

      </div>

        </div>

    <!--end of profile-->


    <!--popup code-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-header-1">
          <button type="button" class="close" data-dismiss="modal">Close</button>
         <!-- <h4 class="modal-title">Modal Header</h4>-->
        </div>
        <div class="modal-body">
      <div class="msg-body">
        <ul>
          <li class="txt-2">hi</li>
          <li class="text-1">hi</li>
          <li class="txt-2">what's going on</li>
          <li class="text-1">all is well</li>
          <li class="txt-2">hi</li>
          <li class="txt-2">hi</li>
        </ul>
      </div>
        </div>
        <div class="modal-footer modal-footer-1">
    <input type="text" class="form-control popup-1 input-height" id="name" placeholder="Type Your Message...">
          <button type="button" class="btn btn-primary popup-btn" >Send Message</button>
        </div>
      </div>
      
    </div>
  </div>
  
