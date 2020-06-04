<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../../db_connection.php");

    // get user id
    $id_ga = $_GET['id'];

    // delete User
    $query = "DELETE FROM grupo_atras WHERE id_ga = '$id_ga' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
    	header("Location: ../../../ListaTGa.php");
    }
}


?>