<?php

	if(empty($_POST['status_etapa']) || empty($_POST['desc_etapa']) || empty($_POST['fecha_inicio_etapa']) || empty($_POST['obser_etapa']) || empty($_POST['id_residente']) ){
		
  
		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(!empty($_POST['status_etapa']) && !empty($_POST['desc_etapa']) && !empty($_POST['fecha_inicio_etapa']) && !empty($_POST['obser_etapa']) && !empty($_POST['id_residente']))
	{
		// include Database connection file 
			include("../db_connection.php");

		// get values 
		$id_residente = $_POST['id_residente'];
		$status_etapa = $_POST['status_etapa'];
		$desc_etapa = $_POST['desc_etapa'];
		$fecha_inicio_etapa = $_POST['fecha_inicio_etapa'];
		$obser_etapa = $_POST['obser_etapa'];
		
		date_default_timezone_set("America/Santiago");

// LA SIGUIENTE SECCIÓN AGREGA DE MANERA AUTOMÁTICA UNA FECHA A LA SECCIÓN DE TERMINO DE ETAPA
// AGREFANDO LA FECHA DE UN DIA ANTERIOR A EL INICIO DE LA NUEVA ETAPA
// ->--> SE QUITA POR GENERAR FALLAS.
		// $fecha=date('Y-m-d');
		// $dias= 1; 
		// $t_dia = date("Y-m-d", strtotime("$fecha -$dias day"));

		// $e_anterior = $mysql->query("SELECT e.*, r.id_residente FROM etapa e INNER JOIN residentes r ON e.id_residente = r.id_residente WHERE e.id_residente = '$id_residente' ORDER BY id_etapa DESC LIMIT 1");
		
		// $r_e_anterior = mysqli_num_rows($e_anterior);
		// if ($r_e_anterior > 0)
		// {
		// 	while($eRow = $e_anterior->fetch_assoc())
		// 	{
		// 		$id_etapa_modif = $eRow['id_etapa'];
		// 	}
		// }

		// if 

		// $termino_etapa = "UPDATE etapa SET fecha_fin_etapa = '$t_dia' WHERE id_etapa = '$id_etapa_modif' ";
		if($desc_etapa == 1)
		{
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'INTEGRACION', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 2){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'CONFIANZA', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 3){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'INICIATIVA', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 4){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'IDENTIDAD', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 5){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'TRASCENDENCIA', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 6){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'EDUCADOR-1', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 7){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'EDUCADOR-2', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 8){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'EDUCADOR-3', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 9){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'EDUCADOR-4', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 10){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'REDUCADO', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}elseif($desc_etapa == 11){
			$cambio_etapa_r = "UPDATE residentes SET etapa_resi = 'ABANDONO', id_etapa_resi = '$desc_etapa' WHERE id_residente = '$id_residente' ";	
		}
		
		// $mysql->query($termino_etapa) && 
		

		if($mysql->query($cambio_etapa_r))	
		{
			$query = "INSERT INTO etapa (id_residente, status_etapa, desc_etapa, fecha_inicio_etapa, obser_etapa) VALUES ('$id_residente', '$status_etapa', '$desc_etapa', '$fecha_inicio_etapa', '$obser_etapa')";

			if(!$rquery = $mysql->query($query))
			{
				echo  "Error al agregar etapa".$mysql->errno;
			}else{
				 echo "<center><p class='alert alert-success alert-dismissible' data-auto-dismiss='1000' role='alert'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El usuario se ha agregado con éxito.</p></center>";
				 				  
	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){	
	    	 		$("#add_new_Etapas_modal").modal("hide");
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php
			}

		}else{
			echo "Error al editar etapa anterior".$mysql->error; 
		}

	}else{
		echo "Error del POST",$mysql->error;
	}
?>