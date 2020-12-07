<?php
 
  include("include/rol.php");

include("ajax/db_connection.php");

    if(empty($_GET['id']))
    {
      header("Location: ListaIntro.php");
     
    }
    if(empty($_GET['view'])){
      $view = '0';
    }else{
      $view = $_GET['view'];
    }
    
    $id = $_GET['id'];

    $q = "SELECT r.nombre, r.apellido, i.* FROM residentes r INNER JOIN introvisacion i ON r.id_residente = i.id_residente WHERE i.id_intro = '$id' ";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaIntro.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
          $id_intro = $data['id_intro'];
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $etapa_intro = $data['etapa_intro'];
          $estado_intro = $data['estado_intro'];
          $fecha_intro = $data['fecha_intro'];
          $nombre_intro = $data['nombre_intro'];
          $evaluacion_intro = $data['evaluacion_intro'];
          $text_intro = $data['text_intro'];
          $observ_edu_intro = $data['observ_edu_intro'];
          $observ_tera_intro = $data['observ_tera_intro'];
          $observ_psico_intro = $data['observ_psico_intro'];
        }
      }

 date_default_timezone_set("America/Santiago");

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
       
         <form action="ajax/introvisacion/editaIntro.php" method="POST">   
          <!-- // INICIO BOX // -->
            <!-- input almacena el id del terapia -->
            <input type="hidden" name="id_intro" value="<?php echo $id_intro; ?>" >
            <input type="hidden" name="id_residente" value="<?php echo $id_residente; ?>" >   

      <div class="container">
        <div class="pull-right" <?php if($_SESSION['rol'] == 'Psicologo'){ echo 'style="display: block;"'; }elseif($_SESSION['rol'] == 'Admin'){ echo 'style="display: block;"';}elseif($_SESSION['rol'] == 'Terapeutas'){ echo 'style="display: block;"';}elseif($_SESSION['rol'] == 'Super_Administrador'){ echo 'style="display: block;"';}else{echo 'style="display: none;"';} ?>>
          <div class="form-gruop">
          <label>Estado de la introvisación:</label>
          <select name="estado_intro" class="form-control" <?php echo ($view == '1') ? "readonly" : ""; ?>>
            <option value="1" <?php echo ($estado_intro == '1') ? "selected" : ""; ?>>Abierto</option>
            <option value="2" <?php echo ($estado_intro == '2') ? "selected" : ""; ?>>Transferir</option>
            <option value="0" <?php echo ($estado_intro == '0') ? "selected" : ""; ?>>Cerrado</option>
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
                      <div class="form-group col-md-3">
                         <label>Nombre:</label><br>
                          <input class="form-control" type="text" name="nombre"  value="<?php echo $nombre; ?>" disabled>
                      </div>                      
                      <div class="form-group col-md-3">                          
                              <label>Apellido:</label><br>
                              <input class="form-control" type="text"  name="apellido" value="<?php echo $apellido; ?>" disabled>
                      </div>                                        
                      <div class="form-group col-md-6">
                          <label>¿Quién evalua?</label><br>
                          <input class="form-control" type="text" name="nombre_intro" value="<?php echo $nombre_intro; ?>" <?php if($_SESSION['rol'] == 'Terapeutas'){ echo 'readonly';}elseif($_SESSION['rol'] == 'Psicologo'){ echo 'readonly';}else{ echo '';} ?> <?php echo ($view == '1') ? "readonly" : ""; ?>>
                      </div>                    
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      <div class="form-group col-md-4">
                          <label>Fecha:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo $fecha_intro; ?>" name="fecha_intro" class="form-control pull-right" <?php if($_SESSION['rol'] == 'Terapeutas'){ echo 'readonly';}elseif($_SESSION['rol'] == 'Psicologo'){ echo 'readonly';}else{ echo '';} ?> <?php echo ($view == '1') ? "readonly" : ""; ?>>
                      </div>
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Etapa:</label><br>
                          <select class="form-control" name="etapa_intro" <?php if($_SESSION['rol'] == 'Terapeutas'){ echo 'readonly';}elseif($_SESSION['rol'] == 'Psicologo'){ echo 'readonly';}else{ echo '';} ?> <?php echo ($view == '1') ? "readonly" : ""; ?>>
                              <option value="<?php echo $etapa_intro; ?>"><?php echo strtr($etapa_intro, "-", " ");?></option>
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
                      
                      <div class="form-group col-md-4">
                          <label>Evaluación:</label><br>
                          <select class="form-control" name="evaluacion_intro" <?php if($_SESSION['rol'] == 'Terapeutas'){ echo 'readonly';}elseif($_SESSION['rol'] == 'Psicologo'){ echo 'readonly';}else{ echo '';} ?> <?php echo ($view == '1') ? "readonly" : ""; ?>>
                            <option value="1" <?php echo ($evaluacion_intro == '1') ? "selected" : ""; ?>>Buen Estado</option>
                            <option value="2" <?php echo ($evaluacion_intro == '2') ? "selected" : ""; ?>>Ayuda preventiva</option>
                            <option value="3" <?php echo ($evaluacion_intro == '3') ? "selected" : ""; ?>>Estado crítico</option>
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
              <div class="col-md-12">
                
                 <div class="form-group">
                  
                  <textarea class="form-control" rows="3" name="text_intro" placeholder="Escriba aquí la introvisación" <?php if($_SESSION['rol'] == 'Terapeutas'){ echo 'readonly';}elseif($_SESSION['rol'] == 'Psicologo'){ echo 'readonly';}else{ echo '';} ?> <?php echo ($view == '1') ? "readonly" : ""; ?>><?php echo $text_intro; ?></textarea>
                </div>            
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
                  <textarea class="form-control" rows="3" name="observ_edu_intro" placeholder="Observaciones de evaluación del educador ..." <?php if($_SESSION['rol'] == 'Terapeutas'){ echo 'readonly';}elseif($_SESSION['rol'] == 'Psicologo'){ echo 'readonly';}else{ echo '';} ?> <?php echo ($view == '1') ? "readonly" : ""; ?>><?php echo $observ_edu_intro; ?></textarea>
                </div>

                <div class="form-group col-md-12" <?php if($_SESSION['rol'] == 'Terapeutas'){ echo 'style="display: block;"'; }elseif($_SESSION['rol'] == 'Psicologo'){ echo 'style="display: block;"';}elseif($_SESSION['rol'] == 'Admin'){ echo 'style="display: block;"';}else{echo 'style="display: none;"';} ?>>
                  <label>Observaciones del Terapeuta:</label>
                  <textarea class="form-control" rows="3" name="observ_tera_intro" placeholder="Observaciones de evaluación del terapeuta ..." <?php if($_SESSION['rol'] == 'Terapeutas'){ echo '';}elseif($_SESSION['rol'] == 'Psicologo'){ echo 'readonly';}else{ echo '';} ?> <?php echo ($view == '1') ? "readonly" : ""; ?>><?php echo $observ_tera_intro; ?></textarea>
                </div>

                <div class="form-group col-md-12" <?php if($_SESSION['rol'] == 'Psicologo'){ echo 'style="display: block;"'; }elseif($_SESSION['rol'] == 'Admin'){ echo 'style="display: block;"';}else{echo 'style="display: none;"';} ?>>
                  <label>Observaciones del Psicologo:</label>
                  <textarea class="form-control" rows="3" name="observ_psico_intro" placeholder="Observaciones de evaluación del psicologo ..." <?php if($_SESSION['rol'] == 'Terapeutas'){ echo '';}elseif($_SESSION['rol'] == 'Psicologo'){ echo '';}else{ echo 'readonly';} ?> <?php echo ($view == '1') ? "readonly" : ""; ?>><?php echo $observ_psico_intro; ?></textarea>
                </div>
                                   
              </div> <!--// FIN DEL FORN-INLINE//-->

              <!-- // FIN DEL BODY DEÑL BOX // -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
        
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
