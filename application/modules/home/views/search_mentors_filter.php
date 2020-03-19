
         <?php if(!empty($mentors)) { ?>
          <?php foreach ($mentors as $mentor) : ?>
         
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
                <p>Fully Verified by Visebox</p>
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
         <div class="alert alert-info m-top" role="alert">no any matching record.
          </div>
          <?php } ?>
      