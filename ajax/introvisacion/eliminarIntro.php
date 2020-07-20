<?php 

if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Base de datos
    require_once("../db_connection.php");

    // get user id
    $id_intro = $_GET['id'];

    // delete User
    $query = "DELETE FROM introvisacion WHERE id_intro = '$id_intro' ";
    if (!$result = $mysql->query($query)) {
        echo (mysqli_errno());
    }else{
    	header("Location: ../../ListaIntro.php");
    }
}


?>

