<?php 

	if(isset($_POST)){
		
		require_once("../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$nombre_pago = $_POST['nombre_pago'];
		$apellido_pago = $_POST['apellido_pago'];
		$rut_pago = $_POST['rut_pago'];
		$mes_pago = $_POST['mes_pago'];
		$metodo_pago = $_POST['metodo_pago'];
		$monto_pago = $_POST['monto_pago'];
		$fecha_pago = $_POST['fecha_pago'];
		
		$query = "INSERT INTO residente_pago (id_residente, nombre_pago, apellido_pago, rut_pago, mes_pago, fecha_pago, metodo_pago, monto_pago) VALUES ('$id_residente', '$nombre_pago', '$apellido_pago', '$rut_pago', '$mes_pago', '$fecha_pago' , 'metodo_pago', '$monto_pago')";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar",$mysql->error;
		}else{
			
			header("location: ../../LisPagoU.php");
		}
	}else{
		echo "error 3",$msyql->error;
	}
?>