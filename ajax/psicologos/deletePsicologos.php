<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "") 
{
    // include Database connection file
    include("../db_connection.php");

    // get user id
    $psicologo_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM psicologos WHERE id = '$psicologo_id'";
    if (!$result = $mysql->query($query)) {
        exit(mysql_error());
    }
}
?>