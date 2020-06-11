<?php
// include Database connection file
include("../../db_connection.php");


if(empty($_POST['nombre_doping'])  || empty($_POST['fecha_doping']) || empty($_POST['observ_doping']) ){
          
        $error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

        echo $error; 


// check request
}elseif(!empty($_POST))
    {
    // get values
    $id = $_POST['id'];
    $etapa_doping = $_POST['etapa_doping'];
    $nombre_doping = $_POST['nombre_doping'];
    $fecha_doping = $_POST['fecha_doping'];
    $observ_doping = $_POST['observ_doping'];
    
    

        $query = "UPDATE doping_api SET etapa_doping = '$etapa_doping', nombre_doping = '$nombre_doping', fecha_doping = '$fecha_doping', observ_doping = '$observ_doping' WHERE id_doping = '$id'";
            if (!$result = $mysql->query($query)) {
        exit($mysql->error);

    }else{
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_doping_modal").modal("hide");
                    location.reload();
                }, 1000);       
            
        </script>
    <?php
    }
    
   
    
}
?>