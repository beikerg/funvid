<?php
// include Database connection file
include("../../db_connection.php");


if(empty($_POST['psiquiatra_clinica'])  || empty($_POST['fecha_clinica']) || empty($_POST['evaluacion_clinica']) || empty($_POST['medicamentos_clinica']) ){
          
        $error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

        echo $error; 


// check request
}elseif(!empty($_POST))
    {
    // get values
    $id = $_POST['id'];
    $etapa_clinica = $_POST['etapa_clinica'];
    $psiquiatra_clinica = $_POST['psiquiatra_clinica'];
    $fecha_clinica = $_POST['fecha_clinica'];
    $evaluacion_clinica = $_POST['evaluacion_clinica'];
    $medicamentos_clinica = $_POST['medicamentos_clinica'];
    $tipo_clinica = $_POST['tipo_clinica'];
    

        $query = "UPDATE interv_clinica SET etapa_clinica = '$etapa_clinica', psiquiatra_clinica = '$psiquiatra_clinica', fecha_clinica = '$fecha_clinica', evaluacion_clinica = '$evaluacion_clinica', medicamentos_clinica = '$medicamentos_clinica', tipo_clinica = '$tipo_clinica' WHERE id_clinica = '$id'";
            if (!$result = $mysql->query($query)) {
        exit($mysql->error);

    }else{
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_Clinica_modal").modal("hide");
                    location.reload();
                }, 1000);       
            
        </script>
    <?php
    }
    
   
    
}
?>