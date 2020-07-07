<?php
 include("include/rol.php");

    include("ajax/db_connection.php");
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Terapia Sensei (Deportiva)</title>
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
        Terapias Sensei (Deportivas)
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Terapia Sensei</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
<br>
  <div class="pull-right">
    <a href="ajax/terapias/sensei/newTs.php" class="btn btn-success"><i class="fa fa-plus"> </i> Nueva Terapia</a>
  </div>




<div class="row">
  <div class="col-md-12"><br>
    <div class="box box-solid">
      <div class="box-header with-border">
                
  <div class="box-body">             
  <?php include("ajax/terapias/sensei/tableTs.php"); ?>
  </div>
    </div>
           </div>
          </div>

         <!-- ./ Fin pagos anteriores -->
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
<script>
  function preguntar (id){
        console.log(id);
    if(confirm('¿Esta seguro que desa eliminar esta terapia?'))
      {
        console.log(id);
        window.location.href = "ajax/terapias/sensei/deleteTs.php?id=" + id;
      }
  }
</script>

</body>
</html>
