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
				header("Location: ../../../ListaTInf.php");

			}

	}
?>