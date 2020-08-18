<?php

		include_once("../../db_connection.php");

		if(isset($_GET['id']) && isset($_GET['id']) != "")
		{
			$id_tg = $_GET['id'];

			$query = "DELETE FROM tera_grupal WHERE id_tg = '$id_tg' ";

			if(!$result = $mysql->query($query))
			{
				die($msyql->error);

			}else{
				$query_asis = "DELETE FROM asistencia WHERE id_tg = '$id_tg' ";
			    if(!$asis_query = $mysql->query($query_asis)){
					echo ("Error al liminiar asistencia".$msyql->error);
				}else{
					header("Location: ../../../ListaTGrupal.php");
				}
				// header("Location: ../../../ListaTGrupal.php");

			}

	}
?>