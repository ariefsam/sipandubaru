<?php
session_start();
require 'dbcon.php';
require 'fungsi.php';
if ($_POST['username']) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $q = mysql_query("SELECT * FROM petugas WHERE username='$username' AND password='$password'");
    $z = mysql_fetch_array($q);
    //print_r($z);
    if (mysql_num_rows($q) > 0) {
        $_SESSION['petugas'] = $z[0];
        header("Location:index.php");
    }
    else
        $error = "Kombinasi username dan password salah";
}
if ($_GET['action'] == "logout") {
    session_destroy();
    $error = "Anda telah berhasil logout";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8;charset=utf-8" />
<title>Dreamland - Login</title>
<link href="Dreamland%20-%20Login_files/styles00.css" rel="stylesheet" type="text/css" />
<style type="text/css">
img, div, h1, ul, input, select, textarea, span, a { behavior: url(http://demo.templateworld.com/admin-templates/admin-02/iepngfix.htc) }
</style>
<script type="text/javascript" src="Dreamland%20-%20Login_files/iepngfix.js"></script>
</head>

<body>
<div id="loginWrap">
 <div id="loginPanel">

  <div class="logo"></div>
  <div id="adminLogin">
      <form method="post">
   <h2>Admin Login</h2>
   <input type="text" value="username" name="username" onclick="this.value=''" />
    <div class="blank"></div>
   <input type="password" value="password" name="password" onclick="this.value=''" />
   <div class="blank"></div>
   <input class="link" type="submit" name="submit" value="" />

   <a href="http://demo.templateworld.com/admin-templates/admin-02/adminpage.html"></a>
   <p><a href="">Lupa Password</a></p>
      </form>
  </div>
 </div>
 <div id="loginFoot">
  <p>&copy; Kompugel Corporatio. Designed by : <a href="http://www.templateworld.com/">Template World</a></p>
 </div>

</div>
</body>
</html>

<!-- This document saved from http://demo.templateworld.com/admin-templates/admin-02/ -->
