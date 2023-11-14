<?php
    require 'includes/config.inc.php';

    $query = "SELECT * FROM fees";
    $result = mysqli_query($conn, $query);

	$query1 = "drop function if exists CalculateFeePerSemester";
	$result1 = mysqli_query($conn, $query1);
	$query2 = "CREATE FUNCTION CalculateFeePerSemester(hostel_id INT) RETURNS INT(10)
	BEGIN
	DECLARE fee INT(10);
	SELECT Yearly_Fee / 2 INTO fee FROM Fees WHERE Hostel_id = hostel_id LIMIT 1;
	RETURN fee;
	END";
    $result2 = mysqli_query($conn, $query2);

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
		<div class="banner" id="home">
			<div class="cd-radial-slider-wrapper">

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

						<li class="nav-item active">
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
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['roll']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="profile.php">My Profile</a>
							</li>
							<li>
								<a href="includes/logout.inc.php">Logout</a>
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
        
		<div id="wrapper" class="w3ls_wrapper w3layouts_wrapper">
        <h1 style="color:darkblue; font-weight:bold">Hostel Fees Details</h1>
			<div id="steps" style="margin:0 auto; padding-left:20%;" class="agileits w3_steps">
				<form id="formElem" name="formElem" action="#" method="post" class="w3_form w3l_form_fancy" >
					<fieldset class="step agileinfo w3ls_fancy_step">
                        
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table border='1'>";
                                echo "<tr><th>Hostel Name</th><th style='padding-left: 40px;'>Yearly Fee</th><th style='padding-left: 40px;'>Fee per sem</th></tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $hostelId = $row['Hostel_id'];
                                    $query_hostel = "SELECT Hostel_name FROM Hostel WHERE Hostel_id = '$hostelId'";
                                    $result_hostel = mysqli_query($conn, $query_hostel);
                                    $hostelName = '';
                                    if ($row_hostel = mysqli_fetch_assoc($result_hostel)) {
                                        $hostelName = $row_hostel['Hostel_name'];
                                    }
									$semesterFee = mysqli_query($conn, "SELECT CalculateFeePerSemester($hostelId) AS semester_fee");
									$semesterFeeValue = mysqli_fetch_assoc($semesterFee)['semester_fee'];
                                    echo "<tr>";
                                    echo "<td>" . $hostelName . "</td>";
                                    echo "<td style='padding-left: 40px;'>" . $row['Yearly_fee'] . "</td>";
									echo "<td style='padding-left: 40px;'>" . $semesterFeeValue . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "<p>No fees information found.</p>";
                            }
                        ?>


				    </fieldset>

					
				</form>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="web_profile/js/smoothbox.jquery2.js"></script>
</body>
</html>
