<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$colider_ga = $_POST['colider_ga'];
		$lider_ga = $_POST['lider_ga'];
		$solicita_ga = $_POST['solicita_ga'];
		$fecha_ga = $_POST['fecha_ga'];
		$h_inicio_ga = $_POST['h_inicio_ga'];
		$h_fin_ga = $_POST['h_fin_ga'];
		$o_lider_ga = $_POST['o_lider_ga'];
		$o_colider_ga = $_POST['o_colider_ga'];
		$o_solicita_ga = $_POST['o_solicita_ga'];
		$actitud_ga = $_POST['actitud_ga'];
		$etapa_ga = $_POST['etapa_ga'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query ="INSERT INTO grupo_atras (id_residente, lider_ga, colider_ga, solicita_ga, fecha_ga, h_inicio_ga, h_fin_ga, o_lider_ga, o_colider_ga, o_solicita_ga, fallas_ga, actitud_ga, etapa_ga) VALUES ('$id_residente', '$lider_ga', '$colider_ga', '$solicita_ga', '$fecha_ga', '$h_inicio_ga', '$h_fin_ga', '$o_lider_ga', '$o_colider_ga', '$o_solicita_ga', '$fallas', '$actitud_ga', '$etapa_ga')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Grupo Atrás",$mysql->error;
		}else{
			header("location: ../../../ListaTGa.php");
			
		}
	
		
			

	}

?>