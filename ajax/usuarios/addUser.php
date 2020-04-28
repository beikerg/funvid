<?php

	if(empty($_POST['nombre']) ||
		empty($_POST['usuario']) ||
		empty($_POST['password']) ||
		empty($_POST['tipo_usuario'])){

		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['tipo_usuario']))
	{
		// include Database connection file 
		include("../db_connection.php");

		// get values 
		$nombre = $_POST['nombre'];
		$usuario = strtolower($_POST['usuario']);
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
		$tipo_usuario = $_POST['tipo_usuario'];
		


		$ejecutar = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
		
		$result= $mysql->query($ejecutar);
		$vali = mysqli_num_rows($result);

		if($vali == 1){


			echo "<center><p class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> El usuario ingresado ya existe. </p></center>";
		}else{



		$query = "INSERT INTO usuarios(nombre, usuario, password, tipo_usuario) VALUES('$nombre', '$usuario', '$password', '$tipo_usuario')";

		if (!$result = $mysql->query($query)) {
	        exit(mysqli_error());
	    }
	     echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El usuario se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){
	    	 		$("#add_nuevo_User_modal").modal("hide");
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php 

	}
}
?>