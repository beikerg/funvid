<?php
 
 include("include/rol.php");
 


include("ajax/db_connection.php");

    if(empty($_GET['id']) || empty($_GET['teraG']))
    {
      header("Location: ListaTGrupal.php");
     
    }
    $id_residente = $_GET['id'];
    $id_tg = $_GET['teraG'];

    $q = "SELECT r.id_residente, r.nombre, r.apellido, r.fecha, r.sexo, t.* FROM residentes r INNER JOIN tera_grupal t ON r.id_residente = t.id_residente WHERE r.id_residente = '$id_residente' AND t.id_tg = '$id_tg'  ";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaTGrupal.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];
        # Data terapia Grupal
          $id_tg = $data['id_tg'];
          $lider_tg = $data['lider_tg'];
          $colider_tg = $data['colider_tg'];
          $director_tg = $data['director_tg'];
          $h_inicio_tg = $data['h_inicio_tg'];
          $h_fin_tg = $data['h_fin_tg'];
          $fecha_tg = $data['fecha_tg'];
          $o_lider_tg = $data['o_lider_tg'];
          $o_colider_tg = $data['o_colider_tg'];
          $o_director_tg = $data['o_director_tg'];
          $expo_tg = $data['expo_tg'];
          $actitud_tg = $data['actitud_tg'];

        }
      }

 date_default_timezone_set("America/Santiago");

   $cumpleanos = new DateTime($fecha);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
    $edad= $annos->y;
  
    
    
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Terapia Grupal</title>
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
        Editar Terapia Grupal
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Editar Terapia Grupal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <br>                   
       
         <form action="ajax/terapias/grupal/editarGrupal.php" method="POST">   
          <!-- // INICIO BOX // -->
            <!-- Este input almacena el id del residente seleccionado -->
            <input type="hidden" name="id_residente" value="<?php echo $id_residente; ?>" >
            <input type="hidden" name="id_tg" value="<?php echo $id_tg; ?>">
                
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default  box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de Residente</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <!-- // INICIO DEL BODY DEL BOX //-->
              <div class="containe">
                  <div class="row">
                      <div class="form-group col-md-3">
                         <label>Nombre:</label>
                          <input class="form-control" type="text" value="<?php echo $nombre; ?>" disabled>
                      </div>
                      
                      <div class="form-group col-md-3">
                          
                              <label>Apellido</label>
                              <input class="form-control" type="text" value="<?php echo $apellido; ?>" disabled>
                          
                      </div>
                      
                      <div class="form-group col-md-3">
                          <label>Edad:</label>
                          <input class="form-control" type="text" value="<?php echo $edad; ?>" disabled>
                      </div>
                      
                      <div class="form-group col-md-3">
                          <label>Sexo:</label>
                          <input class="form-control" type="text" value="<?php echo $sexo; ?>" disabled>
                      </div>
                      
                </div>      

                  
              </div> 
              <!-- // FIN DEL BODY DEÑL BOX // -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
            
            <!-- // FIN DEL BOX // -->            
        </div>
           
                  <!-- // INICIO BOX 2 // -->
            
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de Terapia</h3>

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
                         <label>Nombre Lider:</label><br>
                          <input class="form-control" type="text" name="lider_tg"  placeholder="Nombre Lider" value="<?php echo $lider_tg; ?>">
                      </div>                      
                      <div class="form-group col-md-4">                          
                              <label>Nombre Colider:</label><br>
                              <input class="form-control" type="text"  name="colider_tg" placeholder="Nombre Colider" value="<?php echo $colider_tg; ?>">
                      </div>                                        
                      <div class="form-group col-md-4">
                          <label>Nombre Director: </label><br>
                          <input class="form-control" type="text" name="director_tg" placeholder="Nombre Director" value="<?php echo $director_tg; ?>">
                      </div>                    
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      <div class="form-group col-md-4">
                          <label>Fecha:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo $fecha_tg; ?>" name="fecha_tg" class="form-control pull-right" >
                      </div>
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Hora inicio:</label><br>
                          <input class="form-control" type="time" name="h_inicio_tg" value="<?php echo $h_inicio_tg; ?>">
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Hora termino:</label><br>
                          <input class="form-control" type="time" name="h_fin_tg" value="<?php echo $h_fin_tg; ?>">
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
              <h3 class="box-title">Exponiencia o problematica</h3>

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
                  
                  <textarea class="form-control" rows="3" name="expo_tg" placeholder="Observaciones ..."><?php echo $expo_tg; ?></textarea>
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



    <!-- Actitud asumida -->
  
                    <div class="row">
        <div class="col-md-12">
          <div class="box box-default  box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Actitud Asumida</h3>

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
                  
                  <textarea class="form-control" rows="3" name="actitud_tg" placeholder="Observaciones ..."><?php echo $actitud_tg; ?></textarea>
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

    <!-- ./ Fin de actitud asumida -->
            
                <div class="row">
        <div class="col-md-12">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Observaciones Terapia</h3>

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
                  <label>Observaciones Lider</label>
                  <textarea class="form-control" rows="3" name="o_lider_tg" placeholder="Observaciones ..."><?php echo $o_lider_tg; ?></textarea>
                </div>
                    
                    <div class="form-group col-md-12">
                  <label>Observaciones Colider</label>
                  <textarea class="form-control" rows="3" name="o_colider_tg" placeholder="Observaciones ..."><?php echo $o_colider_tg; ?></textarea>
                </div>
                     
                    <div class="form-group col-md-12">
                  <label>Observaciones Director</label>
                  <textarea class="form-control" rows="3" name="o_director_tg" placeholder="Observaciones ..."><?php echo $o_director_tg; ?></textarea>
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
          <center><input type="submit" class="btn btn-primary btn-lg" value="Guardar Cambos" ></center>
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
