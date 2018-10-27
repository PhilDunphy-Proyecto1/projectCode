<?php
    /* Pasar ID producto y del User */
    $user = $_POST['user'];
    $productID = $_POST['recurso_id'];

    /* Crear la Query de inserción de datos para la Reserva */
    $q = "INSERT INTO tbl_reserva (Reserva_FechaRec, Reserva_HoraRec, Empleado_ID, Recurso_ID) VALUES (
         CURDATE(), CURTIME(), $user, $productID );";

    mysqli_query($con, $q);

    header("Location: reserva.php?GG=1");

?>