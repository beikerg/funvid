
<div class="row">
	<center><h2>Toma de Doping</h2></center>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_doping_modal"><i class="fa fa-plus"></i> Añadir</button>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="doping"></div>
        </div>
    </div>

<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_doping_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Añadir toma de Doping</h4></center>
            </div>
            <div class="modal-body">
                    
                <div id="resultados_doping"></div>
                
                <div class="form-group">
                   <label for="fecha_doping">Fecha:</label>
                   <input type="date" class="form-control" name="fecha_doping" id="fecha_doping" value="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group">
                    <label for="nombre_doping">¿Quién toma la muestras?</label>
                    <input type="text" name="nombre_doping" id="nombre_doping" class="form-control" placeholder="Nombre de quien toma la muestra">
                </div>


                <div class="form-group">
                    <label for="observ_doping">Observaciones de la prueba:</label>
                    <textarea name="observ_doping" id="observ_doping" class="form-control" placeholder="Observaciones de la Toma de Doping"></textarea>
                </div>

                
			
				<!--<input type="hidden" name="id_residente" id="id_residente" value="<?php echo $id_residente; ?>">-->
				<input type="hidden" name="etapa_doping" id="etapa_doping" value="<?php echo $etapa_resi; ?>">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addDoping()">Añadir nuevo</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!--// PHP DEL MODAL UPDATE // -->



<!-- // TERMINO DEL PHP MODAL UPDATE //-->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_doping_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar</h4>
            </div>
            <div class="modal-body">
        
              <div id="update_doping"></div>

                 <div class="form-group">
                   <label for="update_fecha_doping">Fecha:</label>
                   <input type="date" class="form-control" name="update_fecha_doping" id="update_fecha_doping">
                </div>

				<div class="form-group">
                    <label for="update_nombre_doping">¿Quién toma la muestra?</label>
                    <input type="text" name="update_nombre_doping" id="update_nombre_doping" class="form-control" placeholder="Nombre de quien toma la muestra">
                </div>


                <div class="form-group">
                    <label for="update_observ_doping">Observaciones de la prueba:</label>
                    <textarea name="update_observ_doping" id="update_observ_doping" class="form-control" ></textarea>
                </div>
            	
            	<div class="form-group">
                    <label for="update_etapa_doping">Etapa</label>
                    <select class="form-control" name="update_etapa_doping" id="update_etapa_doping" >
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
                <button type="button" class="btn btn-primary" onclick="UpdateDopingDetails()" >Guardar Cambios</button>
                <input type="hidden" id="hidden_doping_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->



