<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
 <?php $header=get_header();?>
<title>:: <?php echo SITE_NAME ;?>:: <?php echo (isset($title)?$title:'');?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- seo tools  -->
	<meta name="description" content="<?php echo (isset($description)?$description:$header->meta_description);?>"/>
	<meta name="Keywords" content="<?php echo (isset($keywords)?$keywords:$header->meta_keyword);?>"/> 
    <meta property="og:title" content="<?php echo (isset($title)?$title:$header->meta_title);?>" />
	<meta property="og:url" content="<?php echo base_url(); ?>" />
	<meta property="og:image" content="<?php echo base_url('assets/front/images/logo.png' ); ?>" />
	<meta property="og:description" content="" />
	<meta property="og:site_name" content="<?php echo SITE_NAME ;?>" />
	<link rel="icon" href="<?php echo base_url('assets/front/images/favicon.png')?>" type="image/x-icon"/>
   <!-- seo end  -->
    <!--Google fonts links-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

	    <!-- CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/front')?>/css/bootstrap.min.css">

        <!--For Plugins external css-->
        <link rel="stylesheet" href="<?php echo base_url('assets/front')?>/css/plugins.css" />
  
        <!--Theme custom css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/front')?>/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="<?php echo base_url('assets/front')?>/css/responsive.css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/front')?>/css/simplePagination.css" />

        
			<!-- JS  -->
		<script type="text/javascript" src="<?php echo base_url('assets/front')?>/js/jquery-1.11.1.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url('');?>assets/front/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('');?>assets/front/js/additional-methods.js"></script>
		<script type="text/javascript" src="<?php echo base_url('');?>assets/front/js/jquery.simplePagination.js"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/front/js/validation.js'); ?>"></script>
 </head>
<body>

	<input type="hidden" name="get_base_url" id="get_base_url" value="<?php echo base_url();?>" />
<div class="wrapper">
			<?php 

				$this->load->view('frontend/header');
				$this->load->view($view);
				$this->load->view('frontend/footer');?>

<!-- jquery -->
	</div>
<script src="<?php echo base_url('assets/front')?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<script src="<?php echo base_url('assets/front')?>/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/front')?>/js/plugins.js"></script>
<script src="<?php echo base_url('assets/front')?>/js/modernizr.js"></script>
<script src="<?php echo base_url('assets/front')?>/js/main.js"></script>


	   <!--	Develop by Vinay Gupta (wisoftware.96)
		Date- 03/10/2017
		Description : -->
		
</body>
</html>
		
 

	