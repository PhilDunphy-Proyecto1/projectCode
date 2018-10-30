<?php
    /* Pasar ID producto y del User */
    require "connect.php";
    $user = $_POST['user'];
    $rec_ID = $_POST['recurso_id'];

    /* Crear la Query de inserción de datos para la Reserva */
    $q = "INSERT INTO tbl_reserva (Reserva_FechaRec, Reserva_HoraRec, Empleado_ID, Recurso_ID,Reserva_Estado) VALUES (
         CURDATE(), CURTIME(), $user, $rec_ID,'En uso' );";
    $q2 = "UPDATE tbl_recurso SET Recurso_Estado = 'En uso' WHERE Recurso_ID = $rec_ID";

    mysqli_query($con, $q);
    mysqli_query($con, $q2);
    header("Location: reserva.php?user=" . $user);

?>
