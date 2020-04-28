<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_tg = $_POST['id_tg'];
		$id_residente = $_POST['id_residente'];
		$lider_tg = $_POST['lider_tg'];
		$colider_tg = $_POST['colider_tg'];
		$director_tg = $_POST['director_tg'];
		$h_inicio_tg = $_POST['h_inicio_tg'];
		$h_fin_tg = $_POST['h_fin_tg'];
		$fecha_tg = $_POST['fecha_tg'];
		$o_lider_tg = $_POST['o_lider_tg'];
		$o_colider_tg = $_POST['o_colider_tg'];
		$o_director_tg = $_POST['o_director_tg'];
		$expo_tg = $_POST['expo_tg'];
		$actitud_tg = $_POST['actitud_tg'];
		


		$query = "UPDATE tera_grupal SET 
				  id_residente = '$id_residente',
				  lider_tg = '$lider_tg',
				  colider_tg = '$colider_tg',
				  director_tg = '$director_tg',
				  h_inicio_tg = '$h_inicio_tg',
				  h_fin_tg = '$h_fin_tg',
				  fecha_tg = '$fecha_tg',
				  o_lider_tg = '$o_lider_tg',
				  o_colider_tg = '$o_colider_tg',
				  o_director_tg = '$o_director_tg',
				  expo_tg = '$expo_tg',
				  actitud_tg = '$actitud_tg' 
		WHERE id_tg = '$id_tg'  ";


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Grupal",$mysql->error;
		}else{
			header("location: ../../../ListaTGrupal.php");
			
		}
	
		
			

	}

?>