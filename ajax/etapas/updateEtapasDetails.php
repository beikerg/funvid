<?php
// include Database connection file
include("../db_connection.php");


if(empty($_POST['fecha_inicio_etapa'])  || empty($_POST['obser_etapa']) ){
          
        $error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

        echo $error; 


// check request
}elseif(!empty($_POST))
    {
    // get values
    $id = $_POST['id'];
    $status_etapa = $_POST['status_etapa'];
    $desc_etapa = $_POST['desc_etapa'];
    $fecha_inicio_etapa = $_POST['fecha_inicio_etapa'];
    $fecha_fin_etapa = $_POST['fecha_fin_etapa'];
    $obser_etapa = $_POST['obser_etapa'];


   
 

        $query = "UPDATE etapa SET status_etapa = '$status_etapa', desc_etapa = '$desc_etapa', fecha_inicio_etapa = '$fecha_inicio_etapa', fecha_fin_etapa = '$fecha_fin_etapa', obser_etapa = '$obser_etapa' WHERE id_etapa = '$id'";
            if (!$result = $mysql->query($query)) {
        exit(mysqli_error());

    }else{
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El usuario se ha agregado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_Etapas_modal").modal("hide");
                }, 1000);       
            
        </script>
    <?php
    }
    

    // Updaste User details
   
    
}
?>