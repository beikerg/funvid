<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_especial = $_POST['id_especial'];
		$id_residente = $_POST['id_residente'];
		$colider_te = $_POST['colider_te'];
		$lider_te = $_POST['lider_te'];
		$solicita_te = $_POST['solicita_te'];
		$fecha_te = $_POST['fecha_te'];
		$h_inicio_te = $_POST['h_inicio_te'];
		$h_fin_te = $_POST['h_fin_te'];
		$o_lider_te = $_POST['o_lider_te'];
		$o_colider_te = $_POST['o_colider_te'];
		$o_solicita_te = $_POST['o_solicita_te'];
		$actitud_te = $_POST['actitud_te'];
		$etapa_te = $_POST['etapa_te'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query = "UPDATE especial SET 
				  id_residente = '$id_residente',
				  lider_te = '$lider_te',
				  colider_te = '$colider_te',
				  solicita_te = '$solicita_te',
				  fecha_te = '$fecha_te',
				  h_inicio_te = '$h_inicio_te',
				  h_fin_te = '$h_fin_te',
				  o_lider_te = '$o_lider_te',
				  o_colider_te = '$o_colider_te',
				  o_solicita_te = '$o_solicita_te',
				  fallas_te = '$fallas', 
				  actitud_te = '$actitud_te',
				  etapa_te = '$etapa_te'
		WHERE id_especial = '$id_especial'  ";


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia especial",$mysql->error;
		}else{
			header("location: ../../../ListaTEspecial.php");
			
		}
	
		
			

	}

?>