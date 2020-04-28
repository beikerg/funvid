<?php
// include Database connection file
include("../db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $correo = $_POST['correo'];

    // Updaste User details
    $query = "UPDATE educadores SET nombre = '$nombre', apellido = '$apellido', rut = '$rut', telefono = '$telefono', fecha = '$fecha', direccion = '$direccion', localidad = '$localidad', provincia = '$provincia', correo = '$correo' WHERE edu_id = '$id'";
    if (!$result = $mysql->query($query)) {
        exit($mysql->error);
    }
    echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El usuario se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_Educadores_modal").modal("hide");
                }, 1000);       
            
        </script>
        <?php 
}