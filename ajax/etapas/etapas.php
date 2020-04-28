<?php 
$Dhoy = date("Y-m-d");
?>
      <div class="row">
      	<div class="col-md-12">
      		<center><h3>Etapas del residente</h3></center><br>
      	</div>
        <div class="col-md-offset-2 col-md-8">
          <div class="box box-solid">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                <style type="text/css">
                	th,td{
                		text-align: center;

                	}
                	th{
                		background-color: #EBF7FA;
                	}
                </style>  
                  <th style="width: 20%">Etapa</th>
                  <th style="width: 20%">Fecha inicio</th>
                  <th style="width: 20%">fecha termino</th>
                  <th style="width: 20%">Duración</th>
                  <th style="width: 5%">Status</th>

                </tr>
                <tr>

                  <td><strong>INTEGRACIÓN</strong></td>
                  <td><?php echo date('d-m-Y', strtotime($Dhoy)); ?></td>
                  <td>  -  </td>
                  <td><?php echo conteo_dias($Dhoy,$Dhoy); ?></td>
                  <td><img src="img/derecha.png"></td>
                </tr>
                
                
				<input type="hidden" name="desc_etapa" value="1">
				<input type="hidden" name="status_etapa" value="0">
				<input type="hidden" name="fecha_inicio_etapa" value="<?php echo $Dhoy; ?>">
				<input type="hidden" name="obser_etapa" value="Inicio de las etapas, esta es la primera.">

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
<?php



function conteo_dias($fi, $ff) {

	$date1 = new DateTime($fi);
	$date2 = new DateTime($ff);
	$df = $date1->diff($date2);


    $str = '';
    $str .= ($df->invert == 1) ? ' - ' : '';
    if ($df->d == 0){
    	$str .= ' Hoy ';
    }
    if ($df->y > 0) {
        // Años
        $str .= ($df->y > 1) ? $df->y . ' Años ' : $df->y . ' Año ';
    } if ($df->m > 0) {
        // Meses
        $str .= ($df->m > 1) ? $df->m . ' Meses ' : $df->m . ' Mes ';
    } if ($df->d > 0) {
        // Dias 
        $str .= ($df->d > 1) ? $df->d . ' Días ' : $df->d . ' Dia ';
   // } if ($df->h > 0) {
        // horas
   //    $str .= ($df->h > 1) ? $df->h . ' Horas ' : $df->h . ' Hora ';
   // } if ($df->i > 0) {
        // minutos
   //    $str .= ($df->i > 1) ? $df->i . ' Minutos ' : $df->i . ' Minuto ';
   // } if ($df->s > 0) {
        // segundos
   //    $str .= ($df->s > 1) ? $df->s . ' Segundos ' : $df->s . ' Segundo ';

    }
    echo $str;
}



?>












