<?php
// include Database connection file
include("../../db_connection.php");


if(empty($_POST['fecha_abst'])  || empty($_POST['sintomas_abst']) || empty($_POST['etapa_abst']) ){
          
        $error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

        echo $error; 


// check request
}elseif(!empty($_POST))
    {
    // get values
    $id = $_POST['id'];
    $etapa_abst = $_POST['etapa_abst'];
    $fecha_abst = $_POST['fecha_abst'];
    $sintomas_abst = $_POST['sintomas_abst'];
    $obser_abst = $_POST['obser_abst'];
    

        $query = "UPDATE abstinencia SET etapa_abst = '$etapa_abst', fecha_abst = '$fecha_abst', sintomas_abst = '$sintomas_abst', obser_abst = '$obser_abst' WHERE id_abst = '$id'";
            if (!$result = $mysql->query($query)) {
        exit(mysqli_error());

    }else{
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> Se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_Abs_modal").modal("hide");
                    location.reload();
                }, 1000);       
            
        </script>
    <?php
    }
    
   
    
}
?>