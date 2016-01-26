<!-- Include functions are first -->
<?php include('../functions/functions.php'); ?>


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

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/icomoon-social.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/leaflet.css" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="../css/leaflet.ie.css" />
    <![endif]-->
    <link rel="stylesheet" href="../css/main-red.css">
    <link rel="stylesheet" href="../css/sidebar.css">


    <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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

<div class="container" style="position: relative;margin-top: 50px; padding: 20px;">
    <div class="service-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <form role="form" action="" method="get">
                    <label for="search">What do you want to search for?</label>
                    <div class="form-group">
						<input type="text" name="search">					</div>
                    <div class="form-group">
                        <select name=”search”>
                            <option value=”doctors”>Doctors</option>
                            <option value=”hospitals”>Hospitals</option>
                           
                        </select>
                    </div>
					
					
					<!-- Hide/Show left to implement-->
					<!-- Div for doctors-->
					
					
					<div class="form-group">
						&nbsp;
						<label for="search">Expertise:&nbsp;</label>
						<select name="expertise">
							<option>Audiologist</option>
							<option>Allergist</option>
							<option>Anesthesiologist</option>
							<option>Cardiologist</option>
							<option>Dentist</option>
							<option>Dermatologist</option>
							<option>Endocrinologist</option>
							<option>Epidemiologist</option>
							<option>Gynecologist</option>
							<option>Immunologist</option>
							<option>Neurologist</option>
							<option>Neurosurgeon</option>
							<option>Obstetrician</option>
							<option>Oncologist</option>
							<option>Orthopedic Surgeon</option>
							<option>ENT Specialist</option>
							<option>Pediatrician</option>
							<option>Physiologist</option>
							<option>Plastic Surgeon</option>
							<option>Psychiatrist</option>
							<option>Surgeon</option>
							
							
						</select>
						&nbsp;
						<label for="search">Hospital:&nbsp;</label>
						<select name="hospital">
							<option>Dhulikhel Hospital</option>
							<option>Om Hospital &amp; Research Centre</option>
							<option>Teaching Hospital</option>
							<option>Medicare Hospital</option>
							<option>Bir Hospital</option>
							<option>DI Skin Hospital</option>
							
						</select>
						&nbsp;
						<label for="search">Location:&nbsp;</label>
						<select name="location">
							<option>Select an Option</option>
							<option>Kathmandu</option>
							<option>Bhaktapur</option>
							<option>Lalitpur</option>
							<option>Dhulikhel</option>
						</select>
					</div>
					<!-- Div for hospitals-->
					<div class="form-group">
						<label for="search">Name:&nbsp;</label>
						<select name="expertise">
							<option></option>
						</select>
						<label for="search">Location:&nbsp;</label>
						<select name="hospital">
							<option></option>
						</select>
						<label for="search">Specialty:&nbsp;</label>
						<select name="location">
							<option></option>
						</select>
					</div>

                    <input type="button" value="Search" class="" id="submit">

                </form>
            </div>
        </div>
    </div>
</div>

