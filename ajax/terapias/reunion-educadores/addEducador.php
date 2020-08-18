<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$colider_redu = $_POST['colider_redu'];
		$lider_redu = $_POST['lider_redu'];
		$edu_redu = $_POST['edu_redu'];
		$fecha_redu = $_POST['fecha_redu'];
		$h_inicio_redu = $_POST['h_inicio_redu'];
		$h_fin_redu = $_POST['h_fin_redu'];
		$o_lider_redu = $_POST['o_lider_redu'];
		$o_colider_redu = $_POST['o_colider_redu'];
		$o_edu_redu = $_POST['o_edu_redu'];
		$actitud_redu = $_POST['actitud_redu'];
		$etapa_redu = $_POST['etapa_redu'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query ="INSERT INTO reunion_educadores (id_residente, lider_redu, colider_redu, edu_redu, fecha_redu, h_inicio_redu, h_fin_redu, o_lider_redu, o_colider_redu, o_edu_redu, fallas_redu, actitud_redu, etapa_redu) VALUES ('$id_residente', '$lider_redu', '$colider_redu', '$edu_redu', '$fecha_redu', '$h_inicio_redu', '$h_fin_redu', '$o_lider_redu', '$o_colider_redu', '$o_edu_redu', '$fallas', '$actitud_redu', '$etapa_redu')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia reunión de educadores",$mysql->error;
		}else{ 
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM reunion_educadores ORDER BY id_redu DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_redu = $row['id_redu'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_redu, id_residente, status_asis) 
										VALUE ('$id_redu', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_redu = '$id_redu' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia reunión educadores ".$mysql->error;
				}else{
					header("Location: ../../../EditarTerapiaEducador.php?id=".$id_residente."&tera=".$id_redu);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM reunion_educadores ORDER BY id_redu DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_redu = $row['id_redu'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_redu, id_residente, status_asis) 
									VALUE ('$id_redu', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTEducador.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../EditarTerapiaEducador.php?id=".$id_residente."&tera=".$id_redu);
		 }
			// header("location: ../../../ListaTEducador.php");
			
		}
	
		
			

	}

?>