<?php
	//conectamos a la BD 1819_exemple
	// IP Erix: 172.24.16.253:8080	user: root 	pwd: 1234
	// IP Alex: 172.24.17.49  	user: admin 	pwd: 1234

	// $q = "SELECT * FROM `tbl_empleado`";
	// $q_recursos = mysqli_query($link, $q);

	require "connect.php";
	// $userNivel = "SELECT Empleado_AccessLevel FROM tbl_empleado WHERE Empleado_ID = ". $_GET['user'];
	$userNivel = 'admin';

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="icon" sizes="16x16" href="./imagenes/favicon.png" type="image/png">
	<title>Reserva de recursos - Phil Dunphy</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<!-- <script type="text/javascript">
		function redimensionarDiv(texto) {
			if(document.getElementById('registro-incidencia').style.height=='200px'){
				document.getElementById('registro-incidencia').style.height='90px';
				var texto_recortado=texto.substr(0,30);
				document.getElementById('incidencia-descripcion').innerHTML=texto_recortado;
			} else {
				document.getElementById('registro-incidencia').style.height='200px';
				document.getElementById('incidencia-descripcion').innerHTML=texto;
			}
		}
	</script> -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
</head>
<body>
		<div class="header">
			<!-- Encabezado de la página -->
			<div class="menu-nav">
				<a href="reserva.php">
					<div id="nav-reserva">
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
	<?php

	// $user = $_REQUEST['user'];
    $recursoID = $_GET['incId'];

    /* Crear la Query de inserción de datos para la Reserva */
    $q1 = "SELECT Incidencia_Titulo, Incidencia_Descripcion, Incidencia_Grado, Incidencia_Estado FROM tbl_incidencia WHERE Incidencia_ID = $recursoID;";

    // $q2 = "SELECT ";



    $query1 = mysqli_query($con, $q1);

	if (mysqli_num_rows($query1)) {
          while ($rec = mysqli_fetch_array($query1)) {
          	$titulo = utf8_encode($rec['Incidencia_Titulo']);
          	$descripcion = utf8_encode($rec['Incidencia_Descripcion']);
          	$grado = utf8_encode($rec['Incidencia_Grado']);
        }
       }


	?>
	<div class="content">
		<div class="descripcion-content">
			<div class="content-titulo">
				<?php
					echo $titulo;
				?>
			</div>
			<div class="content-grado">
				<?php
				 if ($grado == "Crítico") {
				 	$grado .= " <i class='fas fa-exclamation-circle grado-critico'></i>";
				} elseif ($grado == "Medio") {
					$grado .= " <i class='fas fa-bolt grado-medio'></i>";
				} elseif ($grado == "Bajo") {
					$grado .= " <i class='fas fa-feather-alt grado-bajo'></i>";
				} else {
					$grado .= " <i class='fas fa-check-circle grado-resuelta'></i>";
				};
					echo $grado;
				?>
			</div>
			<div class="content-descripcion">
				<?php
					echo $descripcion;
				?>
			</div>
			<?php
				if ($userNivel == 'admin') {
					echo "<div class='mostrar-mod'>Resolver</div>";
				}
			?>
		</div>
	</div>
</body>
</html>
