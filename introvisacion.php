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
   <title>FUNVID | Introvisación</title>
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
        Introvisación
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Introvisación</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <br>                   
       
         <form action="ajax/introvisacion/addIntro.php" method="POST">   
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
                      <div class="form-group col-md-3">
                         <label>Nombre</label><br>
                          <input class="form-control" type="text" value="<?php echo $nombre; ?>" disabled>
                      </div>                      
                      <div class="form-group col-md-3">                          
                              <label>Apellido</label><br>
                              <input class="form-control" type="text"  value="<?php echo $apellido; ?>" disabled>
                      </div>                                        
                      <div class="form-group col-md-6">
                          <label>¿Quién evalua? </label><br>
                          <input class="form-control" type="text" name="nombre_intro" placeholder="¿Quién evaluó la introvisación?">
                      </div>                    
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      <div class="form-group col-md-4">
                          <label>Fecha:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo date("Y-m-d"); ?>" name="fecha_intro" class="form-control pull-right" >
                      </div>
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Etapa</label><br>
                          <select class="form-control" name="etapa_intro">
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
                      <label>Evaluación:</label><br>
                          <select class="form-control" name="evaluacion_intro">
                            <option>Seleccionar ...</option>
                            <option value="1">Buen Estado</option>
                            <option value="2">Ayuda preventiva</option>
                            <option value="3">Estado critico</option>
                          </select>
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
          <div class="box box-default  box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Introvisación</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <!-- // INICIO DEL BODY DEL BOX //-->
              
                
                 <div class="form-group">
                  <textarea class="form-control" rows="4" name="text_intro" placeholder="Escriba aquí la introvisación"></textarea>
                           
                      </div> <!--// FIN DEL FORN-INLINE//-->

              <!-- // FIN DEL BODY DEÑL BOX // -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
            
            <!-- // FIN DEL BOX  3// -->
                       
        </div>
           
     <!-- // INICIO BOX 3 // -->
            
                <div class="row">
        <div class="col-md-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Observaciones</h3>

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
                
                      <div class="form-group col-md-12">
                  <label>Observaciones del educador:</label>
                  <textarea class="form-control" rows="3" name="observ_edu_intro" placeholder="Observaciones de evaluación del educador ..."></textarea>
                </div>
                    
                     
              </div> <!--// FIN DEL FORN-INLINE//-->

              <!-- // FIN DEL BODY DEÑL BOX // -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
           
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
