<?php
 
 include("include/rol.php");
 


include("ajax/db_connection.php");

    if(empty($_GET['id']))
    {
      header("Location: ListaTs.php");
     
    }
    $id_ts = $_GET['id']; 
    
 
    $q = "SELECT * FROM t_sensei WHERE id_ts = '$id_ts'";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaTs.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
         
          $id_ts = $data['id_ts'];
          $id_asistencia = $data['id_asistencia'];
          $terapeuta_ts = $data['terapeuta_ts'];
          $colider_ts = $data['colider_ts'];
          $fecha_ts = $data['fecha_ts'];
          $h_inicio_ts = $data['h_inicio_ts'];
          $h_fin_ts = $data['h_fin_ts'];
          $obj_ts = $data['obj_ts'];
          $observ_ts = $data['observ_ts'];
          $observ_colider_ts = $data['observ_colider_ts'];
          $actitud_ts = $data['actitud_ts'];
          $tematica_ts = $data['tematica_ts'];
        

        }
      }

 date_default_timezone_set("America/Santiago");

  
    
    
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Terapia Sensei </title>
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
        Terapia Sensei 
        <small></small>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Terapia Sensei</a></li>        
      </ol>

      
      <div class="form-group pull-right">
          <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#asistencia-modal" >Asistencia</button>
      </div>
      <br>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <br>                   


         <form action="ajax/terapias/sensei/editarTs.php" method="POST">   
         <?php include("ajax/terapias/sensei/tableTResidente.php"); ?>
          <!-- // INICIO BOX // -->
            <!-- Este input almacena el id del residente seleccionado -->
            <input type="hidden" name="id_ts" value="<?php echo $id_ts; ?>" >
        
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
                         <label>Terapeuta:</label><br>
                          <input class="form-control" type="text" name="terapeuta_ts"  placeholder="Nombre Completo" value="<?php echo $terapeuta_ts; ?>">
                      </div>    
                      <div class="form-group col-md-3">
                         <label>Cólider:</label><br>
                          <input class="form-control" type="text" name="colider_ts"  placeholder="Nombre Completo" value="<?php echo $colider_ts; ?>">
                      </div>                    
                      <div class="form-group col-md-6">                          
                              <label>Temática:</label><br>
                              <input class="form-control" type="text"  name="tematica_ts" placeholder="Nombre de la temática trabajada" value="<?php echo $tematica_ts; ?>">
                      </div>                                        
                                         
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      <div class="form-group col-md-4">
                          <label>Fecha:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <?php if($fecha_ts == '0000-00-00'){
                          echo '<input type="date" value="'.date("Y-m-d").'" name="fecha_ts" class="form-control pull-right">';
                        }else{
                          echo '<input type="date" value="'.$fecha_ts.'" name="fecha_ts" class="form-control pull-right">';
                        }
                        ?>
                        
                      </div>
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Hora inicio:</label><br>
                          <?php 
                          if($h_inicio_ts == '00:00:00'){
                            echo '<input class="form-control" type="time" name="h_inicio_ts" value="'.date("H:i").'">';
                          }else{
                            echo '<input class="form-control" type="time" name="h_inicio_ts" value="'.$h_inicio_ts.'">';
                          }
                          
                          ?>
                          
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Hora termino:</label><br>
                          <input class="form-control" type="time" name="h_fin_ts" value="<?php echo $h_fin_ts; ?>">
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
              <h3 class="box-title">Observaciones de terapia</h3>

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
                  <label>
                    Objetivos trabajados en la terapia
                  </label> 
                    <textarea class="form-control" rows="3" name="obj_ts" placeholder="Objetivos trabajados en la terapia"><?php echo $obj_ts; ?></textarea>
                         
                </div>            
              </div> <!--// FIN DEL FORN-INLINE//-->

              <div class="col-md-12"> 
                <div class="form-group">
                  <label>
                    Observaciones terapeuta
                  </label>
                    <textarea class="form-control" rows="3" name="observ_ts" placeholder="Observaciones del terapeuta"><?php echo $observ_ts; ?></textarea>
                          
                </div>            
              </div> <!--// FIN DEL FORN-INLINE//-->

              <div class="col-md-12"> 
                <div class="form-group">
                  <label>
                    Observaciones cólider
                  </label>
                    <textarea class="form-control" rows="3" name="observ_colider_ts" placeholder="Observaciones del cólider"><?php echo $obj_ts; ?></textarea>
                         
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
              <h3 class="box-title">Actitud asumida del grupo</h3>

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
                  
                  <textarea class="form-control" rows="3" name="actitud_ts" placeholder="Actitud asumida del grupo"><?php echo $actitud_ts; ?></textarea>
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
        <!-- /.col -->  
          <div class="form-group">
            <center><input type="submit" name="guardar" class="btn btn-primary btn-lg" value="Guardar Cambios" ></center>
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
