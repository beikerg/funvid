<?php
// include Database connection file
include("../db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $usuario = strtolower($_POST['usuario']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
    $tipo_usuario = $_POST['tipo_usuario'];
   


    $q = $mysql->query("SELECT * FROM usuarios WHERE id = '$id' ");
    $data = mysqli_fetch_array($q);
        $user = $data['usuario'];
    if($usuario <> $user){
                $h = $mysql->query("SELECT * FROM usuarios WHERE usuario = '$usuario' ");
                $dat = mysqli_fetch_array($h);
                $users = $dat['usuario'];
                    if ($usuario == $users){
                         echo "<center><p class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> El usuario ingresador ya existe.</p></center>";
                    }else{
                        $query = "UPDATE usuarios SET nombre = '$nombre', usuario = '$usuario', password = '$password', tipo_usuario = '$tipo_usuario' WHERE id = '$id'";
                             if (!$result = $mysql->query($query)) {
                                exit(mysqli_error());
                        }else{

                            echo "<center><p class='alert alert-success alert-dismissible'  data-auto-dismiss='1000'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El usuario se ha actualizado con éxito.</p></center>";

                            ?> <script type="text/javascript">  
                                    setTimeout(function(){
                                        $("#update_User_modal").modal("hide");
                                    }, 1000);       
                        
                            </script>
                    <?php 
                        }
                    }

                  
        
    }else{
        // Updaste User details
    $query = "UPDATE usuarios SET nombre = '$nombre', usuario = '$usuario', password = '$password', tipo_usuario = '$tipo_usuario' WHERE id = '$id'";
    if (!$result = $mysql->query($query)) {
        exit(mysqli_error());
    }else{
        echo "<center><p class='alert alert-success alert-dismissible' data-auto-dismiss='1000' role='alert'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El usuario se ha actualizado con éxito.</p></center>";

        ?> <script type="text/javascript">  
                setTimeout(function(){
                    $("#update_User_modal").modal("hide");
                }, 1000);       
            
        </script>
        <?php 
            }
    }

    
}
?>