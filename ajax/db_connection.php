<?php

// Variables de conexion 
$host = "50.31.174.137"; // MySQL host name eg. localhost
$user = "toblqrjl"; // MySQL user. eg. root ( if your on localserver)
$password = "hk6Q(4nXd9OW+9"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "toblqrjl_prueba"; // MySQL Database name

// Conectar a la base de datos MySQL
$mysql = new mysqli($host, $user, $password, $database) or die("Could not connect to database");

	if($mysql->connect_errno):
		echo "Conexión no esitosa".$mysql->connect_error;
	endif;

?>	