<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_redu = $_POST['id_redu'];
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


		$query = "UPDATE reunion_educadores SET 
				  id_residente = '$id_residente',
				  lider_redu = '$lider_redu',
				  colider_redu = '$colider_redu',
				  edu_redu = '$edu_redu',
				  fecha_redu = '$fecha_redu',
				  h_inicio_redu = '$h_inicio_redu',
				  h_fin_redu = '$h_fin_redu',
				  o_lider_redu = '$o_lider_redu',
				  o_colider_redu = '$o_colider_redu',
				  o_edu_redu = '$o_edu_redu',
				  fallas_redu = '$fallas', 
				  actitud_redu = '$actitud_redu',
				  etapa_redu = '$etapa_redu'
		WHERE id_redu = '$id_redu'  ";


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Reunión de Educadores",$mysql->error;
		}else{

			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_redu = '$id_redu'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
					// INSERTAR ASISTENCIA SIN GENERAR
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi = 'EDUCADOR-1' || etapa_resi = 'EDUCADOR-2' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-4' ");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_redu, id_residente, status_asis) 
											VALUE ('$id_redu', '$residente', '0')";
							$resi_add_asis = $mysql->query($data);
						}
					$mysql->close();
					// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
				}

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_redu = '$id_redu' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_redu = '$id_redu' ";
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
					echo "Error al editar asistenecia terapia reunion educadores ".$mysql->error;
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
					header("Location: ../../../EditarTerapiaEducador.php?id=".$id_residente."&tera=".$id_redu);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTEducador.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../EditarTerapiaEducador.php?id=".$id_residente."&tera=".$id_redu);
		 }
			
		}
		
			

	}

?>