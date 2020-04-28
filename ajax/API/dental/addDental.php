<?php

	if(empty($_POST['fecha_dental']) ){
		
  
		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(!empty($_POST['fecha_dental']))
	{
		// include Database connection file 
			include("../../db_connection.php");

		// get values 
		$id_residente = $_POST['id_residente'];
		$etapa_dental = $_POST['etapa_dental'];
		$nom_dental = $_POST['nom_dental'];
		$tratamiento_dental = $_POST['tratamiento_dental'];
		$fecha_dental = $_POST['fecha_dental'];
		$medica_dental = $_POST['medica_dental'];
		$obser_dental = $_POST['obser_dental'];
		

			$query = "INSERT INTO t_dental (id_residente, etapa_dental, nom_dental, tratamiento_dental, fecha_dental, medica_dental, obser_dental) VALUES ('$id_residente', '$etapa_dental', '$nom_dental', '$tratamiento_dental', '$fecha_dental', '$medica_dental', '$obser_dental')";

			if(!$rquery = $mysql->query($query))
			{
				echo  "Error al agregar Tratamiento Dental".$mysql->errno;
			}else{
				 echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){	
	    	 		$("#add_new_Dental_modal").modal("hide");
	    	 		location.reload();
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php
			}

		
	}else{
		echo "Error del POST",$mysql->error;
	}
?>