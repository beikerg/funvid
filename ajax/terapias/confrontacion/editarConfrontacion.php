<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_t_conf = $_POST['id_t_conf'];
		$id_residente = $_POST['id_residente'];
		$colider_tc = $_POST['colider_tc'];
		$lider_tc = $_POST['lider_tc'];
		$director_tc = $_POST['director_tc'];
		$fecha_tc = $_POST['fecha_tc'];
		$h_inicio_tc = $_POST['h_inicio_tc'];
		$h_fin_tc = $_POST['h_fin_tc'];
		$o_lider_tc = $_POST['o_lider_tc'];
		$o_colider_tc = $_POST['o_colider_tc'];
		$o_director_tc = $_POST['o_director_tc'];
		$actitud_tc = $_POST['actitud_tc'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query = "UPDATE tera_confronta SET 
				  id_residente = '$id_residente',
				  lider_tc = '$lider_tc',
				  colider_tc = '$colider_tc',
				  director_tc = '$director_tc',
				  fecha_tc = '$fecha_tc',
				  h_inicio_tc = '$h_inicio_tc',
				  h_fin_tc = '$h_fin_tc',
				  o_lider_tc = '$o_lider_tc',
				  o_colider_tc = '$o_colider_tc',
				  o_director_tc = '$o_director_tc',
				  fallas = '$fallas', 
				  actitud_tc = '$actitud_tc' 
		WHERE id_t_conf = '$id_t_conf'  ";


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia de confrontacion ".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				if($_POST['c_sql'] == 0){
					// INSERTAR ASISTENCIA SIN GENERAR
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_t_conf, id_residente, status_asis) 
											VALUE ('$id_t_conf', '$residente', '0')";
							$resi_add_asis = $mysql->query($data);
						}
					$mysql->close();
					// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
				}

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_t_conf = '$id_t_conf' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_t_conf = '$id_t_conf' ";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_t_conf = '$id_t_conf' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al editar asistenecia terapia de confrontación".$mysql->error;
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
					header("Location: ../../../EditarTerapiaConfrontacion.php?id=".$id_residente."&tera=".$id_t_conf);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTConf.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../EditarTerapiaConfrontacion.php?id=".$id_residente."&tera=".$id_t_conf);
		 }
			
		}
	
		
			

	}

?>