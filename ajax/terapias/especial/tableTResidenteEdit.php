<?php
  include('ajax/db_connection.php');
  $asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_especial = '$id_especial'");
  $c_sql = mysqli_num_rows($asis_sql);

  // if($c_sql == 0){
  //   echo '<form action="ajax/asistencia/addAsis.php" method="POST">';
  // }else{
  //   echo '<form action="ajax/asistencia/editAsis.php" method="POST">';
  // }
  
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
                        <div class="col-xs-12 table-responsive">
                        <table id="asis" class=" table table-bordered table-striped dt-responsive nowrap">
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
                                  $sql = "SELECT * FROM residentes WHERE etapa_resi = 'EDUCADOR-1' || etapa_resi = 'EDUCADOR-2' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-4' || etapa_resi = 'TRASCENDENCIA' || etapa_resi = 'IDENTIDAD' ";
                                }else{
                                  $sql = "SELECT r.nombre, r.apellido, r.rut, a.* FROM residentes r INNER JOIN asistencia a ON r.id_residente = a.id_residente WHERE a.id_especial = '$id_especial'";
                                }
                                
                                //use for MySQLi-OOP
                                $query = $mysql->query($sql);
                                while($row = $query->fetch_assoc()){?>
                                  <tr>
                                    <?php 
                                    if($c_sql == 0){
                                      echo "<td align='center'><input type='checkbox' class='all-asis' name='resi[]' value=".$row['id_residente']."/></td>";
                                    }else{?>
                                      <td align='center'><input type='checkbox' class='all-asis' name='resi[]' value="<?php echo $row['id_residente']; ?>"  <?php if ($row['status_asis'] == 1){ echo "checked";  }else{ echo "";} ?>/></td>
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
            $q = $mysql->query("SELECT r.nombre, r.apellido, a.* FROM residentes r INNER JOIN asistencia a ON r.id_residente = a.id_residente WHERE a.id_especial = '$id_especial' AND a.status_asis = '0'");

            while($a = $q->fetch_assoc()){

              $item_asis = explode(',', $a['item_asis']);
              ?>

                   

        <div class="row">
          <div class="col-md-12">
            <label> Nombre residente: </label> <h4><?php echo $a['nombre']." ".$a['apellido']; ?></h4>
          </div>
          
            <div class="form-check col-md-3">
              <label>
                <input type="checkbox" class="flat-red" name="item[<?php echo $a['id_asis'];?>][]" value="TRAMITE" <?php in_array('TRAMITE', $item_asis) ? print "checked" : "";  ?>>
                Tramite
              </label>
            </div>

            <div class="form-check col-md-3">
              <label>
                <input type="checkbox" class="flat-red" name="item[<?php echo $a['id_asis'];?>][]" value="EN ESTADO" <?php in_array('EN ESTADO', $item_asis) ? print "checked" : "";  ?>>
                En estado
              </label>
            </div>

            <div class="form-check col-md-4">
              <label>
                <input type="checkbox" class="flat-red" name="item[<?php echo $a['id_asis'];?>][]" value="PROBLEMAS DE SALUD" <?php in_array('PROBLEMAS DE SALUD', $item_asis) ? print "checked" : "";  ?>>
                Problemas de salud
              </label>
            </div>

            <div class="form-check col-md-2">
              <label>
                <input type="checkbox" class="flat-red" name="item[<?php echo $a['id_asis'];?>][]" value="OTROS" <?php in_array('OTROS', $item_asis) ? print "checked" : "";  ?>>
                Otros
              </label>
            </div>           
            
            <div class="form-group">
              <div class="col-md-12">
              <label> Observaciones de falta:</label>
                <textarea class="form-control" name="observ_asis[<?php echo $a['id_asis'];?>]" placeholder="Otros motivos de faltas y observaciones"><?php echo $a['observ_asis']; ?></textarea>
              </div>
            </div>
            <input type="hidden" name="c_sql" value="<?php echo $c_sql; ?>">
            <input type="hidden" name="id[<?php echo $a['id_asis'];?>]" value="<?php echo $a['id_asis']; ?>" > 
            <input type="hidden" name="id_residen[<?php echo $a['id_asis']; ?>]" value="<?php echo $a['id_residente']; ?>">
            
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
                    <input type="hidden" name="id_especial" value="<?php echo $id_especial;?>">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="botones" value="save" class="btn btn-primary">Guardar</button>
                  </div>
              
            </div>
            <!-- /.modal-content -->
            
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


   