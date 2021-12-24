<?php
include('../dbconn.php');
include('session.php');
$employeeid = $_GET['employeeid'];

$query1 = $conn->query("SELECT * FROM `ipaddress` WHERE `employeeid`=$employeeid") or die(mysqli_error());
?>
<!doctype html>
<html>
  <head>
    <?php require_once('../template/admin_head.php'); ?>
  </head>

  <body>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#removeip" style="margin:20px;">Remove IP</button>
<div class="modal fade" id="removeip">
  <div class="modal-dialog">
    <div class="modal-content wrapper" style="border:none; max-width: 900px;">
  <div class="modal-header">
    <div class="text-center mt-4 name"><h3 class="modal-title">Remove</h3></div>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  </div>

  <div class="modal-body">
   <form action="admin_actions.php" method="post">
    <center>
      <?php
      echo "<p>Select IP to remove:</p>";
      while($fetch1 = $query1->fetch_array())
        {
          $addressid=$fetch1['addressid'];
          echo "<input type='radio' name='removeip' value=".$addressid.">".$fetch1['ip'];
        }
?>
    </center>
  </div>
  <div class="modal-footer">
    <input type="submit" class="btn btn-primary" name="submit" value="Remove">
   </form>
  </div>
 </div>
</div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addip" style="margin:20px;">Add new IP</button>
<div class="modal fade" id="addip">
  <div class="modal-dialog">
    <div class="modal-content wrapper" style="border:none; max-width: 900px;">
  <div class="modal-header">
    <div class="text-center mt-4 name"><h3 class="modal-title">Add IP</h3></div>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  </div>

  <div class="modal-body">
   <form action="admin_actions.php" method="post">
    <center>
      <div class="form-field d-flex align-items-center"><input type="hidden" name="employeeid" value="<?= $employeeid; ?>" required></div>
      <div class="form-field d-flex align-items-center"><input type="text" name="newip" placeholder="IP address" required></div>
      <div class="form-field d-flex align-items-center"><input type="text" name="description" placeholder="Description"></div>
    </center>
  </div>
  <div class="modal-footer">
    <input type="submit" class="btn btn-primary" name="addip" value="Add IP address">
   </form>
  </div>
 </div>
</div>
</div>

<button type="submit" id='employeelist' class="btn btn-primary" style="align-self:center;">Back</button>
<script type="text/javascript">

  document.getElementById("employeelist").onclick = function ()
  {
    location.href = "employees.php";
  }
  </script>
