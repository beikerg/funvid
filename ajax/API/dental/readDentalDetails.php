<?php
// include Database connection file
include("../../db_connection.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $dental_id = $_POST['id'];

    // Get User Details
    $query = "SELECT * FROM t_dental WHERE id_dental = '$dental_id'";
    if (!$result = $mysql->query($query)) {
        exit($mysql->error);
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}