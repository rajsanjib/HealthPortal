<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Health Portal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/icomoon-social.css'); ?>">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/leaflet.css'); ?>" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="<?php echo base_url(bootstrap/css/leaflet.ie.css); ?> "/>
		<![endif]-->
		<link rel="stylesheet" href=" <?php echo base_url('bootstrap/css/main-red.css'); ?>">

        <script src=" <?php echo base_url('bootstrap/js/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						<ul>
							<li><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo anchor('signup/index', 'Sign Up'); ?></li>
			        		<li><span class="glyphicon glyphicon-log-in"></span>&nbsp;<?php echo anchor('login/index', 'Login'); ?></li>
			        	</ul>
					</div>
		        </div>
				<!-- Navigation Bar-->
		        <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="index.php"><h1>Health Portal</h1></a></li>
						<li class="active">
							<a href="index.php"><span class="glyphicon glyphicon-home">&nbsp;Home</span></a>
						</li>
						<li>
							<a href="#"><span class="glyphicon glyphicon-search">&nbsp;Search</span></a>
						</li>
						<li>
							<a href="#">Articles</a>
						</li>
						<li>
							<a href="#">Events</a>
						</li>
						<li>
							<a href="#">Forums</a>
						</li>
						<li>
							<a href="#">About Us</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
