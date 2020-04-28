<?php 
	
	include('../db_connection.php');

	if(isset($_GET['id']) && $_GET['id'] != "")
	{
		$id_v = $_GET['id'];

		$query = "DELETE FROM velamiento WHERE id_v = '$id_v' ";

		if(!$result = $mysql->query($query))
		{
			exit($mysql->error);
		}else{
			header('location: ../../LVelamiento.php');
		}
	}
?>