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
				header("Location: ../../../ListaTGrupal.php");

			}

	}
?>