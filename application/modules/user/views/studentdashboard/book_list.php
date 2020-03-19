<!--my-list-->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="lesson-heading-title my-list">
						<h2>Your Book Listings</h2>
					</div>
					
					<?php 	if(!empty($books)) : ?>
					<div class="col-md-12">
						<div class="table-responsive tab">
						 	<table class="table table-striped">
                        		<thead>
		                          <tr>
		                            <th>Book Name</th>
		                            <th>Price</th>
		                            <th>Author</th>
		                            <th>Status</th>
		                            <th>Date</th>
		                            
									
		                          </tr>
		                        </thead>
							 	<tbody id="target-content">
		                          
									<?php	foreach ($books as $book) : ?>
		                          <tr>
		                            <td><?php echo $book->name_of_book;?></td>
		                            <td><i class="fa fa-fw fa-eur"><?php echo number_format($book->price,2);?></td>
		                            <td><?php echo $book->author;?></td>
		                           
		                            <td><?php echo ($book->status==1) ? '<span class="btn btn-primary">Approved</span>' : '<span class="btn btn-danger">Not Approved</span>';?></td>
		                            <td><?php echo date('d F Y',strtotime($book->created_on));?></td>
		                           
		                           </tr>
                          		<?php endforeach;?>
                          
                        </tbody>
						</table>
					</div>
				</div>

				<?php  
                        $total_records = $totals;
                        $total_pages = ceil($total_records / $limit); 
                        $pagLink = "<nav><ul class='pagination'>"; 
                        $baseURL=base_url(''); 
                        for ($i=1; $i<=$total_pages; $i++) {  
                                     $pagLink .= "<li><a href='".$baseURL."student/book-list?page=".$i."'>".$i."</a></li>";  
                        };  
                        echo $pagLink . "</ul></nav>";  
                        ?>
						
					<?php 	
							 else : ?>


							<div class="alert alert-success m-top" role="alert">You have no book listings.</div>
					<?php endif;?>
					<div class="create-btn">
						<a href="<?php echo base_url('student/add-book');?>" class="btn btn-primary">Create your first listing</a>
					</div>
				</div>


			</div>
		</div>
		<!--end ofmy-list-->

		<style type="text/css">
		.table-responsive.tab .btn-danger {
    width: 120px;
    height: 25px;
    padding-top: 0px;
    border: none;
}</style>

<!--Pagination Code-->
     <?php if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; ?>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
    currentPage : <?php echo $page;?>,
    hrefTextPrefix : '<?php echo base_url('') ?>student/book-list?page='
    });
  });
</script>
<!--Pagination Code-->