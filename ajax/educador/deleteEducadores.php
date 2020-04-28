<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../db_connection.php");

    // get user id
    $educador_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM educadores WHERE edu_id = '$educador_id'";
    if (!$result = $mysql->query($query)) {
        exit(mysql_error($query));
    }
}
?>