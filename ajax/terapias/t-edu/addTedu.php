<?php 
	
	if($_POST){

		
		require_once("../../db_connection.php");

		
		$lider_tedu = $_POST['lider_tedu'];
		$colider_tedu = $_POST['colider_tedu'];
		$fecha_tedu = $_POST['fecha_tedu'];
		$h_inicio_tedu = $_POST['h_inicio_tedu'];
		$h_fin_tedu = $_POST['h_fin_tedu'];
		$tematica_tedu = $_POST['tematica_tedu'];
		$objetivo_tedu = $_POST['objetivo_tedu'];
		$observ_tedu = $_POST['observ_tedu'];
		$actitud_tedu = $_POST['actitud_tedu'];


		$query ="INSERT INTO t_educativa (lider_tedu, colider_tedu, fecha_tedu, h_inicio_tedu, h_fin_tedu, tematica_tedu, objetivo_tedu, observ_tedu, actitud_tedu) 
						VALUES ('$lider_tedu', '$colider_tedu', '$fecha_tedu', '$h_inicio_tedu', '$h_fin_tedu', '$tematica_tedu', '$objetivo_tedu', '$observ_tedu', '$actitud_tedu')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar terapia".$mysql->error;
		}else{
			header("location: ../../../ListaTedu.php");
		}
	
		
			

	}

?>