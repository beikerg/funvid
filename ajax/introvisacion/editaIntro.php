<?php 
	
	if($_POST){
		
		require_once("../db_connection.php");

		$id_intro = $_POST['id_intro'];
		$id_residente = $_POST['id_residente'];
		$etapa_intro = $_POST['etapa_intro'];
		$nombre_intro = $_POST['nombre_intro'];
		$evaluacion_intro = $_POST['evaluacion_intro'];
		$fecha_intro = $_POST['fecha_intro'];
		// $estado_intro = $_POST['estado_intro'];
		$text_intro = $_POST['text_intro'];
		$observ_edu_intro = $_POST['observ_edu_intro'];


		$query = "UPDATE introvisacion
			SET 
				etapa_intro  =  '$etapa_intro',
				nombre_intro  =  '$nombre_intro',
				evaluacion_intro  =  '$evaluacion_intro',
				fecha_intro  =  '$fecha_intro',
				text_intro  =  '$text_intro',
				observ_edu_intro  =  '$observ_edu_intro'
		WHERE id_intro = '$id_intro' AND id_residente = '$id_residente' ";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al actualizar introvisación".$mysql->error;
		}else{
			header("location: ../../ListaIntro.php");
		}
	
		
			

	}

?>