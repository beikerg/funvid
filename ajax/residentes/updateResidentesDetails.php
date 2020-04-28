<?php 
// include Database connection file
include("../db_connection.php");

if(empty($_POST['nombre']) ||
        empty($_POST['apellido']) ||
        empty($_POST['rut']) ||
        empty($_POST['sexo']) ||
        empty($_POST['telefono']) ||
        empty($_POST['fecha']) ||
        empty($_POST['nivel'])||
        empty($_POST['profesion']) ||
        empty($_POST['direccion']) ||
        empty($_POST['localidad']) ||   
        empty($_POST['provincia']) ||
        empty($_POST['correo']) ){

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
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $nivel = $_POST['nivel'];
    $profesion = $_POST['profesion'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $correo = $_POST['correo'];

    // Updaste User details
    $query = "UPDATE residentes SET nombre = '$nombre', apellido = '$apellido', rut = '$rut', sexo = '$sexo', telefono = '$telefono', fecha = '$fecha', nivel = '$nivel', profesion = '$profesion', direccion = '$direccion', localidad = '$localidad', provincia = '$provincia', correo = '$correo' WHERE id_residente = '$id'";

    if (!$result = $mysql->query($query)) {
        exit(mysqli_error($query));
    }else{

         echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El Residente se ha actualizado con éxito.</p></center>";

                ?> <script type="text/javascript">  
                        setTimeout(function(){
                             $("#update_Residentes_modal").modal("hide");
                        }, 1000);       
                    
                </script>
                <?php 

        
    }
   
}
?>