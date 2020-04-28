<?php
 include("include/rol.php");

    include("ajax/db_connection.php");
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Terapias Anteriores</title>
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
        Lista Terapia Grupal
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Lista de Terapia Grupal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

  <div class="pull-right">
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#NewTerapia"><i class="fa fa-plus"></i> Nueva Terapia</button>
  </div>


<div id="NewTerapia" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title">Seleccionar residente</h3>
      </div>
      <div class="modal-body">
       <!-- Inicio de la Tabla buscar residente  -->
    <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="myTable" class=" table table-bordered table-striped">
          <thead>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Etapa</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM residentes ";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_residente']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['etapa_resi']."</td>
                  
                  
                  <td align='center'>

                    <a href='terapiaGrupal.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    

                  </td>
                </tr>";
                
              }


            ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
    </div>

       <!-- ./ Fin tabla para buscar Residentes -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12"><br>
    <div class="box box-solid">
      <div class="box-header with-border">
                
  <div class="box-body">             
    <div classs="container"> 
     <div class="box box-solid"> 
      <div class="box-body table-responsive no-padding">
     <!--  <div class="row"> -->
        <div class="col-xs-12">
         
        <table id="" class="display table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Director</th>
            <th>Fecha</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT r.id_residente, r.nombre, r.apellido, r.rut, t.director_tg, t.fecha_tg, t.id_residente, t.id_tg FROM tera_grupal t INNER JOIN residentes r ON r.id_residente = t.id_residente";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_tg']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['director_tg']."</td>
                  <td>".date('d-m-Y', strtotime($row['fecha_tg']))."</td>
                  
                  
                  <td align='center'>
      
                    
                    <a title='Editar' href='editarTGrupal.php?id=".$row['id_residente']."&teraG=".$row['id_tg']."' class='btn btn-warning'><i class='glyphicon glyphicon-pencil'></i></a>

                    <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$row['id_tg'].")'><i class='glyphicon glyphicon-trash'></i></a> 

                     <a href='genera_pdf/TGrupal.php?id=".$row['id_residente']."&tera=".$row['id_tg']."' class='btn btn-info'><i class='fa fa-file-pdf-o'></i> <strong>PDF <strong></a>
                    
                  </td>
                </tr>";
                
              }


            ?>
          </tbody>
        </table>
      </div>
      <!--</div> -->
    </div>
    </div>
    </div>
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
        window.location.href = "ajax/terapias/grupal/deleteGrupal.php?id=" + id;
      }
  }
</script>

</body>
</html>
