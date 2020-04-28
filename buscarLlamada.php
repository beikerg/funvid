<?php
     
     include("ajax/db_connection.php");

    $salida = "";

    $query = "SELECT l.*, r.nombre, r.apellido, r.telefono, r.id_residente FROM llamada_reducado l INNER JOIN residentes r ON l.id_residente = r.id_residente WHERE  l.fecha_l NOT LIKE '' ORDER By l.id_llamada DESC";

    if (!empty($_POST['consul'])) {
        $q = $mysql->real_escape_string($_POST['consul']);
        $query = "SELECT l.*, r.nombre, r.apellido, r.telefono, r.id_residente FROM llamada_reducado l INNER JOIN residentes r ON l.id_residente = r.id_residente WHERE l.id_llamada LIKE '%$q%' OR r.telefono LIKE '%$q%' OR l.fecha_l LIKE '%$q%' OR r.nombre LIKE '%$q%' OR r.apellido LIKE '%$q%' ";
    }

    $resultado = $mysql->query($query);

    if ($resultado->num_rows >0) {
        $salida.="<table class='table table-hover' >
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Ultima llamada</th>
                        <th>Seleccionar</th>
                    </tr>

                </thead>
                

        <tbody>";

        while ($fila = $resultado->fetch_assoc()) {
            $salida.="
                
            <tr>
                        <td>".$fila['id_llamada']."</td>
                        <td>".$fila['nombre']."</td>
                        <td>".$fila['apellido']."</td>
                        <td>".$fila['telefono']."</td>
                        <td>".date('d/m/Y', strtotime($fila['fecha_l']))."</td>
                        <td>

                        <a href='editarReducadoLlamada.php?id=".$fila['id_llamada']."' title='Editar' class='btn btn-warning'><i class='glyphicon glyphicon-pencil'></i></a>

                       <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$fila['id_llamada'].")'><i class='glyphicon glyphicon-trash'></i></a>
                        
                   
      
                    </tr>
                    
                    ";
        }
        $salida.="</tbody></table>";
    }else{
        $salida.="<center><h4>¡No se encontro ninguna coincidencia!</h4></center>";
    }


    echo $salida;
    

    $mysql->close();



?>