<div class="modal fade" id="asistencia-modal">
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
                        <table id="myTable" class=" table table-bordered table-striped">
                          <thead>
                            <th>Select.</th>
                            <th>Nombres</th>
                            <th>Apellido</th>
                            <th>Rut</th>

                          </thead>
                            <tbody>
                              <?php
                                include('ajax/db_connection.php');
                                $sql = "SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO' ";

                                //use for MySQLi-OOP
                                $query = $mysql->query($sql);
                                while($row = $query->fetch_assoc()){
                                  echo 
                                  "<tr>
                                    <td align='center'><input type='checkbox' name='resi[]' value=".$row['id_residente']."/></td>
                                    <td>".$row['nombre']."</td>
                                    <td>".$row['apellido']."</td>
                                    <td>".$row['rut']."</td>
                                  </tr>";                
                                }

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
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


   