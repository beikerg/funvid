<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_ti = $_POST['id_ti'];
		$director_ti = $_POST['director_ti'];
		$fecha_ti = $_POST['fecha_ti'];
		$h_inicio_ti = $_POST['h_inicio_ti'];
		$h_fin_ti = $_POST['h_fin_ti'];
		$tematica_ti = $_POST['tematica_ti'];
		$obj_ti = $_POST['obj_ti'];
		$obser_ti = $_POST['obser_ti'];
		
		$query = "UPDATE tera_inf
					SET 
						director_ti = '$director_ti',
						fecha_ti = '$fecha_ti',
						h_inicio_ti = '$h_inicio_ti',
						h_fin_ti = '$h_fin_ti',
						tematica_ti = '$tematica_ti',
						obj_ti = '$obj_ti',
						obser_ti = '$obser_ti'
					WHERE
						id_ti = '$id_ti' ";
		


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Informativa",$mysql->error;
		}else{
			header("location: ../../../ListaTInf.php");
			
		}
	
		
			

	}

?>