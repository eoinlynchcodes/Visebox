<!DOCTYPE html>
<html class="app">
    <head>
        <title>:: <?php echo SITE_NAME ;?>:: <?php echo (isset($title)?$title:'');?></title>
        <meta charset="utf-8">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta content="template language" name="keywords">
        <meta content="John Doe" name="author">
        <meta content="Admin Template" name="description">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="<?php echo base_url() . 'assets/admin/images/favicon.ico'; ?>" rel="shortcut icon">
        <link href="<?php echo base_url() . 'assets/admin/images/apple-touch-icon.png'; ?>" rel="apple-touch-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/bootstrap/dist/css/bootstrap.min.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/font-awesome/css/font-awesome.min.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/animate/animate.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/fullcalendar/dist/fullcalendar.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/datatable/media/css/jquery.dataTables.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/datatable/media/css/dataTables.bootstrap4.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/dropzone/dist/dropzone.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/select2/dist/css/select2.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/fancybox/dist/jquery.fancybox.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/sweetalert/dist/sweetalert.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/exort/uploader.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/plugins/jquery-treegrid/jquery.treegrid.css'; ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/css/main.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/css/custom.css'; ?>"/>
		<link rel="stylesheet" href="<?php echo base_url() . 'assets/admin/css/wbn-datepicker.css'; ?>"/>
		

        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/jquery/jquery-2.1.1.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/jquery-count-to/jquery.countTo.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/moment/min/moment.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/fullcalendar/dist/fullcalendar.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/chart.js/dist/Chart.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/ckeditor/ckeditor.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/datatable/media/js/jquery.dataTables.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/datatable/media/js/dataTables.bootstrap4.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/dropzone/dist/dropzone.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/select2/dist/js/select2.full.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/bootstrap-validator/dist/validator.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/fancybox/dist/jquery.fancybox.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/disabler-enabler/disabler.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/disabler-enabler/enabler.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/sweetalert/dist/sweetalert.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/super-datagrid/datagrid.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/exort/uploader.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/jquery-treegrid/jquery.treegrid.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/plugins/tether/dist/js/tether.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/js/app.js'; ?>"></script>
		
		<script type="text/javascript" src="<?php echo base_url() . 'assets/admin/js/wbn-datepicker.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'assets/admin/js/wbn-datepicker.min.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'assets/admin/js/jquery.validate.min.js'; ?>"></script>
		
    </head>
    <body>