<?php

	if($_POST)
	{
		require_once("../../db_connection.php");

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

		$grupal = "INSERT INTO tera_grupal (id_residente, lider_tg, colider_tg, director_tg, h_inicio_tg, h_fin_tg, o_lider_tg, o_colider_tg, o_director_tg, expo_tg, actitud_tg, fecha_tg) VALUES ('$id_residente', '$lider_tg', '$colider_tg', '$director_tg', '$h_inicio_tg', '$h_fin_tg', '$o_lider_tg', '$o_colider_tg', '$o_director_tg', '$expo_tg', '$actitud_tg', '$fecha_tg')";  
		

		if(!$result = $mysql->query($grupal))
		{
			echo  "Error al agregar Terapia Grupal",$mysql->error;
		}else{
			header("Location: ../../../ListaTGrupal.php");
		}
	}
?>