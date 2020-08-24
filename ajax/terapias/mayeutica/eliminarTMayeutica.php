<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../../db_connection.php");

    // get user id
    $id_neuro = $_GET['id'];

    // delete User
    $query = "DELETE FROM neuroplasticidad WHERE id_neuro = '$id_neuro' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
        $query_asis = "DELETE FROM asistencia WHERE id_neuro = '$id_neuro' ";
			    if(!$asis_query = $mysql->query($query_asis)){
					echo ("Error al liminiar asistencia".$msyql->error);
				}else{
					header("Location: ../../../ListaTNeuro.php");
				}
    //     header("location: ../../../ListaTNeuro.php");
     }
}


?>

