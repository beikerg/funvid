<?php
 
  include("include/rol.php");

include("ajax/db_connection.php");

    if(empty($_GET['id']))
    {
      header("Location: ListaPTI.php");
     
    }
    if(empty($_GET['view'])){
      $view = '0';
    }else{
      $view = $_GET['view'];
    }
    
    $id = $_GET['id'];

    $q = "SELECT r.nombre, r.apellido, i.* FROM residentes r INNER JOIN pti i ON r.id_residente = i.id_residente WHERE i.id_pti = '$id' ";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaPTI.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
          $id_pti = $data['id_pti'];
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $etapa_pti = $data['etapa_pti'];
          $status_pti= $data['status_pti'];
          $fecha_pti = $data['fecha_pti'];
          $periodo_inicio_pti = $data['periodo_inicio_pti'];
          $periodo_fin_pti = $data['periodo_fin_pti'];
          $objetivos_1 = $data['objetivos_1'];
          $estrategias_1 = $data['estrategias_1'];
          $indicadores_1 = $data['indicadores_1'];
          $evaluacion_1 = $data['evaluacion_1'];
          $objetivos_2 = $data['objetivos_2'];
          $estrategias_2 = $data['estrategias_2'];
          $indicadores_2 = $data['indicadores_2'];
          $evaluacion_2 = $data['evaluacion_2'];
          $objetivos_3 = $data['objetivos_3'];
          $estrategias_3 = $data['estrategias_3'];
          $indicadores_3 = $data['indicadores_3'];
          $evaluacion_3 = $data['evaluacion_3'];
          $objetivos_4 = $data['objetivos_4'];
          $estrategias_4 = $data['estrategias_4'];
          $indicadores_4 = $data['indicadores_4'];
          $evaluacion_4 = $data['evaluacion_4'];
          $objetivos_5 = $data['objetivos_5'];
          $estrategias_5 = $data['estrategias_5'];
          $indicadores_5 = $data['indicadores_5'];
          $evaluacion_5 = $data['evaluacion_5'];
          $objetivos_6 = $data['objetivos_6'];
          $estrategias_6 = $data['estrategias_6'];
          $indicadores_6 = $data['indicadores_6'];
          $evaluacion_6 = $data['evaluacion_6'];
          $objetivos_7 = $data['objetivos_7'];
          $estrategias_7 = $data['estrategias_7'];
          $indicadores_7 = $data['indicadores_7'];
          $evaluacion_7 = $data['evaluacion_7'];

        }
      }

 date_default_timezone_set("America/Santiago");

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
       
        <form action="ajax/PTI/editarPTI.php" method="POST">   
          <!-- // INICIO BOX // -->
            <!-- Este input almacena el id del residente seleccionado -->

            <input type="hidden" name="id_pti" value="<?php echo $id_pti; ?>" >
            <input type="hidden" name="id_residente" value="<?php echo $id_residente; ?>" >   

            <div class="container">
        <div class="pull-right">
          <div class="form-gruop">
          <label>Estado de la introvisación:</label>
          <select name="status_pti" class="form-control">
            <option value="1" <?php echo ($status_pti == '1') ? "selected" : ""; ?>>Abierto</option>
            <option value="0" <?php echo ($status_pti == '0') ? "selected" : ""; ?>>Cerrado</option>
          </select>
          <br>
          </div>
        </div>
        </div>
      
           
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
                        <input type="date" value="<?php echo $fecha_pti; ?>" name="fecha_pti" class="form-control pull-right" >
                      </div>             
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Etapa</label><br>
                          <select class="form-control" name="etapa_pti">
                              <option>Seleccionar ...</option>
                              <option value="INTEGRACION" <?php echo ($etapa_pti == 'INTEGRACION') ? "selected" : ""; ?>>INTEGRACIÓN</option>
                              <option value="CONFIANZA" <?php echo ($etapa_pti == 'CONFIANZA') ? "selected" : ""; ?>>CONFIANZA</option>
                              <option value="INICIATIVA" <?php echo ($etapa_pti == 'INICIATIVA') ? "selected" : ""; ?>>INICIATIVA</option>
                              <option value="IDENTIDAD" <?php echo ($etapa_pti == 'IDENTIDAD') ? "selected" : ""; ?>>IDENTIDAD</option>
                              <option value="TRASCENDENCIA" <?php echo ($etapa_pti == 'TRASCENDENCIA') ? "selected" : ""; ?>>TRASCENDENCIA</option>
                              <option value="EDUCADOR-1" <?php echo ($etapa_pti == 'EDUCADOR-1') ? "selected" : ""; ?>>EDUCADOR 1</option>
                              <option value="EDUCADOR-2" <?php echo ($etapa_pti == 'EDUCADOR-2') ? "selected" : ""; ?>>EDUCADOR 2</option>
                              <option value="EDUCADOR-3" <?php echo ($etapa_pti == 'EDUCADOR-3') ? "selected" : ""; ?>>EDUCADOR 3</option>
                              <option value="EDUCADOR-4" <?php echo ($etapa_pti == 'EDUCADOR-4') ? "selected" : ""; ?>>EDUDADOR 4</option>
                              <option value="REDUCADO" <?php echo ($etapa_pti == 'REDUCADO') ? "selected" : ""; ?>>REDUCADO</option>
                          </select>
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Periodo de vigencia:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo $periodo_inicio_pti; ?>" name="periodo_inicio_pti" class="form-control pull-right" >
                      </div>
                      </div>
                      <div class="form-group col-md-4">
                          <label>Hasta:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        
                        <input type="date" value="<?php echo $periodo_fin_pti ?>" name="periodo_fin_pti" class="form-control pull-right" >
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
                  <textarea class="form-control" rows="3" name="objetivos_1" placeholder="Objetivos terapeuticos ..." ><?php echo $objetivos_1; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_1" placeholder="Estrategias ..."><?php echo $estrategias_1; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_1" placeholder="Indicadores de logros ..."><?php echo $indicadores_1; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_1" placeholder="Evaluación ..."><?php echo $evaluacion_1; ?></textarea>
                  </div>
              
              </div>
                                    
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_2" placeholder="Objetivos terapeuticos ..."><?php echo $objetivos_2; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_2" placeholder="Estrategias ..."><?php echo $estrategias_2; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_2" placeholder="Indicadores de logros ..."><?php echo $indicadores_2; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_2" placeholder="Evaluación ..."><?php echo $evaluacion_2 ?></textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_3" placeholder="Objetivos terapeuticos ..."><?php echo $objetivos_3; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_3" placeholder="Estrategias ..."><?php echo $estrategias_3; ?> </textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_3" placeholder="Indicadores de logros ..."><?php echo $indicadores_3; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_3" placeholder="Evaluación ..."><?php echo $evaluacion_3; ?></textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_4" placeholder="Objetivos terapeuticos ..."><?php echo $objetivos_4; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_4" placeholder="Estrategias ..."><?php echo $estrategias_4; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_4" placeholder="Indicadores de logros ..."><?php echo $indicadores_4; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_4" placeholder="Evaluación ..."> <?php echo $evaluacion_4; ?> </textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_5">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_5" placeholder="Objetivos terapueticos ..."> <?php echo $objetivos_5; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_5" placeholder="Estrategias ..."> <?php echo $estrategias_5; ?> </textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_5" placeholder="Indicadores de logros ..."> <?php echo $indicadores_5; ?> </textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_5" placeholder="Evaluación ..."><?php echo $evaluacion_5; ?> </textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_6">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_6" placeholder="Objetivos terapeuticos ..."><?php echo $objetivos_6; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_6" placeholder="Estrategias ..."><?php echo $estrategias_6; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_6" placeholder="Indicadores de logros ..."> <?php echo $indicadores_6; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_6" placeholder="Evaluación ..."><?php echo $evaluacion_6; ?></textarea>
                  </div>
              
              </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_7">
                
              <div class="container">
                  <div class="col-md-12">
                  <label>Objetivos terapeuticos:</label>
                  <textarea class="form-control" rows="3" name="objetivos_7" placeholder="Objetivos terapeuticos ..."> <?php echo $objetivos_7; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias_7" placeholder="Estrategias ..."><?php echo $estrategias_7; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Indicadores de logros:</label>
                  <textarea class="form-control" rows="3" name="indicadores_7" placeholder="Indicadores de logros ..."><?php echo $indicadores_7; ?></textarea>
                  </div>

                  <div class="col-md-12">
                  <label>Evaluación</label>
                  <textarea class="form-control" rows="4" name="evaluacion_7" placeholder="Evaluación ..."><?php echo $evaluacion_7; ?></textarea>
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
        
        
          <?php
            if(!$view == '1'){
              echo  '<div class="form-group">
              <center><input type="submit" class="btn btn-primary btn-lg" value="Guardar Cambios" ></center>
            </div>';
            }
          ?>
        

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
