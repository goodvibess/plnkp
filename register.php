<?php
session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}
include_once 'koneksi.php';

if (isset($_POST['btn-signup'])) {
    $uname = mysqli_real_escape_string($koneksi, $_POST['uname']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $upass = md5(mysqli_real_escape_string($koneksi, $_POST['pass']));

    if (mysqli_query($koneksi, "INSERT INTO users(username,email,password) VALUES('" . $uname . "','" . $email . "','" . $upass . "')")) {
        $msg = 'Congratulation you have successfully registered.';

    } else {
        $msg = 'Error while registering you...';

    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
</head>
<body>
<center>
  <div id="login-form">
    <form method="post">
      <?php echo @$msg; ?>
      <table align="center" width="30%" border="0">
        <tr>
          <td><input type="text" name="uname" placeholder="User Name" required /></td>
        </tr>
        <tr>
          <td><input type="email" name="email" placeholder="Your Email" required /></td>
        </tr>
        <tr>
          <td><input type="password" name="pass" placeholder="Your Password" required /></td>
        </tr>
        <tr>
          <td><button type="submit" name="btn-signup">Sign Me Up</button></td>
        </tr>
        <tr>
          <td><a href="index.php">Sign In Here</a></td>
        </tr>
      </table>
    </form>
  </div>
</center>
</body>
</html>
