<?php 

	if(isset($_POST))
	{
		include('../db_connection.php');

		$id_v = $_POST['id_v'];
		$id_residente = $_POST['id_residente'];
		$fecha_v = $_POST['fecha_v'];
		$id_user_v = $_POST['id_user_v'];
		$user_v = $_POST['user_v'];
		$familiar_v = $_POST['familiar_v'];
		$social_v = $_POST['social_v'];
		$laboral_v = $_POST['laboral_v'];
		$afectiva_v = $_POST['afectiva_v'];
		$academica_v = $_POST['academica_v'];
		$conyugal_v = $_POST['conyugal_v'];
		$obser_v = $_POST['obser_v'];



		$query = "UPDATE velamiento SET 
					fecha_v = '$fecha_v',
					familiar_v = '$familiar_v',
					social_v = '$social_v',
					laboral_v = '$laboral_v',
					afectiva_v = '$afectiva_v',
					academica_v = '$academica_v',
					conyugal_v = '$conyugal_v',
					obser_v = '$obser_v'
				WHERE id_v = '$id_v' ";
 

		

		if(!$resutl = $mysql->query($query))
		{
			exit($mysql->error);
		}else{
			header('location: ../../LVelamiento.php');
		}
	}


?>