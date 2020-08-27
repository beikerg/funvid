<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_emocional = $_POST['id_emocional'];
    	$lider_emocional = $_POST['lider_emocional'];
        $fecha_emocional = $_POST['fecha_emocional'];
        $h_inicio_emocional = $_POST['h_inicio_emocional'];
        $h_fin_emocional = $_POST['h_fin_emocional'];
        $tematica_emocional = $_POST['tematica_emocional'];
    	$objetivosg_emocional = $_POST['objetivosg_emocional'];
        $objetivosp_emocional = $_POST['objetivosp_emocional'];
        $actitud_emocional = $_POST['actitud_emocional'];



		$query = "UPDATE emocional
			SET 
				lider_emocional  =  '$lider_emocional',
				fecha_emocional =  '$fecha_emocional',	
				h_inicio_emocional  =  '$h_inicio_emocional',
				h_fin_emocional  =  '$h_fin_emocional',	
				tematica_emocional  =  '$tematica_emocional',	
				objetivosg_emocional  =  '$objetivosg_emocional',	
				objetivosp_emocional  =  '$objetivosp_emocional',
				actitud_emocional  =  '$actitud_emocional'
		WHERE id_emocional = '$id_emocional' ";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al actualizar terapia manejo emocional ".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_emocional = '$id_emocional'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
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

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_emocional = '$id_emocional' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_emocional = '$id_emocional' ";
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
					echo "Error al editar asistenecia terapia educativa ".$mysql->error;
				}else{
					//POST DEL ARRAY - INASISTENCIA
					if(!empty($_POST['item'])){
						foreach ($_POST['id'] as $ids) {

							$ina = $_POST['item'][$ids];
							$item = implode(',',$ina);
							$id_residen = $_POST['id_residen'][$ids];
							$observ_asis = $_POST['observ_asis'][$ids];
						
							
							include('../../db_connection.php');
							$update_asis = "UPDATE asistencia SET observ_asis = '$observ_asis', item_asis = '$item' WHERE id_residente = '$id_residen' AND id_asis = '$ids' ";
							$resu_asis = $mysql->query($update_asis);
							if(!$resu_asis){
								echo "Error al agregar detalles de inasistencia ".$mysql->error;
							}
						}
						$mysql->close();	
					}
					
					
					// header("Location: ../../../editarTs.php?id=".$id_ts);
					header("Location: ../../../editarTEmocional.php?id=".$id_emocional);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTEmocional.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTEmocional.php?id=".$id_emocional);
		 }
			// header("location: ../../../ListaTNeuro.php");


		}
	
		
			

	}

?>