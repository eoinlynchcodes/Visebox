<!--schedule lesson section-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="lesson-heading-title">
            <h2>payment</h2>
          </div>
        </div>
        <div class="col-md-8">
          <div class="payment-left-sec">
              <div class="card-details">
              <div class="card-details-title">Select Your Lesson Details</div>
              <form>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="start-date">Start Date</label>
                  <div class="col-sm-6">
                    <!--<input type="text" name="cardName" class="form-control cc-name" placeholder="Card Holder's Name" required="true">-->
                     <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="lesson">Number of Lessons:</label>
                  <div class="col-sm-6">
                    <select class="form-control">
                      <option value="0">How many lessons do you need?</option>
                      <option value="1">1 Lesson (€35)</option>
                      <option value="2">2 Lessons (Save €10)</option>
                      <option value="3">3 Lessons (Save €15)</option>
                      <option value="4">4 Lessons (Save €20)</option>
                      <option value="5">5 Lessons (Save €50)</option>
                      <option value="6">6 Lessons (Save €60)</option>
                      <option value="7">7 Lessons (Save €70)</option>
                      <option value="8">8 Lessons (Save €80)</option>
                      <option value="9">9 Lessons (Save €90)</option>
                      <option value="10">10 Lessons (Save €100)</option>

                    </select>
                  </div>
                </div>
                
              </form>
            </div>
            <div class="card-details">
              <div class="card-details-title">Debit card / Credit Card Information</div>
              <form>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="cardName">Name on Card</label>
                  <div class="col-sm-6">
                    <input type="text" name="cardName" class="form-control cc-name" placeholder="Card Holder's Name" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="cardName">Card Number</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control cc-number" maxlength="23" placeholder="Debit/Credit Card Number" id="cardNo" data-stripe="number" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
                  <div class="col-sm-9">
                    <div class="row">
                    <div class="col-xs-6 col-sm-3">
                      <select class="form-control cc-exp-month" name="expiry-month" id="expMonth">
                      <option>Month</option>
                      <option value="01">Jan (01)</option>
                      <option value="02">Feb (02)</option>
                      <option value="03">Mar (03)</option>
                      <option value="04">Apr (04)</option>
                      <option value="05">May (05)</option>
                      <option value="06">June (06)</option>
                      <option value="07">July (07)</option>
                      <option value="08">Aug (08)</option>
                      <option value="09">Sep (09)</option>
                      <option value="10">Oct (10)</option>
                      <option value="11">Nov (11)</option>
                      <option value="12">Dec (12)</option>
                      </select>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                      <select class="form-control cc-exp-year" name="expiry-year" id="expYear" required="true">
                        <option>Year</option>
                         <?php
                          for($i=date('Y');$i<date('Y')+15;$i++){
                              echo "<option value='".$i."'>".$i."</option>\n";
                          }
                          ?>
                      </select>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="expiry-month">Card CVV</label>
                  <div class="col-sm-9">
                    <div class="row">
                    <div class="col-xs-12 col-sm-3">
                      <input type="text" class="form-control cc-cvc" placeholder="CVV" data-stripe="cvc" autocomplete="off" required="true">
                    </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <button class="btn btn-primary profile-btn profile-btn-1">Next</button>
          </div>
        </div>
        <div class="col-md-4">
          <div class="payment-right-sec">
            <div class="booking-details">
              <div class="card-details-title">Booking Summary</div>
                <ul>
                  <li>Start Date<span class="txt-description">No date selected</span></li>
                  <li>Number of Lessons<span class="txt-description">No lessons selected</span></li>
                  <li>Cost<span class="txt-description">€0</span></li>
                  <li><span class="deco"><a href="#" data-toggle="tooltip" title="A once off fee for booking your first lesson with this tutor">Finder's Fee</a></span><span class="txt-description">€4.99</span></li>
                  <li><span class="deco"><a href="#" data-toggle="tooltip" title="This includes the TutorHQ finder's fee which will only be charged once and not for any subsequent payments.">Total Cost</a></span><span class="txt-description">€4.99</span></li>
                </ul>
            </div>
            <div class="card-image">
                  <p>We accept all major credit cards, processed securely by <a href="#">Stripe</a></p>
                  <img class="img-reserve" src="assets/images/stripe.png">
                </div>
          </div>          
        </div>
      </div>
    </div>
    <!--end of schedule lesson-->