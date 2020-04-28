<?php
// check request
if(isset($_GET['id']) && isset($_GET['id']) != "")
{
    // include Database connection file
    include("../db_connection.php");

    // get caja id
    $caja_id = $_GET['id'];
    // get id residente
    $id_residente = $_GET['r'];
    // delete User
    $query = "DELETE FROM caja WHERE id_caja = '$caja_id'";
    if (!$result = $mysql->query($query)) {
        exit($mysql->error);
       
    }else{
    	header("location: ../../caja.php?id=".$id_residente);
    }
}
?>