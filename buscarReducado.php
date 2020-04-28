<?php
     
     include("ajax/db_connection.php");

    $salida = "";

    $query = "SELECT * FROM residentes WHERE nombre NOT LIKE '' ORDER By id_residente";

    if (!empty($_POST['consulta'])) {
        $q = $mysql->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM residentes WHERE id_residente LIKE '%$q%' OR nombre LIKE '%$q%' OR apellido LIKE '%$q%' OR rut LIKE '%$q%' OR telefono LIKE '%$q%' ";
    }

    $resultado = $mysql->query($query);

    if ($resultado->num_rows >0) {
        $salida.="<table class='table table-hover' >
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Rut</th>
                        <th>Telefono</th>
                        <th>Seleccionar</th>
                    </tr>

                </thead>
                

        <tbody>";

        while ($fila = $resultado->fetch_assoc()) {
            $salida.="
                
            <tr>
                        <td>".$fila['id_residente']."</td>
                        <td>".$fila['nombre']."</td>
                        <td>".$fila['apellido']."</td>
                        <td>".$fila['rut']."</td>
                        <td>".$fila['telefono']."</td>
                        <td><center><a href='reducadoLlamada.php?id=".$fila['id_residente']."'class='btn btn-primary'><i class='glyphicon glyphicon-check'></i></a></center></td>
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