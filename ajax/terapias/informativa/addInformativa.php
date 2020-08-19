<?php

	if($_POST)
	{
		require_once("../../db_connection.php");

		$director_ti = $_POST['director_ti'];
		$colider_ti = $_POST['colider_ti'];
		$fecha_ti = $_POST['fecha_ti'];
		$h_inicio_ti = $_POST['h_inicio_ti'];
		$h_fin_ti = $_POST['h_fin_ti'];
		$tematica_ti = $_POST['tematica_ti'];
		$obj_ti = $_POST['obj_ti'];
		$obser_ti = $_POST['obser_ti'];
		
		$inf = "INSERT INTO tera_inf (director_ti, colider_ti, fecha_ti, h_inicio_ti, h_fin_ti, tematica_ti, obj_ti, obser_ti) VALUES ('$director_ti', '$colider_ti', '$fecha_ti', '$h_inicio_ti', '$h_fin_ti', '$tematica_ti', '$obj_ti', '$obser_ti')";

		 
		

		if(!$result = $mysql->query($inf))
		{
			echo  "Error al agregar Terapia Informativa",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM tera_inf ORDER BY id_ti DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_ti = $row['id_ti'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_ti, id_residente, status_asis) 
										VALUE ('$id_ti', '$residente', '0')";
						$resi_add_asis = $mysql->query($data);
					}
				$mysql->close();
				// --- FIN LISTA DE RESIDENTES - INSERT

				// AGREGAR ASISTENCIA DE RESIDENTES A TERAPIA
				include("../../db_connection.php");
				$resi_num = count($_POST['resi']);
				$i = 0;
				while($i < $resi_num){
					$id_data = $_POST['resi'][$i];

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_ti = '$id_ti' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia reflexiva ".$mysql->error;
				}else{
					header("Location: ../../../editarTInf.php?id=".$id_ti);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM tera_inf ORDER BY id_ti DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_ti = $row['id_ti'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_ti, id_residente, status_asis) 
									VALUE ('$id_ti', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTInf.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTInf.php?id=".$id_ti);
		 }
			// header("Location: ../../../ListaTInf.php");
		}
	}
?>