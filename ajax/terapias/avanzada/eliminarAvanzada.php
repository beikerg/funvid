<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../../db_connection.php");

    // get user id
    $id_avanzada = $_GET['id'];

    // delete User
    $query = "DELETE FROM avanzada WHERE id_avanzada = '$id_avanzada' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
    	header("Location: ../../../ListaTAvanzada.php");
    }
}


?>