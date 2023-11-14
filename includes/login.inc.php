<?php

if (isset($_POST['login-submit'])) {

  require 'config.inc.php';

  $roll = $_POST['Student_id'];
  $password = $_POST['Passwd'];

  if (empty($roll) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT *FROM Student WHERE Student_id = '$roll'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      $pwdCheck = ($password === $row['Passwd']);
      if($pwdCheck == false){
        header("Location: ../index.php?error=wrongpwd");
        exit();
      }
      else if($pwdCheck == true) {

        //session_start();
        $_SESSION['roll'] = $row['Student_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['dob'] = $row['DOB'];
        $_SESSION['mob_no'] = $row['ContactNo'];
        $_SESSION['passwd'] = $row['Passwd'];
        $_SESSION['department'] = $row['Dept'];
        $_SESSION['sem'] = $row['Semester'];
        $_SESSION['hostel_id'] = $row['Hostel_id'];
        $_SESSION['room_id'] = $row['Room_id'];
        $_SESSION['mess_id'] = $row['Mess_id'];
        if(isset($_SESSION['department'])){
          echo "<script type='text/javascript'>alert('Set')</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
        //echo $_SESSION['lname'];
        header("Location: ../home.php?login=success");
        //exit();
      }
      else {
        header("Location: ../index.php?error=strangeerr");
        exit();
      }
    }
    else{
      header("Location: ../index.php?error=nouser");
      exit();
    }
  }

}
else {
  header("Location: ../index.php");
  exit();
}
