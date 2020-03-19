<!--schedule lesson section-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="lesson-heading-title">
            <h2>Schedule a Lesson</h2>
          </div>
        </div>
        <div class="col-md-4">
          
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
            <a href="<?php echo base_url('module/'.$mentor->slug);?>"><button class="btn btn-primary profile-btn">Back</button></a>
        </div>
        <div class="col-md-8">
          <div class="schedule-right">
            <h4>What times during the week suit you best for lessons?</h4>
            <p>Propose some days of the week that suit you. We'll let the tutor know to help you both agree on the best time to schedule a lesson.</p>
            <form method="post" action="<?php echo base_url('home/payment');?>" id="slot_book">
            <table class="day--table table-responsive">
              <thead>
                <tr>
                    <th class="hidden-xs">
                    </th>
                    <th>
                        <span>Morning</span>
                    </th>
                    <th>
                      <span>Afternoon</span>
                    </th>
                    <th>
                      <span>Evening</span>
                    </th>
                </tr>
              </thead>
              <tbody>
                <!-- Monday -->
                <tr>
                  <td class="hidden-xs">
                    <span>MON</span>
                  </td>
                  <td>
                    <div class="AddCheckedWrapper">
                      <span>Monday<br>Morning</span>
                        <input type="checkbox" name="time_slots[]" value="mon-mor">
                    </div>
                  </td>
                  <td>
                    <div class="AddCheckedWrapper">
                      <span>Monday<br>Afternoon</span>
                        <input type="checkbox" name="time_slots[]" value="mon-aft">
                    </div>
                  </td>
                  <td>
                    <div class="AddCheckedWrapper">
                      <span>Monday<br>Evening</span>
                        <input type="checkbox" name="time_slots[]" value="mon-eve">
                    </div>
                  </td>
                </tr>
                <!-- Tuesday -->
                <tr>
                <td class="hidden-xs">
                  <span>TUE</span>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Tuesday<br>Morning</span>
                  <input type="checkbox" name="time_slots[]" value="tue-mor">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Tuesday<br>Afternoon</span>
                  <input type="checkbox" name="time_slots[]" value="tue-aft">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Tuesday<br>Evening</span>
                  <input type="checkbox" name="time_slots[]" value="tue-eve">
                  </div>
                </td>
                </tr>
                <!-- Wednesday -->
                <tr>
                <td class="hidden-xs">
                  <span>WED</span>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Wednesday<br>Morning</span>
                  <input type="checkbox" name="time_slots[]" value="wed-mor">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Wednesday<br>Afternoon</span>
                  <input type="checkbox" name="time_slots[]" value="wed-aft">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Wednesday<br>Evening</span>
                  <input type="checkbox" name="time_slots[]" value="wed-eve">
                  </div>
                </td>
                </tr>
                <!-- Thursday -->
                <tr>
                <td class="hidden-xs">
                  <span>THU</span>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Thursday<br>Morning</span>
                  <input type="checkbox" name="time_slots[]" value="thu-mor">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Thursday<br>Afternoon</span>
                  <input type="checkbox" name="time_slots[]" value="thu-aft">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Thursday<br>Evening</span>
                  <input type="checkbox" name="time_slots[]" value="thu-eve">
                  </div>
                </td>
                </tr>
                <!-- Friday -->
                <tr>
                <td class="hidden-xs">
                  <span>FRI</span>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Friday<br>Morning</span>
                  <input type="checkbox" name="time_slots[]" value="fri-mor">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Friday<br>Afternoon</span>
                  <input type="checkbox" name="time_slots[]" value="fri-aft">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Friday<br>Evening</span>
                  <input type="checkbox" name="time_slots[]" value="fri-eve">
                  </div>
                </td>
                </tr>
                <!-- Saturday -->
                <tr>
                <td class="hidden-xs">
                  <span>SAT</span>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Saturday<br>Morning</span>
                  <input type="checkbox" name="time_slots[]" value="sat-mor">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Saturday<br>Afternoon</span>
                  <input type="checkbox" name="time_slots[]" value="sat-aft">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Saturday<br>Evening</span>
                  <input type="checkbox" name="time_slots[]" value="sat-eve">
                  </div>
                </td>
                </tr>
                <!-- Sunday -->
                <tr>
                <td class="hidden-xs">
                  <span>SUN</span>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Sunday<br>Morning</span>
                  <input type="checkbox" name="time_slots[]" value="sun-mor">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Sunday<br>Afternoon</span>
                  <input type="checkbox" name="time_slots[]" value="sun-aft">
                  </div>
                </td>
                <td>
                  <div class="AddCheckedWrapper">
                  <span>Sunday<br>Evening</span>
                  <input type="checkbox" name="time_slots[]" value="sun-eve">
                  </div>
                </td>
                </tr>
              </tbody>
            </table>
            
              <div class="clear-btn">
                <a href="#">Clear selection</a>
                
              </div>
              <div class="next-btn">
                 <input type="hidden" name="time_slots_book" id="time_slots_book" value="">
                 <input type="hidden" name="mentor_id" id="" value="<?php echo $mentor->mentor_id;?>">
              <button type="submit" class="btn btn-primary profile-btn">Next</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--end of schedule lesson-->
    <style type="text/css">
.day--table td > div input{
  z-index: 2;
cursor: pointer;
width: 188px;
height: 56px;
opacity: 0;
position: absolute;
display: block;
}

.AddCheckedWrapper.checked {
  background-color: #31a6dc;
}
    </style>
 <script type="text/javascript">
    $('.AddCheckedWrapper :checkbox').change(function() {
  $(this).closest('.AddCheckedWrapper').toggleClass('checked', this.checked);

    var time_slot = document.getElementsByName('time_slots[]');
    var len = time_slot.length;
        time_slots =''; 
        for (i=0 ;i<len; i++){ 
          if(time_slot[i].checked == true) {
           if (time_slots ==''){
            time_slots=time_slot[i].value; 
          }else {
           time_slots = time_slots+','+time_slot[i].value;
            }
          } 
        }

        $('#time_slots_book').val(time_slots);



});



    jQuery(function ($) {
    //form submit handler
    $('#slot_book').submit(function (e) {
        //check atleat 1 checkbox is checked
        var arrCheckboxes = document.getElementsByName('time_slots[]');
        var checkCount = 0;
    for (var i = 0; i < arrCheckboxes.length; i++) {
        checkCount += (arrCheckboxes[i].checked) ? 1 : 0;
    }

    if (checkCount < 2){
       
        alert('Atlist two slot select.');
           e.preventDefault();   
         } 

    })
})
</script>