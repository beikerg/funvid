<?php


if(isset($_POST)){
		
		require_once("../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$id_psicologo = $_POST['id_psicologo'];
		$motivo = $_POST['motivo'];
		$categoria = $_POST['categoria'];
		$fecha_c = $_POST['fecha_c'];
		
		$query = "INSERT INTO consultap (id_residente, id_psicologo, motivo, categoria, fecha_c) VALUES ('$id_residente', '$id_psicologo', '$motivo', '$categoria', '$fecha_c')";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar".$mysql->error;
		}else{
			header("location: ../../historialResidente.php");
		}
	}
		
			





?>