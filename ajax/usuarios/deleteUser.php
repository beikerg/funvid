<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../db_connection.php");

    // get user id
    $user_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM usuarios WHERE id = '$user_id'";
    if (!$result = $mysql->query($query)) {
        exit(mysqli_error($query));
    }
}
?>