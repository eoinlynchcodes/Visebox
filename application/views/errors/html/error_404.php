<?php
	$base_url = 'http://'. $_SERVER['HTTP_HOST'] .'/stayhook/';
	
	$image_path = $base_url . 'assets/admin/images/';

?>
<!DOCTYPE HTML>
<html>
<head>
<title>404 error page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>

<body>
	<!--start-wrap-->
	<center>
	<div class="wrap">
		<!-----start-content------>
		<div class="content">
			<!-----start-logo------>
			<div class="logo">
				<h1><a href="#">404 error page</h1>
				<span><img src="<?php echo $image_path;?>404.jpg"/><br>Oops! The Page you requested was not found!</span>
			</div>
			<!-----end-logo--------->
			<!-----start-search-bar-section------>
			<div class="buttom">
				<div class="seach_bar">
					<p>you can go to <span><a href="#">home</a></span> page or search here</p>
					<!-----start-sear-box-------->
					
				</div>
			</div>
			<!-----end-sear-bar------->
		</div>
		<!----copy-right------------>
	<p class="copy_right">&#169; <?php echo date('Y');?> </p>
	</div>
	<center>
	<!---------end-wrap---------->
</body>
</html>