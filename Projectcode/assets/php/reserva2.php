<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/reserva_style.css">
	<link rel="icon" sizes="16x16" href="./imagenes/favicon.png" type="image/png">
	<title>Reserva de recursos - Phil Dunphy</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
</head>
<body>
		<div class="header">
			<!-- Encabezado de la página -->
			<div class="menu-nav">
				<a href="index.php">
					<div id="nav-reserva" class="nav-activo">
						<p>Reservas</p>
					</div>
				</a>
				<a href="incidencia.php">
					<div id="nav-incidencia">
						<p>Incidencias</p>
					</div>
				</a>
			</div>
		</div>

		<br>
		<h2 class="h2_user">
			<?php require "connect.php";
			$q = "SELECT * FROM tbl_empleado WHERE Empleado_ID = " . $_GET['user'];
			$query = mysqli_query($con, $q);
			while ($i = mysqli_fetch_array($query)) {
				echo "Bienvenido, $i[Empleado_Nombre]";
			} ?>
		</h2>
		<br>
	<div class="content">
		<!-- <?php
			// if(mysqli_num_rows($q_recursos)>0){
			// 	while($recursos=mysqli_fetch_array($q_recursos)){
			// 		echo "<div>".utf8_encode($recursos['Empleado_Nombre'])." </div>";
			// 	}
			// }
		?> -->

		<table>
      <?php
      	require "connect.php";
        $q = "SELECT * FROM tbl_recurso";
        $query = mysqli_query($con,$q);


        if (mysqli_num_rows($query)) {
          while ($rec = mysqli_fetch_array($query)) {

            // echo "<div><div class='celda-imagen'><img class='img_recurso' src=".$rec['Recurso_Img']."></div>
            // <div class='celda-nombre'><b>" . utf8_encode($rec['Recurso_Nombre']) . "</b>" . utf8_encode($rec['Recurso_Tipo']) . "</div>
            // <div class='celda-estado'>" . $rec['Recurso_Estado'] . "</div></div>";

			/* Reserva exitosa */
            if(isset($_GET['GG'])) {
                echo "<span style='color:white'>Reserva exitosa.</span>";
			}

            if ($rec['Recurso_Estado']=="Disponible") {
              echo "<div class='registro-recurso' class='si_reserva'>
		              		<div class='celda-imagen'>
		              			<img class='img_recurso' src=".$rec['Recurso_Img'].">
		              		</div>
		            			<div class='celda-nombre'>
		            				<div class='nombre-titulo'>" . utf8_encode($rec['Recurso_Nombre']) . "</div>
		            				<div class='nombre-tipoderecurso'>" . utf8_encode($rec['Recurso_Tipo']) . "</div>
				            	</div>
		            			<div class='celda-estado'>"
		            				. $rec['Recurso_Estado'] . "
		            			</div>
		            			<div class='clase-disponible'>
		            				<form action='reserva.proc.php' method='POST'>
				            			<input type='hidden' name='user' value='" . $_GET['user'] . "'></input>
				            			<input type='hidden' name='recurso_id' value='" . $rec['Recurso_ID'] . "'></input>
													<input type='submit' class='btn_reserva' value='Reservar' name='btn_reservar'></input>
				            		</form>
		            			</div>
            				</div>";
            } else {
	            echo "
	              <div class='no_reserva'>
	              	<div class='celda-imagen'>
	              		<img class='img_recurso' src=".$rec['Recurso_Img'].">
	              	</div>
	            	<div class='celda-nombre'>
	            		<div class='nombre-titulo'>" . utf8_encode($rec['Recurso_Nombre']) . "</div>
	            		<div class='nombre-tipoderecurso'>" . utf8_encode($rec['Recurso_Tipo']) . "</div>
	            	</div>
	   		        <div class='celda-estado'>"
	   		        	. $rec['Recurso_Estado'] .
	   		        "</div>
	   		        <div class='clase-disponible'>
	   		        	<form action='reserva.proc.php' method='POST' onsubmit='return false'>
	   		        		<input type='submit' class='btn_reserva_NA' value='Reservar' name='btn_reservar'>
	   		        		</input></form>
	   		        </div>
	   		    </div>";
            }

          }
        }

      ?>
	</div>
</body>
</html>
