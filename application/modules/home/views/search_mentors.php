<div class="container">
      <div class="row">
        <div class="col-md-12 margin-top-60">
        
          <h2 span class="vise-1">Search Results</h2>
          <div class="border-btm"></div>
        </div>
        
      </div>
    </div>
<div class="container-fluid">
      <div class="row">
        <div class="col-md-3 m-50">
            <div class="grop-item">
              <p>We've found <strong><?php echo count($mentors);?></strong> verified tutors that match your search.</p>

            </div>

    <!-- Filter html-->
            <div class="filter-heading">
              <div class="filter-title">Filter Results</div>
                <div class="search-body">
                    <div class="form-group">
                       <label for="course">Category</label></br>
                      <select class="form-control" id="category_id" name="category_id" onchange="listing();">
                          <option  value="">Select Category</option>
                          <?php  $categorys= get_cat(); 
                          //print_r($courses);die;
                           foreach($categorys as $category){ ?>
                          <option  value="<?php echo $category->category_id; ?>"><?php echo $category->name; ?></option>
                             <?php }?>
                      </select>
                    </div>
                     <!-- <div class="form-group ">
                      <label for="course">Module</label></br>
                        <select class="form-control " id="module_id" name="module_id" onchange="listing();">
                          <option  value="" >Select Module</option>
                        </select>
                      </div> -->
                     <div class="form-group">
                      <label for="country_id">Country</label>
                      <select class="form-control" id="country_id" name="country" onchange="listing();">
                        <?php $countrys=get_country_by();?>
                          <option value="">Select country</option>
                        <?php foreach ($countrys as $country) : ?>
                        
                          <option value="<?php echo $country->id;?>"><?php echo $country->country_name;?></option>

                        <?php endforeach;?>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="city_id">City</label>
                      <select class="form-control" id="city_id" name="city" onchange="listing();">
                        <option value="">Select city</option>
                         <?php $citys=get_city();?>
                        
                        <?php foreach ($citys as $city) : ?>
                        
                          <option value="<?php echo $city->id;?>" <?php if($city->id==$city_id) echo 'selected';?> ><?php echo $city->city_name;?></option>

                        <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="university_id">University</label>
                      <select class="form-control" id="university_id" name="university" onchange="listing();">
                       
                         <?php $universitys=get_university();?>
                          <option value="">Select universitys</option>
                        <?php foreach ($universitys as $university) : ?>
                        
                          <option value="<?php echo $university->id;?>" <?php if($university->id==$university_id) echo 'selected';?> ><?php echo $university->university_name;?></option>

                        <?php endforeach;?>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="name">Price €1 - €10000</label>        
                    </div>
                    <div id="slidecontainer">
                      <input type="range" min="1" max="10000" name="range" value="2500" class="slider" id="price_range" onchange="listing();">
                    <output for="range" class="output">2500.00 €</output>
                     <!--  <input type="range" name="range" min="1" max="10000" value="1" class="slider"  id="price_range"  onchange="listing();">
                      <output for="range" class="output"></output> -->
                    </div>
                    <!-- <div class="show-tutor">
                      <button class="btn btn-primary tutor-show">Show Tutors</button>
                    </div> -->
                  
                </div>
            </div>

    <!-- Filter html-->

        </div>
        <div class="col-md-9" id="filter">
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
         <div class="alert alert-info m-top" role="alert">no any matching record.
          </div>
          <?php } ?>
        </div>
        
      </div>
    </div>
    <div class="container-fluid">
      <div class="col-md-9 col-md-offset-3">
        <ul class="pagination pagination-lg">
           <li><a href="#"><span class="r-icon-left"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>Previous</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">8</a></li>
            <li><a href="#">9</a></li>
            <li><a href="#">Next<span class="r-icon-right"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a></li>
          </ul>
      </div>
    </div>



    <script type="text/javascript">
 

$("#country_id").change(function(){  
        //alert('fff');
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo base_url();?>home/GetAllCity",  
                        data: {country_id:  
                           $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#city_id").html(data);  
                     }  
                  });  
               });  
             

 $(document).ready(function() {  
    $("#city_id").change(function(){ 
                     var country_id = $("#country_id").val();  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo  
                        base_url();?>home/GetAllUniversityFilter",  
                        data: {city_id:  
                           $(this).val(),country_id:country_id},  
                        type: "POST",  
                        success:function(data){  
                        $("#university_id").html(data);  
                     }  
                  });  
               });  
            }); 
             
    
     /*$(document).ready(function() {  
    $("#category_id").change(function(){ 
                     
                     $.ajax({  
                        url:"<?php echo  base_url();?>home/GetAllModuleFilter",  
                        data: {category_id:  
                           $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                        $("#module_id").html(data);  
                     }  
                  });  
               }); 
               }); */


function listing(){
    var category_id = $('#category_id').val();
    var country_id = $('#country_id').val();
    var city_id = $('#city_id').val();
    var university_id = $('#university_id').val();
    var price_range = $('#price_range').val();
    $("[for=range]").val(price_range +".00  €" );
        $('#filter').hide(); 
         var $loading = $('#wait').show();
       $.ajax({
            url: "<?php echo base_url('home/filter') ;?>",
            type: "POST",
            data: { 'category_id':category_id,'country_id':country_id,'city_id':city_id,'university_id':university_id,'price_range':price_range},
            success: function (data) {                
                $(document)
                  .ajaxStart(function () {
                    $loading.show();
                  })
                  .ajaxStop(function () {
                    $loading.hide();
                  });

                 $('#filter').html(data);
          $('#filter').show(); 
            }
      });
      }



    
   

    </script>
    <style type="'text/css'">
 

.output{
  color:#666;
  font:16px Oswald;
  position:absolute;
  top:0px;
  left:429px;
  text-shadow:#000 0px 1px 2px;
}

</style>


