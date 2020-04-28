<?php
// check request
if(isset($_GET['id']) && isset($_GET['id']) != "") 
{
    // include Database connection file
    include("../db_connection.php");

    // get user id
    $residente_id = $_GET['id'];

    // delete User
    $query = "DELETE FROM residentes WHERE id_residente = '$residente_id'";
    if (!$result = $mysql->query($query)) {
        exit($mysql->error);
    }else
    {
    	header("location: ../../residente.php");
    }
}
?>