<?php
     
     include("ajax/db_connection.php");

    $salida = "";

    $query = "SELECT * FROM residentes WHERE nombre NOT LIKE '' ORDER By id_residente";

    if (!empty($_POST['consulta'])) {
        $q = $mysql->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM residentes WHERE id_residente LIKE '%$q%' OR nombre LIKE '%$q%' OR apellido LIKE '%$q%' OR rut LIKE '%$q%' OR localidad LIKE '%$q%' ";
    }

    $resultado = $mysql->query($query);

    if ($resultado->num_rows >0) {
        $salida.="<table class='table table-hover' >
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>RUT</th>
                        <th>LOCALIDAD</th>
                        <th>SELECCIONAR</th>
                    </tr>

                </thead>
                

        <tbody>";

        while ($fila = $resultado->fetch_assoc()) {
            $salida.="
                <div class='box-body table-responsive no-padding'>
            <tr>
                        <td>".$fila['id_residente']."</td>
                        <td>".$fila['nombre']."</td>
                        <td>".$fila['apellido']."</td>
                        <td>".$fila['rut']."</td>
                        <td>".$fila['localidad']."</td>
                        <td><a href='terapiarelatodepase.php?id=".$fila['id_residente']."' class='btn btn-primary'><i class='glyphicon glyphicon-check'></i></a>
                        </td>
                    </tr>
                   </div> 
                    ";

        }
        $salida.="</tbody></table>";
    }else{
        $salida.="<center><h4>¡No se encontro ninguna coincidencia!</h4></center>";
    }


    echo $salida;

    $mysql->close();



?>