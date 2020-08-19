<?php

		include_once("../../db_connection.php");

		if(isset($_GET['id']) && isset($_GET['id']) != "")
		{
			$id_ti = $_GET['id'];

			$query = "DELETE FROM tera_inf WHERE id_ti = '$id_ti' ";

			if(!$result = $mysql->query($query))
			{
				die("Error". $msyql->error);

			}else{
				$query_asis = "DELETE FROM asistencia WHERE id_ti = '$id_ti' ";
			    if(!$asis_query = $mysql->query($query_asis)){
					echo ("Error al liminiar asistencia".$msyql->error);
				}else{
					header("Location: ../../../ListaTInf.php");
				}
				// header("Location: ../../../ListaTInf.php");

			}

	}
?>