<?php 
	
	if($_POST){
		
		require_once("../db_connection.php");

		$id_pti = $_POST['id_pti'];
		$status_pti = $_POST['status_pti'];
		$id_residente = $_POST['id_residente'];
		$etapa_pti = $_POST['etapa_pti'];
		$fecha_pti = $_POST['fecha_pti'];
		$periodo_inicio_pti = $_POST['periodo_inicio_pti'];
		$periodo_fin_pti = $_POST['periodo_fin_pti'];
		$objetivos_1 = $_POST['objetivos_1'];
		$estrategias_1 = $_POST['estrategias_1'];
		$indicadores_1 = $_POST['indicadores_1'];
		$evaluacion_1 = $_POST['evaluacion_1'];
		$objetivos_2 = $_POST['objetivos_2'];
		$estrategias_2 = $_POST['estrategias_2'];
		$indicadores_2 = $_POST['indicadores_2'];
		$evaluacion_2 = $_POST['evaluacion_2'];
		$objetivos_3 = $_POST['objetivos_3'];
		$estrategias_3 = $_POST['estrategias_3'];
		$indicadores_3 = $_POST['indicadores_3'];
		$evaluacion_3 = $_POST['evaluacion_3'];
		$objetivos_4 = $_POST['objetivos_4'];
		$estrategias_4 = $_POST['estrategias_4'];
		$indicadores_4 = $_POST['indicadores_4'];
		$evaluacion_4 = $_POST['evaluacion_4'];
		$objetivos_5 = $_POST['objetivos_5'];
		$estrategias_5 = $_POST['estrategias_5'];
		$indicadores_5 = $_POST['indicadores_5'];
		$evaluacion_5 = $_POST['evaluacion_5'];
		$objetivos_6 = $_POST['objetivos_6'];
		$estrategias_6 = $_POST['estrategias_6'];
		$indicadores_6 = $_POST['indicadores_6'];
		$evaluacion_6 = $_POST['evaluacion_6'];
		$objetivos_7 = $_POST['objetivos_7'];
		$estrategias_7 = $_POST['estrategias_7'];
		$indicadores_7 = $_POST['indicadores_7'];
		$evaluacion_7 = $_POST['evaluacion_7'];


		$query = "UPDATE pti
			SET 
				status_pti = '$status_pti',
				etapa_pti = '$etapa_pti',
				fecha_pti = '$fecha_pti',
				periodo_inicio_pti = '$periodo_inicio_pti',
				periodo_fin_pti = '$periodo_fin_pti',
				objetivos_1 = '$objetivos_1',
				estrategias_1 = '$estrategias_1',
				indicadores_1 = '$indicadores_1',
				evaluacion_1 = '$evaluacion_1',
				objetivos_2 = '$objetivos_2',
				estrategias_2 = '$estrategias_2',
				indicadores_2 = '$indicadores_2',
				evaluacion_2 = '$evaluacion_2',
				objetivos_3 = '$objetivos_3',
				estrategias_3 = '$estrategias_3',
				indicadores_3 = '$indicadores_3',
				evaluacion_3 = '$evaluacion_3',
				objetivos_4 = '$objetivos_4',
				estrategias_4 = '$estrategias_4',
				indicadores_4 = '$indicadores_4',
				evaluacion_4 = '$evaluacion_4',
				objetivos_5 = '$objetivos_5',
				estrategias_5 = '$estrategias_5',
				indicadores_5 = '$indicadores_5',
				evaluacion_5 = '$evaluacion_5',
				objetivos_6 = '$objetivos_6',
				estrategias_6 = '$estrategias_6',
				indicadores_6 = '$indicadores_6',
				evaluacion_6 = '$evaluacion_6',
				objetivos_7 = '$objetivos_7',
				estrategias_7 = '$estrategias_7',
				indicadores_7 = '$indicadores_7',
				evaluacion_7 = '$evaluacion_7'

		WHERE id_pti = '$id_pti' AND id_residente = '$id_residente' ";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al actualizar el plan de tratamiento individual".$mysql->error;
		}else{
			header("location: ../../ListaPTI.php");
		}
	
		
			

	}

?>