<?php
    require 'includes/config.inc.php';

	$trigger_drop1 = "DROP TRIGGER IF EXISTS CheckRoomCapacity";
	$resultd1 = mysqli_query($conn, $trigger_drop1);
	
	$trigger_drop2 = "DROP TRIGGER IF EXISTS CheckGenderHostel";
	$resultd2 = mysqli_query($conn, $trigger_drop2);
	

    $hostelId = $_GET['id'];
    $roomOptions = '';
    $query = "SELECT Room_no FROM room WHERE Hostel_id = '$hostelId'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $roomOptions .= '<option value="' . $row['Room_no'] . '">' . $row['Room_no'] . '</option>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> PES Hostel Application </title>

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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Add this script to the HTML file -->
<script>
  $(document).ready(function() {
    $("#applicationForm").submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      var form = $(this);
      var url = form.attr("action");

      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // Serialize the form data
        success: function(data) {
          // Handle the success response
          alert("Application sent successfully");
        },
        error: function(xhr, status, error) {
          // Handle the error response
          alert("Error: " + error);
        }
      });
    });
  });
</script>


	<!--// Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->

</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home" style="height: 200px !important;">
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
						<li class="nav-item active">
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

<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Application Form </h2>
			<div class="mail_grid_w3l">
				<form action="application_form.php?id=<?php echo $_GET['id']?>" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="Fname" placeholder="Name" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="Student_id" placeholder="SRN" value="<?php echo $_SESSION['roll']?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="Hostel_id" placeholder="Hostel" value="<?php echo $_GET['id']?>" required="" >
							</div>
							<div class="contact-fields-w3ls">
							<select name="Room_no">
								<option value="" disabled selected>Select Room Number</option>
								<?php echo $roomOptions; ?>
							</select>
						</div>
							<div class="col-md-6 contact_left_grid" data-aos="fade-left">
								<input type="submit" name="submit" value="Click to Apply">
							</div>
						</div>
					</div>

				</form>
			</div>

	</div>
</section>



<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- stats -->
	<script src="web_home/js/jquery.waypoints.min.js"></script>
	<script src="web_home/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->

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
        $roll = $_SESSION['roll'];
        // $password = $_SESSION['passwd'];
        $hostel = $_POST['Hostel_id'];
		$room = $_POST['Room_no'];
        // $message = $_POST['Message'];


		$trigger_query = "CREATE TRIGGER CheckRoomCapacity
        BEFORE UPDATE ON Student
        FOR EACH ROW
        BEGIN
            DECLARE room_capacity INT;
            DECLARE current_students INT;

            -- Get the room capacity for the selected room
            SELECT Capacity INTO room_capacity
            FROM Room
            WHERE Room.Room_no = $room;

            -- Get the current number of students in the room
            SELECT COUNT(*) INTO current_students
            FROM Student
            GROUP by Room_id
            HAVING Room_id=(SELECT Room_id
            FROM Room
            WHERE Room.Room_no = $room);

            -- Check if the room is at full capacity
            IF current_students >= room_capacity THEN
                SIGNAL SQLSTATE '45000'
                SET MESSAGE_TEXT = 'Room is at full capacity. Cannot register for this room.';
            END IF;
        END";

    	$result1 = mysqli_query($conn, $trigger_query);

		$trigger_query2 = "CREATE TRIGGER CheckGenderHostel
		BEFORE UPDATE ON Student
		FOR EACH ROW
		BEGIN
		DECLARE student_gender VARCHAR(10);
		DECLARE chosen_hostel_id INT;
		
		-- Get the gender of the student
		SELECT Gender INTO student_gender
		FROM Student
		WHERE Student_id = '$roll';
		
		-- Get the chosen hostel id
		SET chosen_hostel_id = $hostel;
		
		-- Check gender and chosen hostel id
		IF (student_gender = 'M' AND chosen_hostel_id NOT IN (1, 2)) OR
			(student_gender = 'F' AND chosen_hostel_id NOT IN (3, 4)) THEN
			SIGNAL SQLSTATE '45000'
			SET MESSAGE_TEXT = 'Gender-hostel restriction violated. Choose a valid hostel for your gender.';
		END IF;
		END";

		$result2 = mysqli_query($conn, $trigger_query2);


        $query3 = "UPDATE Student SET Hostel_id = '$hostel' WHERE Student_id = '$roll'";
		$query4 = "UPDATE Student SET Room_id = (SELECT Room_id FROM Room
		WHERE Room.Room_no = $room) WHERE Student_id = '$roll'";
		$result3 = mysqli_query($conn, $query3);
		$result4 = mysqli_query($conn, $query4);

        if($result4){
			echo "<script type='text/javascript'>alert('Application sent successfully')</script>";
		} 
		
    }
?>

