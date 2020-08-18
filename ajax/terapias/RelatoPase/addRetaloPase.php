<?php 
	
	if($_POST){

		
		require_once("../../db_connection.php");

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


		$query ="INSERT INTO tera_pase (id_residente, nombre_lider, nombre_colider, nombre_director, fecha_t, h_inicio, h_fin, experiencia_r, o_lider, o_colider, o_director) VALUES ('$id_residente', '$nombre_lider', '$nombre_colider', '$nombre_director', '$fecha_t', '$h_inicio', '$h_fin', '$experiencia_r', '$o_lider', '$o_colider', '$o_director')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar terapia".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM tera_pase ORDER BY id_t_pase DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_t_pase = $row['id_t_pase'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_t_pase, id_residente, status_asis) 
										VALUE ('$id_t_pase', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_t_pase = '$id_t_pase' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia relato de pase ".$mysql->error;
				}else{
					header("Location: ../../../editarTerapiaRelatoPase.php?id=".$id_t_pase);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM tera_pase ORDER BY id_t_pase DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_t_pase = $row['id_t_pase'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_t_pase, id_residente, status_asis) 
									VALUE ('$id_t_pase', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTerapiaRelatoPase.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTerapiaRelatoPase.php?id=".$id_t_pase);
		 }
			
		}
	
		
			

	}

?>