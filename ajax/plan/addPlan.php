<?php 

	if(isset($_POST)){
		
		require_once("../db_connection.php");

		$nombre_plan = $_POST['nombre_plan'];
		$descripcion_plan = $_POST['descripcion_plan'];
		$precio = $_POST['precio'];
		
		
		$query = "INSERT INTO plan (nombre_plan, descripcion_plan, precio) VALUES ('$nombre_plan', '$descripcion_plan', '$precio')";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar",$mysql->error;
		}else{
			echo "se agrego";
			header("location: ../../planes.php");
		}
	}
		
			


?>