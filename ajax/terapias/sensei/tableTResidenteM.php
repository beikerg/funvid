<?php

  include('ajax/db_connection.php');
  $id_ts = $row['id_ts'];
  $asis_sql = $mysql->query("SELECT * FROM asistencia WHERE id_ts = '$id_ts'");
  $c_sql = mysqli_num_rows($asis_sql);

  if($c_sql == 0){
    echo '<form action="ajax/asistencia/addAsis.php" method="POST">';
  }else{
    echo '<form action="ajax/asistencia/editAsis.php" method="POST">';
  }
  
?>

<div class="modal fade" id="asis_modal_<?php echo $row['id_ts']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de residentes</h4>
              </div>
              <div class="modal-body">
                
                <div classs="container">    
                  <div class="box box-solid"> 
                    <div class="box-body">
                      <div class="row">
                        <div class="col-xs-12">
                        <table id="asis_<?php echo $row['id_ts']; ?>" class="display table table-bordered table-striped">
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
                    </div>
                  </div>
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

   