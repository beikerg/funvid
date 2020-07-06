<?php
  include('ajax/db_connection.php');
  $asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_ts = '$id_ts'");
  $c_sql = mysqli_num_rows($asis_sql);

  if($c_sql == 0){
    echo '<form action="ajax/asistencia/addAsis.php" method="POST">';
  }else{
    echo '<form action="ajax/asistencia/editAsis.php" method="POST">';
  }
  
?>

<div class="modal fade" id="asistencia-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de residentes</h4>
              </div>
              <div class="modal-body">
                <!-- START CUSTOM TABS -->
      

<div class="row">
  <div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Asistencia</a></li>
        <li><a href="#tab_2" data-toggle="tab">Inasistencia</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="row">
                        <div class="col-xs-12">
                        <table id="asis" class=" table table-bordered table-striped">
                          <thead>
                            <th><label><input type="checkbox" id="checkall-asis"> Select.</label></th>
                            <th>Nombres</th>
                            <th>Apellido</th>
                            <th>Rut</th>

                          </thead>
                            <tbody>
                              <?php

                                include('ajax/db_connection.php');
                                
                                if($c_sql == 0){
                                  $sql = "SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO' ";
                                }else{
                                  $sql = "SELECT r.nombre, r.apellido, r.rut, a.* FROM residentes r INNER JOIN asistencia a ON r.id_residente = a.id_residente WHERE a.id_ts = '$id_ts'";
                                }
                                
                                //use for MySQLi-OOP
                                $query = $mysql->query($sql);
                                while($row = $query->fetch_assoc()){?>
                                  <tr>
                                    <?php 
                                    if($c_sql == 0){
                                      echo "<td align='center'><input type='checkbox' class='all-asis' name='resi[]' value=".$row['id_residente']."/></td>";
                                    }else{?>
                                      <td align='center'><input type='checkbox' class='all-asis' name='resi[]' value="<?php echo $row['id_residente']; ?>"  <?php if ($row['status_asis'] == 1){ echo "checked";  } ?>/></td>
                                   <?php }
                                    
                                    ?>
                                    
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['apellido']; ?></td>
                                    <td><?php echo $row['rut']; ?></td>
                                  </tr>                
                               <?php }
                                $mysql->close();
                              ?>
                            </tbody>
                           </table>
                          </div>
                        </div>
         
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
        <?php 
          include('ajax/db_connection.php');
            $q = $mysql->query("SELECT r.nombre, r.apellido, a.* FROM residentes r INNER JOIN asistencia a ON r.id_residente = a.id_residente WHERE a.id_ts = '$id_ts' AND a.status_asis = '0'");

            while($a = $q->fetch_assoc()){?>

        <div class="row">
          <div class="col-md-12">
            <label> Nombre residente: </label> <h4><?php echo $a['nombre']." ".$a['apellido']; ?></h4>
          </div>
          
            <div class="form-check col-md-3">
              <label>
                <input type="checkbox" class="flat-red" name="item[]" value="TRATAMIENTO">
                Tratamiento
              </label>
            </div>

            <div class="form-check col-md-3">
              <label>
                <input type="checkbox" class="flat-red" name="item[]" value="EN ESTADO">
                En estado
              </label>
            </div>

            <div class="form-check col-md-4">
              <label>
                <input type="checkbox" class="flat-red" name="item[]" value="PROBLEMAS DE SALUD">
                Problemas de salud
              </label>
            </div>

            <div class="form-check col-md-2">
              <label>
                <input type="checkbox" class="flat-red" name="item[]" value="OTROS">
                Otros
              </label>
            </div>           
            
            <div class="form-group">
              <div class="col-md-12">
              <label> Observaciones de falta:</label>
                <textarea class="form-control" name="observ_asis" placeholder="Otros motivos de faltas y observaciones"></textarea>
              </div>
            </div>

            <input type="hidden" name="id_asis" value="<?php $a['id_asis']; ?>" >
              <br><br>          
        </div>
              <br><br>
         <?php  }
         $mysql->close();
        ?>
       
        
        
        
        
        



        </div>
        <!-- /.tab-pane -->

      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
  <!-- /.col -->

</div>
<!-- /.row -->
<!-- END CUSTOM TABS -->
                
                
                </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_ts" value="<?php echo $id_ts;?>">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
              
            </div>
            <!-- /.modal-content -->
            
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</form>

   