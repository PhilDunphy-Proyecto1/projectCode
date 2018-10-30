<?php
  $ip="172.24.17.49";
  $user="joel";
  $db="db_rec_emp";
  $pw="1234";
  $con= mysqli_connect($ip,$user,$pw,$db);

  if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  } else {

  }

?>
