<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_avanzada = $_POST['id_avanzada'];
		$id_residente = $_POST['id_residente'];
		$colider_ta = $_POST['colider_ta'];
		$lider_ta = $_POST['lider_ta'];
		$edu_ta = $_POST['edu_ta'];
		$fecha_ta = $_POST['fecha_ta'];
		$h_inicio_ta = $_POST['h_inicio_ta'];
		$h_fin_ta = $_POST['h_fin_ta'];
		$o_lider_ta = $_POST['o_lider_ta'];
		$o_colider_ta = $_POST['o_colider_ta'];
		$o_edu_ta = $_POST['o_edu_ta'];
		$actitud_ta = $_POST['actitud_ta'];
		$etapa_ta = $_POST['etapa_ta'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query = "UPDATE avanzada SET 
				  id_residente = '$id_residente',
				  lider_ta = '$lider_ta',
				  colider_ta = '$colider_ta',
				  edu_ta = '$edu_ta',
				  fecha_ta = '$fecha_ta',
				  h_inicio_ta = '$h_inicio_ta',
				  h_fin_ta = '$h_fin_ta',
				  o_lider_ta = '$o_lider_ta',
				  o_colider_ta = '$o_colider_ta',
				  o_edu_ta = '$o_edu_ta',
				  fallas_ta = '$fallas', 
				  actitud_ta = '$actitud_ta',
				  etapa_ta = '$etapa_ta'
		WHERE id_avanzada = '$id_avanzada'  ";


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia de avanzada",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_avanzada = '$id_avanzada'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
					// INSERTAR ASISTENCIA SIN GENERAR
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_avanzada, id_residente, status_asis) 
											VALUE ('$id_avanzada', '$residente', '0')";
							$resi_add_asis = $mysql->query($data);
						}
					$mysql->close();
					// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
				}

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_avanzada = '$id_avanzada' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_avanzada = '$id_avanzada' ";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_avanzada = '$id_avanzada' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al editar asistenecia terapia avanzada ".$mysql->error;
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
					header("Location: ../../../EditarTerapiaAvanzada.php?id=".$id_residente."&tera=".$id_avanzada);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTAvanzada.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../EditarTerapiaAvanzada.php?id=".$id_residente."&tera=".$id_avanzada);
		 }
			
			
		}
	
		
			

	}

?>