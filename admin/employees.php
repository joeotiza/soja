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
			<div class="alert alert-info" ><center><h2>Employees</h2></center></div>

			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addemployee" style="margin:20px;">Add employee</button>
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

		<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Name</th>
					<th>Username</th>
					<th>E-mail</th>
					<th>Registered IPs</th>
					<th>Action</th>
				</tr>
				</thead>
				<?php
					$query = $conn->query("SELECT * FROM `employee` ORDER BY firstname") or die(mysqli_error());
					while($fetch = $query->fetch_array())
						{
							$employeeid=$fetch['employeeid'];
				?>
				<tr>
					<td><?= $fetch['firstname'];?>&nbsp;<?= $fetch['lastname'];?></td>
					<td><?= $fetch['username']?></td>
					<td><?= "<a href='mailto:".$fetch['email']."'>". $fetch['email']."</a>"?></td>
					<td><?php
						$query2 = $conn->query("SELECT * FROM `ipaddress` WHERE employeeid='$employeeid'") or die(mysqli_error());
						while($fetch2 = $query2->fetch_array())
							{
								echo $fetch2['ip']."&emsp;(".$fetch2['description'].")<br>";
							}
					?></td>
					<td>
						<?php
										echo "<a href='remove_employee.php?employeeid=".$employeeid."' class='btn btn-primary'>Remove</a> ";
										echo "<a href='modify.php?employeeid=".$employeeid."' class='btn btn-primary'>Modify IPs</a> ";
						?>
						<!--button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="admin_actions.php?id="<?php //$employeeid ?> style="margin:5px;">Remove</button>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#" style="margin:5px;">Modify IPs</button-->
					</td>
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

		<?php
					  /* stock in */
					  if(isset($_POST['confirm_remove'])){

					  $employeeid = $_POST['employeeid'];

						$query1 = $conn->query("DELETE FROM employee WHERE employeeid='$employeeid'");

 				   $query2 = $conn->query("DELETE FROM employeelogin WHERE employeeid='$employeeid'");

 				   header ("location:employees.php");
					 }
					 ?>





</body>
</html>
