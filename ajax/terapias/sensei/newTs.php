<?php
		require_once("../../db_connection.php");

		$terapeuta_ts = "";
		
		$sensei = "INSERT INTO t_sensei (terapeuta_ts) VALUES ('$terapeuta_ts')";

		if(!$result = $mysql->query($sensei))
		{
			echo  "Error al agregar nueva terapia de Sensei",$mysql->error;
		}else{
			$mysql->close();
			include("../../db_connection.php");
			$q = $mysql->query("SELECT * FROM t_sensei ORDER BY id_ts DESC LIMIT 1");
		
			$row = $q->fetch_assoc();

			$id = $row['id_ts'];
		
			header("Location: ../../../editarTs.php?id=".$id);
		}
?>