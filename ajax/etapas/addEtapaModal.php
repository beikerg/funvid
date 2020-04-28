<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_Etapas_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Añadir nuevo</h4>
            </div>
            <div class="modal-body">
                    
                <div id="resultados"></div>
                <center>
                <div class="form-group">
                   <label for="status_etapa">Status</label>
                   <select class="form-control" name="status_etapa" id="status_etapa">
                       <option>Seleccionar opción</option>
                       <option value="1">ASCENSO</option>
                       <option value="2">DEVALUCACIÓN</option>
                   </select>
                </div>
            </center>

                <div class="form-group">
                    <label for="desc_etapa">Etapa</label>
                    <select class="form-control" name="desc_etapa" id="desc_etapa">
                        <option>Seleccionar etapa</option>
                        <option value="1">INTEGRACIÓN</option>
                        <option value="2">CONFIANZA</option>
                        <option value="3">INICIATIVA</option>
                        <option value="4">IDENTIDAD</option>
                        <option value="5">TRASCENDENCIA</option>
                        <option value="6">EDUCADOR 1</option>
                        <option value="7">EDUCADOR 2</option>
                        <option value="8">EDUCADOR 3</option>
                        <option value="9">EDUDADOR 4</option>
                        <option value="10">REDUCADO</option>
                        <option value="11">ABANDONO</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_inicio_etapa">Fecha inicio</label>
                    <input type="date" name="fecha_inicio_etapa" id="fecha_inicio_etapa" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                </div>

                <div class="form-group">
                    <label for="fecha">Observaciones de etapa</label>
                    <textarea name="obser_etapa" id="obser_etapa" class="form-control" ></textarea>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addEtapas()">Añadir nuevo</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->