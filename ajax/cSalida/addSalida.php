<?php 

include("../db_connection.php");

	if(isset($_POST['id_residente'])){

		$id_residente = $_POST['id_residente'];
		$fecha_salida = $_POST['fecha_salida'];
		$tramite_salida = $_POST['tramite_salida'];
		$obser_salida = $_POST['obser_salida'];

		$query = "INSERT INTO control_salida (id_residente, fecha_salida, tramite_salida,obser_salida) VALUES('$id_residente','$fecha_salida','$tramite_salida','$obser_salida')";
		if(!$mysql->query($query))
		{
			exit($mysql->error);	
		}else{
			header("location: ../../controlSalida.php?id=".$id_residente);
		}


	}

?>