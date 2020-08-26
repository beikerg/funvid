<?php 
	
	if($_POST){

		
		require_once("../../db_connection.php");

		
		$lider_mayeutica = $_POST['lider_mayeutica'];
		$fecha_mayeutica = $_POST['fecha_mayeutica'];
		$h_inicio_mayeutica = $_POST['h_inicio_mayeutica'];
		$h_fin_mayeutica = $_POST['h_fin_mayeutica'];
		$tematica_mayeutica = $_POST['tematica_mayeutica'];
		$objetivosg_mayeutica = $_POST['objetivosg_mayeutica'];
		$objetivosp_mayeutica = $_POST['objetivosp_mayeutica'];
		$actitud_mayeutica = $_POST['actitud_mayeutica'];


		$query ="INSERT INTO  mayeutica (lider_mayeutica, fecha_mayeutica, h_inicio_mayeutica, h_fin_mayeutica, tematica_mayeutica, objetivosg_mayeutica, objetivosp_mayeutica, actitud_mayeutica) 
						VALUES ('$lider_mayeutica', '$fecha_mayeutica', '$h_inicio_mayeutica', '$h_fin_mayeutica', '$tematica_mayeutica', '$objetivosg_mayeutica', '$objetivosp_mayeutica', '$actitud_mayeutica')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar terapia mayeutica ".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM mayeutica ORDER BY id_mayeutica DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_mayeutica = $row['id_mayeutica'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_mayeutica, id_residente, status_asis) 
										VALUE ('$id_mayeutica', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_mayeutica = '$id_mayeutica' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia educativa ".$mysql->error;
				}else{
					header("Location: ../../../editarTMayeutica.php?id=".$id_mayeutica);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM mayeutica ORDER BY id_mayeutica DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_mayeutica = $row['id_mayeutica'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_mayeutica, id_residente, status_asis) 
									VALUE ('$id_mayeutica', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTMayeutica.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTMayeutica.php?id=".$id_mayeutica);
		 }
			// header("location: ../../../ListaTNeuro.php");
		}
	
		
			

	}

?>