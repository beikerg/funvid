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

	$query = "SELECT * FROM educadores ORDER BY edu_id";

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
				<th>'.$number.'</th>
				<th>'.$row['nombre'].'</th>
				<th>'.$row['apellido'].'</th>
				<th>'.$row['correo'].'</th>
				<th>'.$row['fecha'].'</th>
				<th>
					<button onclick="GetEducadoresDetails('.$row['edu_id'].')" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button>
					<button onclick="DeleteEducadores('.$row['edu_id'].')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
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