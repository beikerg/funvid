<?php 

	if($_POST){

		require_once("../db_connection.php");

		$id_llamada = $_POST['id_llamada'];
		$id_residente = $_POST['id_residente'];
		$familiar = $_POST['familiar'];
		$social = $_POST['social'];
		$laboral = $_POST['laboral'];
		$academica = $_POST['academica'];
		$afectiva = $_POST['afectiva'];
		$conyugal = $_POST['conyugal'];

		$query ="UPDATE llamada_reducado SET familiar = '$familiar', social = '$social', laboral = '$laboral', academica = '$academica', afectiva = '$afectiva', conyugal = '$conyugal' WHERE id_llamada = '$id_llamada' ";

		if(!$result = $mysql->query($query)){
			exit($mysql->errno);
		}else{
			header("location: ../../editarReducadoLlamada.php?id=".$id_llamada."&r=actualizado");
		}
	}


?>