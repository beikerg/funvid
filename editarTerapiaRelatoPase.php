<?php
 
  include("include/rol.php");

include("ajax/db_connection.php");

    if(empty($_GET['id']))
    {
      header("Location: ListaTerapiaRelatoPase.php");
     
    }
    $id = $_GET['id'];

    $q = "SELECT r.id_residente, r.nombre, r.apellido, r.sexo, r.fecha, t.* FROM residentes r INNER JOIN tera_pase t ON t.id_residente = r.id_residente  WHERE id_t_pase = '$id' ";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaTerapiaRelatoPase.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];
          $nombre_lider = $data['nombre_lider'];
          $nombre_colider = $data['nombre_colider'];
          $nombre_director = $data['nombre_director'];
          $fecha_t = $data['fecha_t'];
          $h_inicio = $data['h_inicio'];
          $h_fin = $data['h_fin'];
          $experiencia_r = $data['experiencia_r'];
          $o_lider = $data['o_lider'];
          $o_colider = $data['o_colider'];
          $o_director = $data['o_director'];


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
   <title>FUNVID | Terapia de confrontación</title>
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
        Terapia Relato de Pase
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Terapia relato de pase</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <br>                   
       
         <form action="ajax/terapias/RelatoPase/editaRelatoPase.php" method="POST">   
          <!-- // INICIO BOX // -->
            <!-- Este input almacena el id del residente seleccionado -->
            <input type="hidden" name="id_residente" value="<?php echo $id_residente; ?>" >
            <!-- input almacena el id del terapia -->
            <input type="hidden" name="id_t_pase" value="<?php echo $id; ?>" >
                
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
                          <input class="form-control" type="text" name="nombre_lider"  value="<?php echo $nombre_lider; ?>">
                      </div>                      
                      <div class="form-group col-md-4">                          
                              <label>Nombre Colider:</label><br>
                              <input class="form-control" type="text"  name="nombre_colider" value="<?php echo $nombre_colider; ?>">
                      </div>                                        
                      <div class="form-group col-md-4">
                          <label>Nombre Director: </label><br>
                          <input class="form-control" type="text" name="nombre_director" value="<?php echo $nombre_director; ?>">
                      </div>                    
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      <div class="form-group col-md-4">
                          <label>Fecha:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo $fecha_t; ?>" name="fecha_t" class="form-control pull-right" >
                      </div>
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Hora inicio:</label><br>
                          <input class="form-control" type="time" name="h_inicio" value="<?php echo $h_inicio; ?>">
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Hora termino:</label><br>
                          <input class="form-control" type="time" name="h_fin" value="<?php echo $h_fin; ?>">
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
              <h3 class="box-title">Observaciones de Experiencia Residente</h3>

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
                  <label>Descripción de experiencias:</label>
                  <textarea class="form-control" rows="3" name="experiencia_r" placeholder="Observaciones ..."><?php echo $experiencia_r; ?></textarea>
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
                  <textarea class="form-control" rows="3" name="o_lider" placeholder="Observaciones ..."><?php echo $o_lider; ?></textarea>
                </div>
                    
                    <div class="form-group col-md-12">
                  <label>Observaciones Colider</label>
                  <textarea class="form-control" rows="3" name="o_colider" placeholder="Observaciones ..."><?php echo $o_colider; ?></textarea>
                </div>
                     
                    <div class="form-group col-md-12">
                  <label>Observaciones Director</label>
                  <textarea class="form-control" rows="3" name="o_director" placeholder="Observaciones ..."><?php echo $o_director; ?></textarea>
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
          <center><input type="submit" class="btn btn-primary btn-lg" value="Guardar Cambios" ></center>
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
