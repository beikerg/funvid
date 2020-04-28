<?php

	
require_once("../db_connection.php");

	$id_r = $_GET['id'];
	$id_con = $_GET['con'];

	if(!empty($_POST)){

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
			$ante_relevantes = $_POST['ante_relevantes'];
			$rela_familiares = $_POST['rela_familiares'];
			$craving = $_POST['craving'];
			$rela_resi = $_POST['rela_resi'];
			$comen_session = $_POST['comen_session'];

			//Analisis
			$antecedentes = $_POST['antecedentes'];
			$conductas = $_POST['conductas'];
			$consecuencia = $_POST['consecuencia'];


			$query_area = "UPDATE area SET familiar = '$familiar', social = '$social', laboral = '$laboral', academica = '$academica' , afectiva = '$afectiva', conyugal = '$conyugal' WHERE id_consulta = '$id_consulta' ";


			$query_objetivo = "UPDATE objetivo SET objetivo = '$objetivo', apariencia = '$apariencia', recomendacion = '$recomendacion' WHERE id_consulta = '$id_consulta' ";

			$query_seguimiento = "
			UPDATE seguimiento 
				SET
				ante_relevantes = '$ante_relevantes',
				rela_familiares = '$rela_familiares',
				craving = '$craving',
				rela_resi = '$rela_resi',
				comen_session = '$comen_session' 
			 WHERE id_consulta = '$id_consulta' ";

			$query_analisis = "UPDATE analisis SET antecedentes = '$antecedentes', conductas = '$conductas', consecuencia = '$consecuencia' WHERE id_consulta = '$id_consulta' ";	 		 		

		if($mysql->query($query_area) &&
		   $mysql->query($query_objetivo) &&
		   $mysql->query($query_seguimiento) &&
		   $mysql->query($query_analisis)){
			

			header("location: ../../historialResidente.php?id=".$id_r);
			
		}else{	
			
		echo "Error al actualizar ",$mysql->error;

		}
	}

?>