<?php
// include Database connection file
include("../../db_connection.php");


if(empty($_POST['motivo_aban'])  || empty($_POST['actitud_aban']) || empty($_POST['etapa_aban']) ){
          
        $error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

        echo $error; 


// check request
}elseif(!empty($_POST))
    {
    // get values
    $id = $_POST['id'];
    $etapa_aban = $_POST['etapa_aban'];
    $motivo_aban = $_POST['motivo_aban'];
    $actitud_aban = $_POST['actitud_aban'];
    $fecha_aban = $_POST['fecha_aban'];
    

        $query = "UPDATE abandono SET etapa_aban = '$etapa_aban', motivo_aban = '$motivo_aban', actitud_aban = '$actitud_aban', fecha_aban = '$fecha_aban' WHERE id_aban = '$id'";
            if (!$result = $mysql->query($query)) {
        exit(mysqli_error());

    }else{
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_Aban_modal").modal("hide");
                    location.reload();
                }, 1000);       
            
        </script>
    <?php
    }
    
   
    
}
?>