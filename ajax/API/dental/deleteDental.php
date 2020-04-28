<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../../db_connection.php");

    // get user id
    $dental_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM t_dental WHERE id_dental = '$dental_id'";
    if (!$result = $mysql->query($query)) {
        echo "Error",$mysql->error;
    }
}
?>