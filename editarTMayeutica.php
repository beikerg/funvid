<?php
 
  include("include/rol.php");

include("ajax/db_connection.php");

    if(empty($_GET['id']))
    {
      header("Location: ListaTNeuro.php");
     
    }
    $id_neuro = $_GET['id'];

    $q = "SELECT * FROM neuroplasticidad WHERE id_neuro = '$id_neuro' ";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaTNeuro.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
          $id_neuro = $data['id_neuro'];
          $lider_neuro = $data['lider_neuro'];
          $fecha_neuro = $data['fecha_neuro'];
          $h_inicio_neuro = $data['h_inicio_neuro'];
          $h_fin_neuro = $data['h_fin_neuro'];
          $tematica_neuro = $data['tematica_neuro'];
          $objetivosg_neuro = $data['objetivosg_neuro'];
          $objetivosp_neuro = $data['objetivosp_neuro'];
          $actitud_neuro = $data['actitud_neuro'];

        }
      }

 date_default_timezone_set("America/Santiago");

    $hoy = new DateTime();
  
    
    
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Terapia Neuroplasticidad</title>
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
        Terapia Neuroplasticidad
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Neuroplasticidad</a></li>
    
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        --------------------------> 

        <div class="form-group pull-right">
          <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#asistencia-modal" >Asistencia</button>
        </div>
         <br>                
       
         <form action="ajax/terapias/neuroplasticidad/editaTNeuro.php" method="POST">   

         <?php include("ajax/terapias/neuroplasticidad/tableTResidenteEdit.php"); ?>  
          <!-- // INICIO BOX // -->
            <!-- input almacena el id del terapia -->
            <input type="hidden" name="id_neuro" value="<?php echo $id_neuro; ?>" >
                
     
           
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
                          <input class="form-control" type="text" name="lider_neuro"  value="<?php echo $lider_neuro; ?>">
                      </div>                                                         
                      <div class="form-group col-md-8">
                          <label>Temática: </label><br>
                          <input class="form-control" type="text" name="tematica_neuro" value="<?php echo $tematica_neuro; ?>">
                      </div>                    
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      <div class="form-group col-md-4">
                          <label>Fecha:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo $fecha_neuro; ?>" name="fecha_neuro" class="form-control pull-right" >
                      </div>
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Hora inicio:</label><br>
                          <input class="form-control" type="time" name="h_inicio_neuro" value="<?php echo $h_inicio_neuro; ?>">
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Hora termino:</label><br>
                          <input class="form-control" type="time" name="h_fin_neuro" value="<?php echo $h_fin_neuro; ?>">
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
              <h3 class="box-title">Objetivos trabajados</h3>

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
                  <label>Objetivos generales:</label>
                  <textarea class="form-control" rows="3" name="objetivosg_neuro" placeholder="Objetivos generales que se trabajaron durante la terpaia ..."><?php echo $objetivosg_neuro; ?></textarea>
                </div> 

                <div class="form-group">
                  <label>Objetivos particulares:</label>
                  <textarea class="form-control" rows="3" name="objetivosp_neuro" placeholder="Objetivos particulares que se trabajaron durante la terpaia ..."><?php echo $objetivosp_neuro; ?></textarea>
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
              <h3 class="box-title">Actitud asumida</h3>

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
                  <label>Actitud asumida del grupo</label>
                  <textarea class="form-control" rows="3" name="actitud_neuro" placeholder="Actitud asumida por el grupo ..."><?php echo $actitud_neuro; ?></textarea>
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
          <center><button type="submit" class="btn btn-primary btn-lg" name="botones" value="Guardar" >Guardar Cambios</button></center>
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
