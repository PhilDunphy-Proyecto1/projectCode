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
				<a href="">
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
		<h2 class="h2_user">
			<?php require "connect.php";
			$q = "SELECT * FROM tbl_empleado WHERE Empleado_ID = " . $_GET['user'];
			$query = mysqli_query($con, $q);
			while ($i = mysqli_fetch_array($query)) {
				echo "Bienvenido, $i[Empleado_Nombre]";
			} ?>
		</h2>
		<br>



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
						<input type="submit" name="submit"></input>
					</div>

			</form>
		</div>
		<!-- ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡FILTRO!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

      <?php
      	require "connect.php";
        $q = "SELECT * FROM tbl_recurso";
        $query = mysqli_query($con,$q);



        if (mysqli_num_rows($query)) { //Revisar
          while ($rec = mysqli_fetch_array($query)) {

            // echo "<div><div class='celda-imagen'><img class='img_recurso' src=".$rec['Recurso_Img']."></div>
            // <div class='celda-nombre'><b>" . utf8_encode($rec['Recurso_Nombre']) . "</b>" . utf8_encode($rec['Recurso_Tipo']) . "</div>
            // <div class='celda-estado'>" . $rec['Recurso_Estado'] . "</div></div>";

            if ($rec['Recurso_Estado']=="Disponible") {
              echo "<div class='registro-recurso si_reserva'>
		              		<div class='celda-imagen'>
		              			<img class='img_recurso' src=" . $rec['Recurso_Img'] . ">
		              		</div>
		            			<div class='celda-nombre'>
		            				<div class='nombre-titulo'>" . utf8_encode($rec['Recurso_Nombre']) . "</div>
		            				<div class='nombre-tipoderecurso'>" . utf8_encode($rec['Recurso_Tipo']) . "</div>
		            			</div>
		            			<div class='celda-estado celda-estado-positivo'>" . $rec['Recurso_Estado'] . "
		            			</div>
		            		<div class='celda-reserva'>
			            		<form action='reserva.proc.php' method='POST'>
			            			<input type='submit' class='btn_reserva' value='Reservar' name='btn_reservar'></input>
			            			<input type='hidden' name='user' value='" . $_GET['user'] . "'></input>
			            			<input type='hidden' name='recurso_id' value='" . $rec['Recurso_ID'] . "'></input>
			            		</form>
		            		</div>
            			</div>";
            } else if ($rec['Recurso_Estado']=="En uso") {
							$q2 = "SELECT * FROM tbl_reserva WHERE Empleado_ID = " . $_GET['user'] . " AND Reserva_Estado ='En uso' AND Recurso_ID = " . $rec['Recurso_ID'] ."";
							$query2 = mysqli_query($con,$q2);
							if (mysqli_num_rows($query2)>0) {
								while ($j = mysqli_fetch_array($query2)) {
									echo "
			              <div class='registro-recurso no_reserva'>
			              		<div class='celda-imagen'>
			              			<img class='img_recurso' src=".$rec['Recurso_Img'].">
			              		</div>
			            			<div class='celda-nombre'>
			            				<div class='nombre-titulo'>" . utf8_encode($rec['Recurso_Nombre']) . "</div>
			            				<div class='nombre-tipoderecurso'>" . utf8_encode($rec['Recurso_Tipo']) . "</div>
			            			</div>
			   		        		<div class='celda-estado celda-estado-negativo'>" . $rec['Recurso_Estado'] . "</div>
			   		        		<div class='celda-reserva'>
													<form action='liberar.proc.php' method='POST'>
														<input type='submit' class='btn_reserva' value='Liberar' name='btn_reservar'></input>
														<input type='hidden' name='user' value='" . $_GET['user'] . "'></input>
														<input type='hidden' name='recurso_id' value='" . $rec['Recurso_ID'] . "'></input>
													</form>
			   		        		</div>
			   		    			</div>";
								}
							} else {

									echo "
			              <div class='registro-recurso no_reserva'>
			              	<div class='celda-imagen'>
			              		<img class='img_recurso' src=".$rec['Recurso_Img'].">
			              	</div>
			            	<div class='celda-nombre'>
			            		<div class='nombre-titulo'>" . utf8_encode($rec['Recurso_Nombre']) . "</div>
			            		<div class='nombre-tipoderecurso'>" . utf8_encode($rec['Recurso_Tipo']) . "</div>
			            	</div>
			   		        <div class='celda-estado celda-estado-negativo'>"
			   		        	. $rec['Recurso_Estado'] .
			   		        "</div>
			   		        <div class='celda-reserva'>
			   		        	<form action='reserva.proc.php' method='POST' onsubmit='return false'>
			   		        		<input type='submit' class='btn_reserva_NA' value='Reservar' name='btn_reservar'>
			   		        		</input></form>
			   		        </div>
			   		    </div>";

							}

            }

          }
        }

      ?>
	</div>
</body>
</html>
