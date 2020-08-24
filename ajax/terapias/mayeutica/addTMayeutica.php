<?php 
	
	if($_POST){

		
		require_once("../../db_connection.php");

		
		$lider_neuro = $_POST['lider_neuro'];
		$fecha_neuro = $_POST['fecha_neuro'];
		$h_inicio_neuro = $_POST['h_inicio_neuro'];
		$h_fin_neuro = $_POST['h_fin_neuro'];
		$tematica_neuro = $_POST['tematica_neuro'];
		$objetivosg_neuro = $_POST['objetivosg_neuro'];
		$objetivosp_neuro = $_POST['objetivosp_neuro'];
		$actitud_neuro = $_POST['actitud_neuro'];


		$query ="INSERT INTO  neuroplasticidad (lider_neuro, fecha_neuro, h_inicio_neuro, h_fin_neuro, tematica_neuro, objetivosg_neuro, objetivosp_neuro, actitud_neuro) 
						VALUES ('$lider_neuro', '$fecha_neuro', '$h_inicio_neuro', '$h_fin_neuro', '$tematica_neuro', '$objetivosg_neuro', '$objetivosp_neuro', '$actitud_neuro')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar terapia neuroplasticidad".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM neuroplasticidad ORDER BY id_neuro DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_neuro = $row['id_neuro'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_neuro, id_residente, status_asis) 
										VALUE ('$id_neuro', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_neuro = '$id_neuro' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia educativa ".$mysql->error;
				}else{
					header("Location: ../../../editarTNeuro.php?id=".$id_neuro);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM neuroplasticidad ORDER BY id_neuro DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_neuro = $row['id_neuro'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_neuro, id_residente, status_asis) 
									VALUE ('$id_neuro', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTNeuro.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTNeuro.php?id=".$id_neuro);
		 }
			// header("location: ../../../ListaTNeuro.php");
		}
	
		
			

	}

?>