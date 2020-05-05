
<div class="row">
	<center><h2>Ideación de abandono</h2></center>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_Aban_modal"><i class="fa fa-plus"></i> Añadir</button>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="aband"></div>
        </div>
    </div>

<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_Aban_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Añadir abandono</h4></center>
            </div>
            <div class="modal-body">
                    
                <div id="resultados_Aban"></div>
                
                
                <div class="form-group">
                    <label for="motivo_aban">Motivo de ideación:</label>
                    <textarea name="motivo_aban" id="motivo_aban" class="form-control" ></textarea>
                </div>

                <div class="form-group">
                    <label for="actitud_aban">Actitud Asumida:</label>
                    <textarea name="actitud_aban" id="actitud_aban" class="form-control" ></textarea>
                </div>

                <div class="form-group">
                   <label for="fecha_aban">Fecha:</label>
                   <input type="date" class="form-control" name="fecha_aban" id="fecha_aban" value="<?php echo date('Y-m-d'); ?>">
                </div>
			
				<!--<input type="hidden" name="id_residente" id="id_residente" value="<?php //echo $id_residente; ?>"> -->
				<input type="hidden" name="etapa_aban" id="etapa_aban" value="<?php echo $etapa_resi; ?>">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addAban()">Añadir nuevo</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!--// PHP DEL MODAL UPDATE // -->



<!-- // TERMINO DEL PHP MODAL UPDATE //-->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_Aban_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar</h4>
            </div>
            <div class="modal-body">
        
              <div id="update_Aban"></div>

				
				<div class="form-group">
                    <label for="update_motivo_aban">Motivo de ideación:</label>
                    <textarea name="update_motivo_aban" id="update_motivo_aban" class="form-control" ></textarea>
                </div>

                <div class="form-group">
                    <label for="update_actitud_aban">Actitud Asumida:</label>
                    <textarea name="update_actitud_aban" id="update_actitud_aban" class="form-control" ></textarea>
                </div>

                <div class="form-group">
                   <label for="update_fecha_aban">Fecha:</label>
                   <input type="date" class="form-control" name="update_fecha_aban" id="update_fecha_aban" value="<?php echo date('Y-m-d'); ?>">
                </div>
            	
            	<div class="form-group">
                    <label for="update_etapa_aban">Etapa</label>
                    <select class="form-control" name="update_etapa_aban" id="update_etapa_aban" >
                        <option></option>
                        <option value="INTEGRACION">INTEGRACIÓN</option>
                        <option value="CONFIANZA">CONFIANZA</option>
                        <option value="INICIATIVA">INICIATIVA</option>
                        <option value="IDENTIDAD">IDENTIDAD</option>
                        <option value="TRASCENDENCIA">TRASCENDENCIA</option>
                        <option value="EDUCADOR-1">EDUCADOR 1</option>
                        <option value="EDUCADOR-2">EDUCADOR 2</option>
                        <option value="EDUCADOR-3">EDUCADOR 3</option>
                        <option value="EDUCADOR-4">EDUDADOR 4</option>
                        <option value="REDUCADO">REDUCADO</option>
                    </select>
                </div>

                



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="UpdateAbanDetails()" >Guardar Cambios</button>
                <input type="hidden" id="hidden_Aban_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->



