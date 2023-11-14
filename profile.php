<?php
		  require 'includes/config.inc.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>User Profile PES</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Consultancy Profile Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- js -->
<script src="web_profile/js/jquery-2.1.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="web_profile/js/sliding.form.js"></script>
<!-- //js -->
<link href="web_profile/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="web_profile/css/font-awesome.min.css" />
<link rel="stylesheet" href="web_profile/css/smoothbox.css" type='text/css' media="all" />
<link href="//fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="application/x-javascript">
	addEventListener("load", function () {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<!--// Meta tag Keywords -->

<link href="web_home/css_home/slider.css" type="text/css" rel="stylesheet" media="all">

<!-- css files -->
<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->

<!-- testimonials css -->
<link rel="stylesheet" href="web_home/css_home/flexslider.css" type="text/css" media="screen" property="" /><!-- flexslider css -->
<!-- //testimonials css -->

<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<!-- //web-fonts -->


</head>
<body style="background-color: white !important;">
	<!-- banner -->

				<!--Header-->
				<header>
					<div class="container agile-banner_nav">
						<nav class="navbar navbar-expand-lg navbar-light bg-light">

							<img width="200px" height="120px" src="peslogo.png" alt="" style="width: 225px !important; height: 100px !important;">

							<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto">
									<li class="nav-item">
										<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="services.php">Hostels</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="mess.php">Mess</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="fees.php">Fees</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="contact.php">Contact</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="vacate.php">Vacate</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="change.php">Change room</a>
									</li>
									<li class="dropdown nav-item">
										<!--<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['roll']; ?>
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu agile_short_dropdown">
											<li>
												<a href="profile.php">My Profile</a>
											</li>-->
											<li class="nav-item active">
												<a href="includes/logout.inc.php" class="nav-link">Logout</a>
											</li>
										</ul>
									</li>
								</ul>
							</div>

						</nav>
					</div>
				</header>
				<!--Header-->
				<br><br><br><br><br>
				<div class="main">
					<div id="navigation" style="display:none;" class="w3_agile">
						<ul>


						</ul>
					</div>
						<div style="width: 500px;" id="steps">
							<form id="formElem" name="formElem" action="#" method="post" class="w3_form w3l_form_fancy" >
								
								<fieldset class="step agileinfo w3ls_fancy_step" >
									<legend>Personal Info</legend>
									<div class="abt-agile">
										<div class="abt-agile-right" style="width: 600px !important;">

											<h3><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>
											<h5>Student</h5>
											<ul class="address">
												<li>
													<ul class="address-text">
														<li><b>Roll No </b></li>
														<li>: <?php echo $_SESSION['roll']; ?></li>
													</ul>
												</li>
												<li>
													<ul class="address-text">
														<li><b>Phone Number </b></li>
														<li>: <?php echo $_SESSION['mob_no']; ?></li>
													</ul>
												</li>
												<li>
													<ul class="address-text">
														<li><b>Department </b></li>
														<li>: <?php echo $_SESSION['department']; ?></li>
													</ul>
												</li>
												<li>
													<ul class="address-text">
														<li><b>Semester </b></li>
														<li>: <?php echo $_SESSION['sem']; ?></li>
													</ul>
												</li>
											</ul>
										</div>
											<div class="clear"></div>
									</div>
								</fieldset>
								<fieldset class="step agileinfo w3ls_fancy_step">
									<legend>Hostel Info</legend>
									<div class="abt-agile">
										<div class="abt-agile-left-hostel">
										</div>
										<div class="abt-agile-right">

											<h3><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>
											<h5>Student</h5>
											<ul class="address">
												<li>
													<ul class="address-text">
														<li><b>HOSTEL </b></li>
														<?php
															$roll = $_SESSION['roll'];
															$q = "SELECT * FROM student WHERE Student_id = '$roll'";
															$res = mysqli_query($conn, $q);
															$row6 = mysqli_fetch_assoc($res);
															$Hid = $row6['Hostel_id'];
															if($Hid == NULL){
																$hostelName = 'None';
															}
															else {

																$q1 = "SELECT Hostel_name FROM hostel WHERE Hostel_id = '$Hid'";
																$res1 = mysqli_query($conn, $q1);
																$row = mysqli_fetch_assoc($res1);

																if($res1){
																	$hostelName = $row['Hostel_name'];
																}
																else {
																	echo "<script type='text/javascript'>alert('Foreign Key Error-hostenName!!')</script>";
																}
															}
														?>


														<li>: <?php echo $hostelName; ?></li>
													</ul>
												</li>
												<li>
													<ul class="address-text">
														<li><b>ROOM NO </b></li>
														<?php
															$roomid = $row6['Room_id'];
															if($Hid == NULL || $roomid == NULL){
																$roomNo = 'None';
															}
															else {
																$sql = "SELECT * FROM Room WHERE Room_id = '$roomid'";
																$result = mysqli_query($conn, $sql);
																if($row = mysqli_fetch_assoc($result)){
																	$roomNo = $row['Room_no'];
																}
																else {
																	echo "<script type='text/javascript'>alert('Foreign Key Error-roomNo!!')</script>";
																}
															}
														?>
														<li>: <?php echo $roomNo; ?></li>
													</ul>
												</li>
												<li>
													<ul class="address-text">
														<li><b>Fees </b></li>
														<?php
															if($Hid == NULL){
																$fees = 'None';
															}
															else {

																$q1 = "SELECT Yearly_fee FROM fees WHERE Hostel_id = '$Hid'";
																$res1 = mysqli_query($conn, $q1);
																$row = mysqli_fetch_assoc($res1);

																if($res1){
																	$fees = $row['Yearly_fee'];
																}
															}
														?>
														<li>: <?php echo $fees; ?></li>
													</ul>
												</li>
											</ul>
										</div>
											<div class="clear"></div>
									</div>
								</fieldset>
								
								<fieldset class="step ">
									<legend>Hostel Warden Info</legend>
									<div class="abt-agile">
										<div class="abt-agile-left">
										</div>
										<div class="abt-agile-right">
											<?php
												$roll = $_SESSION['roll'];
												$q = "SELECT Hostel_id FROM student WHERE Student_id = '$roll'";
												$res = mysqli_query($conn, $q);
												$row6 = mysqli_fetch_assoc($res);
												$Hid = $row6['Hostel_id'];
												$sql1 = "SELECT * FROM warden WHERE Hostel_id = '$Hid'";
												$result1 = mysqli_query($conn, $sql1);
												if($row1 = mysqli_fetch_assoc($result1)){
													$wardenid = $row1['Warden_id'];
													$hmfname = $row1['Fname'];
													$hmlname = $row1['Lname'];
													$hmMob  = $row1['ContactNo'];

													$sql2 = "SELECT * FROM warden_email WHERE Warden_id = '$wardenid'";
													$result2 = mysqli_query($conn, $sql2);
													$row2 = mysqli_fetch_assoc($result2);
													$hmemail = $row2['Email'];
												}
												else {
													$hmfname = 'none';
													$hmlname = 'none';
													$hmMob  = 'none';
													$hmemail = 'none';
												}
											?>
											<h3><?php echo $hmfname." ".$hmlname; ?></h3>
											<h5>Warden</h5>
											<ul class="address">
												<li>
													<ul class="address-text">
														<li><b>Phone Number </b></li>
														<li>: <?php echo $hmMob; ?></li>
													</ul>
												</li>
												<li>
													<ul class="address-text">
														<li><b>Email </b></li>
														<li>: <?php echo $hmemail; ?></li>
													</ul>
												</li>
											</ul>
										</div>
											<div class="clear"></div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
	<script type="text/javascript" src="web_profile/js/smoothbox.jquery2.js"></script>
</body>
</html>

