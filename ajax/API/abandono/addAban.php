<?php

	if(empty($_POST['motivo_aban']) || empty($_POST['actitud_aban']) || empty($_POST['fecha_aban'])){
		
  
		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(!empty($_POST['motivo_aban']) && !empty($_POST['actitud_aban']) && !empty($_POST['fecha_aban']) )
	{
		// include Database connection file 
			include("../../db_connection.php");

		// get values 
		$id_residente = $_POST['id_residente'];
		$etapa_aban = $_POST['etapa_aban'];
		$motivo_aban = $_POST['motivo_aban'];
		$actitud_aban = $_POST['actitud_aban'];
		$fecha_aban = $_POST['fecha_aban'];
		

			$query = "INSERT INTO abandono (id_residente, etapa_aban, motivo_aban, actitud_aban, fecha_aban) VALUES ('$id_residente', '$etapa_aban', '$motivo_aban', '$actitud_aban', '$fecha_aban')";

			if(!$rquery = $mysql->query($query))
			{
				echo  "Error al agregar etapa".$mysql->errno;
			}else{
				 echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){	
	    	 		$("#add_new_Aban_modal").modal("hide");
	    	 		location.reload();
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php
			}

		
	}else{
		echo "Error del POST",$mysql->error;
	}
?>