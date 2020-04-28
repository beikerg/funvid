<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../db_connection.php");

    // get user id
    $id_llamada = $_GET['id'];

    // delete User
    $query = "DELETE FROM llamada_reducado WHERE id_llamada = '$id_llamada' ";
    if (!$result = $mysql->query($query)) {
        exit(mysqli_error());
    }else{
    	header("location: ../../reducado.php");
    }
}


?>