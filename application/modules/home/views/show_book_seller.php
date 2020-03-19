<div class="modal-header header-1">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><img src="<?php echo base_url('assets/front')?>/images/cropped-2-2.jpg">
    <span class="modal-style"><?php echo $show_seller->name_of_book;?></span></h4>
      </div>
      <div class="modal-body modal-1">
        <p>To purchase this book please contact the seller on:</p>
    <div class="contact-info">
      <ul>
        <li>
          <a class="btn btn-primary" href="mailto:<?php echo $show_seller->email;?>">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <?php echo $show_seller->email;?>
          </a>
        </li>
        <li>
          <a class="btn btn-primary" href="tel:<?php echo $show_seller->phone;?>">
                      <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> <?php echo $show_seller->phone;?>
          </a>
        </li>
      </ul>
    </div>
      </div>
      <div class="modal-footer footer-1">
        <button type="button" class="btn btn-default default-1" data-dismiss="modal">Close</button>
      </div>