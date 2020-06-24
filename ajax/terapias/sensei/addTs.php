<?php

	if($_POST)
	{
		require_once("../../db_connection.php");

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
		
		$inf = "INSERT INTO t_sensei (terapeuta_ts, colider_ts, fecha_ts, h_inicio_ts, h_fin_ts, tematica_ts, obj_ts, observ_ts, observ_colider_ts, actitud_ts) 
		VALUES ('$terapeuta_ts', '$colider_ts', '$fecha_ts', '$h_inicio_ts', '$h_fin_ts', '$tematica_ts', '$obj_ts', '$observ_ts', '$observ_colider_ts', '$actitud_ts')";

		 
		

		if(!$result = $mysql->query($inf))
		{
			echo  "Error al agregar Terapia Sensei (Deportiva)",$mysql->error;
		}else{
			header("Location: ../../../ListaTs.php");
		}
	}
?>