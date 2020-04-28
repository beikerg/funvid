<?php

require_once("../db_connection.php");
	
	$id = $_GET['id'];

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


			$query_area = "INSERT INTO area (id_consulta, familiar, social, laboral, academica, afectiva, conyugal) 
					VALUES ('$id_consulta','$familiar', '$social', '$laboral', '$academica', '$afectiva', '$conyugal')";

			$query_objetivo ="INSERT INTO objetivo (id_consulta, objetivo, apariencia, recomendacion) 
					 VALUES ('$id_consulta','$objetivo', '$apariencia', '$recomendacion')";

			$query_seguimiento ="INSERT INTO seguimiento (id_consulta, ante_relevantes, rela_familiares, craving, rela_resi, comen_session)
					 VALUES ('$id_consulta', '$ante_relevantes', '$rela_familiares', '$craving', '$rela_resi', '$comen_session')";

			$query_analisis ="INSERT INTO analisis (id_consulta, antecedentes, conductas, consecuencia) 
					 VALUES ('$id_consulta', '$antecedentes', '$conductas', '$consecuencia')";		 		 		

			




		if($mysql->query($query_area) &&
		   $mysql->query($query_objetivo) &&
		   $mysql->query($query_seguimiento) &&
		   $mysql->query($query_analisis)){
			

			header('location: ../../historialResidente.php?id='.$id);
			
		}else{	
			
		echo "Error de insercion",$mysql->error;

		}
	}

?>