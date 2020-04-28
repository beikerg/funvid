<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../db_connection.php");

    // get user id
    $user_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM etapa WHERE id_etapa = '$user_id'";
    if (!$result = $mysql->query($query)) {
        echo "Error",$mysql->error;
    }
}
?>