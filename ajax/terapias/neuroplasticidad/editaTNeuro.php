<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_neuro = $_POST['id_neuro'];
    	$lider_neuro = $_POST['lider_neuro'];
        $fecha_neuro = $_POST['fecha_neuro'];
        $h_inicio_neuro = $_POST['h_inicio_neuro'];
        $h_fin_neuro = $_POST['h_fin_neuro'];
        $tematica_neuro = $_POST['tematica_neuro'];
    	$objetivosg_neuro = $_POST['objetivosg_neuro'];
        $objetivosp_neuro = $_POST['objetivosp_neuro'];
        $actitud_neuro = $_POST['actitud_neuro'];



		$query = "UPDATE neuroplasticidad
			SET 
				lider_neuro  =  '$lider_neuro',
				fecha_neuro =  '$fecha_neuro',	
				h_inicio_neuro  =  '$h_inicio_neuro',
				h_fin_neuro  =  '$h_fin_neuro',	
				tematica_neuro  =  '$tematica_neuro',	
				objetivosg_neuro  =  '$objetivosg_neuro',	
				objetivosp_neuro  =  '$objetivosp_neuro',
				actitud_neuro  =  '$actitud_neuro'
		WHERE id_neuro = '$id_neuro' ";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al actualizar terapia neuroplasticidad".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_neuro = '$id_neuro'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
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

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_neuro = '$id_neuro' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_neuro = '$id_neuro' ";
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
					header("Location: ../../../editarTNeuro.php?id=".$id_neuro);
				}
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