<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$colider_redu = $_POST['colider_redu'];
		$lider_redu = $_POST['lider_redu'];
		$edu_redu = $_POST['edu_redu'];
		$fecha_redu = $_POST['fecha_redu'];
		$h_inicio_redu = $_POST['h_inicio_redu'];
		$h_fin_redu = $_POST['h_fin_redu'];
		$o_lider_redu = $_POST['o_lider_redu'];
		$o_colider_redu = $_POST['o_colider_redu'];
		$o_edu_redu = $_POST['o_edu_redu'];
		$actitud_redu = $_POST['actitud_redu'];
		$etapa_redu = $_POST['etapa_redu'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query ="INSERT INTO reunion_educadores (id_residente, lider_redu, colider_redu, edu_redu, fecha_redu, h_inicio_redu, h_fin_redu, o_lider_redu, o_colider_redu, o_edu_redu, fallas_redu, actitud_redu, etapa_redu) VALUES ('$id_residente', '$lider_redu', '$colider_redu', '$edu_redu', '$fecha_redu', '$h_inicio_redu', '$h_fin_redu', '$o_lider_redu', '$o_colider_redu', '$o_edu_redu', '$fallas', '$actitud_redu', '$etapa_redu')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia reunión de educadores",$mysql->error;
		}else{
			header("location: ../../../ListaTEducador.php");
			
		}
	
		
			

	}

?>