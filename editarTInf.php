<?php
 
 include("include/rol.php");
 


include("ajax/db_connection.php");

    if(empty($_GET['id']))
    {
      header("Location: ListaTInf.php");
     
    }
    $id_ti = $_GET['id']; 
    
 
    $q = "SELECT * FROM tera_inf WHERE id_ti = '$id_ti'";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaTInf.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
         
          $id_ti = $data['id_ti'];
          $director_ti = $data['director_ti'];
          $colider_ti = $data['colider_ti'];
          $fecha_ti = $data['fecha_ti'];
          $h_inicio_ti = $data['h_inicio_ti'];
          $h_fin_ti = $data['h_fin_ti'];
          $tematica_ti = $data['tematica_ti'];
          $obj_ti = $data['obj_ti'];
          $obser_ti = $data['obser_ti'];
        

        }
      }

 date_default_timezone_set("America/Santiago");

  
    
    
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Terapia espiritual o reflexiva</title>
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
        Editar Terapia espiritual o reflexiva
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Editar Terapia espiritual o reflexiva</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <br>                   
       
         <form action="ajax/terapias/informativa/editarInformativa.php" method="POST">   
          <!-- // INICIO BOX // -->
            <!-- Este input almacena el id del residente seleccionado -->
            <input type="hidden" name="id_ti" value="<?php echo $id_ti; ?>" >
           
                

           
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
                         <label>Director:</label><br>
                          <input class="form-control" type="text" name="director_ti"  placeholder="Nombre Completo" value="<?php echo $director_ti; ?>">
                      </div>    
                      <div class="form-group col-md-3">
                         <label>Cólider:</label><br>
                          <input class="form-control" type="text" name="colider_ti"  placeholder="Nombre Completo" value="<?php echo $colider_ti; ?>">
                      </div>                    
                      <div class="form-group col-md-6">                          
                              <label>Temática:</label><br>
                              <input class="form-control" type="text"  name="tematica_ti" placeholder="Nombre de la temática" value="<?php echo $tematica_ti; ?>">
                      </div>                                        
                                         
                      </div> <!-- / fin del row -->                     
                    <div class="row">                      
                      <div class="form-group col-md-4">
                          <label>Fecha:</label><br>
                          <div class="input-group date">
                            <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" value="<?php echo $fecha_ti; ?>" name="fecha_ti" class="form-control pull-right" >
                      </div>
                      <!-- /.input group -->
                    </div>                     
                      <div class="form-group col-md-4">
                          <label>Hora inicio:</label><br>
                          <input class="form-control" type="time" name="h_inicio_ti" value="<?php echo $h_inicio_ti; ?>">
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Hora termino:</label><br>
                          <input class="form-control" type="time" name="h_fin_ti" value="<?php echo $h_fin_ti; ?>">
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
                  
                  <textarea class="form-control" rows="3" name="obj_ti" placeholder="Observaciones ..."><?php echo $obj_ti; ?></textarea>
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
                  
                  <textarea class="form-control" rows="3" name="obser_ti" placeholder="Observaciones ..."><?php echo $obser_ti; ?></textarea>
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
