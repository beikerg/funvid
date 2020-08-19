<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_ti = $_POST['id_ti'];
		$director_ti = $_POST['director_ti'];
		$colider_ti = $_POST['colider_ti'];
		$fecha_ti = $_POST['fecha_ti'];
		$h_inicio_ti = $_POST['h_inicio_ti'];
		$h_fin_ti = $_POST['h_fin_ti'];
		$tematica_ti = $_POST['tematica_ti'];
		$obj_ti = $_POST['obj_ti'];
		$obser_ti = $_POST['obser_ti'];
		
		$query = "UPDATE tera_inf
					SET 
						director_ti = '$director_ti',
						colider_ti = '$colider_ti',
						fecha_ti = '$fecha_ti',
						h_inicio_ti = '$h_inicio_ti',
						h_fin_ti = '$h_fin_ti',
						tematica_ti = '$tematica_ti',
						obj_ti = '$obj_ti',
						obser_ti = '$obser_ti'
					WHERE
						id_ti = '$id_ti' ";
		


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Informativa",$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_ti = '$id_ti'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
					// INSERTAR ASISTENCIA SIN GENERAR
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_ti, id_residente, status_asis) 
											VALUE ('$id_ti', '$residente', '0')";
							$resi_add_asis = $mysql->query($data);
						}
					$mysql->close();
					// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
				}

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_ti = '$id_ti' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_ti = '$id_ti' ";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_ti = '$id_ti' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al editar asistenecia terapia reflexión ".$mysql->error;
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
					header("Location: ../../../editarTInf.php?id=".$id_ti);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTInf.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTInf.php?id=".$id_ti);
		 }
			// header("location: ../../../ListaTInf.php");
			
		}
	
		
			

	}

?>