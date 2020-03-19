<!--blog section-->
    <section class="section-blog">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="sec-banner">
              <p class="daily-update">Daily updates from our industry experts</p>
              <h1>The Success Blog</h1>
              <button class="btn btn-primary blog-btn">Subscribe to blog</button>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container">
      <div class="row">
        <?php foreach ($blogs as $blog) :?>
          
        <div class="col-md-9">
          <div class="blog-sec">
            <div class="blog-image">
              <img class="img-responsive" src="<?php echo base_url('assets/upload/blog/'.$blog->image);?>" alt="<?php echo $blog->title;?>">
            </div>
            <div class="blog-body">
              <div class="blog-meta">
                <span class="post-date"><?php echo date('F j, Y',strtotime($blog->created_on));?></span>
               
              </div>
              <div class="blog-title">
                <h2><?php echo $blog->title;?></h2>
              </div>
              <div class="blog-description">
                  <p><?php echo character_limiter($blog->description,250);?></p>             
              </div>
              <div class="r-btn">
                <a href="<?php echo base_url('blogs/'.$blog->slug);?>" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;?>
        <div class="col-md-3">
          <div class="blog-sec">
            <div class="right-title">
              <h5>Recent Posts</h5>
            </div>
            <div class="blog-list">
              <ul>
                <?php $blogs_recents=get_blog_recent();?>
                <?php foreach ($blogs_recents as $blogs_recent) : ?>
                <li><a href="<?php echo base_url('blogs/'.$blogs_recent->slug);?>"><?php echo $blogs_recent->title;?></a>
                <span class="blog-post-date"><?php echo date('F j, Y',strtotime($blogs_recent->created_on));?></span>
                </li>
                
                <?php endforeach;?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end of blog section-->