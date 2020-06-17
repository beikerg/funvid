<?php date_default_timezone_set("America/Santiago"); ?>
<div class="row">
	<center><h2>Tratamientos medicos</h2></center>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_Tmedicos_modal"><i class="fa fa-plus"></i> Añadir</button>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="Tmedicos"></div>
        </div>
    </div>

<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_Tmedicos_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Añadir Tratamiento medicos</h4></center>
            </div>
            <div class="modal-body">
                    
                <div id="resultados_Tmedicos"></div>
                
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="fecha_tm">Fecha:</label>
                        <input type="date" class="form-control" name="fecha_tm" id="fecha_tm" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group col-xs-6">
                    <label for="hora_tm">Hora:</label>
                    <input type="time" class="form-control" name="hora_tm" id="hora_tm" value="<?php echo date("H:i"); ?>">
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="centro_tm">Centro Asistencial:</label>
                    <input type="text" name="centro_tm" id="centro_tm" class="form-control" placeholder="Nombre del centro asistencial">
                </div>

                <div class="form-group">
                    <label for="motivo_tm">Motivo de la consulta:</label>
                    <input type="text" name="motivo_tm" id="motivo_tm" class="form-control" placeholder="Motivo de la consulta medica">
                </div>


                <div class="form-group">
                    <label for="diagnostico_tm">Diagnostico:</label>
                    <textarea name="diagnostico_tm" id="diagnostico_tm" class="form-control" placeholder="Diagnostico del doctor"></textarea>
                </div>

                <div class="form-group">
                    <label for="medicamentos_tm">Medicamentos recetados:</label>
                    <textarea name="medicamentos_tm" id="medicamentos_tm" class="form-control" placeholder="Medicamentos recetados por el doctor"></textarea>
                </div>

                <div class="form-group">
                    <label for="obser_tm">Observaciones del tratamiento:</label>
                    <textarea name="observ_tm" id="observ_tm" class="form-control" placeholder="Observaciones del tratamiento medico"></textarea>
                </div>

                
			
				<!--<input type="hidden" name="id_residente" id="id_residente" value="<?php echo $id_residente; ?>">-->
				<input type="hidden" name="etapa_tm" id="etapa_tm" value="<?php echo $etapa_resi; ?>">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addTmedicos()">Añadir nuevo</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!--// PHP DEL MODAL UPDATE // -->



<!-- // TERMINO DEL PHP MODAL UPDATE //-->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_Tmedicos_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar</h4>
            </div>
            <div class="modal-body">
        
              <div id="update_Tmedicos"></div>
                
              <div class="row">
                    <div class="form-group col-xs-6">
                    <label for="update_fecha_tm">Fecha:</label>
                    <input type="date" class="form-control" name="update_fecha_tm" id="update_fecha_tm">
                    </div>

                    <div class="form-group col-xs-6">
                    <label for="update_hora_tm">Hora:</label>
                    <input type="time" class="form-control" name="update_hora_tm" id="update_hora_tm">
                    </div>
                </div>

                <div class="form-group">
                    <label for="update_centro_tm">Centro Asistencial:</label>
                    <input type="text" name="update_centro_tm" id="update_centro_tm" class="form-control" placeholder="Nombre del centro asistencial">
                </div>

				<div class="form-group">
                    <label for="update_motivo_tm">Motivo de la consulta:</label>
                    <input type="text" name="update_motivo_tm" id="update_motivo_tm" class="form-control" placeholder="Motivo de la consulta medica">
                </div>


                <div class="form-group">
                    <label for="update_diagnostico_tm">Diagnostico:</label>
                    <textarea name="update_diagnostico_tm" id="update_diagnostico_tm" class="form-control" placeholder="Diagnostico del doctor"></textarea>
                </div>

                <div class="form-group">
                    <label for="update_medicamentos_tm">Medicamentos recetados:</label>
                    <textarea name="update_medicamentos_tm" id="update_medicamentos_tm" class="form-control" placeholder="Medicamentos recetados por el doctor"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="update_observ_tm">Observaciones del tratamiento</label>
                    <textarea name="update_observ_tm" id="update_observ_tm" class="form-control" placeholder="Medicamentos recetados por el doctor"></textarea>
                </div>
            	
                
            	<div class="form-group">
                    <label for="update_etapa_tm">Etapa</label>
                    <select class="form-control" name="update_etapa_tm" id="update_etapa_tm" >
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
                <button type="button" class="btn btn-primary" onclick="UpdateTmedicosDetails()" >Guardar Cambios</button>
                <input type="hidden" id="hidden_tm_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->



