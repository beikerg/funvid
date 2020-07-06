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

<div class="modal fade" id="asis_modal_<?php echo $row['id_ts']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de residentes</h4>
              </div>
              <div class="modal-body">
                      <!-- START CUSTOM TABS -->
      <h2 class="page-header">AdminLTE Custom Tabs</h2>

<div class="row">
  <div class="col-md-6">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
        <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
        <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Dropdown <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
          </ul>
        </li>
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <b>How to use:</b>

          <p>Exactly like the original bootstrap tabs except you should use
            the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
          A wonderful serenity has taken possession of my entire soul,
          like these sweet mornings of spring which I enjoy with my whole heart.
          I am alone, and feel the charm of existence in this spot,
          which was created for the bliss of souls like mine. I am so happy,
          my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
          that I neglect my talents. I should be incapable of drawing a single stroke
          at the present moment; and yet I feel that I never was a greater artist than now.
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          The European languages are members of the same family. Their separate existence is a myth.
          For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
          in their grammar, their pronunciation and their most common words. Everyone realizes why a
          new common language would be desirable: one could refuse to pay expensive translators. To
          achieve this, it would be necessary to have uniform grammar, pronunciation and more common
          words. If several languages coalesce, the grammar of the resulting language is more simple
          and regular than that of the individual languages.
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          It has survived not only five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
          sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
          like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
  <!-- /.col -->

  <div class="col-md-6">
    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#tab_1-1" data-toggle="tab">Tab 1</a></li>
        <li><a href="#tab_2-2" data-toggle="tab">Tab 2</a></li>
        <li><a href="#tab_3-2" data-toggle="tab">Tab 3</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Dropdown <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
          </ul>
        </li>
        <li class="pull-left header"><i class="fa fa-th"></i> Custom Tabs</li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1-1">
          <b>How to use:</b>

          <p>Exactly like the original bootstrap tabs except you should use
            the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
          A wonderful serenity has taken possession of my entire soul,
          like these sweet mornings of spring which I enjoy with my whole heart.
          I am alone, and feel the charm of existence in this spot,
          which was created for the bliss of souls like mine. I am so happy,
          my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
          that I neglect my talents. I should be incapable of drawing a single stroke
          at the present moment; and yet I feel that I never was a greater artist than now.
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2-2">
          The European languages are members of the same family. Their separate existence is a myth.
          For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
          in their grammar, their pronunciation and their most common words. Everyone realizes why a
          new common language would be desirable: one could refuse to pay expensive translators. To
          achieve this, it would be necessary to have uniform grammar, pronunciation and more common
          words. If several languages coalesce, the grammar of the resulting language is more simple
          and regular than that of the individual languages.
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3-2">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          It has survived not only five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
          sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
          like Aldus PageMaker including versions of Lorem Ipsum.
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

   