<?php

	if(empty($_POST['fecha_tm']) || empty($_POST['motivo_tm']) || empty($_POST['diagnostico_tm']) || empty($_POST['observ_tm']) ){
		
  
		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(!empty($_POST['fecha_tm']) && !empty($_POST['motivo_tm'])  && !empty($_POST['diagnostico_tm']) || empty($_POST['observ_tm']) )
	{
		// include Database connection file 
			include("../../db_connection.php");

		// get values 
		$id_residente = $_POST['id_residente'];
		$etapa_tm = $_POST['etapa_tm'];
		$fecha_tm = $_POST['fecha_tm'];
		$motivo_tm = $_POST['motivo_tm'];
		$diagnostico_tm = $_POST['diagnostico_tm'];
		$medicamentos_tm = $_POST['medicamentos_tm'];
		$observ_tm = $_POST['observ_tm'];
		
		

			$query = "INSERT INTO tratamientos_medicos_api (id_residente, etapa_tm, fecha_tm, motivo_tm, diagnostico_tm, medicamentos_tm, observ_tm) VALUES ('$id_residente', '$etapa_tm', '$fecha_tm', '$motivo_tm', '$diagnostico_tm', '$medicamentos_tm', '$observ_tm')";

			if(!$rquery = $mysql->query($query))
			{
				echo  "Error al agregar Tratamientos medicos".$mysql->errno;
			}else{
				 echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){	
	    	 		$("#add_new_Tmedicos_modal").modal("hide");
	    	 		location.reload();
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php
			}

		
	}else{
		echo "Error del POST",$mysql->error;
	}
?>