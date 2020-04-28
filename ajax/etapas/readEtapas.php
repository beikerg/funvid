<?php
	// include Database connection file 
include("../db_connection.php");

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
							<th style="width: 20%" >Etapa</th>
							<th style="width: 20%">Fecha inicio</th>
							<th style="width: 20%">Fecha termino</th>
							<th style="width: 20%">Duración</th>
							<th style="width: 5%">Status</th>
							<th style="width: 30%">Opciones</th>
							 
						</tr>';

	$query = "SELECT * FROM etapa WHERE id_residente = '$id_residente' ";

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
				<td><strong>';
				$n = $row['desc_etapa'];
  if($n == 1)
  {
    $data .= 'INTEGRACIÓN';
  }
  if($n == 2)
  {
    $data .= 'CONFIANZA';
  }
  if($n == 3)
  {
    $data .= 'INICIATIVA';
  }
  if($n == 4)
  {
    $data .= 'IDENTIDAD';
  }
  if($n == 5)
  {
    $data .= 'TRASCENDENCIA';
  }
  if($n == 6)
  {
    $data .= 'EDUCADOR 1';
  }
  if($n == 7)
  {
    $data .= 'EDUCADOR 2';
  }
  if($n == 8)
  {
    $data .= 'EDUCADOR 3';
  }
  if($n == 9)
  {
    $data .= 'EDUCADOR 4';
  }
  if($n == 10)
  {
    $data .= 'REDUCADO';
  }		
  if($n == 11)
  {
    $data .= 'ABANDONO';
  }

  	$data .='</strong></td>
				<td>'.date('d-m-Y', strtotime($row['fecha_inicio_etapa'])).'</td>
        <td>';
        // Fecha te termino de la etapa
				$ft = date('d-m-Y', strtotime($row['fecha_fin_etapa']));
					if($row['fecha_fin_etapa'] == '0000-00-00')  //0000-00-00
					{
						$data .= ' - ';
					}else{
						$data .= $ft;
					}
					$data .= '</td>
				<td>';
$Dhoy = date('Y-m-d');
$date1 = new DateTime($row['fecha_inicio_etapa']);
$o_ff = $row['fecha_fin_etapa'];
    
  if($o_ff == '0000-00-00') 
  {
    $ff = $Dhoy;
  }else{
    $ff = $o_ff;
  }
  $date2 = new DateTime($ff);
  $df = $date1->diff($date2);


    
    $data .= ($df->invert == 1) ? ' - ' : '';
    if ($df->d == 0){
      $data .= ' Hoy ';
    }
    if ($df->y > 0) {
        // Años
        $data .= ($df->y > 1) ? $df->y . ' Años ' : $df->y . ' Año ';
    } if ($df->m > 0) {
        // Meses
        $data .= ($df->m > 1) ? $df->m . ' Meses ' : $df->m . ' Mes ';
    } if ($df->d > 0) {
        // Dias 
        $data .= ($df->d > 1) ? $df->d . ' Días ' : $df->d . ' Día ';
      }
      			$data .= '</td>
				
				<td>';
$s = $row['status_etapa'];
                        if($s == 0)
                        {
                          $data .= '<img src="img/derecha.png">';
                        }
                        if($s == 1)
                        {
                          $data .= '<img src="img/arriba.png">';
                        }
                        if($s == 2)
                        {
                          $data .= '<img src="img/abajo.png">';
                        }
                     $data .= '</td>
				<td>';

       // if($row['desc_etapa'] != 1){
          $data .= '<button type="button" title="Editar" onclick="GetEtapasDetails('.$row['id_etapa'].')" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button>
        
        
          <button type="button" title="Eliminar" onclick="DeleteEtapas('.$row['id_etapa'].')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>';
       // }

					
$data .= '</td>
    		</tr>';
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