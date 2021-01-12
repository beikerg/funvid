<?php

include("../db_connection.php");

if(empty($_POST['id']) ||
        empty($_POST['nombre']) ||
        empty($_POST['apellido']) ||
        empty($_POST['rut']) ||
        empty($_POST['telefono']) ||
        empty($_POST['fecha']) ||
        empty($_POST['direccion']) ||
        empty($_POST['localidad']) ||
        empty($_POST['provincia']) ||
        empty($_POST['correo'])){

        $error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

        echo $error; 




// check request
}elseif(isset($_POST))
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
    $cargo_tera = $_POST['cargo_tera'];

    // Updaste User details
    $query = "UPDATE terapeutas SET nombre = '$nombre', apellido = '$apellido', rut = '$rut', telefono = '$telefono', fecha = '$fecha', direccion = '$direccion', localidad = '$localidad', provincia = '$provincia', correo = '$correo', cargo_tera = '$cargo_tera' WHERE id = '$id'";
    if (!$result = $mysql->query($query)) {
        exit(mysqli_error());
    }
     echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El terapeuta se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_Terapeutas_modal").modal("hide");
                    location.reload();
                }, 1000);       
            
        </script>
        <?php 

}