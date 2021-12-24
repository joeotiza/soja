<?php
include('dbconn.php');

if (isset($_POST['changepass']))
{
  $employeeid=$_POST['employeeid'];
  $oldpass=$_POST['oldpass'];
  $newpass=$_POST['newpass'];
  $confirmpass=$_POST['confirmpass'];

  $query1 = $conn->query("SELECT `password` FROM `employeelogin` WHERE `employeeid` = '$employeeid'");
  $actual_oldpass=$query1->fetch_array()['password'];

  if ($actual_oldpass != $oldpass)
  {
    echo "<script>alert('Previous password incorrect.'); window.location.href='home.php';</script>";
  }
  elseif ($confirmpass != $newpass)
  {
    echo "<script>alert('Please type in your new password correctly twice'); window.location.href='home.php';</script>";
  }
  else
  {
    $query2 = $conn->query("UPDATE `employeelogin` SET `password` = '$newpass' WHERE `employeeid` = '$employeeid'");
    header ("location:home.php");
  }
}
