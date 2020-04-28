<?php

		include("../db_connection.php");

		if(isset($_GET['id']) && isset($_GET['id']) != "")
		{
			$id_salida = $_GET['id'];
			$id_residente = $_GET['resi'];

			$query = "DELETE FROM control_salida WHERE id_salida = '$id_salida' ";

			if(!$result = $mysql->query($query))
			{
				exit($msyql->error);

			}else{
				header("Location: ../../controlSalida.php?id=".$id_residente);

			}

	}