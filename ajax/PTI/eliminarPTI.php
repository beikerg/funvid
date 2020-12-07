<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../db_connection.php");

    // get user id
    $id_pti = $_GET['id'];

    // delete User
    $query = "DELETE FROM pti WHERE id_pti = '$id_pti' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
    	header("Location: ../../ListaPTI.php");
    }
}


?>

