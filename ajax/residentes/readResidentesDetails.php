<?php 
// include Database connection file
include("../db_connection.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $residente_id = $_POST['id'];

    // Get User Details
    $query = "SELECT * FROM residentes WHERE id_residente = '$residente_id'";
    if (!$result = $mysql->query($query)) {
        exit(mysqli_error($query));
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
        $response['message'] = "¡Datos no encontrados!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "¡Solicitud no valida!";
}