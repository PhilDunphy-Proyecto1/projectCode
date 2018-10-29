<?php
  require "connect.php";
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];

  $q = "SELECT * FROM tbl_empleado WHERE Empleado_UserName = '$user' AND Empleado_Password = '$pwd'";
  $query = mysqli_query($con,$q);
  if (mysqli_num_rows($query)>0) {
    while ($i = mysqli_fetch_array($query)) {
      header("Location: reserva.php?j=" . $i['Empleado_ID']);
    } 
  } else {
    header("Location: login.php?er=1");
  }
?>
