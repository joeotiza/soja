<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!--link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Server Access</title-->
    <?php require_once('../template/admin_head.php'); ?>
  </head>
  <body>
    <div class="wrapper">
      <div class="logo"> <img src="https://cdn.pixabay.com/photo/2016/04/01/11/25/avatar-1300331__340.png" alt="admin"> </div>
      <div class="text-center mt-4 name"> Administrator </div>
      <form action="admin_auth.php" class="p-3 mt-3" method="post">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="username" id="userName" placeholder="Username"> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password"> </div>
        <button class="btn mt-3" type="submit" name="login">Login</button>
      </form>
    </div>
  </body>
</html>
