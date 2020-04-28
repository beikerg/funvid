<?php 
	
	if($_POST){
		
		include("../db_connection.php");

		$id_ayuda = $_POST['id_ayuda'];
		$id_residente = $_POST['id_residente'];
		$obser_ayuda = $_POST['obser_ayuda'];
		$fecha_inicio_ayuda = $_POST['fecha_inicio_ayuda'];
		$fecha_fin_ayuda = $_POST['fecha_fin_ayuda'];
		//Array ayuda.
		
		$ayuda = implode (', ', $_POST['ayuda']);


		$query = "UPDATE ayuda SET 
				  id_residente = '$id_residente',
				  obser_ayuda = '$obser_ayuda',
				  fecha_inicio_ayuda = '$fecha_inicio_ayuda',
				  fecha_fin_ayuda = '$fecha_fin_ayuda',
				  ayuda = '$ayuda' 
		WHERE id_ayuda = '$id_ayuda' ";


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar",$mysql->error;
		}else{
			header("location: ../../ayudas.php");

		}
	
		
			

	}

?>