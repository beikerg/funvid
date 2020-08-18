<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../../db_connection.php");

    // get user id
    $id_redu = $_GET['id'];

    // delete User
    $query = "DELETE FROM reunion_educadores WHERE id_redu = '$id_redu' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
    	$query_asis = "DELETE FROM asistencia WHERE id_redu = '$id_redu' ";
			    if(!$asis_query = $mysql->query($query_asis)){
					echo ("Error al liminiar asistencia".$msyql->error);
				}else{
					header("Location: ../../../ListaTEducador.php");
				}
    }
}


?>