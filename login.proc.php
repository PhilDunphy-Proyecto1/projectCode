<?php
  require "connect.php";
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];

  $q = "SELECT * FROM tbl_empleado WHERE Empleado_UserName = '$user' AND Empleado_Password = '$pwd'";
  $query = mysqli_query($con,$q);

  if (mysqli_num_rows($query)>0) {
    header("Location: ver_rec.php");
  } else {
    header("Location: login.php?errorlogin=El nombre de usuario o la contraseña son incorrectos.");
  }
?>
