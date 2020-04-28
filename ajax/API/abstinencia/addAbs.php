<?php

	if(empty($_POST['fecha_abst']) || empty($_POST['sintomas_abst']) || empty($_POST['obser_abst'])){
		
  
		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error; 

	}elseif(!empty($_POST['fecha_abst']) && !empty($_POST['sintomas_abst']) && !empty($_POST['obser_abst']) )
	{
		// include Database connection file 
			include("../../db_connection.php");

		// get values 
		$id_residente = $_POST['id_residente'];
		$etapa_abst = $_POST['etapa_abst'];
		$fecha_abst = $_POST['fecha_abst'];
		$sintomas_abst = $_POST['sintomas_abst'];
		$obser_abst = $_POST['obser_abst'];
		

			$query = "INSERT INTO abstinencia (id_residente, etapa_abst, fecha_abst, sintomas_abst, obser_abst) VALUES ('$id_residente', '$etapa_abst', '$fecha_abst', '$sintomas_abst', '$obser_abst')";

			if(!$rquery = $mysql->query($query))
			{
				echo  "Error al agregar etapa".$mysql->errno;
			}else{
				 echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){	
	    	 		$("#add_new_Abs_modal").modal("hide");
	    	 		location.reload();
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php
			}

		
	}else{
		echo "Error del POST",$mysql->error;
	}
?>