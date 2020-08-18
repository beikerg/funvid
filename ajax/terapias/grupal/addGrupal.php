<?php

	if($_POST)
	{
		require_once("../../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$lider_tg = $_POST['lider_tg'];
		$colider_tg = $_POST['colider_tg'];
		$director_tg = $_POST['director_tg'];
		$h_inicio_tg = $_POST['h_inicio_tg'];
		$h_fin_tg = $_POST['h_fin_tg'];
		$fecha_tg = $_POST['fecha_tg'];
		$o_lider_tg = $_POST['o_lider_tg'];
		$o_colider_tg = $_POST['o_colider_tg'];
		$o_director_tg = $_POST['o_director_tg'];
		$expo_tg = $_POST['expo_tg'];
		$actitud_tg = $_POST['actitud_tg'];

		$grupal = "INSERT INTO tera_grupal (id_residente, lider_tg, colider_tg, director_tg, h_inicio_tg, h_fin_tg, o_lider_tg, o_colider_tg, o_director_tg, expo_tg, actitud_tg, fecha_tg) VALUES ('$id_residente', '$lider_tg', '$colider_tg', '$director_tg', '$h_inicio_tg', '$h_fin_tg', '$o_lider_tg', '$o_colider_tg', '$o_director_tg', '$expo_tg', '$actitud_tg', '$fecha_tg')";  
		

		if(!$result = $mysql->query($grupal))
		{
			echo  "Error al agregar Terapia Grupal",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM tera_grupal ORDER BY id_tg DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_tg = $row['id_tg'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_tg, id_residente, status_asis) 
										VALUE ('$id_tg', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_tg = '$id_tg' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia grupal ".$mysql->error;
				}else{
					header("Location: ../../../editarTGrupal.php?id=".$id_residente."&teraG=".$id_tg);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM tera_grupal ORDER BY id_tg DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_tg = $row['id_tg'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_tg, id_residente, status_asis) 
									VALUE ('$id_tg', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTGrupal.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTGrupal.php?id=".$id_residente."&teraG=".$id_tg);
		 }

		}
	}
?>