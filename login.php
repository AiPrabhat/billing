<?php

session_start();

if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
  header('location: index.php');
  die();
}

require('./includes/connection.php');
require('./includes/function.php');


// Sign in

$msg = '';
if (isset($_POST['submit'])) {
  $username = get_safe_value($con, $_POST['username']);
  $password = get_safe_value($con, $_POST['password']);
  $sql = "select * from admin_users where username='$username' and binary password='$password'";
  $res = mysqli_query($con, $sql);
  $count = mysqli_num_rows($res);

  if ($count > 0) {
    $_SESSION['ADMIN_LOGIN'] = 'yes';
    $_SESSION['ADMIN_USERNAME'] = $username;
    header('location: index.php');
    die();
  } else {
    $msg = "Please enter correct login details.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRE LOGIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Shree Ram Enterprises</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post">
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-at"></span>
              </div>
            </div>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="text-danger mb-3"><b><?php echo $msg ?></b></div>
          <div class="input-group mb-3">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
</body>

</html>