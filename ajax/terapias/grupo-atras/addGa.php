<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$colider_ga = $_POST['colider_ga'];
		$lider_ga = $_POST['lider_ga'];
		$solicita_ga = $_POST['solicita_ga'];
		$fecha_ga = $_POST['fecha_ga'];
		$h_inicio_ga = $_POST['h_inicio_ga'];
		$h_fin_ga = $_POST['h_fin_ga'];
		$o_lider_ga = $_POST['o_lider_ga'];
		$o_colider_ga = $_POST['o_colider_ga'];
		$o_solicita_ga = $_POST['o_solicita_ga'];
		$actitud_ga = $_POST['actitud_ga'];
		$etapa_ga = $_POST['etapa_ga'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query ="INSERT INTO grupo_atras (id_residente, lider_ga, colider_ga, solicita_ga, fecha_ga, h_inicio_ga, h_fin_ga, o_lider_ga, o_colider_ga, o_solicita_ga, fallas_ga, actitud_ga, etapa_ga) VALUES ('$id_residente', '$lider_ga', '$colider_ga', '$solicita_ga', '$fecha_ga', '$h_inicio_ga', '$h_fin_ga', '$o_lider_ga', '$o_colider_ga', '$o_solicita_ga', '$fallas', '$actitud_ga', '$etapa_ga')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Grupo Atrás",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM grupo_atras ORDER BY id_ga DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_ga = $row['id_ga'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_ga, id_residente, status_asis) 
										VALUE ('$id_ga', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_ga = '$id_ga' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia grupo atras ".$mysql->error;
				}else{
					header("Location: ../../../EditarTerapiaGa.php?id=".$id_residente."&tera=".$id_ga);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM grupo_atras ORDER BY id_ga DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_ga = $row['id_ga'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_ga, id_residente, status_asis) 
									VALUE ('$id_ga', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTGa.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../EditarTerapiaGa.php?id=".$id_residente."&tera=".$id_ga);
		 }
			// header("location: ../../../ListaTGa.php");
			
		}
	
		
			

	}

?>