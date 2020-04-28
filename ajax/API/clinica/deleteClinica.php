<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../../db_connection.php");

    // get user id
    $clinica_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM interv_clinica WHERE id_clinica = '$clinica_id'";
    if (!$result = $mysql->query($query)) {
        echo "Error",$mysql->error;
    }
}
?>