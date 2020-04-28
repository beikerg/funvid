<?php
 date_default_timezone_set("America/Santiago");
                               
  include("include/rol.php");
     if(isset($_GET["r"]) && $_GET["r"] != "actualizado") {
    header("Location: reducado.php");
  }  
                        
    ?>
 <!DOCTYPE html>
<html lang="es">  
<head>
   <title>FUNVID | Reducado Llamadas</title>
  <?php include("include/head.php"); ?>
  

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
  // Main Header -->
  include("include/header.php");
  // Left side column. contains the logo and sidebar -->
  include("include/aside-admin.php");
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reducados Llamadas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Reducado</a></li>  
        <li class="active">Llamada</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        --------------------------><br>
        <?php
      if(isset($_GET["r"])) {
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> La llamada se ha actualizado con éxito.</p></center>";
        ?>
        <script type="text/javascript"> 
          setTimeout(function(){
              location.href ="reducado.php";           
          }, 1000);     
        
      </script> 
      <?php
      }
  ?>

  <form action="ajax/reducado/editarLlamada.php" method="POST">

    <?php 

      $id_llamada = $_GET['id'];
      
      if(empty($_GET['id'])){
        header("Location: reducado.php");
      }

      include("ajax/db_connection.php");

     

      $mostrar = "SELECT l.*, r.* from llamada_reducado l INNER JOIN residentes r ON l.id_residente = r.id_residente where l.id_llamada = '$id_llamada'";

      $sql = $mysql->query($mostrar);

      if($result = mysqli_num_rows($sql) == 0){
        header("Location: reducado.php");
      }else{
        while ($data = mysqli_fetch_array($sql)){
          #Residentes

          $id_llamada = $data['id_llamada'];
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $fecha = $data['fecha'];
          $telefono = $data['telefono'];
          $fehca_l = $data['fecha_l'];
          $familiar = $data['familiar'];
          $social = $data['social'];
          $laboral = $data['laboral'];
          $academica = $data['academica'];
          $afectiva = $data['afectiva'];
          $conyugal = $data['conyugal'];


        }
      }


     ?>

    <input type="hidden" name="id_residente" value="<?php echo $id_residente; ?>">
    <input type="hidden" name="id_llamada" value="<?php echo $id_llamada; ?>"> 

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header width-border">
              <h2 class="box-title">Residente</h2>
            </div>

              <div class="box-body">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label >Nombre:</label><br>
                    <input type="text" class="form-control" value="<?php echo $nombre; ?>" disabled>
                  </div>
                  <div class="form-group col-md-3">
                    <label >Apellido:</label><br>
                    <input type="text"class="form-control" value="<?php echo $apellido; ?>" disabled>
                  </div>
                  <div class="form-group col-md-1">
                    <label>Edad:</label><br>
                    <input type ="text" value="<?php $cumpleanos = new DateTime($fecha);
                                                $hoy = new DateTime();
                                                $annos = $hoy->diff($cumpleanos);
                                                $edad= $annos->y;   
                                                echo  $edad; ?>" 
                      class="form-control" disabled>
                  </div>
                  <div class="form-group col-md-3">
                      <label for="llamada">Fecha de llamada:</label><br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        
                        <input type="date" class="form-control pull-right" name="llamada"  value="<?php echo date("Y-m-d"); ?>" >
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-2">
                      <label>Telefono:</label><br>
                      <input type="text" class="form-control" value="<?php echo $telefono; ?>" disabled>
                    </div>
                </div>
              </div>

          </div>
        </div>
      </div>
   
   <div class="row">
        <div class="col-md-12 ">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#fami" data-toggle="tab">Familiar</a></li>
              <li><a href="#soci" data-toggle="tab">Social</a></li>
              <li><a href="#lab" data-toggle="tab">Laboral - Económica</a></li>
              <li><a href="#aca" data-toggle="tab">Académica</a></li>
              <li><a href="#afe" data-toggle="tab">Afectiva</a></li>
              <li><a href="#conyu" data-toggle="tab">Conyugal</a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="fami">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="familiar"  class="md-textarea form-control" rows="7"><?php echo $familiar; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab Familiar -->
              <div class="tab-pane" id="soci">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="social"  class="md-textarea form-control" rows="7"><?php echo $social; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-Social -->
              <div class="tab-pane" id="lab">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="laboral"  class="md-textarea form-control" rows="7"><?php echo $laboral; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-Laboral -->
              <div class="tab-pane" id="aca">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="academica"  class="md-textarea form-control" rows="7"><?php echo $academica; ?></textarea>
                    </div>
                  </div>
                </div> 
              </div>
              <!-- /.tab- Academica -->
              <div class="tab-pane" id="afe">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="afectiva" class="md-textarea form-control" rows="7"><?php echo $afectiva; ?></textarea>
                    </div>
                  </div>
                </div> 
              </div>
              <!-- /.tab-Afectiva -->
              <div class="tab-pane" id="conyu">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="conyugal"  class="md-textarea form-control" rows="7"><?php echo $conyugal; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-Conyugal -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

        <center><input type="submit" class="btn btn-success btn-lg" value="Guardar Cambios" ></center>
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
<!-- Usuarios -->

</body>
</html>
