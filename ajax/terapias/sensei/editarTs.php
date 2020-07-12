<?php 
	
	if($_POST){

		
		
		require_once("../../db_connection.php");

		$id_ts = $_POST['id_ts'];
		$terapeuta_ts = $_POST['terapeuta_ts'];
		$colider_ts = $_POST['colider_ts'];
		$fecha_ts = $_POST['fecha_ts'];
		$h_inicio_ts = $_POST['h_inicio_ts'];
		$h_fin_ts = $_POST['h_fin_ts'];
		$tematica_ts = $_POST['tematica_ts'];
		$obj_ts = $_POST['obj_ts'];
		$observ_ts = $_POST['observ_ts'];
		$observ_colider_ts = $_POST['observ_colider_ts'];
		$actitud_ts = $_POST['actitud_ts'];
		
		$query = "UPDATE t_sensei
					SET 
						terapeuta_ts = '$terapeuta_ts',
						colider_ts = '$colider_ts',
						fecha_ts = '$fecha_ts',
						h_inicio_ts = '$h_inicio_ts',
						h_fin_ts = '$h_fin_ts',
						tematica_ts = '$tematica_ts',
						obj_ts = '$obj_ts',
						observ_ts = '$observ_ts',
						observ_colider_ts = '$observ_colider_ts',
						actitud_ts = '$actitud_ts'
					WHERE
						id_ts = '$id_ts' ";
		


		if(!$result = $mysql->query($query)){
			echo  "Error al agregar Terapia Sensei (Deportiva)",$mysql->error;
		}else{
			$mysql->close();
		
		//INICIO DE NUEVA ASISTENCIA
		include('../../db_connection.php');
		$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_ts = '$id_ts'");
		$c_sql = mysqli_num_rows($asis_sql);
		
		// VALIDACION DE NUEVA ASISTENCIA O CAMBIO DE LA YA GUARDADA
		if($c_sql == 0){
				//NUEVA ASISTENCIA 
					include("../../db_connection.php");

				$status = '0';
				$number_resi = count($_POST['resi']);
				$id_ts =  $_POST['id_ts'];
			
				$sql = "SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO' ";                        //use for MySQLi-OOP
				$query = $mysql->query($sql);
					while($row = $query->fetch_assoc()){
						$residente = $row['id_residente'];

						$data = "INSERT INTO asistencia (id_ts, id_residente, status_asis) 
								VALUES ('$id_ts', '$residente', '$status')";
				
						$result_add = $mysql->query($data);
					}
					$mysql->close();
		
				
				include('../../db_connection.php');
				$i = 0;
				while ($i < $number_resi){
					$id_data = $_POST['resi'][$i];
					
					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_ts = '$id_ts' ";
				
				$resultado = $mysql->query($data_resi);
				
				$i++;    
				}
				$mysql->close();
			

				if(!$result_add && !$resultado)
				{
					echo  "Error al agregar nueva asistencia Terapia Sensei",$mysql->error;

				}else{

					header("Location: ../../../editarTs.php?id=".$id_ts);
				}

		}else{
			// EDITAR ASISTENCIA - AGREGAR INASISTENCIA
				include("../../db_connection.php");

				$status_edit = '0';
				$number_resi = count($_POST['resi']);
				$id_ts =  $_POST['id_ts'];
			
				$sql_edit = "SELECT * FROM asistencia WHERE id_ts = '$id_ts' ";                        //use for MySQLi-OOP
				$query_edit = $mysql->query($sql_edit);
					while($row_edit = $query_edit->fetch_assoc()){
						$residente = $row_edit['id_residente'];

						$data_edit = "UPDATE asistencia SET status_asis = '$status_edit' WHERE id_ts = '$id_ts' ";
				
						$result_edit = $mysql->query($data_edit);
					}
					$mysql->close();
		
				
				include('../../db_connection.php');
				$i = 0;
				while ($i < $number_resi){
					$id_data = $_POST['resi'][$i];
					
					$data_resi_edit = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_ts = '$id_ts' ";
				
				$resultado_edit = $mysql->query($data_resi_edit);
				
				$i++;    
				}
				$mysql->close();


			

				if(!$resultado_edit)
				{
					echo  "Error al agregar update Terapia Sensei",$mysql->error;

				}else{

					// POSTS DEL ARRAY INASISTENCIA

					foreach ($_POST['id'] as $ids) {

						$ina = $_POST['item'][$ids];
						$item = implode(',',$ina);
						$id_residente = $_POST['id_residente'][$ids];
						$observ_asis = $_POST['observ_asis'][$ids];
					
						
						include('../../db_connection.php');
						$update_asis = "UPDATE asistencia SET observ_asis = '$observ_asis', item_asis = '$item' WHERE id_residente = '$id_residente' AND id_asis = '$ids' ";
						$resu_asis = $mysql->query($update_asis);
						if(!$resu_asis){
							echo "Error al agregar detalles de inasistencia ".$mysql->error;
						}
					}
					$mysql->close();
					
					header("Location: ../../../editarTs.php?id=".$id_ts);
				}
		}

			if($_POST['asistencia']){
				header("Location: ../../../editarTs.php?id=".$id_ts);
			}elseif($_POST['guardar']){
				header("location: ../../../ListaTs.php");
			}
			
			
		}
	
		
			

	}

?>