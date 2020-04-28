<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../../db_connection.php");

    // get user id
    $ante_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM ante_api WHERE id_ante = '$ante_id'";
    if (!$result = $mysql->query($query)) {
        echo "Error",$mysql->error;
    }
}
?>