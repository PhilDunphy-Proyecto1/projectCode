<?php
  require "connect.php";
  $var_user = $_POST['user'];
  $var_recurso_id = $_POST['recurso_id'];
  
  /* Consulta que actualiza los datos de la tabla recurso
  una vez se ha devuelto dicho recurso. */
  $q = "UPDATE tbl_reserva SET Reserva_Estado = 'Terminado', Reserva_HoraDev = CURTIME(), Reserva_FechaDev = CURDATE() WHERE Recurso_ID = $var_recurso_id";
  
  // Ejecutamos la consulta
  mysqli_query($con, $q);

  /*  Consulta que actualiza los datos de la tabla recurso
  para devolver el estado del producto a disponible. */
  $q2 = "UPDATE tbl_recurso SET Recurso_Estado = 'Disponible' WHERE Recurso_ID = $var_recurso_id";

  //   Ejecutamos la consulta
  mysqli_query($con, $q2);

  //   Redirigimos al usuario a la página de reserva
  header("Location: reserva.php?user=" .$var_user);
?>
