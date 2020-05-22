<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../../db_connection.php");

    // get user id
    $id_especial = $_GET['id'];

    // delete User
    $query = "DELETE FROM especial WHERE id_especial = '$id_especial' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
    	header("Location: ../../../ListaTEspecial.php");
    }
}


?>