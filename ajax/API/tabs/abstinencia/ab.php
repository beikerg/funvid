



<div class="row">
	<center><h2>Abstinencias</h2></center>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_Abs_modal"><i class="fa fa-plus"></i> Añadir</button>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="absti"></div>
        </div>
    </div>

<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_Abs_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Añadir nueva abstinencia</h4>
            </div>
            <div class="modal-body">
                    
                <div id="resultados_Abs"></div>
                
                <div class="form-group">
                   <label for="fecha_abst">Fecha:</label>
                   <input type="date" class="form-control" name="fecha_abst" id="fecha_abst" value="<?php echo date('Y-m-d'); ?>">
                </div>
            

                <div class="form-group">
                    <label for="sintomas_abst">Sintomas:</label>
                    <input type="text" class="form-control" name="sintomas_abst" id="sintomas_abst" >
                </div>

                <div class="form-group">
                    <label for="obser_abst">Observaciones</label>
                    <textarea name="obser_abst" id="obser_abst" class="form-control" ></textarea>
                </div>
			
				<input type="hidden" name="id_residente" id="id_residente" value="<?php echo $id_residente; ?>">
				<input type="hidden" name="etapa_abst" id="etapa_abst" value="<?php echo $etapa_resi; ?>">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addAbs()">Añadir nuevo</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!--// PHP DEL MODAL UPDATE // -->



<!-- // TERMINO DEL PHP MODAL UPDATE //-->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_Abs_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar</h4>
            </div>
            <div class="modal-body">
        
              <div id="update_Abs"></div>

				
				<div class="form-group">
                   <label for="update_fecha_abst">Fecha:</label>
                   <input type="date" class="form-control" name="update_fecha_abst" id="update_fecha_abst" value="<?php echo date('Y-m-d'); ?>">
                </div>
            	
            	<div class="form-group">
                    <label for="update_etapa_abst">Etapa</label>
                    <select class="form-control" name="update_etapa_abst" id="update_etapa_abst" >
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

                <div class="form-group">
                    <label for="update_sintomas_abst">Sintomas:</label>
                    <input type="text" class="form-control" name="update_sintomas_abst" id="update_sintomas_abst" >
                </div>

                <div class="form-group">
                    <label for="update_obser_abst">Observaciones</label>
                    <textarea name="update_obser_abst" id="update_obser_abst" class="form-control" ></textarea>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="UpdateAbsDetails()" >Guardar Cambios</button>
                <input type="hidden" id="hidden_Abs_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->



