<?php
// include Database connection file
include("../../db_connection.php");


if(empty($_POST['fecha_dental'])){
          
        $error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

        echo $error; 


// check request
}elseif(!empty($_POST))
    {
    // get values
    $id = $_POST['id'];
    $nom_dental = $_POST['nom_dental'];
    $tratamiento_dental = $_POST['tratamiento_dental'];
    $fecha_dental = $_POST['fecha_dental'];
    $medica_dental = $_POST['medica_dental'];
    $obser_dental = $_POST['obser_dental'];
    

        $query = "UPDATE t_dental SET nom_dental = '$nom_dental', tratamiento_dental = '$tratamiento_dental', fecha_dental = '$fecha_dental', medica_dental = '$medica_dental', obser_dental = '$obser_dental' WHERE id_dental = '$id'";
            if (!$result = $mysql->query($query)) {
        exit($mysql->error);

    }else{
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_Dental_modal").modal("hide");
                    location.reload();
                }, 1000);       
            
        </script>
    <?php
    }
    
   
    
}
?>