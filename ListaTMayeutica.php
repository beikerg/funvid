<?php
 
include("include/rol.php");
 

    require_once("ajax/db_connection.php");
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Terapia Mayéutica</title>
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
        Lista Terapias Mayéutica
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Terapia Mayéutica</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    <div class="row">
    <div class="col-md-12 pull-right">
    <a href="terapiaMayeutica.php" class="btn btn-success"><i class="fa fa-plus"> </i> Nueva Terapia</a>
  </div>
</div>
<br>


<!-- Lista de terapia de relato de pase -->
<div classs="container">    
     <div class="box box-solid">
     <div class="box-header with-border">
        <h3 class="box-title">Listar Terapias</h3>
      </div> 
      <div class="box-body table-responsive">
      <div class="row">
        <div class="col-xs-12">
        <table id="" class="display table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th>ID</th>
            <th>Temática</th>
            <th>Lider</th>
            <th>fecha</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM mayeutica ORDER BY fecha_mayeutica DESC";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_mayeutica']."</td>
                  <td>".$row['tematica_mayeutica']."</td>
                  <td>".$row['lider_mayeutica']."</td>
                  <td>".date('d-m-Y', strtotime($row['fecha_mayeutica']))."</td>
                  
                  
                  <td align='center'>

                    <a class='btn btn-warning' title='Editar' href='editarTMayeutica.php?id=".$row['id_mayeutica']."'><i class='glyphicon glyphicon-pencil'></i></a>
                  
                  <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$row['id_mayeutica'].")'><i class='glyphicon glyphicon-trash'></i></a>
                  
                  <a href='genera_pdf/TPase.php?tera=".$row['id_mayeutica']."' target='_blank' class='btn btn-info'><i class='fa fa-file-pdf-o'></i> <strong>PDF <strong></a>  

                  </td>
                </tr>";
                
              }

              $mysql->close();
            ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
    </div>
<!-- ./ Fin de lista de terapia de repato de pase -->
        

           
        

    

            
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
<script type="text/javascript">
  function preguntar (id){
    if(confirm('¿Esta seguro que desa eliminar esta terapia?')){
      window.location.href = "ajax/terapias/mayeutica/eliminarTMayeutica.php?id=" + id;
        }
   }
</script>
</body>
</html>
