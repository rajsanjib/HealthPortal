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
		<link rel="stylesheet" href=" <?php echo base_url('bootstrap/css/sidebar.css'); ?>">


        <script src=" <?php echo base_url('bootstrap/js/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
    </head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<!-- Navigation & Logo-->
<nav class="navbar navbar-default navbar-fixed-top" style="border-radius:0;margin-bottom:0; border-bottom: solid 3px teal; letter-spacing:1px;" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" style="color: teal;" href="#">Health Portal</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active" ><a href="#"><span class="glyphicon glyphicon-home">&nbsp;Home</span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-search">&nbsp;</span>Search</a></li>
                <li><a href="#">Articles</a></li>
                <li><a href="#">Events</a></li>	
				<li><a href="#">Forums</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>


            </ul>
        </div>
    </div>
</nav>
    <div id="wrapper">
				<!-- Sidebar -->
				<div id="sidebar-wrapper">
					<ul class="sidebar-nav">
						<li class="sidebar-brand">
							<a href="#">
								Username
							</a>
						</li>
						<li>
						</li>
						<li>
							<a href="#">My Appointments</a>
						</li>
						<li>
							<a href="#">My Profile</a>
						</li>
						<li>
							<a href="#">Discussions</a>
						</li>
						<li>
							<a href="#">Articles</a>
						</li>
						<li>
							<a href="#">Events</a>
						</li>
						<li>
							<a href="#">Contact</a>
						</li>
					</ul>
				</div>
		
		<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>My Appointments</h1>
                        <table class="table table-striped">
							<thead>
								<th>Time</th>
								<th>Sunday</th>
								<th>Monday</th>
								<th>Tuesday</th>
								<th>Wednesday</th>
								<th>Thursday</th>
								<th>Friday</th>
								<th>Saturday</th>
							</thead>
							<tbody>
								<tr>
									<td>09:00 AM</td>
									<td>Mr. Sandesh Shrestha</td>
								</tr>
								<tr>
									<td>10:00 AM</td>
								</tr>
								<tr>
									<td>11:00 AM</td>
									<td></td>
									<td>Mr. Sanjib R. Acharya</td>
								</tr>
								<tr>
									<td>12:00 PM</td>
									<td>Lunch</td>
								</tr>
								<tr>
									<td>01:00 PM</td>
								</tr>
								<tr>
									<td>02:00 PM</td>
								</tr>
								<tr>
									<td>03:00 PM</td>
								</tr>
								<tr>
									<td>04:00 PM</td>
								</tr>
								
							</tbody>
						</table>
                    </div>
                </div>
            </div>
			</div>
			
			
        </div>

		
<!-- End of Main Container-->
<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-footer col-md-3 col-xs-6">
                <h3>Our Latest Work</h3>
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <a href="page-portfolio-item.html"><img src="img/portfolio6.jpg" alt="Project Name"></a>
                    </div>
                </div>
            </div>
            <div class="col-footer col-md-3 col-xs-6">
                <h3>Navigate</h3>
                <ul class="no-list-style footer-navigate-section">
                    <li><a href="page-blog-posts.html">Blog</a></li>
                    <li><a href="page-portfolio-3-columns-2.html">Portfolio</a></li>
                    <li><a href="page-products-3-columns.html">eShop</a></li>
                    <li><a href="page-services-3-columns.html">Services</a></li>
                    <li><a href="page-pricing.html">Pricing</a></li>
                    <li><a href="page-faq.html">FAQ</a></li>
                </ul>
            </div>

            <div class="col-footer col-md-4 col-xs-6">
                <h3>Contacts</h3>
                <p class="contact-us-details">
                    <b>Address:</b> 123 Fake Street, LN1 2ST, London, United Kingdom<br/>
                    <b>Phone:</b> +44 123 654321<br/>
                    <b>Fax:</b> +44 123 654321<br/>
                    <b>Email:</b> <a href="mailto:getintoutch@yourcompanydomain.com">getintoutch@yourcompanydomain.com</a>
                </p>
            </div>
            <div class="col-footer col-md-2 col-xs-6">
                <h3>Stay Connected</h3>
                <ul class="footer-stay-connected no-list-style">
                    <li><a href="#" class="facebook"></a></li>
                    <li><a href="#" class="twitter"></a></li>
                    <li><a href="#" class="googleplus"></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-copyright">&copy; 2013 mPurpose. All rights reserved.</div>
            </div>
        </div>
    </div>
</div>

<!-- Javascripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
<script src="js/jquery.fitvids.js"></script>
<script src="js/jquery.sequence-min.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/main-menu.js"></script>
<script src="js/template.js"></script>

</body>
</html>
