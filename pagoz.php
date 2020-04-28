<?php
 
 date_default_timezone_set("America/Santiago");
 
  include("include/rol.php");
    
    $id_r = $_GET['id'];

     if(isset($_GET["p"]) && $_GET["p"] != "error") {
    header("Location: pago.php?id=".$id_r);
  }
    ?>
<!DOCTYPE html>
<html>  
<head>
   <title>FUNVID | Pagos</title>
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
        Pagos y Abonos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Pagos y Abonos</a></li>
        <li class="active">inicio</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <?php

          require_once("ajax/db_connection.php");

        if(empty($_GET['id'])){
          header("LisPagoU.php");

        }else{

          $query = $mysql->query("SELECT * FROM residentes WHERE id_residente = '$id_r' ");
          $result = mysqli_num_rows($query);

          if($result  > 0){

            while($data = mysqli_fetch_array($query)){

              $id_residente = $data['id_residente'];
              $nombre = $data['nombre'];
              $apellido = $data['apellido'];
              $rut = $data['rut'];
            }
          }else{
            header("LisPagoU.php");
          }
        }

       ?>

       <?php
      if(isset($_GET["p"])) {
        echo "<center><p class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Alerta!</strong> Debe rellanar los cambos.</p></center>";
      }
        ?>



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
<script type="text/javascript" src="js/users.js"></script>
</body>
</html>