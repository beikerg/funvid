<?php
	// include Database connection file 
include("../../db_connection.php");

	$id_residente = $_GET['id'];
	// Design initial table header 
	$data = '<table class="table table-hover">
             <style type="text/css">
                    th,td{
                      text-align: center;
                    }
                    th{
                      background-color: #EBF7FA;
                    }
              </style>  
						<tr>
							<th style="width: 20%" >Fecha</th>
							<th style="width: 20%">Motivo</th>
                            <th style="width: 20%">Etapa</th>
							<th style="width: 25%">Opciones</th>
							
						</tr>';

	$query = "SELECT * FROM tratamientos_medicos_api WHERE id_residente = '$id_residente' ";

	if (!$result = $mysql->query($query)) {
        echo "Error",$mysql->error;
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				    <td>'.date('d-m-Y', strtotime($row['fecha_tm'])).'</td>
            <td>'.$row['motivo_tm'].'</td>
            <td>'.$row['etapa_tm'].'</td>
            
            <td>       
             <button type="button" title="Editar" onclick="GetTmedicosDetails('.$row['id_tm'].')" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button>
            
            
              <button type="button" title="Eliminar" onclick="DeleteTmedicos('.$row['id_tm'].')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>

            </td>
            <tr>';
       

					

    		
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="8">No hay ningun registro.</td></tr>';
    }

    $data .= '</table>';

    echo $data;



?>