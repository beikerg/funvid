<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_ga = $_POST['id_ga'];
		$id_residente = $_POST['id_residente'];
		$colider_ga = $_POST['colider_ga'];
		$lider_ga = $_POST['lider_ga'];
		$solicita_ga = $_POST['solicita_ga'];
		$fecha_ga = $_POST['fecha_ga'];
		$h_inicio_ga = $_POST['h_inicio_ga'];
		$h_fin_ga = $_POST['h_fin_ga'];
		$o_lider_ga = $_POST['o_lider_ga'];
		$o_colider_ga = $_POST['o_colider_ga'];
		$o_solicita_ga = $_POST['o_solicita_ga'];
		$actitud_ga = $_POST['actitud_ga'];
		$etapa_ga = $_POST['etapa_ga'];
		//Array falla.
		$fallas  = implode(', ', $_POST['falla']) ;


		$query = "UPDATE grupo_atras SET 
				  id_residente = '$id_residente',
				  lider_ga = '$lider_ga',
				  colider_ga = '$colider_ga',
				  solicita_ga = '$solicita_ga',
				  fecha_ga = '$fecha_ga',
				  h_inicio_ga = '$h_inicio_ga',
				  h_fin_ga = '$h_fin_ga',
				  o_lider_ga = '$o_lider_ga',
				  o_colider_ga = '$o_colider_ga',
				  o_solicita_ga = '$o_solicita_ga',
				  fallas_ga = '$fallas', 
				  actitud_ga = '$actitud_ga',
				  etapa_ga = '$etapa_ga'
		WHERE id_ga = '$id_ga'  ";


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Grupo Atrás",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_ga = '$id_ga'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
					// INSERTAR ASISTENCIA SIN GENERAR
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi = 'EDUCADOR-1' || etapa_resi = 'EDUCADOR-2' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-4' ");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_ga, id_residente, status_asis) 
											VALUE ('$id_ga', '$residente', '0')";
							$resi_add_asis = $mysql->query($data);
						}
					$mysql->close();
					// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
				}

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_ga = '$id_ga' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_ga = '$id_ga' ";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_ga = '$id_ga' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al editar asistenecia terapia grupo atras ".$mysql->error;
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
					header("Location: ../../../EditarTerapiaGa.php?id=".$id_residente."&tera=".$id_ga);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTGa.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../EditarTerapiaGa.php?id=".$id_residente."&tera=".$id_ga);
		 }
			// header("location: ../../../ListaTGa.php");
			
		}
	
		
			

	}

?>