<?php
 session_start();   
 // include Database connection file 
    include("../db_connection.php");

    // Design initial table header 
    $data = '<table class="display table table-bordered table-striped">
            <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Privilegios</th>
                            <th colspan="2">Opciones</th>
                        </tr>
            </thead>';

    if($_SESSION['rol'] == 'Admin'){
         $query = "SELECT * FROM usuarios  ORDER BY id";
    }elseif($_SESSION['rol'] == 'Super Administrador'){
        $query = "SELECT * FROM usuarios WHERE tipo_usuario <> 'Admin' AND tipo_usuario <> 'Super Administrador' ORDER BY id";
    }else{
        $query = "SELECT * FROM usuarios WHERE tipo_usuario <> 'Admin' AND tipo_usuario <> 'Super Administrador' ORDER BY id ";
    }
    

    if (!$result = $mysql->query($query)) {
        echo "Error".$mysql->error;
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= '
            <div class="box-body table-responsive no-padding">
              
            <tr>
                <th>'.$number.'</th>
                <th>'.$row['nombre'].'</th>
                <th>'.$row['usuario'].'</th>
                <th>'.$row['tipo_usuario'].'</th>
                <th>
                     

                    <button onclick="GetUserDetails('.$row['id'].')" title="Editar" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button> ';
                
            if($row['tipo_usuario'] == 'Admin' and $_SESSION['rol'] == 'Admin'){ 
              
                     $data .=  '  <button onclick="DeleteUser('.$row['id'].')" title="Eliminar" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button> ';
                
                }elseif($row['tipo_usuario'] != 'Admin'){
                    $data .=  '  <button onclick="DeleteUser('.$row['id'].')" title="Eliminar" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button> ';
                }



            $data .= '
               </th>
            </tr>
            </div> ';
            $number++;
        }
    }
    else
    {
        // records now found 
        $data .= '<tr><td colspan="6">No hay ningun registro.</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>