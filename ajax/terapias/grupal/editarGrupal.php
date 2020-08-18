<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_tg = $_POST['id_tg'];
		$id_residente = $_POST['id_residente'];
		$lider_tg = $_POST['lider_tg'];
		$colider_tg = $_POST['colider_tg'];
		$director_tg = $_POST['director_tg'];
		$h_inicio_tg = $_POST['h_inicio_tg'];
		$h_fin_tg = $_POST['h_fin_tg'];
		$fecha_tg = $_POST['fecha_tg'];
		$o_lider_tg = $_POST['o_lider_tg'];
		$o_colider_tg = $_POST['o_colider_tg'];
		$o_director_tg = $_POST['o_director_tg'];
		$expo_tg = $_POST['expo_tg'];
		$actitud_tg = $_POST['actitud_tg'];
		


		$query = "UPDATE tera_grupal SET 
				  id_residente = '$id_residente',
				  lider_tg = '$lider_tg',
				  colider_tg = '$colider_tg',
				  director_tg = '$director_tg',
				  h_inicio_tg = '$h_inicio_tg',
				  h_fin_tg = '$h_fin_tg',
				  fecha_tg = '$fecha_tg',
				  o_lider_tg = '$o_lider_tg',
				  o_colider_tg = '$o_colider_tg',
				  o_director_tg = '$o_director_tg',
				  expo_tg = '$expo_tg',
				  actitud_tg = '$actitud_tg' 
		WHERE id_tg = '$id_tg'  ";


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Grupal",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_tg = '$id_tg'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
					// INSERTAR ASISTENCIA SIN GENERAR
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_tg, id_residente, status_asis) 
											VALUE ('$id_tg', '$residente', '0')";
							$resi_add_asis = $mysql->query($data);
						}
					$mysql->close();
					// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
				}

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_tg = '$id_tg' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_tg = '$id_tg' ";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_tg = '$id_tg' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al editar asistenecia terapia grupal ".$mysql->error;
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
					header("Location: ../../../editarTGrupal.php?id=".$id_residente."&teraG=".$id_tg);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTGrupal.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTGrupal.php?id=".$id_residente."&teraG=".$id_tg);
		 }
			
			
		}
	
		
			

	}

?>