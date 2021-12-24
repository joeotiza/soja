

<div >
<?php
include("../dbconn.php");
include('session.php');
$employeeid = $_GET['employeeid'];
//$conn->close();
//echo $employeeid;
?>
<div><span>Remove Employee
  <?php
  $query = $conn->query("SELECT * FROM `employee` where `employeeid`=$employeeid") or die(mysqli_error());
  $fetch = $query->fetch_array();
  echo $fetch['firstname']."&nbsp;".$fetch['lastname'];
   ?>

</span></div>
<br>
  <form method="post">
    <table>
      <tr><td><input type="hidden" name="employeeid" autocomplete="off" class="input-large number" id="text" value="<?= $employeeid; ?>" required></td></tr>
      <tr><td><button name="confirm_remove" type="submit" class="btn btn-block btn-large btn-info"  id="text">Confirm</button></td></tr>
      <tr><td><button name="cancel" type="submit" class="btn btn-block btn-large btn-info"  id="text">Cancel</button></td></tr>
    </table>
  </form>
</div>
<?php
        if(isset($_POST['confirm_remove'])){

        $employeeid = $_POST['employeeid'];

        $query1 = $conn->query("DELETE FROM employee WHERE employeeid='$employeeid'");

       $query2 = $conn->query("DELETE FROM employeelogin WHERE employeeid='$employeeid'");

       header ("location:employees.php");
       }
       elseif (isset($_POST['cancel']))
       {
         header("location:employees.php");
       }
       ?>
