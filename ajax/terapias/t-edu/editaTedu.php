<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_tedu = $_POST['id_tedu'];
    	$lider_tedu = $_POST['lider_tedu'];
        $colider_tedu = $_POST['colider_tedu'];
        $fecha_tedu = $_POST['fecha_tedu'];
        $h_inicio_tedu = $_POST['h_inicio_tedu'];
        $h_fin_tedu = $_POST['h_fin_tedu'];
        $tematica_tedu = $_POST['tematica_tedu'];
    	$objetivo_tedu = $_POST['objetivo_tedu'];
        $observ_tedu = $_POST['observ_tedu'];
        $actitud_tedu = $_POST['actitud_tedu'];



		$query = "UPDATE t_educativa
			SET 
				lider_tedu  =  '$lider_tedu',
				colider_tedu  =  '$colider_tedu',
				fecha_tedu  =  '$fecha_tedu',	
				h_inicio_tedu  =  '$h_inicio_tedu',
				h_fin_tedu  =  '$h_fin_tedu',	
				tematica_tedu  =  '$tematica_tedu',	
				objetivo_tedu  =  '$objetivo_tedu',	
				observ_tedu  =  '$observ_tedu',
				actitud_tedu  =  '$actitud_tedu'
		WHERE id_tedu = '$id_tedu' ";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al actualizar terapia educativa".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_tedu = '$id_tedu'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
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

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_tedu = '$id_tedu' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_tedu = '$id_tedu' ";
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
					header("Location: ../../../editarTedu.php?id=".$id_tedu);
				}
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