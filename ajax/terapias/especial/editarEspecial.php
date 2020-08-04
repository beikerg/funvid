<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_especial = $_POST['id_especial'];
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


		$query = "UPDATE especial SET 
				  id_residente = '$id_residente',
				  lider_te = '$lider_te',
				  colider_te = '$colider_te',
				  solicita_te = '$solicita_te',
				  fecha_te = '$fecha_te',
				  h_inicio_te = '$h_inicio_te',
				  h_fin_te = '$h_fin_te',
				  o_lider_te = '$o_lider_te',
				  o_colider_te = '$o_colider_te',
				  o_solicita_te = '$o_solicita_te',
				  fallas_te = '$fallas', 
				  actitud_te = '$actitud_te',
				  etapa_te = '$etapa_te'
		WHERE id_especial = '$id_especial'  ";


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia especial",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_especial = '$id_especial'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
					// INSERTAR ASISTENCIA SIN GENERAR
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_especial, id_residente, status_asis) 
											VALUE ('$id_especial', '$residente', '0')";
							$resi_add_asis = $mysql->query($data);
						}
					$mysql->close();
					// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
				}

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_especial = '$id_especial' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_especial = '$id_especial' ";
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
					echo "Error al editar asistenecia terapia especial ".$mysql->error;
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
					header("Location: ../../../EditarTerapiaEspecial.php?id=".$id_residente."&tera=".$id_especial);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTEspecial.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../EditarTerapiaEspecial.php?id=".$id_residente."&tera=".$id_especial);
		 }
			
		}
	
		
			

	}

?>