  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Sections -->
        <section id="social" class="social">
            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    <div class="social-wrapper">
                        <div class="col-md-6">
                            <div class="social-icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="social-contact">
                                <a href="#"><i class="fa fa-phone"></i>+011 22222222</a>
                                <a href="#"><i class="fa fa-envelope"></i>contact@mentor.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /container -->       
        </section>

        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/front')?>/images/cropped-2-2.jpg" alt="Logo" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                         <li class="<?php if(current_url()==base_url()) echo 'active';?>"><a href="<?php echo base_url();?>">Home</a></li> 
                        <li><a href="<?php echo base_url('e-services');?>">E-services</a></li>
                        <li><a href="<?php echo base_url('contact-us');?>">Contact</a></li>
                        <?php if($this->session->userdata('student_logged_frontend') == TRUE){ ?>
                        <li class="<?php if(current_url()==base_url('student/add-book')) echo 'active';?>"><a href="<?php echo base_url('student/add-book');?>">Add new Book</a></li>
                        <li class="<?php if(current_url()==base_url('student/book-list')) echo 'active';?>"><a href="<?php echo base_url('student/book-list');?>">My Book</a></li>
                         <?php } ?>
                        <li class="login">
                            <?php if($this->session->userdata('student_logged_frontend') != TRUE){ ?>
                            <a href="<?php echo base_url('student-login');?>">Sign In</a>
                            <?php } else { ?>
                            <?php $student_detail=get_student_detail(); ?>
                            <a href="<?php echo base_url('student-dashboard');?>"><?php echo $student_detail->fullname;?></a>
                            <a href="<?php echo base_url('student-logout');?>">Log Out</a>
                            <?php } ?>
                        </li>
            <!--<li class="login"><a href="#">register</a></li>-->
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>