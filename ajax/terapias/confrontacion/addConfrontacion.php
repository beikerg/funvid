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
			if($_POST['botones'] == 'save'){
					$mysql->close();
					include("../../db_connection.php");
					// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
					$q = $mysql->query("SELECT * FROM tera_confronta ORDER BY id_t_conf DESC LIMIT 1");
					$row = $q->fetch_assoc();
					$id_t_conf = $row['id_t_conf'];
					$mysql->close();

					// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_t_conf, id_residente, status_asis) 
											VALUE ('$id_t_conf', '$residente', '0')";
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

						$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_t_conf = '$id_t_conf' ";

						$resultado = $mysql->query($data_resi);
						$i++;
					}
					$mysql->close();
					// FIN ASISTENCIA - ADD

					if(!$resi_add_asis && !$resultado){
						echo "Error al agregar asistenecia terapia de confrontación".$mysql->error;
					}else{
						header("Location: ../../../EditarTerapiaConfrontacion.php?id=".$id_residente."&tera=".$id_t_conf);
					}
			}elseif(empty($_POST['resi'])){
				include("../../db_connection.php");
					// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
					$q = $mysql->query("SELECT * FROM tera_confronta ORDER BY id_t_conf DESC LIMIT 1");
					$row = $q->fetch_assoc();
					$id_t_conf = $row['id_t_conf'];
					$mysql->close();
					
				// INSERTAR ASISTENCIA SIN GENERAR
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_t_conf, id_residente, status_asis) 
										VALUE ('$id_t_conf', '$residente', '0')";
						$resi_add_asis = $mysql->query($data);
					}
				$mysql->close();
				// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
			}

			if($_POST['botones'] == 'Guardar'){
				header("location: ../../../ListaTConf.php");
			 }elseif($_POST['botones'] == 'save'){
				header("Location: ../../../EditarTerapiaConfrontacion.php?id=".$id_residente."&tera=".$id_t_conf);
			 }
		}	
			
	}

?>