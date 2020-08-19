<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../../db_connection.php");

    // get user id
    $id_tedu = $_GET['id'];

    // delete User
    $query = "DELETE FROM t_educativa WHERE id_tedu = '$id_tedu' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
        $query_asis = "DELETE FROM asistencia WHERE id_tedu = '$id_tedu' ";
			    if(!$asis_query = $mysql->query($query_asis)){
					echo ("Error al liminiar asistencia".$msyql->error);
				}else{
					header("Location: ../../../ListaTedu.php");
				}
    //     header("location: ../../../ListaTedu.php");
     }
}


?>

