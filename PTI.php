<?php
 
 include("include/rol.php");
 


include("ajax/db_connection.php");

 date_default_timezone_set("America/Santiago");

if(!empty($_GET['id'])){
  $id_residente = $_GET['id'];
}

  $query = "SELECT * FROM residentes WHERE id_residente = '$id_residente' ";
  $q = $mysql->query($query);

  if(!$q){
    echo "Error al consultar la base de datos ".$mysql->error;
  }else{
    while($r = $q->fetch_assoc()){

      $nombre = $r['nombre'];
      $apellido = $r['apellido'];
      $etapa_resi = $r['etapa_resi'];

    }
  }


    $hoy = new DateTime();    
    
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | PTI</title>
  <?php  include("include/head.php"); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php 
  //<!-- Main Header -->
    include("include/header.php");
  //-- Left side column. contains the logo and sidebar -->
    include("include/aside-admin.php");
?>    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Plan de tratamiento individual
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> PTI</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <br>                   
       
         <form action="ajax/PTI/addPTI.php" method="POST">   
          <!-- // INICIO BOX // -->
            <!-- Este input almacena el id del residente seleccionado -->
                
      
           
                  <!-- // INICIO BOX 2 // -->
            
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del residente</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">              
              <!-- // INICIO DEL BODY DEL BOX //-->                            
                     <div class="row">
                      <div class="form-group col-md-4">
                         <label>Nombre</label><br>
                          <input class="form-control" type="text" value="<?php echo $nombre; ?>" disabled>
                      </div>                      
                      <div class="form-group col-md-4">                          
                              <label>Apellido</label><br>
                              <input class="form-control" type="text"  value="<?php echo $apellido; ?>" disabled>
                      </div>                                        
                      <div class="form-group col-md-4">
                          <label>Fecha:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo date("Y-m-d"); ?>" name="fecha_pti" class="form-control pull-right" >
                      </div>             
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Etapa</label><br>
                          <select class="form-control" name="etapa_pti">
                              <option>Seleccionar ...</option>
                              <option value="INTEGRACION" <?php echo ($etapa_resi == 'INTEGRACION') ? "selected" : ""; ?>>INTEGRACIÓN</option>
                              <option value="CONFIANZA" <?php echo ($etapa_resi == 'CONFIANZA') ? "selected" : ""; ?>>CONFIANZA</option>
                              <option value="INICIATIVA" <?php echo ($etapa_resi == 'INICIATIVA') ? "selected" : ""; ?>>INICIATIVA</option>
                              <option value="IDENTIDAD" <?php echo ($etapa_resi == 'IDENTIDAD') ? "selected" : ""; ?>>IDENTIDAD</option>
                              <option value="TRASCENDENCIA" <?php echo ($etapa_resi == 'TRASCENDENCIA') ? "selected" : ""; ?>>TRASCENDENCIA</option>
                              <option value="EDUCADOR-1" <?php echo ($etapa_resi == 'EDUCADOR-1') ? "selected" : ""; ?>>EDUCADOR 1</option>
                              <option value="EDUCADOR-2" <?php echo ($etapa_resi == 'EDUCADOR-2') ? "selected" : ""; ?>>EDUCADOR 2</option>
                              <option value="EDUCADOR-3" <?php echo ($etapa_resi == 'EDUCADOR-3') ? "selected" : ""; ?>>EDUCADOR 3</option>
                              <option value="EDUCADOR-4" <?php echo ($etapa_resi == 'EDUCADOR-4') ? "selected" : ""; ?>>EDUDADOR 4</option>
                              <option value="REDUCADO" <?php echo ($etapa_resi == 'REDUCADO') ? "selected" : ""; ?>>REDUCADO</option>
                          </select>
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Periodo de vigencia:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo date("Y-m-d"); ?>" name="periodo_inicio_pti" class="form-control pull-right" >
                      </div>
                      </div>
                      <div class="form-group col-md-4">
                          <label>Hasta:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <?php $fecha = date('Y-m-j');
                              $nuevafecha = strtotime ( '+3 month' , strtotime ( $fecha ) ) ;
                              $nuevafecha = date ( 'Y-m-j' , $nuevafecha ); ?>
                        <input type="date" value="<?php  echo $nuevafecha; ?>" name="periodo_fin_pti" class="form-control pull-right" >
                      </div>  
                      </div>  
                      
                      </div> <!--// FIN DEL FORN-INLINE//-->              
              <!-- // FIN DEL BODY DEÑL BOX // -->
            </div>
            <!-- /.box-body -->
         </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->            
            <!-- // FIN DEL BOX  2// --> 
    
    </div>

    
          <!-- // INICIO BOX 3 // -->
            
                <div class="row">
                <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Patrón de consumo</a></li>
              <li><a href="#tab_2" data-toggle="tab">Situación familiar</a></li>
              <li><a href="#tab_3" data-toggle="tab">Relaciones interpersonales</a></li>
              <li><a href="#tab_4" data-toggle="tab">Situación Socio-Ocupacional</a></li>
              <li><a href="#tab_5" data-toggle="tab">Transgresión a la norma social</a></li>
              <li><a href="#tab_6" data-toggle="tab">Estado de salud mental</a></li>
              <li><a href="#tab_7" data-toggle="tab">Estado de Salud física</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_1" placeholder="Objetivos terapeuticos ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_1" placeholder="Estrategias ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_1" placeholder="Indicadores de logros ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_1" placeholder="Evaluación ..."></textarea>
                  </div>
              
              </div>
                                    
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_2" placeholder="Objetivos terapeuticos ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_2" placeholder="Estrategias ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_2" placeholder="Indicadores de logros ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_2" placeholder="Evaluación ..."></textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_3" placeholder="Objetivos terapeuticos ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_3" placeholder="Estrategias ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_3" placeholder="Indicadores de logros ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_3" placeholder="Evaluación ..."></textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_4" placeholder="Objetivos terapeuticos ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_4" placeholder="Estrategias ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_4" placeholder="Indicadores de logros ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_4" placeholder="Evaluación ..."></textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_5">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_5" placeholder="Objetivos terapueticos ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_5" placeholder="Estrategias ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_5" placeholder="Indicadores de logros ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_5" placeholder="Evaluación ..."></textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_6">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_6" placeholder="Objetivos terapeuticos ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_6" placeholder="Estrategias ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_6" placeholder="Indicadores de logros ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_6" placeholder="Evaluación ..."></textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_7">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_7" placeholder="Objetivos terapeuticos ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_7" placeholder="Estrategias ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_7" placeholder="Indicadores de logros ..."></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_7" placeholder="Evaluación ..."></textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
            
            <!-- // FIN DEL BOX  3// -->
                       
        </div>
           
  
           
        <div class="form-group">
          <input type="hidden" name="id_residente" value="<?php echo $id_residente; ?>">
          <center><input type="submit" class="btn btn-primary btn-lg" value="Guardar" ></center>
        </div>

        </div>     

</form>
            
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include("include/footer.php"); ?>

  <!-- Control Sidebar -->
   
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
 
<?php include("include/scrip.php"); ?>

</body>
</html>
