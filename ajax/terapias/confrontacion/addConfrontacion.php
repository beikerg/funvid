<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$colider_tc = $_POST['colider_tc'];
		$lider_tc = $_POST['lider_tc'];
		$director_tc = $_POST['director_tc'];
		$fecha_tc = $_POST['fecha_tc'];
		$h_inicio_tc = $_POST['h_inicio_tc'];
		$h_fin_tc = $_POST['h_fin_tc'];
		$o_lider_tc = $_POST['o_lider_tc'];
		$o_colider_tc = $_POST['o_colider_tc'];
		$o_director_tc = $_POST['o_director_tc'];
		$actitud_tc = $_POST['actitud_tc'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query ="INSERT INTO tera_confronta (id_residente, lider_tc, colider_tc, director_tc, fecha_tc, h_inicio_tc, h_fin_tc, o_lider_tc, o_colider_tc, o_director_tc, fallas, actitud_tc) VALUES ('$id_residente', '$lider_tc', '$colider_tc', '$director_tc', '$fecha_tc', '$h_inicio_tc', '$h_fin_tc', '$o_lider_tc', '$o_colider_tc', '$o_director_tc', '$fallas', '$actitud_tc')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia de confrontacion",$mysql->error;
		}else{
			header("location: ../../../ListaTConf.php");
			
		}
	
		
			

	}

?>