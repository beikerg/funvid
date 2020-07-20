<?php 
	
	if($_POST){

		
		require_once("../db_connection.php");

		
		$id_residente = $_POST['id_residente'];
		$etapa_intro = $_POST['etapa_intro'];
		$fecha_intro = $_POST['fecha_intro'];
		$nombre_intro = $_POST['nombre_intro'];
		$evaluacion_intro = $_POST['evaluacion_intro'];
		$text_intro = $_POST['text_intro'];
		$observ_edu_intro = $_POST['observ_edu_intro'];
		$estado_intro = '1';
		


		$query ="INSERT INTO introvisacion 
				(id_residente, etapa_intro, fecha_intro, nombre_intro, estado_intro,
				 evaluacion_intro, text_intro, observ_edu_intro) 
						VALUES 
				('$id_residente', '$etapa_intro', '$fecha_intro', '$nombre_intro', '$estado_intro',
				 '$evaluacion_intro', '$text_intro', '$observ_edu_intro')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar introvisacion".$mysql->error;
		}else{
			header("location: ../../ListaIntro.php");
		}
	
		
			

	}

?>