<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_t_pase = $_POST['id_t_pase'];
		$id_residente = $_POST['id_residente'];
		$nombre_lider = $_POST['nombre_lider'];
		$nombre_colider = $_POST['nombre_colider'];
		$nombre_director = $_POST['nombre_director'];
		$fecha_t = $_POST['fecha_t'];
		$h_inicio = $_POST['h_inicio'];
		$h_fin = $_POST['h_fin'];
		$experiencia_r = $_POST['experiencia_r'];
		$o_lider = $_POST['o_lider'];
		$o_colider = $_POST['o_colider'];
		$o_director = $_POST['o_director'];



		$query = "UPDATE tera_pase
			SET 
				id_residente  =  '$id_residente',
				nombre_lider  =  '$nombre_lider',
				nombre_colider  =  '$nombre_colider',
				nombre_director  =  '$nombre_director',
				fecha_t  =  '$fecha_t',
				h_inicio  =  '$h_inicio',
				h_fin  =  '$h_fin',
				experiencia_r  =  '$experiencia_r',
				o_lider  =  '$o_lider',
				o_colider  =  '$o_colider',
				o_director  =  '$o_director'
		WHERE id_t_pase = '$id_t_pase' ";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al actualizar terapia".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_t_pase = '$id_t_pase'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
					// INSERTAR ASISTENCIA SIN GENERAR
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_t_pase, id_residente, status_asis) 
											VALUE ('$id_t_pase', '$residente', '0')";
							$resi_add_asis = $mysql->query($data);
						}
					$mysql->close();
					// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
				}

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_t_pase = '$id_t_pase' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_t_pase = '$id_t_pase' ";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_t_pase = '$id_t_pase' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al editar asistenecia terapia relato de pase ".$mysql->error;
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
					header("Location: ../../../editarTerapiaRelatoPase.php?id=".$id_t_pase);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTerapiaRelatoPase.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTerapiaRelatoPase.php?id=".$id_t_pase);
		 }
			
		}
	
		
			

	}

?>