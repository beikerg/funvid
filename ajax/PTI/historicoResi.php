<!-- Boton Nueva Consulta Psicologia -->
<div class="row">
  <div class="col-md-6">
    <div class="pull-left">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#historico"><i class="glyphicon glyphicon-search"></i> PTI Residente - historial</button><br>
    </div>
  </div>
  <div class="col-md-6">
    <div class="pull-right">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newIntro"><i class="fa fa-plus"></i> Nuevo PTI</button><br>
    </div>
  </div>
</div><br>
<!-- ./ Boton Nueva Consulta -->


<!-- Buscar Residente para consulta -->
<div id="historico" tabindex="-1" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar reducado</h4>
      </div>
      <div class="modal-body">
        <!-- Contenido del modal -->      
         

              
<!-- Datatable buscar Reducados  -->
<div class="row">
          <div class="col-md-12">
            <div class="box box-solid">
              
                <div class="box-body">
                  
                  <div classs="container"> 
     <div class="box box-solid"> 
      <div class="box-body table-responsive no-padding">
     <!--  <div class="row"> -->
        <div class="col-xs-12">
         
        <table id="" class="display table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php

            $data = "";
              include('ajax/db_connection.php');
             
             $query = "SELECT * FROM residentes ";


       
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
            
            <tr>
                <th>'.$row['id_residente'].'</th>
                <th>'.$row['nombre'].'</th>
                <th>'.$row['apellido'].'</th>
                <th>'.$row['rut'].'</th>
                <th> <center>         
                    <center><a href="ListaPTIhistorico.php?id='.$row['id_residente'].'"class="btn btn-primary"><i class="glyphicon glyphicon-check"></i></a></center> </center> ';
                }

            $data .= '
               </th>
            </tr>
            ';
            $number++;
        }
    
    else
    {
        // records now found 
        $data .= '<tr><td colspan="6"><center><h4>¡Aún no hay ningún registro!<h4></center></td></tr>';
    }

    $data .= '</table>';

    echo $data;
            ?>
          </tbody>
        </table>
      </div>
      <!--</div> -->
    </div>
    </div>
    </div>
                  
                </div>
              </div>
           </div>
          </div> 

<!-- ./ Datatable buscar reducados -->
 
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       <input type="submit" class="btn btn-primary" value="Registrar">
      </div>
    </div>
  </div>
</div>

<!-- ./ fin busqueda Residente -->