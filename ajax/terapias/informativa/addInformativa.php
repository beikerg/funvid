<?php

	if($_POST)
	{
		require_once("../../db_connection.php");

		$director_ti = $_POST['director_ti'];
		$colider_ti = $_POST['colider_ti'];
		$fecha_ti = $_POST['fecha_ti'];
		$h_inicio_ti = $_POST['h_inicio_ti'];
		$h_fin_ti = $_POST['h_fin_ti'];
		$tematica_ti = $_POST['tematica_ti'];
		$obj_ti = $_POST['obj_ti'];
		$obser_ti = $_POST['obser_ti'];
		
		$inf = "INSERT INTO tera_inf (director_ti, colider_ti, fecha_ti, h_inicio_ti, h_fin_ti, tematica_ti, obj_ti, obser_ti) VALUES ('$director_ti', '$colider_ti', '$fecha_ti', '$h_inicio_ti', '$h_fin_ti', '$tematica_ti', '$obj_ti', '$obser_ti')";

		 
		

		if(!$result = $mysql->query($inf))
		{
			echo  "Error al agregar Terapia Informativa",$mysql->error;
		}else{
			header("Location: ../../../ListaTInf.php");
		}
	}
?>