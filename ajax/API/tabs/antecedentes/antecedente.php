
<div class="row">
	<center><h2>Antecedentes Relavantes</h2></center>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_Ante_modal"><i class="fa fa-plus"></i> Añadir</button>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="antece"></div>
        </div>
    </div>

<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_Ante_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Añadir Antecedentes Relavantes</h4></center>
            </div>
            <div class="modal-body">
                    
                <div id="resultados_Ante"></div>
                
                <div class="form-group">
                   <label for="fecha_ante">Fecha:</label>
                   <input type="date" class="form-control" name="fecha_ante" id="fecha_ante" value="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group">
                    <label for="informacion_ante">Información: </label>
                    <textarea name="informacion_ante" id="informacion_ante" class="form-control" ></textarea>
                </div>

                
                
			
				<!--<input type="hidden" name="id_residente" id="id_residente" value="<?php //echo $id_residente; ?>">-->
				<input type="hidden" name="etapa_ante" id="etapa_ante" value="<?php echo $etapa_resi; ?>">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addAnte()">Añadir nuevo</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!--// PHP DEL MODAL UPDATE // -->



<!-- // TERMINO DEL PHP MODAL UPDATE //-->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_Ante_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Editar antecedente</h4><center>
            </div>
            <div class="modal-body">
        
              <div id="update_Ante"></div>

				
				<div class="form-group">
                   <label for="update_fecha_ante">Fecha:</label>
                   <input type="date" class="form-control" name="upadate_fecha_ante" id="update_fecha_ante">
                </div>

                <div class="form-group">
                    <label for="update_informacion_ante">Información: </label>
                    <textarea name="update_informacion_ante" id="update_informacion_ante" class="form-control" ></textarea>
                </div>
            	
            	<div class="form-group">
                    <label for="update_etapa_ante">Etapa</label>
                    <select class="form-control" name="update_etapa_ante" id="update_etapa_ante" >
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
                <button type="button" class="btn btn-primary" onclick="UpdateAnteDetails()" >Guardar Cambios</button>
                <input type="hidden" id="hidden_Ante_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->



