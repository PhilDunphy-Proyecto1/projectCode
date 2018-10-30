<?php
	//conectamos a la BD 1819_exemple
	// IP Erix: 172.24.16.253:8080	user: root 	pwd: 1234
	// IP Alex: 172.24.17.49  	user: admin 	pwd: 1234
	

	$link = mysqli_connect('172.24.17.49', 'joel', '1234', 'db_rec_emp');
	
	if (!$link) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	// $q = "SELECT * FROM `tbl_empleado`";
	// $q_recursos = mysqli_query($link, $q);

	require "connect.php";
	// $userNivel = "SELECT Empleado_AccessLevel FROM tbl_empleado WHERE Empleado_ID = ". $_GET['user'];
	$userNivel = 'admin';

?>	


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./estilos/estilos.css">
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
					<div id="nav-incidencia" class="nav-activo">
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



		<!-- ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡FILTRO!!!!!!!!!!!!!!!!!!!! -->
		<div class="filtro">	
			<form action="" method="POST">
				<div class="titulo-filtro"><h2>BUSCAR: </h2></div>
					<div class="texto-filtro">
						<input type="text" name="nombre-recurso"></input>
					</div>

					<div class="tipo-filtro">
						<select name="tipo">
							<option>-- Tipo --</option>
							<option value="1">Sala</option>
							<option value="2">Material</option>
						</select>	
					</div>
					<div class="estado-filtro">
						<select name="estado">
							<option>-- Estado --</option>
							<option value="1">Disponible</option>
							<option value="0">En uso</option>
						</select>
					</div>
					<div class="submit-filtro">
						<input type="submit" value="Filtrar" name="submit"></input>
					</div>

			</form>
		</div>
		<!-- ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡FILTRO!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

      <?php
      	require "connect.php";
        $q = "SELECT * FROM tbl_incidencia";
        $query = mysqli_query($con,$q);



        if (mysqli_num_rows($query)) {
          while ($rec = mysqli_fetch_array($query)) {

        $grado_incidencia = utf8_encode($rec['Incidencia_Grado']);
        // echo $grado_incidencia;


            // echo "<div><div class='celda-imagen'><img class='img_recurso' src=".$rec['Recurso_Img']."></div>
            // <div class='celda-nombre'><b>" . utf8_encode($rec['Recurso_Nombre']) . "</b>" . utf8_encode($rec['Recurso_Tipo']) . "</div>
            // <div class='celda-estado'>" . $rec['Recurso_Estado'] . "</div></div>";

              $incidencia = "<div id='registro-incidencia' class='registro-incidencia'>
		            	<div class='celda-i-nombre'>
		            		<div class='incidencia-titulo'>" . utf8_encode($rec['Incidencia_Titulo']) . "</div>";
		      if ($grado_incidencia == "Crítico") {
		       $incidencia .=	"<div class='incidencia-'> nivel " . utf8_encode($rec['Incidencia_Grado']) . " <i class='fas fa-exclamation-circle grado-critico'></i></div>";
		      	
		      } elseif ($grado_incidencia == "Medio") {
		      	$incidencia .=	"<div class='incidencia-grado'> nivel " . utf8_encode($rec['Incidencia_Grado']) . " <i class='fas fa-bolt grado-medio'></i></div>";
		      } elseif ($grado_incidencia == "Bajo") {
		      	$incidencia .=	"<div class='incidencia-grado'>nivel Bajo<i class='fas fa-feather-alt grado-bajo'></i></div>";
		      };
		        $incidencia .=  "</div>
		            	<div id='incidencia-descripcion' class='incidencia-descripcion'>" 
		            		. substr(utf8_encode($rec['Incidencia_Descripcion']),0,120) . "..." . "
		            	</div>
            		";
		            if ($userNivel == 'admin') {
		            	
		       	$incidencia .= "<div class='celda-reserva'>
		       			<a href='detalles_incidencia.php?incId=".$rec['Incidencia_ID']."'><div class='btn_reserva'>Leer más</div></a>
		            	</div>";
		            	/*	<form action='incidencia.proc.php' method='POST'>
		            			<input type='submit' class='btn_reserva' value='Leer más' name='btn_reservar'></input>
		            			<input type='hidden' name='user' value='nombre'></input>
		            			<input type='hidden' name='Incidencia_ID' value='" . $rec['Incidencia_ID'] . "'></input>
		            		</form> */
		            } else {
		        $incidencia .= "<div class='celda-reserva'></div>";
		            }

		       $incidencia .= "</div>";     
            echo $incidencia;

          }
        }
      ?>
	</div>
</body>
</html>