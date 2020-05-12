<?php 
	

require_once("../db_connection.php");

	if(!empty($_POST)){

			// residente
			$id_residente = $_POST['id_residente'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$rut = $_POST['rut'];
			$sexo = $_POST['sexo'];
			$telefono = $_POST['telefono'];
			$fecha = $_POST['fecha'];
			$nivel = $_POST['nivel'];
			$profesion = $_POST['profesion'];
			$direccion = $_POST['direccion'];
			$localidad = $_POST['localidad'];
			$provincia = $_POST['provincia'];
			$correo = $_POST['correo'];
			$direccion_3_m = $_POST['direccion_3_m'];
			$direccion_consumo_3_m = $_POST['direccion_consumo_3_m'];


			//Nucleo familiar
				//Padre

				$nombre_p = $_POST['nombre_p'];
				$apellido_p = $_POST['apellido_p'];
				$fecha_p = $_POST['fecha_p'];
				$nivel_p = $_POST['nivel_p'];
				$ocupacion_p = $_POST['ocupacion_p'];
				$telefono_p = $_POST['telefono_p'];
				$direccion_p = $_POST['direccion_p'];
				$tipo_relacion_p = $_POST['tipo_relacion_p'];
				$telefono_p_t = $_POST['telefono_p_t'];
				$direccion_p_t = $_POST['direccion_p_t'];


				//Madre
				$m_nombre = $_POST['m_nombre'];
				$m_apellido = $_POST['m_apellido'];
				$m_fecha = $_POST['m_fecha'];
				$m_nivel = $_POST['m_nivel'];
				$m_ocupacion = $_POST['m_ocupacion'];
				$m_telefono = $_POST['m_telefono'];
				$m_direccion = $_POST['m_direccion'];
				$m_tipo_relacion = $_POST['m_tipo_relacion']; 
				$m_telefono_t = $_POST['m_telefono_t'];
				$m_direccion_t = $_POST['m_direccion_t'];


			// Pareja

				$pareja_nom = $_POST['pareja_nom'];
				$pareja_ape = $_POST['pareja_ape'];
				$pareja_fecha = $_POST['pareja_fecha'];
				$pareja_ocupa = $_POST['pareja_ocupa'];
				$pareja_nivel = $_POST['pareja_nivel'];
				$pareja_hijos = $_POST['pareja_hijos'];
				$pareja_correo = $_POST['pareja_correo'];
				$pareja_telf = $_POST['pareja_telf'];
				$pareja_trela = $_POST['pareja_trela']; 
				$pareja_direccion_p = $_POST['pareja_direccion_p'];
				$pareja_direccion_t = $_POST['pareja_direccion_t'];
				$pareja_telf_t = $_POST['pareja_telf_t'];

			// Tramatientos Anteriores

				$remite = $_POST['remite'];
				$tanterior = $_POST['tanterior'];
				$aanterior = $_POST['aanterior'];
				$tactual = $_POST['tactual'];
				$antecedentes = $_POST['antecedentes'];
				$t_medica = $_POST['t_medica'];

			// Apoderado

				$nombre_apo = $_POST['nombre_apo'];
				$apellido_apo = $_POST['apellido_apo'];
				$rut_apo = $_POST['rut_apo'];
				$telefono_apo = $_POST['telefono_apo'];
				$tipo_r_apo = $_POST['tipo_r_apo'];
				$direccion_apo = $_POST['direccion_apo'];
				$direccion_apo_t = $_POST['direccion_apo_t'];
				$telefono_apo_t = $_POST['telefono_apo_t'];

			// Antecedentes legales

				$descrip = $_POST['descrip'];
				$antecedente_lg = $_POST['antecedente_lg'];
				$tramite_p = $_POST['tramite_p'];


			$query ="UPDATE residentes SET nombre = '$nombre', apellido = '$apellido', rut = '$rut', sexo = '$sexo', telefono = '$telefono', fecha = '$fecha', nivel = '$nivel', profesion = '$profesion', direccion = '$direccion', localidad = '$localidad', provincia = '$provincia', correo = '$correo', direccion_3_m = '$direccion_3_m', direccion_consumo_3_m = '$direccion_consumo_3_m' WHERE id_residente = '$id_residente' ";



			


		if($result = $mysql->query($query)){
			

			
			$cquery ="UPDATE familiares 
				
				SET 

				/* PADRE */
				nombre_p = '$nombre_p', 
				apellido_p = '$apellido_p', 
				fecha_p = '$fecha_p', 
				nivel_p = '$nivel_p', 
				ocupacion_p = '$ocupacion_p', 
				telefono_p = '$telefono_p', 
				direccion_p = '$direccion_p', 
				tipo_relacion_p = '$tipo_relacion_p',
				telefono_p_t = '$telefono_p_t',
				direccion_p_t = '$direccion_p_t',
				/* MADRE */
				m_nombre = '$m_nombre', 
				m_apellido = '$m_apellido', 
				m_fecha = '$m_fecha', 
				m_nivel = '$m_nivel', 
				m_ocupacion = '$m_ocupacion', 
				m_telefono = '$m_telefono', 
				m_direccion = '$m_direccion', 
				m_tipo_relacion = '$m_tipo_relacion',
				m_direccion_t = '$m_direccion_t',
				m_telefono_t = '$m_telefono_t'

			WHERE 
				id_residente = '$id_residente' ";
			

			$pareja = "UPDATE pareja 
					SET 
						pareja_nom = '$pareja_nom',
				    	pareja_ape = '$pareja_ape',
				   		pareja_fecha = '$pareja_fecha', 
				   		pareja_ocupa = '$pareja_ocupa', 	
				   		pareja_nivel = '$pareja_nivel', 
				   		pareja_hijos = '$pareja_hijos', 
				  		pareja_correo = '$pareja_correo', 
				  		pareja_telf = '$pareja_telf', 
				   		pareja_trela = '$pareja_trela',
						pareja_direccion_p = '$pareja_direccion_p',
						pareja_direccion_t = '$pareja_direccion_t',
						pareja_telf_t = '$pareja_telf_t'
				   	WHERE 
				   		id_residente = '$id_residente' ";

			
			$trata = "UPDATE tratamiento
						SET
							remite = '$remite', 
							tanterior = '$tanterior', 
							aanterior = '$aanterior', 
							tactual = 'tactual', 
							antecedentes = '$antecedentes',
							t_medica = '$t_medica' 
						WHERE
							id_residente = '$id_residente' ";

			$apodera = "UPDATE apoderado
							SET
								nombre_apo = '$nombre_apo',
								apellido_apo = '$apellido_apo',
								rut_apo = '$rut_apo',
								telefono_apo = '$telefono_apo',
								tipo_r_apo = '$tipo_r_apo',
								direccion_apo = '$direccion_apo',
								direccion_apo_t = '$direccion_apo_t',
								telefono_apo_t = '$telefono_apo_t'
							WHERE
								id_residente = '$id_residente' ";

			$antelg = "UPDATE antecedentes
						SET
							descrip = '$descrip',
							antecedente_lg = '$antecedente_lg',
							tramite_p = '$tramite_p'
						WHERE
							id_residente = '$id_residente' ";
			

			if($mysql->query($cquery) 
				&& $mysql->query($pareja) 
				&& $mysql->query($trata)
				&& $mysql->query($apodera)
				&& $mysql->query($antelg)){

					header("Location: ../../editarResidente.php?id=".$id_residente."&b=r");

				
			}else{
				echo "error Familiares ".$residente_id." ".mysqli_errno($mysql)." ".mysqli_error($mysql);
			}
		}else{	
			
		exit("Error de incersion").$mysql->error;

		}
	}else{
		header("Location: ../../editarResidente.php?error=dato");
	}




?>
?>