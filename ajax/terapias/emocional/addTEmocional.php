<?php 
	
	if($_POST){

		
		require_once("../../db_connection.php");

		
		$lider_emocional = $_POST['lider_emocional'];
		$fecha_emocional = $_POST['fecha_emocional'];
		$h_inicio_emocional = $_POST['h_inicio_emocional'];
		$h_fin_emocional = $_POST['h_fin_emocional'];
		$tematica_emocional = $_POST['tematica_emocional'];
		$objetivosg_emocional = $_POST['objetivosg_emocional'];
		$objetivosp_emocional = $_POST['objetivosp_emocional'];
		$actitud_emocional = $_POST['actitud_emocional'];


		$query ="INSERT INTO  emocional (lider_emocional, fecha_emocional, h_inicio_emocional, h_fin_emocional, tematica_emocional, objetivosg_emocional, objetivosp_emocional, actitud_emocional) 
						VALUES ('$lider_emocional', '$fecha_emocional', '$h_inicio_emocional', '$h_fin_emocional', '$tematica_emocional', '$objetivosg_emocional', '$objetivosp_emocional', '$actitud_emocional')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar terapia manejo emocional".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM emocional ORDER BY id_emocional DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_emocional = $row['id_emocional'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_emocional, id_residente, status_asis) 
										VALUE ('$id_emocional', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_emocional = '$id_emocional' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia educativa ".$mysql->error;
				}else{
					header("Location: ../../../editarTEmocional.php?id=".$id_emocional);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM emocional ORDER BY id_emocional DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_emocional = $row['id_emocional'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_emocional, id_residente, status_asis) 
									VALUE ('$id_emocional', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTEmocional.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTEmocional.php?id=".$id_emocional);
		 }
			// header("location: ../../../ListaTneuro.php");
		}
	
		
			

	}

?>