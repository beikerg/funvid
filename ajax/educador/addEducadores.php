<?php
	
	if(empty($_POST['nombre']) ||
		empty($_POST['apellido']) ||
		empty($_POST['rut']) ||
		empty($_POST['telefono']) ||
		empty($_POST['fecha']) ||
		empty($_POST['direccion']) ||
		empty($_POST['localidad']) ||
		empty($_POST['provincia']) ||
		empty($_POST['correo'])){

		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['rut']) && isset($_POST['telefono']) && isset($_POST['fecha']) && isset($_POST['direccion']) && isset($_POST['localidad']) && isset($_POST['provincia']) && isset($_POST['correo']))
	{
		// include Database connection file 
		include("../db_connection.php");

		// get values 
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$rut = $_POST['rut'];
		$telefono = $_POST['telefono'];
		$fecha = $_POST['fecha'];
		$direccion = $_POST['direccion'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
		$correo = $_POST['correo'];

		$ejecutar = "SELECT * FROM educadores WHERE rut = '$rut' OR correo = '$correo'  ";
		$resultado= $mysql->query($ejecutar);
		$q= mysqli_num_rows($resultado);


		if($q == 1){
			echo "<center><p class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> El RUT o el correo ingresado ya existe. </p></center>";

		}else{

		$query = "INSERT INTO educadores(nombre, apellido, rut, telefono, fecha, direccion, localidad, provincia, correo) VALUES('$nombre', '$apellido', '$rut', '$telefono', '$fecha', '$direccion', '$localidad', '$provincia', '$correo')";

				if (!$result = $mysql->query($query)) {
			        exit(mysqli_error($query));
			    }
			   echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El educador se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){
	    	 		$("#add_nuevo_educador_modal").modal("hide");
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php 

		}

		
	}
?>