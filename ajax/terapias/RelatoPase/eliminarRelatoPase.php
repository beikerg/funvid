<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../../db_connection.php");

    // get user id
    $id_t_pase = $_GET['id'];

    // delete User
    $query = "DELETE FROM tera_pase WHERE id_t_pase = '$id_t_pase' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
        $query_asis = "DELETE FROM asistencia WHERE id_t_pase = '$id_t_pase' ";
			    if(!$asis_query = $mysql->query($query_asis)){
					echo ("Error al liminiar asistencia".$msyql->error);
				}else{
					header("Location: ../../../ListaTerapiaRelatoPase.php");
				}
    	
    }
}


?>

