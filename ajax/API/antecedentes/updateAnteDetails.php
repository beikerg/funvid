<?php
// include Database connection file
include("../../db_connection.php");


if(empty($_POST['informacion_ante'])  || empty($_POST['fecha_ante'])){
          
        $error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

        echo $error; 


// check request
}elseif(!empty($_POST))
    {
    // get values
    $id = $_POST['id'];
    $etapa_ante = $_POST['etapa_ante'];
    $informacion_ante = $_POST['informacion_ante'];
    $fecha_ante = $_POST['fecha_ante'];
    
    

        $query = "UPDATE ante_api SET etapa_ante = '$etapa_ante', informacion_ante = '$informacion_ante', fecha_ante = '$fecha_ante' WHERE id_ante = '$id'";
            if (!$result = $mysql->query($query)) {
        exit(mysqli_error());

    }else{
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_Ante_modal").modal("hide");
                    location.reload();
                }, 1000);       
            
        </script>
    <?php
    }
    
   
    
}
?>