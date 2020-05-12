<?php

require_once("../db_connection.php");

	if(!empty($_POST)){

			// residente
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
			$fecha_registro = $_POST['fecha_registro'];
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

			// Etapas

				$status_etapa = $_POST['status_etapa'];
				$desc_etapa = $_POST['desc_etapa'];
				$fecha_inicio_etapa = $_POST['fecha_inicio_etapa'];
				//$fecha_fin_etapa = $_POST['fecha_fin_etapa'];
				$obser_etapa = $_POST['obser_etapa'];	

			

			$query = "INSERT INTO residentes(nombre, apellido, rut, sexo, telefono, fecha, nivel, profesion, direccion, localidad, provincia, correo, fecha_registro, id_etapa_resi, etapa_resi, direccion_3_m, direccion_consumo_3_m) VALUES ('$nombre', '$apellido', '$rut', '$sexo', '$telefono', '$fecha', '$nivel', '$profesion', '$direccion', '$localidad', '$provincia', '$correo', '$fecha_registro','1','INTEGRACION', '$direccion_3_m', '$direccion_consumo_3_m')";



		if($result = $mysql->query($query)){
			

			$residente_id = $mysql->insert_id;

			

				$cquery = "INSERT INTO familiares(id_residente,		
			nombre_p, apellido_p, fecha_p, nivel_p, ocupacion_p, telefono_p, direccion_p, tipo_relacion_p,
			m_nombre, m_apellido, m_fecha, m_nivel, m_ocupacion, m_telefono, m_direccion, m_tipo_relacion,
			telefono_p_t, direccion_p_t, m_telefono_t, m_direccion_t) 
			VALUES (".$residente_id.",		
			'$nombre_p', '$apellido_p', '$fecha_p', '$nivel_p', '$ocupacion_p', '$telefono_p', '$direccion_p', '$tipo_relacion_p',		
			'$m_nombre', '$m_apellido', '$m_fecha', '$m_nivel', '$m_ocupacion', '$m_telefono', '$m_direccion', '$m_tipo_relacion', 
			'$telefono_p_t', '$direccion_p_t', '$m_telefono_t', '$m_direccion_t')";

			
		$pareja = "INSERT INTO pareja(id_residente,
				 pareja_nom,
				  pareja_ape,
				   pareja_fecha, 
				   pareja_ocupa, 
				   pareja_nivel, 
				   pareja_hijos, 
				   pareja_correo, 
				   pareja_telf, 
				   pareja_trela,
				   pareja_direccion_p,
				   pareja_direccion_t,
				   pareja_telf_t) VALUES (".$residente_id.",
				 '$pareja_nom',
				  '$pareja_ape',
				   '$pareja_fecha',
				    '$pareja_ocupa', 
				    '$pareja_nivel', 
				    '$pareja_hijos', 
				    '$pareja_correo', 
				    '$pareja_telf', 
					'$pareja_trela',
					'$pareja_direccion_p',
					'$pareja_direccion_t',
					'$pareja_telf_t')"; 

			$trata = "INSERT INTO tratamiento(id_residente, remite, tanterior, aanterior, tactual, antecedentes, t_medica) VALUES (".$residente_id.", '$remite', '$tanterior', '$aanterior', '$tactual', '$antecedentes', '$t_medica')";

			$apodera = "INSERT INTO apoderado (id_residente, nombre_apo, apellido_apo, rut_apo, telefono_apo, tipo_r_apo, direccion_apo, direccion_apo_t, telefono_apo_t) VALUES (".$residente_id.", '$nombre_apo', '$apellido_apo', '$rut_apo', '$telefono_apo','$tipo_r_apo', '$direccion_apo', '$direccion_apo_t', '$telefono_apo_t')";

			$antelg = "INSERT INTO antecedentes (id_residente, descrip, antecedente_lg, tramite_p) VALUES (".$residente_id.", '$descrip', '$antecedente_lg', '$tramite_p')";

			$etapa = "INSERT INTO etapa (id_residente, status_etapa, desc_etapa, fecha_inicio_etapa,obser_etapa) VALUES (".$residente_id.", '$status_etapa', '$desc_etapa', '$fecha_inicio_etapa', '$obser_etapa')";


			if($mysql->query($cquery) 
				&& $mysql->query($pareja) 
				&& $mysql->query($trata) 
				&& $mysql->query($apodera)
				&& $mysql->query($antelg)
				&& $mysql->query($etapa)){

					header("Location: ../../registrarResidente.php?b=r");

				
			}else{
				echo "error ".$residente_id." ".mysqli_errno($mysql)." ".mysqli_error($mysql);
			}
		}else{	
			
		exit("Error de incersion").$mysql->error;

		}
	}else{
		header("Location: ../../registrarResidente.php?error=dato");
	}




?>