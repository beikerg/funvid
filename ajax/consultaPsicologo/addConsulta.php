<?php 
	
	require_once("../db_connection.php");

		$id = $_GET['id'];

	if(isset($_POST)){

		 $id_residente = $_POST['id_residente'];
		 $motivo = $_POST['motivo'];
		 $categoria = $_POST['categoria'];
		 $fecha_c = $_POST['fecha_c'];
		 $etapa = $_POST['etapa_resi'];



		 $query = "INSERT INTO consultap (id_residente, motivo, categoria, fecha_c, etapa)
		            VALUES ('$id_residente', '$motivo', '$categoria', '$fecha_c','$etapa')";


		   if($result = $mysql->query($query)){
		   	header('location: ../../historialResidente.php?id='.$id);
		   	
		   
		   }else{
		   	 echo "Error de insercion consulta ",$mysql->error;
		   }



	}

?>