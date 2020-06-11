<?php
 
  include("include/rol.php");
  if(isset($_GET['id'])){ $id_residente = $_GET['id']; } 

  include("ajax/db_connection.php");

$query = $mysql->query("SELECT * FROM residentes WHERE id_residente = '$id_residente' ");

  while ($r = mysqli_fetch_assoc($query)){
      $id_etapa_resi = $r['id_etapa_resi'];
      $etapa_resi = $r['etapa_resi'];
      $nombre = $r['nombre'];
      $apellido = $r['apellido'];
     } 
    ?>
  

<!DOCTYPE html>
<html lang="es">
<head>
  <title>FUNVID | API</title>
  <?php include("include/head.php"); ?>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include("include/header.php");
          include("include/aside-admin.php");
     ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <strong>A P I</strong>
        <small><b>    Residente:</b> <?php echo ucwords(strtolower($nombre)); ?> <?php echo ucwords(strtolower($apellido)); ?> <b>|</b> <strong> Etapa actual: </strong> <?php echo ucwords(strtolower($etapa_resi)); ?> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> API</a></li>
        <li class="active"> Inicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">API</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <div class="content">
              <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked nab-tabs tabs-left">
                  <li class="active"><a href="#abstinencia" data-toggle="tab"><i class="fa fa-ban"></i> Abstinencias</a></li>
                  <li><a href="#abandono" data-toggle="tab"><i class="glyphicon glyphicon-exclamation-sign"></i>Ideación de Abandono</a></li>
                  <li><a href="#ante-r" data-toggle="tab"><i class="glyphicon glyphicon-folder-open"></i> Antecedentes Relv.</a></li>
                  <li><a href="#inter-clinica" data-toggle="tab"><i class="fa fa-heartbeat"></i> Interv. Clínica </a></li>
                  <li><a href="#dental" data-toggle="tab"><i class="fa fa-user-md"></i> Tratamiento Dental</a></li>
                  <li><a href="#doping" data-toggle="tab"><i class="fa fa-stethoscope"></i> Toma de Doping</a></li>
                </ul>
              </div>
              <div class="col-md-9">
                <div class="tab-content">
                  <div class="tab-pane active" id="abstinencia"> 
                    <!-- Abstinencia --> 
                    <?php include("ajax/API/tabs/abstinencia/ab.php"); ?>
                    <!-- ./ fin Abstinencia-->
                  </div>
                  <div class="tab-pane" id="abandono">
                  	<!-- Abstinencia --> 
                    <?php include("ajax/API/tabs/abandono/abandono.php"); ?>
                    <!-- ./ fin Abstinencia-->
                  </div>
                  <div class="tab-pane" id="ante-r">
                  	<!-- Abstinencia --> 
                    <?php include("ajax/API/tabs/antecedentes/antecedente.php"); ?>
                    <!-- ./ fin Abstinencia-->
                  </div>
                  <div class="tab-pane" id="inter-clinica">
                  	<!-- Abstinencia --> 
                    <?php include("ajax/API/tabs/clinica/clinica.php"); ?>
                    <!-- ./ fin Abstinencia-->
                  </div>
                  <div class="tab-pane" id="dental">
                  	<!-- Abstinencia --> 
                    <?php include("ajax/API/tabs/dental/dental.php"); ?>
                    <!-- ./ fin Abstinencia-->
                  </div>
                  <div class="tab-pane" id="doping">
                  	<!-- Abstinencia --> 
                    <?php include("ajax/API/tabs/doping/doping.php"); ?>
                    <!-- ./ fin Abstinencia-->
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
    </div>
  </div>
</div>

     



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
<script type="text/javascript" src="js/abstinencia.js"></script>
<script type="text/javascript" src="js/abandono.js"></script>
<script type="text/javascript" src="js/antecedente.js"></script>
<script type="text/javascript" src="js/clinica.js"></script>
<script type="text/javascript" src="js/dental.js"></script>
<script type="text/javascript" src="js/doping.js"></script>
</body>
</html>
