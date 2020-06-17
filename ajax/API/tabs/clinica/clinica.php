
<div class="row">
	<center><h2>Intervención clínica</h2></center>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_Clinica_modal"><i class="fa fa-plus"></i> Añadir</button>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="clinic"></div>
        </div>
    </div>

<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_Clinica_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Añadir Intervención clínica</h4></center>
            </div>
            <div class="modal-body">
                    
                <div id="resultados_Clinica"></div>
                
                <div class="form-group">
                    <label for="tipo_clinica">Tipo de atención:</label>
                    <select class="form-control" name="tipo_clinica" id="tipo_clinica" >
                        <option>Seleccionar atención</option>
                        <option value="PSICOLOGO">Psicólogo</option>
                        <option value="PSIQUIATRA">Psiquiatra</option>
                        <option value="ASISTENTE-SOCIAL">Asistente Social</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="psiquiatra_clinica">¿Quién lo atiendío?</label>
                    <input type="text" name="psiquiatra_clinica" id="psiquiatra_clinica" class="form-control" placeholder="Nombre del doctor o asistente social que lo atendio">
                </div>



                <div class="form-group">
                   <label for="fecha_clinica">Fecha:</label>
                   <input type="date" class="form-control" name="fecha_clinica" id="fecha_clinica" value="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group">
                    <label for="evaluacion_clinica">Evaluación:</label>
                    <textarea name="evaluacion_clinica" id="evaluacion_clinica" class="form-control" placeholder="Indique la evaluación del doctor"></textarea>
                </div>

                <div class="form-group">
                    <label for="medicamentos_clinica">Medicamentos y Dosis:</label>
                    <textarea name="medicamentos_clinica" id="medicamentos_clinica" class="form-control" placeholder="Medicamentos recetados por el doctor"></textarea>
                </div>

                
			
				<!--<input type="hidden" name="id_residente" id="id_residente" value="<?php echo $id_residente; ?>">-->
				<input type="hidden" name="etapa_clinica" id="etapa_clinica" value="<?php echo $etapa_resi; ?>">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addClinica()">Añadir nuevo</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!--// PHP DEL MODAL UPDATE // -->



<!-- // TERMINO DEL PHP MODAL UPDATE //-->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_Clinica_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar</h4>
            </div>
            <div class="modal-body">
        
              <div id="update_Clinica"></div>


              <div class="form-group">
                    <label for="update_tipo_clinica">Tipo de atención:</label>
                    <select class="form-control" name="update_tipo_clinica" id="update_tipo_clinica" >
                        <option>Seleccionar atención</option>
                        <option value="PSICOLOGO">Psicólogo</option>
                        <option value="PSIQUIATRA">Psiquiatra</option>
                        <option value="ASISTENTE-SOCIAL">Asistente Social</option>
                    </select>
                </div>
				
				<div class="form-group">
                    <label for="update_psiquiatra_clinica">¿Quién lo atendío?:</label>
                    <input type="text" name="update_psiquiatra_clinica" id="update_psiquiatra_clinica" class="form-control" placeholder="Nombre del doctor o asistente social que lo atendio">
                </div>

                <div class="form-group">
                   <label for="update_fecha_clinica">Fecha:</label>
                   <input type="date" class="form-control" name="update_fecha_clinica" id="update_fecha_clinica">
                </div>

                <div class="form-group">
                    <label for="update_evaluacion_clinica">Evaluación :</label>
                    <textarea name="update_evaluacion_clinica" id="update_evaluacion_clinica" class="form-control" placeholder="Indique la evaluación del doctor"></textarea>
                </div>

                <div class="form-group">
                    <label for="update_medicamentos_clinica">Medicamentos y Dosis:</label>
                    <textarea name="update_medicamentos_clinica" id="update_medicamentos_clinica" class="form-control" placeholder="Medicamentos recetados por el doctor"></textarea>
                </div>
            	
            	<div class="form-group">
                    <label for="update_etapa_clinica">Etapa</label>
                    <select class="form-control" name="update_etapa_clinica" id="update_etapa_clinica" >
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
                <button type="button" class="btn btn-primary" onclick="UpdateClinicaDetails()" >Guardar Cambios</button>
                <input type="hidden" id="hidden_Clinica_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->



