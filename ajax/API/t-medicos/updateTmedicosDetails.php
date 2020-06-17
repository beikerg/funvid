<?php
// include Database connection file
include("../../db_connection.php");


if(empty($_POST['motivo_tm'])  || empty($_POST['fecha_tm']) || empty($_POST['diagnostico_tm']) ){
          
        $error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

        echo $error; 


// check request
}elseif(!empty($_POST))
    {
    // get values
    $id = $_POST['id'];
    $etapa_tm = $_POST['etapa_tm'];
    $fecha_tm = $_POST['fecha_tm'];
    $motivo_tm = $_POST['motivo_tm'];
    $diagnostico_tm = $_POST['diagnostico_tm'];
    $medicamentos_tm = $_POST['medicamentos_tm'];
    $observ_tm = $_POST['observ_tm'];
    $hora_tm = $_POST['hora_tm'];
    $centro_tm = $_POST['centro_tm'];
    
    

        $query = "UPDATE tratamientos_medicos_api SET etapa_tm = '$etapa_tm', motivo_tm = '$motivo_tm', diagnostico_tm = '$diagnostico_tm', fecha_tm = '$fecha_tm', observ_tm = '$observ_tm', medicamentos_tm = '$medicamentos_tm', hora_tm = '$hora_tm', centro_tm = '$centro_tm' WHERE id_tm = '$id'";
            if (!$result = $mysql->query($query)) {
        exit($mysql->error);

    }else{
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_Tmedicos_modal").modal("hide");
                    location.reload();
                }, 1000);       
            
        </script>
    <?php
    }
    
   
    
}
?>