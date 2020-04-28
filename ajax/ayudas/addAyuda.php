<?php 
	
	if($_POST){
		
		include("../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$fecha_inicio_ayuda = $_POST['fecha_inicio_ayuda'];
		$fecha_fin_ayuda = $_POST['fecha_fin_ayuda'];
		$obser_ayuda = $_POST['obser_ayuda'];
		
		//Array falla.
		$ayuda  = implode(', ', $_POST['ayuda']);


		$query ="INSERT INTO ayuda (id_residente, fecha_inicio_ayuda, fecha_fin_ayuda, obser_ayuda, ayuda) VALUES ('$id_residente', '$fecha_inicio_ayuda', '$fecha_fin_ayuda', '$obser_ayuda', '$ayuda')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar ",$mysql->error;
		}else{
			header("location: ../../ayudas.php");
			
		}
	
		
			

	}

?>