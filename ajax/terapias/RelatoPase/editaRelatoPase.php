<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_t_pase = $_POST['id_t_pase'];
		$id_residente = $_POST['id_residente'];
		$nombre_lider = $_POST['nombre_lider'];
		$nombre_colider = $_POST['nombre_colider'];
		$nombre_director = $_POST['nombre_director'];
		$fecha_t = $_POST['fecha_t'];
		$h_inicio = $_POST['h_inicio'];
		$h_fin = $_POST['h_fin'];
		$experiencia_r = $_POST['experiencia_r'];
		$o_lider = $_POST['o_lider'];
		$o_colider = $_POST['o_colider'];
		$o_director = $_POST['o_director'];



		$query = "UPDATE tera_pase
			SET 
				id_residente  =  '$id_residente',
				nombre_lider  =  '$nombre_lider',
				nombre_colider  =  '$nombre_colider',
				nombre_director  =  '$nombre_director',
				fecha_t  =  '$fecha_t',
				h_inicio  =  '$h_inicio',
				h_fin  =  '$h_fin',
				experiencia_r  =  '$experiencia_r',
				o_lider  =  '$o_lider',
				o_colider  =  '$o_colider',
				o_director  =  '$o_director'
		WHERE id_t_pase = '$id_t_pase' ";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al actualizar terapia".$mysql->error;
		}else{
			header("location: ../../../ListaTerapiaRelatoPase.php");
		}
	
		
			

	}

?>