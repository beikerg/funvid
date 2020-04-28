<?php

	
require_once("../db_connection.php");

	$id_r = $_GET['id'];
	$id_con = $_GET['con'];

	if($_GET){ 

			//ID necesario
			$id_residente = $_POST['id_residente'];
			$id_consulta = $_POST['id_consulta'];

			// Area
			$familiar = $_POST['familiar'];
			$social = $_POST['social'];
			$laboral = $_POST['laboral'];
			$academica = $_POST['academica'];
			$afectiva = $_POST['afectiva'];
			$conyugal = $_POST['conyugal'];

			//Objetivo
			$objetivo = $_POST['objetivo'];
			$apariencia = $_POST['apariencia'];
			$recomendacion = $_POST['recomendacion'];

			//Seguimientos
			$desarrollo = $_POST['desarrollo'];
			$episodios = $_POST['episodios'];

			//Analisis
			$antecedentes = $_POST['antecedentes'];
			$conductas = $_POST['conductas'];
			$consecuencia = $_POST['consecuencia'];

			$query_consulta = "DELETE FROM consultap WHERE id_consulta = '$id_con' ";


			$query_area = "DELETE FROM area WHERE id_consulta = '$id_con' ";


			$query_objetivo = "DELETE FROM objetivo WHERE id_consulta = '$id_con' ";

			$query_seguimiento = "DELETE FROM seguimiento WHERE id_consulta = '$id_con' ";

			$query_analisis = "DELETE FROM analisis WHERE id_consulta = '$id_con' ";	 		 		

		if($mysql->query($query_consulta) &&
		   $mysql->query($query_area) &&
		   $mysql->query($query_objetivo) &&
		   $mysql->query($query_seguimiento) &&
		   $mysql->query($query_analisis)){
			

			header("location: ../../consultaPsicologia.php");
			
		}else{	
			
		echo "Error al actualizar ",$mysql->error;

		}
	}else{
		echo "No tiene consulta";
	}

?>