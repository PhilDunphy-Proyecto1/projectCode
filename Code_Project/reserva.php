<?php
	//conectamos a la BD 1819_exemple
	// IP Erix: 172.24.16.253:8080	user: root 	pwd: 1234
	// IP Alex: 172.24.17.42  	user: admin 	pwd: 1234
	

	$link = mysqli_connect('172.24.17.42', 'admin', '1234', 'db_rec_emp');
	
	if (!$link) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	
	$q = "SELECT * FROM tbl_empleado WHERE Empleado_ID = " . $_GET['j'];
	$query = mysqli_query($link, $q);
	while ($i = mysqli_fetch_array($query)) {
		echo "Hola $i[Empleado_Nombre]";
	} 

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./estilos/estilos.css">
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
		            			<input type='submit' class='btn_reserva' value='Reservar' name='btn_reservar'></input>
		            			<input type='hidden' name='user' value='nombre'></input>
		            			<input type='hidden' name='recurso_id' value='" . $rec['Recurso_ID'] . "'></input>
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