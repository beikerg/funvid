<?php 

	if(isset($_POST)){
		
		require_once("../db_connection.php");

		$id_pago = $_POST['id_pago'];
		$id_residente = $_POST['id_residente'];
		$nombre_pago = $_POST['nombre_pago'];
		$apellido_pago = $_POST['apellido_pago'];
		$rut_pago = $_POST['rut_pago'];
		$mes_pago = $_POST['mes_pago'];
		$metodo_pago = $_POST['metodo_pago'];
		$monto_pago = $_POST['monto_pago'];
		$fecha_pago = $_POST['fecha_pago'];
		

		$query = "UPDATE residente_pago SET 
					nombre_pago = '$nombre_pago',
					apellido_pago = '$apellido_pago',
					rut_pago = '$rut_pago',
					mes_pago = '$mes_pago',
					fecha_pago = '$fecha_pago',
					metodo_pago = '$metodo_pago', 
					monto_pago = '$monto_pago' ";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar",$mysql->error;
		}else{
			
			header("location: ../../LisPagoU.php");
		}
	}else{
		echo "error 3",$msyql->error;
	}
?>