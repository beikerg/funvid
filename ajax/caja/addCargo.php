<?php


if(isset($_POST)){

		include("../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$fecha_caja = $_POST['fecha_caja'];
		$descrip_caja = $_POST['descrip_caja'];
		$cargo_caja = $_POST['cargo_caja'];
		$tipo_caja = $_POST['tipo_caja'];

		$saldo = $mysql->query("SELECT saldo_caja FROM caja WHERE id_residente = '$id_residente' ORDER BY id_caja DESC LIMIT 1");


		while ($row = mysqli_fetch_array($saldo))
		{
			$saldo_caja = $row['saldo_caja'];

		}

		$saldo_caja = ($saldo_caja - $cargo_caja);

		$query = "INSERT INTO caja (id_residente, fecha_caja, descrip_caja, cargo_caja, tipo_caja, saldo_caja) VALUES ('$id_residente', '$fecha_caja', '$descrip_caja', '$cargo_caja', '$tipo_caja', '$saldo_caja')";



		if(!$result = $mysql->query($query)){
			echo  "Error al agregar",$mysql->error;
		}else{
			header("location: ../../caja.php?id=".$id_residente);
		}
	}







?>
