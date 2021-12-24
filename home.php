<!doctype html>
<html>
  <head>
  </head>
    <?php require_once('template/head.php'); ?>
  <body>
    <div class='kati'>
    <?php
      include('dbconn.php');
      include('session.php');

      $id = (int) $_SESSION['id'];
      $employeeid = $id;
      exec("python3 soja.py ".$employeeid, $auth);
      echo "<div style='margin:auto;'>Welcome. ";
      echo "Your IP address is ".$auth[0]."</div><br>";
    ?>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changepass" style="margin:auto;">Change Password</button><br>
    <div class="modal fade" id="changepass">
      <div class="modal-dialog">
        <div class="modal-content wrapper" style="border:none; max-width: 900px;">
		  <div class="modal-header">
			  <div class="text-center mt-4 name"><h3 class="modal-title">Change Password</h3></div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		  </div>

		  <div class="modal-body">
			 <form action="actions.php" method="post">
				<center>
          <div class="form-field d-flex align-items-center"><input type="hidden" name="employeeid" value="<?= $employeeid; ?>" required></div>
					<div class="form-field d-flex align-items-center"><input type="password" name="oldpass" placeholder="Old Password" required></div>
					<div class="form-field d-flex align-items-center"><input type="password" name="newpass" placeholder="New Password" required></div>
          <div class="form-field d-flex align-items-center"><input type="password" name="confirmpass" placeholder="Confirm New Password" required></div>
				</center>
		  </div>
		  <div class="modal-footer">
				<input type="submit" class="btn btn-primary" name="changepass" value="Change Password">
			 </form>
		  </div>
	   </div>
    </div>
    </div>

    <div>
      <h3 style='margin: auto;'>Applications accessible</h3>

      <?php
      $query = $conn->query("SELECT * FROM `application`") or die(mysqli_error());
      while($fetch = $query->fetch_array())
        {
          $appid=$fetch['appid'];
          $name=$fetch['name'];
          echo "<button class='btn btn-primary'  style='margin:10px;' id=".$appid.">".$name."</button><br>";
        }
       ?>
     </div>

    <br>
    <button  class='btn btn-danger' style='margin:auto;' id="logout">Logout</button>
  </div>

    <script>
      document.getElementById("logout").onclick = function ()
      {
        location.href = "emp_logout.php";
      }
    </script>
  </body>
</html>
