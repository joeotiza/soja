<!--doctype html>
<html>
  <head>
  </head>
  <body>
    <form action="auth.php" method="post">
      Username: <input type="text" name="username"><br>
      Password: <input type="text" name="password"><br>
      <input type="submit" name="login">
    </form>
  </body>
</html-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once('template/head.php'); ?>
  </head>
  <body>
    <div class="wrapper">
      <h1 class="text-center mt-4 name">SOJA</h1>
      <div class="logo"> <img src="https://cdn4.iconfinder.com/data/icons/people-avatar-1-1/128/29-512.png" alt="admin"> </div>
      <div class="text-center mt-4 name"> Login </div>
      <form action="auth.php" class="p-3 mt-3" method="post">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="username" id="userName" placeholder="Username"> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password"> </div>
        <button class="btn mt-3" type="submit" name="login">Login</button>
      </form>
    </div>
  </body>
</html>
