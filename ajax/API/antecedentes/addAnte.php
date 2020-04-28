<?php

	if(empty($_POST['informacion_ante']) || empty($_POST['fecha_ante'])){
		
  
		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(!empty($_POST['informacion_ante']) && !empty($_POST['fecha_ante']))
	{
		// include Database connection file 
			include("../../db_connection.php");

		// get values 
		$id_residente = $_POST['id_residente'];
		$etapa_ante = $_POST['etapa_ante'];
		$informacion_ante = $_POST['informacion_ante'];
		$fecha_ante = $_POST['fecha_ante'];
		
		

			$query = "INSERT INTO ante_api (id_residente, etapa_ante, informacion_ante, fecha_ante) VALUES ('$id_residente', '$etapa_ante', '$informacion_ante', '$fecha_ante')";

			if(!$rquery = $mysql->query($query))
			{
				echo  "Error al agregar antecedente".$mysql->errno;
			}else{
				 echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){	
	    	 		$("#add_new_Ante_modal").modal("hide");
	    	 		location.reload();
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php
			}

		
	}else{
		echo "Error del POST",$mysql->error;
	}
?>