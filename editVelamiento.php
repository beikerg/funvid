<?php
 date_default_timezone_set("America/Santiago");
                               
  include("include/rol.php");
    
                  
    ?>
 <!DOCTYPE html>
<html lang="es">  
<head>
   <title>FUNVID | Velamiento</title>
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
          Velamiento
          <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Lista Velamiento</a></li>  
        <li class="active">Velamiento</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        --------------------------><br>

  <form action="ajax/velamiento/updateVelamiento.php" method="POST">

    <?php 

      $id_resi = $_GET['id'];
      $id_v = $_GET['v'];
      if(empty($_GET['id'])){
        header("Location: reducado.php");
      }

      include("ajax/db_connection.php");

     

      $mostrar = "SELECT r.*, v.* FROM residentes r INNER JOIN velamiento v ON v.id_residente = r.id_residente WHERE v.id_residente = '$id_resi' AND v.id_v = '$id_v' ";

      $sql = $mysql->query($mostrar);

      if($result = mysqli_num_rows($sql) == 0){
        header("Location: LVelamiento.php");
      }else{
        while ($data = mysqli_fetch_array($sql)){
          #Residentes

          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $fecha = $data['fecha'];
          $telefono = $data['telefono'];
          
          //Velamiento
          $fecha_v = $data['fecha_v'];
          $familiar_v = $data['familiar_v'];
          $social_v = $data['social_v'];
          $laboral_v = $data['laboral_v'];
          $afectiva_v = $data['afectiva_v'];
          $academica_v = $data['academica_v'];
          $conyugal_v = $data['conyugal_v'];
          $obser_v = $data['obser_v'];
          

        }
      }


     ?>

    <input type="hidden" name="id_residente" value="<?php echo $id_resi; ?>">
    <input type="hidden" name="id_v" value="<?php echo $id_v; ?>">

    
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
                      <label for="fecha_v">Fecha de velamiento:</label><br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        
                        <input type="date" class="form-control pull-right" name="fecha_v"  value="<?php echo $fecha_v; ?>" >
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
              <li><a href="#obser" data-toggle="tab">Observaciones</a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="fami">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="familiar_v"  class="md-textarea form-control" rows="7"><?php echo $familiar_v; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab Familiar -->
              <div class="tab-pane" id="soci">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="social_v"  class="md-textarea form-control" rows="7"><?php echo $social_v; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-Social -->
              <div class="tab-pane" id="lab">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="laboral_v"  class="md-textarea form-control" rows="7"><?php echo $laboral_v; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-Laboral -->
              <div class="tab-pane" id="aca">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="academica_v"  class="md-textarea form-control" rows="7"><?php echo $academica_v; ?></textarea>
                    </div>
                  </div>
                </div> 
              </div>
              <!-- /.tab- Academica -->
              <div class="tab-pane" id="afe">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="afectiva_v" class="md-textarea form-control" rows="7"><?php echo $afectiva_v; ?></textarea>
                    </div>
                  </div>
                </div> 
              </div>
              <!-- /.tab-Afectiva -->
              <div class="tab-pane" id="conyu">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="conyugal_v"  class="md-textarea form-control" rows="7"><?php echo $conyugal_v; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-Conyugal -->
              <div class="tab-pane" id="obser">
                <div class="box box-solid">
                  <div class="box-body">
                    <div clas="form-group col-md-12">
                      <textarea type="text" name="obser_v"  class="md-textarea form-control" rows="7"><?php echo $obser_v; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /. tab-Observaciones -->
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
