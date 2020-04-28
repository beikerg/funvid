<div id="editarSalida_<?php echo $row['id_salida']; ?>" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title"><center>Editar pase de salida</center></h3>
      </div>
      <div class="modal-body">
        <form action="ajax/cSalida/updateSalida.php" method="POST">
       <div class="container-fluid">
         <div class="form-group">
           <label>Fecha de salida:</label>
           <input type="date" class="form-control" name="fecha_salida" value="<?php echo $row['fecha_salida']; ?>"/>
         </div>
         <div class="form-group">
           <label>Tramites:</label>
           <input type="text" class="form-control" name="tramite_salida" value="<?php echo $row['tramite_salida']; ?>"/>
         </div>
         <div class="form-group">
           <label>Observaciones: </label>
           <textarea class="form-control" row="3" name="obser_salida"><?php echo $row['obser_salida']; ?></textarea>
         </div>
          <!-- Valores esenciales -->
          <input type="hidden" name="id_residente" value="<?php echo $row['id_residente']; ?>">
          <input type="hidden" name="id_salida" value="<?php echo $row['id_salida']; ?>">

       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary"> Guardar Cambios</button>
        
      </div>
    </form>
    </div>
  </div>
</div>