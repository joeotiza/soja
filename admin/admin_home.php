<?php
  include('../dbconn.php');
 include('session.php');
 $id = (int) $_SESSION['id'];
?>

<!doctype html>
<html>
  <head>
    <?php require_once('../template/admin_head.php'); ?>
  </head>

  <body>
    <div class='kati'>
    Administrator<br>

    <button id="employees" class="btn btn-primary" style='margin:auto;'>Employees</button>
    <button id="logs" class="btn btn-primary" style='margin:auto;'>Session Logs</button>

    <div class="modal fade" id="addemployee">
      <div class="modal-dialog">
        <div class="modal-content wrapper" style="border:none; max-width: 900px;">
		  <div class="modal-header">
			  <div class="text-center mt-4 name"><h3 class="modal-title">Add New Employee</h3></div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		  </div>

		  <div class="modal-body">
			 <form action="admin_actions.php" method="post">
				<center>
					<div class="form-field d-flex align-items-center"><input type="text" name="firstname" placeholder="First Name" required></div>
					<div class="form-field d-flex align-items-center"><input type="text" name="lastname" placeholder="Last Name" required></div>
          <div class="form-field d-flex align-items-center"><input type="text" name="email" placeholder="E-mail" required></div>
          <div class="form-field d-flex align-items-center"><input type="text" name="username" placeholder="username" required></div>
				</center>
		  </div>
		  <div class="modal-footer">
				<input type="submit" class="btn btn-primary" name="new_employee" value="Add">
			 </form>
		  </div>
	   </div>
    </div>
    </div>

    <div class="modal fade" id="removeemployee">
      <div class="modal-dialog">
        <div class="modal-content wrapper" style="border:none; max-width: 900px;">
		  <div class="modal-header">
			  <div class="text-center mt-4 name"><h3 class="modal-title">Remove Employee</h3></div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		  </div>

		  <div class="modal-body">
			 <form action="admin_actions.php" method="post">
				<center>

            <select name="employeeid"><div class="form-field d-flex align-items-center">
            <?php

    					$query = $conn->query("SELECT * FROM `employee` ORDER BY firstname") or die(mysqli_error());
    					while($fetch = $query->fetch_array())
    					{
                echo "<option value= ".$fetch['employeeid'].">".$fetch['firstname']."&nbsp;".$fetch['lastname']."&emsp;".$fetch['email']."</option>";
              }
    				?>
          </div></select>
					<!--div class="form-field d-flex align-items-center"><input type="text" name="lastname" placeholder="Last Name" required></div>
          <div class="form-field d-flex align-items-center"><input type="text" name="email" placeholder="E-mail" required></div>
          <div class="form-field d-flex align-items-center"><input type="text" name="username" placeholder="username" required></div-->
				</center>
		  </div>
		  <div class="modal-footer">
				<input type="submit" class="btn btn-primary" name="remove_employee" value="Remove">
			 </form>
		  </div>
	   </div>
    </div>
    </div>

    <br>
    <button id="logout" class="btn btn-danger" style='margin:auto;'>Logout</button>

    </div>

    <script type="text/javascript">

      document.getElementById("employees").onclick = function ()
      {
        location.href = "employees.php";
      }

      document.getElementById("logs").onclick = function ()
      {
        location.href = "logs.php";
      }

      document.getElementById("logout").onclick = function ()
      {
        location.href = "logout.php";
      }
    </script>

  </body>
</html>
