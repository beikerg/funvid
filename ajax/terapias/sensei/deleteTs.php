<?php

		include_once("../../db_connection.php");

		if(isset($_GET['id']) && isset($_GET['id']) != "")
		{
			$id_ts = $_GET['id'];

			$query = "DELETE FROM t_sensei WHERE id_ts = '$id_ts' ";

			if(!$result = $mysql->query($query))
			{
				die("Error".$msyql->error);

			}else{
				$query_asis = "DELETE FROM asistencia WHERE id_ts = '$id_ts' ";
				if(!$asis_query = $mysql->query($query_asis)){
					echo ("Error al liminiar asistencia".$msyql->error);
				}else{
					header("Location: ../../../ListaTs.php");
				}
				

			}

	}
?>