<?php

	echo "Id Residente: ".$_POST['id_residente']."<br>";

	echo "Nombre: ".$_POST['nombre_residente']."<br>";

	echo "Apellido: ".$_POST['apellido_residente']."<br>";

	echo $_POST['fecha_inicio_ayuda']."<br>";

	echo $_POST['fecha_fin_ayuda']."<br>";

	

	if($_POST['ayuda'] != ""){
		echo implode(", ", $_POST['ayuda'])."<br>";
	}else{
		echo "vacio <br>";
	}

	

	echo $_POST['obser_ayuda']."<br>";

	echo $_POST['id_ayuda'];
 ?>