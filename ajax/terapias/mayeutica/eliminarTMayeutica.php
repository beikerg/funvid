<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../../db_connection.php");

    // get user id
    $id_mayeutica = $_GET['id'];

    // delete User
    $query = "DELETE FROM mayeutica WHERE id_mayeutica = '$id_mayeutica' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
        $query_asis = "DELETE FROM asistencia WHERE id_mayeutica = '$id_mayeutica' ";
			    if(!$asis_query = $mysql->query($query_asis)){
					echo ("Error al liminiar asistencia".$msyql->error);
				}else{
					header("Location: ../../../ListaTMayeutica.php");
				}
    //     header("location: ../../../ListaTNeuro.php");
     }
}


?>

