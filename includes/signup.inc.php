<?php

if (isset($_POST['signup-submit'])) {

  require 'config.inc.php';

  $roll = $_POST['Student_id'];
  $fname = $_POST['Fname'];
  $lname = $_POST['Lname'];
  $dob = $_POST['DOB'];
  $mobile = $_POST['ContactNo'];
  $dept = $_POST['Dept'];
  $sem = $_POST['Semester'];
  $gender = $_POST['Gender'];
  $password = $_POST['Passwd'];
  $cnfpassword = $_POST['confirmPasswd'];


  if(!preg_match("/^[a-zA-Z0-9]*$/",$roll)){
    header("Location: ../signup.php?error=invalidroll");
    exit();
  }
  else if($password !== $cnfpassword){
    header("Location: ../signup.php?error=passwordcheck");
    exit();
  }
  else {

    $sql = "SELECT Student_id FROM Student WHERE Student_id=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $roll);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signup.php?error=userexists");
        exit();
      }
      else {
        $sql = "INSERT INTO Student (Student_id, Fname, Lname, DOB, Contactno, Passwd, Dept, Semester, Gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {

          // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sssssssss", $roll, $fname, $lname, $dob, $mobile, $password, $dept, $sem, $gender);

          mysqli_stmt_execute($stmt);
          header("Location: ../index.php?signup=success");
          exit();
        }
      }
    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
else {
  header("Location: ../signup.php");
  exit();
}
