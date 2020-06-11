<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../../db_connection.php");

    // get user id
    $doping_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM doping_api WHERE id_doping = '$doping_id'";
    if (!$result = $mysql->query($query)) {
        echo "Error",$mysql->error;
    }
}
?>