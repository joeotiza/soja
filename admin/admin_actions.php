<?php
include('../dbconn.php');

if (isset($_POST['new_employee']))
{
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $email=$_POST['email'];
  $username=$_POST['lastname'];
  $password='password';

  $query1 = $conn->query("INSERT INTO employee (firstname, lastname, email, username)
    VALUES ('$firstname','$lastname','$email', '$username')");

  $query2 = $conn->query("INSERT INTO employeelogin (employeeid, password)
    VALUES ((SELECT employeeid FROM employee WHERE email='$email'),'$password')");

  header ("location:admin_home.php");

}

if (isset($_POST['remove_employee']))
{
  $employeeid=$_GET['id'];
  $query1 = $conn->query("DELETE FROM employee WHERE employeeid='$employeeid'");

  $query2 = $conn->query("DELETE FROM employeelogin WHERE employeeid='$employeeid'");

  header ("location:admin_home.php");
}

if (isset($_POST['removeip']))
{
  $addressid=$_POST['removeip'];
  //echo $addressid;
  $query1 = $conn->query("DELETE FROM ipaddress WHERE addressid='$addressid'");

  header ("location:employees.php");
}

if (isset($_POST['addip']))
{
  $employeeid=$_POST['employeeid'];
  $ip=$_POST['newip'];
  $description=$_POST['description'];
  //echo $addressid;
  $query1 = $conn->query("INSERT INTO ipaddress (employeeid, ip, description) VALUES ('$employeeid','$ip','$description')");

  header ("location:employees.php");
}
