<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$colider_te = $_POST['colider_te'];
		$lider_te = $_POST['lider_te'];
		$solicita_te = $_POST['solicita_te'];
		$fecha_te = $_POST['fecha_te'];
		$h_inicio_te = $_POST['h_inicio_te'];
		$h_fin_te = $_POST['h_fin_te'];
		$o_lider_te = $_POST['o_lider_te'];
		$o_colider_te = $_POST['o_colider_te'];
		$o_solicita_te = $_POST['o_solicita_te'];
		$actitud_te = $_POST['actitud_te'];
		$etapa_te = $_POST['etapa_te'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query ="INSERT INTO especial (id_residente, lider_te, colider_te, solicita_te, fecha_te, h_inicio_te, h_fin_te, o_lider_te, o_colider_te, o_solicita_te, fallas_te, actitud_te, etapa_te) VALUES ('$id_residente', '$lider_te', '$colider_te', '$solicita_te', '$fecha_te', '$h_inicio_te', '$h_fin_te', '$o_lider_te', '$o_colider_te', '$o_solicita_te', '$fallas', '$actitud_te', '$etapa_te')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Especial",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){
				$mysql->close();
				include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM especial ORDER BY id_especial DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_especial = $row['id_especial'];
				$mysql->close();

				// INSERTAR RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi = 'EDUCADOR-1' || etapa_resi = 'EDUCADOR-2' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-4' || etapa_resi = 'TRASCENDENCIA' || etapa_resi = 'IDENTIDAD' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "INSERT INTO asistencia (id_especial, id_residente, status_asis) 
										VALUE ('$id_especial', '$residente', '0')";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_especial = '$id_especial' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al agregar asistenecia terapia especial ".$mysql->error;
				}else{
					header("Location: ../../../EditarTerapiaEspecial.php?id=".$id_residente."&tera=".$id_especial);
				}
		}elseif(empty($_POST['resi'])){
			include("../../db_connection.php");
				// BUSCAR EL REGISTRO ANTERIOR DE TERAPIA DE CONFRONTACION
				$q = $mysql->query("SELECT * FROM especial ORDER BY id_especial DESC LIMIT 1");
				$row = $q->fetch_assoc();
				$id_especial = $row['id_especial'];
				$mysql->close();
				
			// INSERTAR ASISTENCIA SIN GENERAR
			include("../../db_connection.php");
			$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi = 'EDUCADOR-1' || etapa_resi = 'EDUCADOR-2' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-4' || etapa_resi = 'TRASCENDENCIA' || etapa_resi = 'IDENTIDAD' ");
				while($r = $resi_q->fetch_assoc()){
					$residente = $r['id_residente'];

					$data = "INSERT INTO asistencia (id_especial, id_residente, status_asis) 
									VALUE ('$id_especial', '$residente', '0')";
					$resi_add_asis = $mysql->query($data);
				}
			$mysql->close();
			// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTEspecial.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../EditarTerapiaEspecial.php?id=".$id_residente."&tera=".$id_especial);
		 }
			
			
		}
	
		
			

	}

?>