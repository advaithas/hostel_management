<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact Us PES</title>

	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<!-- //web-fonts -->

</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home" style="height: 225px !important;">
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
						<li class="nav-item active">
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
</div>
<!-- //banner -->

<!-- contact -->
<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Contact Us </h2>
			<div class="mail_grid_w3l">
				<form action="contact.php" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="hostel_id" placeholder="Hostel ID" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="name" placeholder="Name" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="rol_no" placeholder="Roll Number" value="<?php echo $_SESSION['roll']; ?>" required="">
							</div>
						</div>

						<div class="col-md-6 contact_left_grid" data-aos="fade-left">
							<div class="contact-fields-w3ls">
								<textarea name="message" placeholder="Message..." required=""></textarea>
							</div>
							<input type="submit" name="submit" value="Submit">
						</div>
					</div>

				</form>
			</div>

	</div>
</section>
<!-- //contact -->




<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>

<?php

	if(isset($_POST['submit'])){
		$message = $_POST['message'];
		$hostel_id = $_POST['hostel_id']; // corrected variable name
		$query6 = "SELECT Warden_id FROM Warden WHERE Warden.Hostel_id = '$hostel_id'";
		$result6 = mysqli_query($conn, $query6);
		$row6 = mysqli_fetch_assoc($result6);
		$warden_id = $row6['Warden_id']; 
		$roll = $_SESSION['roll'];
		$query = "INSERT INTO Message (Sender_id, Receiver_id, Message) VALUES ('$roll', '$warden_id', '$message')";
		$result = mysqli_query($conn, $query);
		if($result){
			echo "<script type='text/javascript'>alert('Message sent Successfully!')</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.')</script>";
		}
}

?>

<?php
// Fetch and display messages sent by the student
$roll = $_SESSION['roll'];
$query_messages = "SELECT Message.Message, Message.Timestamp, student.Fname, student.Lname
                  FROM Message
                  INNER JOIN student ON Message.Sender_id = student.Student_id
                  WHERE Message.Sender_id = '$roll'";
$result_messages = mysqli_query($conn, $query_messages);

if (mysqli_num_rows($result_messages) > 0) {
    echo '<div class="container mt-5">';
    echo '<h3 style="color: #336699;">Messages Sent by You</h3>';
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="color: #336699;">Sender</th>';
    echo '<th style="color: #336699;">Message</th>';
    echo '<th style="color: #336699;">Timestamp</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row_messages = mysqli_fetch_assoc($result_messages)) {
        echo '<tr>';
        echo '<td style="color: #555;">' . $row_messages['Fname'] . ' ' . $row_messages['Lname'] . '</td>';
        echo '<td style="color: #555;">' . $row_messages['Message'] . '</td>';
        echo '<td style="color: #555;">' . $row_messages['Timestamp'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="container mt-5">';
    echo '<p style="color: #555;">No messages sent by you.</p>';
    echo '</div>';
}
?>


