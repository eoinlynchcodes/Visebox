<!--add new book-->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="lesson-heading-title my-list">
						<h2>Add a Book</h2>
					</div>
					
				</div>
				<form action="<?php echo base_url('student/add-book');?>" id="add-book" method="POST" enctype="multipart/form-data">
				<div class="col-md-4">
					<div class="book-img-sec">
						<div class="img-heading">
							<h4>Add an Image</h4>
						</div>
						<div class="book-img">
							<img class="img-responsive" src="<?php echo base_url('assets/front/');?>/images/default_book.png" alt="Default Image">
						</div>
						<div class="form-group">
							<input type="file" name="fileToUpload" id="fileToUpload">
						</div>
						<p>Note: file size limit: 2.5 MB</p>
					</div>
				</div>
				<div class="col-md-8">
					<div class="book-img-right-sec">
						<div class="img-heading">
							<?php 
 $message = $this->session->flashdata('message');
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info"><?php echo $message ?></div>
		<?php
			}
?>
							<h4>Book Details</h4>
						</div>
						
							<div class="form-group">
								<input type="text" class="form-control" name="book_name" id="book_name" placeholder="Name Of Book">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="price" id="price" placeholder="Price">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="author" id="author" placeholder="Author">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="location" id="location" placeholder="Where are you selling from?">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="edition" id="edition" placeholder="Book Edition">
							</div>
							<div class="img-heading">
								<h4>University Details</h4>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="book_university" id="book_university" placeholder="What university is it used in?">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="book_course" id="book_course" placeholder="What course is it used in?">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="book_module" id="book_module" placeholder="What module is it used in?">
							</div>
							<div class="book-sec-btn">
								
								<button class="btn btn-primary" type="submit">Create Book</button>
							</div>
						
					</div>
				</div>
				</form>
			</div>
		</div>
		<!--end of add new book-->
		<style type="text/css">
.error{
  color: #a94442;
}
</style>