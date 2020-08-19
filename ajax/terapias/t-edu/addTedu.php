<?php 
	
	if($_POST){

		
		require_once("../../db_connection.php");

		
		$lider_tedu = $_POST['lider_tedu'];
		$colider_tedu = $_POST['colider_tedu'];
		$fecha_tedu = $_POST['fecha_tedu'];
		$h_inicio_tedu = $_POST['h_inicio_tedu'];
		$h_fin_tedu = $_POST['h_fin_tedu'];
		$tematica_tedu = $_POST['tematica_tedu'];
		$objetivo_tedu = $_POST['objetivo_tedu'];
		$observ_tedu = $_POST['observ_tedu'];
		$actitud_tedu = $_POST['actitud_tedu'];


		$query ="INSERT INTO t_educativa (lider_tedu, colider_tedu, fecha_tedu, h_inicio_tedu, h_fin_tedu, tematica_tedu, objetivo_tedu, observ_tedu, actitud_tedu) 
						VALUES ('$lider_tedu', '$colider_tedu', '$fecha_tedu', '$h_inicio_tedu', '$h_fin_tedu', '$tematica_tedu', '$objetivo_tedu', '$observ_tedu', '$actitud_tedu')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar terapia".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM t_educativa ORDER BY id_tedu DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_tedu = $row['id_tedu'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_tedu, id_residente, status_asis) 
										VALUE ('$id_tedu', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_tedu = '$id_tedu' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia educativa ".$mysql->error;
				}else{
					header("Location: ../../../editarTedu.php?id=".$id_tedu);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM t_educativa ORDER BY id_tedu DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_tedu = $row['id_tedu'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_tedu, id_residente, status_asis) 
									VALUE ('$id_tedu', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTedu.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTedu.php?id=".$id_tedu);
		 }
			// header("location: ../../../ListaTedu.php");
		}
	
		
			

	}

?>