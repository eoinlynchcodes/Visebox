<!--contact us-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="lesson-heading-title my-list">
            <h2>contact us</h2>
          </div>
        </div>        
      </div>
    </div>
<!-----contact form-->
    
<div class="container animated fadeIn">

  <div class="row contact-row">
  
      <div class="col-sm-6">
      <iframe width="100%" height="320px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJaY32Qm3KWTkRuOnKfoIVZws&key=AIzaSyAf64FepFyUGZd3WFWhZzisswVx2K37RFY" allowfullscreen></iframe>
      </div>

      <div class="col-sm-6">
        <form method="post" action="<?php echo base_url('contact-us'); ?>" class="contact-form" id="contact">
  
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="f_name" placeholder="Name" required="" >
            </div>
        
        
            <div class="form-group form_left">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
            </div>
        
          <div class="form-group">
               <input type="text" class="form-control" id="phone" name="mobile" placeholder="Mobile No." >
          </div>
          <div class="form-group">
          <textarea class="form-control textarea-contact" rows="5" id="comment" name="description"  placeholder="Type Your Message/Feedback here..." required=""></textarea>
          <br>
            <button class="btn btn-default btn-send"> <span class="glyphicon glyphicon-send"></span> Send </button>
          </div>
          <div class="col-md-12">
          <?php     $error = $this->session->flashdata('error');
               $message = $this->session->flashdata('message');
                 if(!empty($error)){
                  echo '<div class="alert alert-danger">'.$error.'</div>';
                }
               if(!empty($message)){
            echo '<div class="alert alert-info">'.$message.'</div>';
               }
          ?>
          </div>
        </form>
      </div>
    
  </div>

  <div class="container second-portion">
  <div class="row">
        <!-- Boxes de Acoes -->
      <div class="col-xs-12 col-sm-6 col-lg-4">
      <div class="box">             
        <div class="icon">
          <div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
          <div class="info">
            <h3 class="title">MAIL & WEBSITE</h3>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp test@gmail.com
              <br>
              <br>
              <i class="fa fa-globe" aria-hidden="true"></i> &nbsp www.visebox.com
            </p>
          
          </div>
        </div>
        <div class="space"></div>
      </div> 
    </div>
      
        <div class="col-xs-12 col-sm-6 col-lg-4">
      <div class="box">             
        <div class="icon">
          <div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
          <div class="info">
            <h3 class="title">CONTACT</h3>
              <p>
              <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+91)-9624XXXXX
              <br>
              <br>
              <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp  (+91)-75670XXXXX
            </p>
          </div>
        </div>
        <div class="space"></div>
      </div> 
    </div>
      
        <div class="col-xs-12 col-sm-6 col-lg-4">
      <div class="box">             
        <div class="icon">
          <div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
          <div class="info">
            <h3 class="title">ADDRESS</h3>
              <p>
               <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp 15/3 Junction Plot 
               "Shree Krishna Krupa", Rajkot - 360001.
            </p>
          </div>
        </div>
        <div class="space"></div>
      </div> 
    </div>        
    <!-- /Boxes de Acoes -->
    
    <!--My Portfolio  dont Copy this -->
      
  </div>
</div>

</div>
<!--//contact form-->
    