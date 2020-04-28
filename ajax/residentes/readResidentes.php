<?php 
	// include Database connection file 
	include("../db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-hover">
						<tr>
							<th>No.</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Correo</th>
							<th>Fecha</th>
							<th colspan="2">Opciones</th>
						</tr>';

	$query = "SELECT * FROM residentes";

	if (!$result = $mysql->query($query)) {
        exit(mysqli_error($query));
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
				<th>'.$row['id_residente'].'</th>
				<th>'.$row['nombre'].'</th>
				<th>'.$row['apellido'].'</th>
				<th>'.$row['rut'].'</th>
				<th>'.$row['fecha'].'</th>
				<th>
					<a class="btn btn-warning" href="editarResidente.php?id='.$row['id_residente'].'"><i class="glyphicon glyphicon-pencil"></i></a>
					<button onclick="DeleteResidentes('.$row['id_residente'].')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></button>

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