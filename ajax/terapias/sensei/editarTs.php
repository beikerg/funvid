<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_ts = $_POST['id_ts'];
		$terapeuta_ts = $_POST['terapeuta_ts'];
		$colider_ts = $_POST['colider_ts'];
		$fecha_ts = $_POST['fecha_ts'];
		$h_inicio_ts = $_POST['h_inicio_ts'];
		$h_fin_ts = $_POST['h_fin_ts'];
		$tematica_ts = $_POST['tematica_ts'];
		$obj_ts = $_POST['obj_ts'];
		$observ_ts = $_POST['observ_ts'];
		$observ_colider_ts = $_POST['observ_colider_ts'];
		$actitud_ts = $_POST['actitud_ts'];
		
		$query = "UPDATE t_sensei
					SET 
						terapeuta_ts = '$terapeuta_ts',
						colider_ts = '$colider_ts',
						fecha_ts = '$fecha_ts',
						h_inicio_ts = '$h_inicio_ts',
						h_fin_ts = '$h_fin_ts',
						tematica_ts = '$tematica_ts',
						obj_ts = '$obj_ts',
						observ_ts = '$observ_ts',
						observ_colider_ts = '$observ_colider_ts',
						actitud_ts = '$actitud_ts'
					WHERE
						id_ts = '$id_ts' ";
		


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Sensei (Deportiva)",$mysql->error;
		}else{
			header("location: ../../../ListaTs.php");
			
		}
	
		
			

	}

?>