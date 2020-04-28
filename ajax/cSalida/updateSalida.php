<?php

include("../db_connection.php");

	if(isset($_POST['id_salida']))
	{
		$id_salida = $_POST['id_salida'];
		$id_residente = $_POST['id_residente'];
		$fecha_salida = $_POST['fecha_salida'];
		$tramite_salida = $_POST['tramite_salida'];
		$obser_salida = $_POST['obser_salida'];

		$query = "UPDATE control_salida 
				SET
					fecha_salida = '$fecha_salida',
					tramite_salida = '$tramite_salida',
					obser_salida = '$obser_salida'
				WHERE 
					id_salida = '$id_salida'";

		if(!$mysql->query($query))
		{
			exit($mysql->error);
		}else{
			header("location: ../../controlSalida.php?id=".$id_residente);
		}
	}
 ?>