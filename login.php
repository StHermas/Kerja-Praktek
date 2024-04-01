<?php
session_start();
require_once 'load/function.php';

if (isset($_COOKIE['gkjw']) && isset($_COOKIE['mlaten'])) {
  $laundry = $_COOKIE['gkjw']; // id dari tbl_autentikasi
  $ku = $_COOKIE['mlaten']; // username dari tbl_autentikasi

  // Ambil username berdasarkan id
  $result = mysqli_query($koneksi, "SELECT * FROM tbl_autentikasi WHERE id = '$gkjw'");
  $data = mysqli_fetch_assoc($result);

  if ($mlaten === hash('sha256', $data['username'])) {
    $_SESSION['login'] = true;
    $_SESSION['id'] = $data['id'];
  }
}

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $resultUsername = mysqli_query($koneksi, "SELECT * FROM tbl_autentikasi WHERE username = '$username'");

  // Cek user
  if (mysqli_num_rows($resultUsername) === 1) {
    // Cek password
    $result = mysqli_fetch_assoc($resultUsername);
    if (password_verify($password, $result['password'])) {

      // Set session
      $_SESSION['login'] = true;
      $_SESSION['id'] = $result['id'];

      // Cek remember me
      if (isset($_POST['remember'])) {
        setcookie('gkjw', $result['id'], time() + (60 * 60 * 24 * 5)); // id dari tbl_karyawan
        setcookie('mlaten', hash('sha256', $result['username']), time() + (60 * 60 * 24 * 5)); // username dari tbl_karyawan
      }

      header("Location: index.php");
      exit;
    }
  }

  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GKJW Mlaten</title>

  <link rel="shortcut icon" href="asset/img/favicon.png" type="image/x-icon">

  <!-- Boostrap 4 -->
  <link rel="stylesheet" href="asset/vendor/bootstrap-4.5.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/login.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/vendor/fontawesome/css/all.min.css">
</head>

<body>
  <div class="container">
    <form class="form-signin" action="" method="post">
      <div class="text-center mb-4">
        <img class="mb-4" src="asset/img/logo.jpg" alt="" width="100" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Administrasi GKJW Mlaten</h1>
        <?php if (isset($error)): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Username atau Password salah...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
      </div>

      <div class="form-label-group">
        <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="" required=""
          autofocus="">
        <label for="username">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder=""
          required="">
        <label for="password">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">KOMPERLITBANG - 2023</p>
    </form>

</body>
<script src="asset/vendor/jquery-3.5.1/jquery-3.5.1.min.js"></script>
<script src="asset/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
<script src="asset/js/login.js"></script>

</html>