<?php
     
    $id = $_GET['id']; 

     include("ajax/db_connection.php");

    $salida = "";

    $query = "SELECT * FROM consultap WHERE id_residente = '$id' AND categoria LIKE '%%' ORDER By id_consulta DESC ";

    if (!empty($_POST['consulta'])) {
        $q = $mysql->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM consultap WHERE id_consulta LIKE '%$q%' OR motivo LIKE '%$q%' OR categoria LIKE '%$q%' OR fecha_c LIKE '%$q%'  ";
    }

    $resultado = $mysql->query($query);

    if ($resultado->num_rows > 0) {
        $salida.="<table class='table table-hover' >
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>MOTIVO</th>
                        <th>CATEGORIA</th>
                        <th>FECHA_C</th>                        
                        <th>OPCIONES</th>
                    </tr>

                </thead>
                

        <tbody>";

        while ($fila = $resultado->fetch_assoc()) {
            $salida.="
                <div class='box-body table-responsive no-padding'>
            <tr>
                        <td>".$fila['id_consulta']."</td>
                        <td>".$fila['motivo']."</td>
                        <td>".$fila['categoria']."</td>
                        <td>".$fila['fecha_c']."</td>
                        <td><a title='Editar' href='editarConsultaPresi.php?id=".$fila['id_residente']."&con=".$fila['id_consulta']."' class='btn btn-warning'><i class='glyphicon glyphicon-pencil'></i></a>

                        <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$fila['id_residente'].",".$fila['id_consulta'].")'><i class='glyphicon glyphicon-trash'></i></a>

                        <a title='Gestionar' href='consultaPresi.php?id=".$fila['id_residente']."&con=".$fila['id_consulta']."' class='btn btn-success'><i class='fa fa-stethoscope'></i> Gestionar</a>
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