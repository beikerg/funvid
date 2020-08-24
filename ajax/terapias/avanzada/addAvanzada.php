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
		$etapa_ta = $_POST['etapa_ta'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query ="INSERT INTO avanzada (id_residente, lider_ta, colider_ta, edu_ta, fecha_ta, h_inicio_ta, h_fin_ta, o_lider_ta, o_colider_ta, o_edu_ta, fallas_ta, actitud_ta, etapa_ta) VALUES ('$id_residente', '$lider_ta', '$colider_ta', '$edu_ta', '$fecha_ta', '$h_inicio_ta', '$h_fin_ta', '$o_lider_ta', '$o_colider_ta', '$o_edu_ta', '$fallas', '$actitud_ta', '$etapa_ta')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia de Avanzada",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM avanzada ORDER BY id_avanzada DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_avanzada = $row['id_avanzada'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi = 'EDUCADOR-1' || etapa_resi = 'EDUCADOR-2' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-4' || etapa_resi = 'TRASCENDENCIA' || etapa_resi = 'IDENTIDAD' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_avanzada, id_residente, status_asis) 
										VALUE ('$id_avanzada', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_avanzada = '$id_avanzada' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia avanzada ".$mysql->error;
				}else{
					header("Location: ../../../EditarTerapiaAvanzada.php?id=".$id_residente."&tera=".$id_avanzada);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM avanzada ORDER BY id_avanzada DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_avanzada = $row['id_avanzada'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi = 'EDUCADOR-1' || etapa_resi = 'EDUCADOR-2' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-4' || etapa_resi = 'TRASCENDENCIA' || etapa_resi = 'IDENTIDAD' ");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_avanzada, id_residente, status_asis) 
									VALUE ('$id_avanzada', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTAvanzada.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../EditarTerapiaAvanzada.php?id=".$id_residente."&tera=".$id_avanzada);
		 }

			
		}
	
		
			

	}

?>