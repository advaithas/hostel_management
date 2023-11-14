<?php

if (isset($_POST['vacate-submit'])) {

  require 'config.inc.php';

  $roll = $_POST['Student_id'];
  $roll = $_SESSION['roll'];
  $query1 = "DELETE FROM Message WHERE Sender_id = '$roll'";
  $result1 = mysqli_query($conn, $query1);
  $query2 = "DELETE FROM Student WHERE Student_id = '$roll'";
  $result2 = mysqli_query($conn, $query2);

        if($result2){
          header("Location: ../index.php");
          exit();
        }
        

}
