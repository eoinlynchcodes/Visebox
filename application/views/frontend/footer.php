<section id="footer-menu" class="sections footer-menu">
            <div class="container">
                <div class="row">
                    <div class="footer-menu-wrapper">

                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="menu-item">
                                    <h5>Visebox</h5>
                                    <ul>
                                        <li><a href="<?php echo base_url('');?>">Home</a></li>
                                        <li><a href="<?php echo base_url('');?>">Sign-in</a></li>
                                        <li><a href="<?php echo base_url('');?>">Profile</a></li>
                                        <li><a href="<?php echo base_url('blogs');?>">Blog</a></li>
                                        <li>SEE ALL DOWNLOADS</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="menu-item">
                                    <h5>Terms of Service</h5>
                                    <ul>
                                        <?php $pages=get_cms();
                                        foreach ($pages as $page) : ?>
                                         
                                        <li><a href="<?php echo base_url($page->slug);?>"><?php echo $page->page_title;?></a></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="menu-item">
                                    <h5>Contact us</h5>
                                    <ul>
                                        <li><a href="#">eoin@visebox.com</a></li>
                                        <li><a href="#">jeremiah@visebox.com</a></li>
                                        <!--<li>BLOG</li>
                                        <li>NEWSLETTER</li>
                                        <li>PYRAMID ANALYTICS</li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="menu-item">
                                <h5>Newsletter</h5>
                                <p>Insights await in your company's data. Bring them into focus with BlueLance.</p>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="subscribe_mail" placeholder="Enter your email address">
                                    <input type="submit" onclick="mySubscribe()" class="form-control" value="Use It Free">
                                    <span id="errsubsc" class="customError" style="float: left; display: block;"><br></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-wrapper">

                        

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright">
                                <p>Developed by <a target="_blank" href="#"> Web It </a>2017. All rights reserved.</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </footer>

<script type="text/javascript">
        function mySubscribe( ){
              var email=$('#subscribe_mail').val();
                          $('#errsubsc').html('');
                          $('#errsubsc').show();
                           
                var atpos = email.indexOf("@");
                var dotpos = email.lastIndexOf(".");
                if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
               // alert("Not a valid e-mail address");
                 $('#errsubsc').html('Not a valid e-mail address.');
                    $('#errsubsc').show();
                    $("#errsubsc").css("color","#bd3434");
                                       setTimeout(function () { $('#errsubsc').fadeOut('fast'); }, 2000);   
                    return false;
                }
              if(email==''){
                  $('#subscribe').html('');
              }else{
              $.ajax({
                   url:'<?php echo base_url("home/subscribe");?>',
                   data:{email:email},
                   type:'post',
                   success:function(data){   
                      // alert (data);
                     
                       $('#errsubsc').html(data);
                setTimeout(function () { $('#errsubsc').fadeOut('fast'); }, 2000);
                                             
                   }
               });
               }
        }

</script>
        <!-- <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div> -->