<?php



	if(empty($_POST)){

		echo "¡Debe rellenar todos los campos!.";

	}elseif(isset($_POST)){
		
		require_once("../db_connection.php");

		$id_residente = $_POST['id_residente'];
		$fecha_l = $_POST['fecha_l'];
		$familiar = $_POST['familiar'];
		$social = $_POST['social'];
		$laboral = $_POST['laboral'];
		$academica = $_POST['academica'];
		$afectiva = $_POST['afectiva'];
		$conyugal = $_POST['conyugal'];

		$query ="INSERT INTO llamada_reducado (id_residente, 
								fecha_l, 
								familiar, 
								social, 
								laboral, 
								academica, 
								afectiva, 
								conyugal) 
								VALUES (
								'$id_residente' , 
								'$fecha_l', 
								'$familiar', 
								'$social', 
								'$laboral', 
								'$academica', 
								'$afectiva', 
								'$conyugal')";

		if(!$result = $mysql->query($query)){
			echo  "Error al agregar llamada".$mysql->error;
		}else{
			header("location: ../../reducadoLlamada.php?id=".$id_residente."&r=registrado");
		}
	}
		
			





?>