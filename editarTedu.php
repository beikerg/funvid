<?php
 
  include("include/rol.php");

include("ajax/db_connection.php");

    if(empty($_GET['id']))
    {
      header("Location: ListaTedu.php");
     
    }
    $id = $_GET['id'];

    $q = "SELECT * FROM t_educativa WHERE id_tedu = '$id' ";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaTedu.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
          $id_tedu = $data['id_tedu'];
          $lider_tedu = $data['lider_tedu'];
          $colider_tedu = $data['colider_tedu'];
          $fecha_tedu = $data['fecha_tedu'];
          $h_inicio_tedu = $data['h_inicio_tedu'];
          $h_fin_tedu = $data['h_fin_tedu'];
          $tematica_tedu = $data['tematica_tedu'];
          $objetivo_tedu = $data['objetivo_tedu'];
          $observ_tedu = $data['observ_tedu'];
          $actitud_tedu = $data['actitud_tedu'];

        }
      }

 date_default_timezone_set("America/Santiago");

    $hoy = new DateTime();
  
    
    
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Terapia Educativa</title>
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
        Terapia Educativa
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Educativa</a></li>
    
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
       
         <form action="ajax/terapias/t-edu/editaTedu.php" method="POST">   

         <?php include("ajax/terapias/t-edu/tableTResidenteEdit.php"); ?>  
          <!-- // INICIO BOX // -->
            <!-- input almacena el id del terapia -->
            <input type="hidden" name="id_tedu" value="<?php echo $id_tedu; ?>" >
                
     
           
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
                      <div class="form-group col-md-3">
                         <label>Nombre Lider:</label><br>
                          <input class="form-control" type="text" name="lider_tedu"  value="<?php echo $lider_tedu; ?>">
                      </div>                      
                      <div class="form-group col-md-3">                          
                              <label>Nombre Colider:</label><br>
                              <input class="form-control" type="text"  name="colider_tedu" value="<?php echo $colider_tedu; ?>">
                      </div>                                        
                      <div class="form-group col-md-6">
                          <label>Temática: </label><br>
                          <input class="form-control" type="text" name="tematica_tedu" value="<?php echo $tematica_tedu; ?>">
                      </div>                    
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      <div class="form-group col-md-4">
                          <label>Fecha:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo $fecha_tedu; ?>" name="fecha_tedu" class="form-control pull-right" >
                      </div>
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Hora inicio:</label><br>
                          <input class="form-control" type="time" name="h_inicio_tedu" value="<?php echo $h_inicio_tedu; ?>">
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Hora termino:</label><br>
                          <input class="form-control" type="time" name="h_fin_tedu" value="<?php echo $h_fin_tedu; ?>">
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
                  <label>Descripción de objetivos:</label>
                  <textarea class="form-control" rows="3" name="objetivo_tedu" placeholder="Objetivos que se trabajaron durante la terpaia ..."><?php echo $objetivo_tedu; ?></textarea>
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
                  <label>Observaciones de trabajo</label>
                  <textarea class="form-control" rows="3" name="observ_tedu" placeholder="Observaciones generales de la terapia ..."><?php echo $observ_tedu; ?></textarea>
                </div>
                    
                    <div class="form-group col-md-12">
                  <label>Actitud asumida del grupo</label>
                  <textarea class="form-control" rows="3" name="actitud_tedu" placeholder="Actitud asumida por el grupo ..."><?php echo $actitud_tedu; ?></textarea>
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
