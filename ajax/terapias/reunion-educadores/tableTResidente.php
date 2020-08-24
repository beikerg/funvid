

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
        <!-- <li><a href="#tab_2" data-toggle="tab">Inasistencia</a></li> -->
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
                                
                                  $sql = "SELECT * FROM residentes WHERE etapa_resi = 'EDUCADOR-1' || etapa_resi = 'EDUCADOR-2' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-3' || etapa_resi = 'EDUCADOR-4' ";
                            
                                 
                                //use for MySQLi-OOP
                                $query = $mysql->query($sql);
                                while($row = $query->fetch_assoc()){?>
                                  <tr>
                                    
                                  <td align='center'><input type='checkbox' class='all-asis' name='resi[]' value="<?php echo $row['id_residente']; ?>"/></td>
                                            
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
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="botones" class="btn btn-primary" value="save">Guardar</button>
                  </div>
              
            </div>
            <!-- /.modal-content -->
            
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


   