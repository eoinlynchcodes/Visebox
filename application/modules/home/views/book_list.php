<!--dashboard top-->
    <section class="dashboard-bg">
      <div class="container">
        <div class="row">
          <div class="tag-title">
              <p>Discover and List Your Books</p>
          </div>
          <form action="<?php echo base_url('book-list');?>">
          <div class="col-md-3  col-md-offset-2">
              <div class="search-drop">
                <div class="form-group">
                   <input type="text" class="form-control" id="name_author" placeholder="E-Service" name="name_author_edition">
                </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="search-drop">
                <div class="form-group">
                   <input type="text" class="form-control" id="University_Course" placeholder="Location" name="university_Course_module">
                </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="search-drop">
                <button class="btn btn-primary" type="submit">Find</button>
              </div>
          </div>
        </form>
          <div class="col-md-12">
            <div class="list-btn">
              <a href="<?php echo base_url('student/add-book');?>" ><button class="btn btn-primary">List a Service</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--end of dashboard top-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="lesson-heading-title my-list">
            <h2>Available E-services</h2>
          </div>
        
        <?php if(!empty($books)) { ?>
        <?php foreach ($books as $book) : ?>
        <div class="col-md-4">
          <div class="available-books-sec">
            <div class="available-books-title">
              <h2><?php echo $book->name_of_book;?></h2>
            </div>
            <div class="address">
              <ul>
                <li><?php echo $book->book_edition;?></li>
                <li><?php echo $book->university_used;?></li>
                <li><?php echo $book->author;?></li>
                <li><?php echo $book->course_used;?></li>
                <li><?php echo $book->module_used;?></li>
              </ul>
            </div>
            <div class="book-cover">
              <a href="javascript:void();" onclick="show_seller(<?php echo $book->id;?>);"><img class="img-responsive" src="<?php echo base_url('assets/upload/addbook/'.$book->image);?>"></a>
            </div>
            <div class="purchase-btn">
              <button class="btn btn-primary" onclick="show_seller(<?php echo $book->id;?>);">Purchase for <?php echo '€'.number_format($book->price,2);?> </button>

            </div>
          </div>
        </div>
       <?php endforeach;?>
       
       
       <?php } else{ ?>
       <div class="alert alert-info m-top" role="alert">no any matching record.
          </div>
       <?php } ?>
       </div>
      </div>
    </div>

      <!-- Modal -->
<div id="show_seller_model" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="show_seller">

      

    </div>

  </div>
</div>
<script type="text/javascript">
function show_seller(book_id) {
   $.ajax({
                url:  "<?php echo base_url(); ?>home/show_seller", 
                type: "POST",
                data:{'book_id':book_id},
                cache:false,
                dataType : 'html',
                success: function(data){
                   
                    $('#show_seller_model').modal({
              backdrop: 'static'
            });
                    $('#show_seller').html(data);
                }
                
            });

}
</script>