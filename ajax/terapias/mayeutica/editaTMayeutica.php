<?php 
	
	if($_POST){
		
		require_once("../../db_connection.php");

		$id_mayeutica = $_POST['id_mayeutica'];
    	$lider_mayeutica = $_POST['lider_mayeutica'];
        $fecha_mayeutica = $_POST['fecha_mayeutica'];
        $h_inicio_mayeutica = $_POST['h_inicio_mayeutica'];
        $h_fin_mayeutica = $_POST['h_fin_mayeutica'];
        $tematica_mayeutica = $_POST['tematica_mayeutica'];
    	$objetivosg_mayeutica = $_POST['objetivosg_mayeutica'];
        $objetivosp_mayeutica = $_POST['objetivosp_mayeutica'];
        $actitud_mayeutica = $_POST['actitud_mayeutica'];



		$query = "UPDATE mayeutica
			SET 
				lider_mayeutica  =  '$lider_mayeutica',
				fecha_mayeutica =  '$fecha_mayeutica',	
				h_inicio_mayeutica  =  '$h_inicio_mayeutica',
				h_fin_mayeutica  =  '$h_fin_mayeutica',	
				tematica_mayeutica  =  '$tematica_mayeutica',	
				objetivosg_mayeutica  =  '$objetivosg_mayeutica',	
				objetivosp_mayeutica  =  '$objetivosp_mayeutica',
				actitud_mayeutica  =  '$actitud_mayeutica'
		WHERE id_mayeutica = '$id_mayeutica' ";

		

		if(!$result = $mysql->query($query)){
			echo  "Error al actualizar terapia mayéutica".$mysql->error;
		}else{
			if($_POST['botones'] == 'save'){

				include('../../db_connection.php');
				$asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_mayeutica = '$id_mayeutica'");
				$c_sql = mysqli_num_rows($asis_sql);

				if($c_sql == 0){
					// INSERTAR ASISTENCIA SIN GENERAR
					include("../../db_connection.php");
					$resi_q = $mysql->query("SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO'");
						while($r = $resi_q->fetch_assoc()){
							$residente = $r['id_residente'];

							$data = "INSERT INTO asistencia (id_mayeutica, id_residente, status_asis) 
											VALUE ('$id_mayeutica', '$residente', '0')";
							$resi_add_asis = $mysql->query($data);
						}
					$mysql->close();
					// --- FIN LISTA DE RESIDENTES - INSERT - SIN GENERAR
				}

				// UPDATE RESIDENTES PARA INICIO DE ASISTENCIA
				include("../../db_connection.php");
				$resi_q = $mysql->query("SELECT * FROM asistencia WHERE id_mayeutica = '$id_mayeutica' ");
					while($r = $resi_q->fetch_assoc()){
						$residente = $r['id_residente'];

						$data = "UPDATE asistencia SET status_asis = '0' WHERE id_mayeutica = '$id_mayeutica' ";
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

					$data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_mayeutica = '$id_mayeutica' ";

					$resultado = $mysql->query($data_resi);
					$i++;
				}
				$mysql->close();
				// FIN ASISTENCIA - ADD

				if(!$resi_add_asis && !$resultado){
					echo "Error al editar asistenecia terapia mayeutica ".$mysql->error;
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
					header("Location: ../../../editarTMayeutica.php?id=".$id_mayeutica);
				}
		}

		if($_POST['botones'] == 'Guardar'){
			header("location: ../../../ListaTMayeutica.php");
		 }elseif($_POST['botones'] == 'save'){
			header("Location: ../../../editarTMayeutica.php?id=".$id_mayeutica);
		 }
			// header("location: ../../../ListaTNeuro.php");


		}
	
		
			

	}

?>