<div class="modal fade" id="ver_<?php echo $row['id_caja']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h3 class="modal-title" id="myModalLabel">Ver</h3></center>
            </div>
            <div class="modal-body">
                <div class="content">
            <div class="form-group col-md-4">
              <h4><b>Tipo de trasacción</b> </h4> 
            </div>
            <div class="form-group col-md-8">
              <h4>: <?php echo ucwords(strtolower($row['tipo_caja'])); ?></h4> 
            </div>
            
            <div class="form-group col-md-4">
              <h4><b>Fecha</b> </h4>
            </div>
            <div class="form-group col-md-8">
              <h4>: <?php echo date('d-m-Y', strtotime($row['fecha_caja'])); ?></h4>
            </div>   
            
            <div class="form-group col-md-4">
              <h4><b>Cantidad</b> </h4>
            </div>
        
            <?php
            if($row['abono_caja'] == 0 ){
              echo "<div class='form-group col-md-8'>
              <h4>: ".number_format($row["cargo_caja"], 0, ",", ".")."</h4>
            </div> ";
              }else{
              echo "<div class='form-group col-md-8'>
              <h4>: ".number_format($row["abono_caja"], 0, ",", ".")."</h4>
            </div> ";
              }
             ?>

             <div class="form-group col-md-4">
               <h4><b>Descipción</b></h4>
             </div>

             <div class="form-group col-md-8">
               <h4>: <?php echo $row['descrip_caja']; ?></h4>
             </div>
            
                 

            </div>  

                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div> 