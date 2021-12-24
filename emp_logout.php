<?php
	include('dbconn.php');
	include('session.php');

	$id = (int) $_SESSION['id'];
	$employeeid = $id;

	$query = $conn->query("UPDATE `session` SET `end` = CURRENT_TIMESTAMP WHERE `employeeid` = '$employeeid' AND `end` IS NULL");
	session_start();//start the session
	session_destroy();//destroy the session

	//redirect to admin_index.php
	header("location:index.php");
?>
