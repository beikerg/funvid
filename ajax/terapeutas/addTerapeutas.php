<?php

	if(empty($_POST['nombre']) ||
		empty($_POST['apellido']) ||
		empty($_POST['rut']) ||
		empty($_POST['telefono']) ||
		empty($_POST['fecha']) ||
		empty($_POST['direccion']) ||
		empty($_POST['localidad']) ||
		empty($_POST['provincia']) ||
		empty($_POST['correo']) || 
		empty($_POST['cargo_tera'])){

		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['rut']) && isset($_POST['telefono']) && isset($_POST['fecha']) && isset($_POST['direccion']) && isset($_POST['localidad']) && isset($_POST['provincia']) && isset($_POST['correo']) && isset($_POST['cargo_tera']))
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
		$cargo_tera = $_POST['cargo_tera'];


		$ejecutar = "SELECT * FROM terapeutas WHERE correo = '$correo' OR rut = '$rut'  ";
		$result= $mysql->query($ejecutar);
		$vali = mysqli_num_rows($result);

		if($vali == 1){


			echo "<center><p class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> El correo ingresado ya existe. </p></center>";
		}else{



		$query = "INSERT INTO terapeutas(nombre, apellido, rut, telefono, fecha, direccion, localidad, provincia, correo, cargo_tera) VALUES('$nombre', '$apellido', '$rut', '$telefono', '$fecha', '$direccion', '$localidad', '$provincia', '$correo', '$cargo_tera')";

		if (!$result = $mysql->query($query)) {
	        exit(mysqli_error());
	    }
	     echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El terapeuta se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){
					 $("#add_nuevo_Terapeutas_modal").modal("hide");
					 location.reload();
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php 

	}
}
?>