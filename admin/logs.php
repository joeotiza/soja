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

	<div>
			<div class="alert alert-info" ><center><h2>Session Logs</h2></center></div>


		<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Date</th>
					<th>Employee Name</th>
					<th>IP address used</th>
					<th>Start Time</th>
					<th>End Time</th>
				</tr>
				</thead>
				<?php
					$query = $conn->query("SELECT * FROM `session` LEFT JOIN `employee` ON employee.employeeid=session.employeeid ORDER BY start DESC") or die(mysqli_error());
					while($fetch = $query->fetch_array())
						{
							$sessionid=$fetch['sessionid'];
				?>
				<tr>
          <td><?= date("jS M Y", strtotime($fetch['start']));?>
					<td><?= $fetch['firstname'];?>&nbsp;<?= $fetch['lastname'];?></td>
					<td><?= $fetch['ip'];?></td>
					<td><?= date("h:i:s A", strtotime($fetch['start']));?></td>
					<td><?= date("h:i:s A", strtotime($fetch['end']));?></td>
				</tr>
				<?php
					}
					//$conn->close();
				?>
			</table>
			<button type="submit" id='home' class="btn btn-primary" style="align-self:center;">Home</button>
		</div>
		<script type="text/javascript">

      document.getElementById("home").onclick = function ()
      {
        location.href = "admin_home.php";
      }
			</script>


	</div>

</body>
</html>
