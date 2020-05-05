

<div class="modal fade" id="ver_ayuda_<?php echo $row['id_ayuda']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h3 class="modal-title" id="exampleModalLabel"> Ver Ayuda</h3><center>
      </div>
      <div class="modal-body">
        <form action="ajax/ayudas/updateAyuda.php" method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="form-group col-md-6">
            <label>Nombre: </label>
            <input type="text" class="form-control" name="nombre_residente" id="nombre_residente" value="<?php echo $row['nombre']; ?>" readonly="readonly">
          </div>
          <div class="form-group col-md-6">
            <label>Apellido: </label>
            <input type="text" class="form-control" name="apellido_residente" id="apellido_residente" value="<?php echo $row['apellido']; ?>" readonly="readonly">
          </div>
          
           <!-- Date range -->
              <div class="form-group col-md-6">
                <label>Fecha Inicio:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="fecha_inicio_ayuda" class="form-control" value="<?php echo $row['fecha_inicio_ayuda']; ?>" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <!-- Date range -->
              <div class="form-group col-md-6">
                <label>Fecha Termino:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="fecha_fin_ayuda" class="form-control" value="<?php echo $row['fecha_fin_ayuda']; ?>">
                </div>
                <!-- /.input group -->
              </div>
          <div class="form-group col-md-10">
             <center> 
              <div class="form-group col-md-12">
              <label>Seleccione las ayudas:</label>
              </div>
            <div class="form-check col-md-3"> 
              <label class="customcheck">
                <input type="checkbox" name="ayuda[]" value="Llamada" <?php in_array('Llamada', $ayudas) ? print "checked" : "";  ?>>
                <span class="checkmark"></span>
                    Llamada
              </label>
            </div>
            <div class="form-check col-md-3">
              <label class="customcheck">
                <input type="checkbox" name="ayuda[]" value="Visitar" <?php in_array('Visitar', $ayudas) ? print "checked" : "";  ?> on>
                 <span class="checkmark"></span>
                    Visitar
              </label>
            </div>
            <div class="form-check col-md-4">
              <label class="customcheck">
                <input type="checkbox" name="ayuda[]" value="Sin pase" <?php in_array('Sin pase', $ayudas) ? print "checked" : "";  ?>>
                <span class="checkmark"></span>
                    Sin pase
              </label>
            </div>
            <div class="form-check col-md-2">
              <label class="customcheck">
                <input type="checkbox" name="ayuda[]" value="Otros" <?php in_array('Otros', $ayudas) ? print "checked" : "";  ?>>
                <span class="checkmark"></span>
                    Otros
              </label>
            </div>
           
          </center>
          </div>
          <div class="form-group col-md-12">
            <label>Observaciones:</label>
            <textarea name="obser_ayuda" class="form-control"><?php echo $row['obser_ayuda']; ?></textarea>
          </div>
          </div>
        </div>
        <!-- Inputs necesarios -->
          <input type="hidden" name="id_residente" value="<?php echo $row['id_residente']; ?>">
          <input type="hidden" name="id_ayuda" value="<?php echo $row['id_ayuda']; ?>">
        <!-- ./ -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    </form>
    </div>
  </div>
</div>