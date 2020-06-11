<?php

	if(empty($_POST['fecha_doping']) || empty($_POST['nombre_doping']) || empty($_POST['observ_doping']) ){
		
  
		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(!empty($_POST['fecha_doping']) && !empty($_POST['nombre_doping'])  && !empty($_POST['observ_doping']) )
	{
		// include Database connection file 
			include("../../db_connection.php");

		// get values 
		$id_residente = $_POST['id_residente'];
		$etapa_doping = $_POST['etapa_doping'];
		$nombre_doping = $_POST['nombre_doping'];
		$fecha_doping = $_POST['fecha_doping'];
		$observ_doping = $_POST['observ_doping'];
		
		

			$query = "INSERT INTO doping_api (id_residente, etapa_doping, fecha_doping, nombre_doping, observ_doping) VALUES ('$id_residente', '$etapa_doping', '$fecha_doping', '$nombre_doping', '$observ_doping')";

			if(!$rquery = $mysql->query($query))
			{
				echo  "Error al agregar Toma de Doping".$mysql->errno;
			}else{
				 echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){	
	    	 		$("#add_new_doping_modal").modal("hide");
	    	 		location.reload();
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php
			}

		
	}else{
		echo "Error del POST",$mysql->error;
	}
?>