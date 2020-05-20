<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$colider_ta = $_POST['colider_ta'];
		$lider_ta = $_POST['lider_ta'];
		$edu_ta = $_POST['edu_ta'];
		$fecha_ta = $_POST['fecha_ta'];
		$h_inicio_ta = $_POST['h_inicio_ta'];
		$h_fin_ta = $_POST['h_fin_ta'];
		$o_lider_ta = $_POST['o_lider_ta'];
		$o_colider_ta = $_POST['o_colider_ta'];
		$o_edu_ta = $_POST['o_edu_ta'];
		$actitud_ta = $_POST['actitud_ta'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query ="INSERT INTO avanzada (id_residente, lider_ta, colider_ta, edu_ta, fecha_ta, h_inicio_ta, h_fin_ta, o_lider_ta, o_colider_ta, o_edu_ta, fallas_ta, actitud_ta) VALUES ('$id_residente', '$lider_ta', '$colider_ta', '$edu_ta', '$fecha_ta', '$h_inicio_ta', '$h_fin_ta', '$o_lider_ta', '$o_colider_ta', '$o_edu_ta', '$fallas', '$actitud_ta')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia de Avanzada",$mysql->error;
		}else{
			header("location: ../../../ListaTAvanzada.php");
			
		}
	
		
			

	}

?>