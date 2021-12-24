<?php

include('dbconn.php');

if (isset($_POST['login']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];


  $result=$conn->query("SELECT * FROM employee LEFT JOIN employeelogin ON employee.employeeid = employeelogin.employeeid WHERE username='$username' AND password='$password' ")
      or die ('cannot login' . mysqli_error());

  $row=$result->fetch_array();
  $run_num_rows = $result->num_rows;

  $employeeid = $row['employeeid'];
  exec("python3 soja.py ".$employeeid, $auth);
  print_r($auth);


  if ($run_num_rows > 0)//credentials match
  {
    if (strpos($auth[1], 'True') !== false)
    {
      session_start ();//start the session
      $query1 = $conn->query("INSERT INTO session (employeeid, ip, start)
        VALUES ('$employeeid','$auth[0]', CURRENT_TIMESTAMP)");
      $_SESSION['id'] = $row['employeeid'];//set global variable for session ID
      header ("location:home.php");//redirect to home.php
    }
    else
    {
      echo "<script>alert('Your public IP of ".$auth[0]." is not in the allowed range. Check with the system admin.'); window.location.href='home.php';</script>";
    }
  }

  else
  {
    echo "<script>alert('Invalid Email or Password'); window.location.href='home.php';</script>";
  }
}


?>
