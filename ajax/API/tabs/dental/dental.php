
<div class="row">
	<center><h2>Tratamiento Dental</h2></center>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_Dental_modal"><i class="fa fa-plus"></i> Añadir</button>
            </div>
             
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="denta"></div>
        </div>
    </div>

<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_Dental_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Añadir Tratamiento Dental</h4></center>
            </div>
            <div class="modal-body">
                    
                <div id="resultados_Dental"></div>
                
                
                <div class="form-group">
                    <label for="tratamiento_dental">Nombre Tratamiento:</label>
                    <input type="text" name="tratamiento_dental" id="tratamiento_dental" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="nom_dental">Nombre Doctor:</label>
                    <input type="text" name="nom_dental" id="nom_dental" class="form-control" >
                </div>

                <div class="form-group">
                   <label for="fecha_dental">Fecha:</label>
                   <input type="date" class="form-control" name="fecha_dental" id="fecha_dental" value="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group">
                    <label for="medica_dental">Medicamentos y Dosis:</label>
                    <textarea name="medica_dental" id="medica_dental" class="form-control" ></textarea>
                </div>
                
                <div class="form-group">
                    <label for="obser_dental">Observaciones:</label>
                    <textarea name="obser_dental" id="obser_dental" class="form-control" ></textarea>
                </div>
                
			
				<!--<input type="hidden" name="id_residente" id="id_residente" value="<?php //echo $id_residente; ?>">-->
				<input type="hidden" name="etapa_dental" id="etapa_dental" value="<?php echo $etapa_resi; ?>">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addDental()">Añadir nuevo</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!--// PHP DEL MODAL UPDATE // -->



<!-- // TERMINO DEL PHP MODAL UPDATE //-->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_Dental_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Editar Tratamiento Dental</h4><center>
            </div>
            <div class="modal-body">
        
              <div id="update_Dental"></div>

				
				<div class="form-group">
                    <label for="update_tratamiento_dental">Nombre Tratamiento:</label>
                    <input type="text" name="update_tratamiento_dental" id="update_tratamiento_dental" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="update_nom_dental">Nombre Doctor:</label>
                    <input type="text" name="update_nom_dental" id="update_nom_dental" class="form-control" >
                </div>

                <div class="form-group">
                   <label for="update_fecha_dental">Fecha:</label>
                   <input type="date" class="form-control" name="update_fecha_dental" id="update_fecha_dental" >
                </div>

                <div class="form-group">
                    <label for="update_medica_dental">Medicamentos y Dosis:</label>
                    <textarea name="update_medica_dental" id="update_medica_dental" class="form-control" ></textarea>
                </div>
                
                <div class="form-group">
                    <label for="update_obser_dental">Observaciones:</label>
                    <textarea name="update_obser_dental" id="update_obser_dental" class="form-control" ></textarea>
                </div>
            	
            	

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="UpdateDentalDetails()" >Guardar Cambios</button>
                <input type="hidden" id="hidden_Dental_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->



