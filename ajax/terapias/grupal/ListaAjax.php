<?php 
	
	include_once("../../db_connection.php");

	$query = "SELECT * FROM tera_grupal ORDER BY id_tg DESC";
	$resultado = mysqli_query($mysql, $query);


	if(!$resultado)
	{
		die ("Error");
	}else{
		while($data = mysqli_fetch_assoc($resultado))
		{
			$arreglo["data"][] = $data;
		}

		echo json_encode($arreglo);

	}
	mysqli_free_result($resultado);
	mysqli_close($mysql);

	


?>