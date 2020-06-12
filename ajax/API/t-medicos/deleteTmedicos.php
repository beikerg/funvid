<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../../db_connection.php");

    // get user id
    $tm_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM tratamientos_medicos_api WHERE id_tm = '$tm_id'";
    if (!$result = $mysql->query($query)) {
        echo "Error",$mysql->error;
    }
}
?>