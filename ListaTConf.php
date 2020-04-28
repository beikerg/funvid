<?php
 include("include/rol.php");

    require_once("ajax/db_connection.php");
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
        Lista Terapia de confrontación
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Lista de Terapia de confrontación</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

<div class="row">   
<div class="col-md-12 pull-right">
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Nueva Terapia</button>
</div>
</div>
<br>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Seleccione el Residente</h4>
      </div>
      <div class="modal-body">
        
        
          


     

      
   <!-- Archivo JS-->
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

                    <a href='terapiaconfrontacion.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
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

  


          </div>
            
        </div>
        </div>
      </div>
     
 
    
       
            

      
           
          
      <!-- Lista de Terapias de confrontación -->
    <div classs="container">    
     <div class="box box-solid">
     <div class="box-header with-border">
        <h3 class="box-title">Listar Terapias</h3>
      </div> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="" class="display table table-bordered table-striped">
          <thead>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Director</th>
            <th>fecha</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT t.id_t_conf, r.id_residente,r.nombre, r.apellido, r.rut, t.director_tc , t.fecha_tc FROM residentes r INNER JOIN tera_confronta t ON t.id_residente = r.id_residente ORDER BY t.id_t_conf DESC";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_t_conf']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['director_tc']."</td>
                  <td>".date('d-m-Y', strtotime($row['fecha_tc']))."</td>
                  
                  
                  <td align='center'>

                    <a class='btn btn-warning' title='Editar' href='EditarTerapiaConfrontacion.php?id=".$row['id_residente']."&tera=".$row['id_t_conf']."'><i class='glyphicon glyphicon-pencil'></i></a>
                  
                  <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$row['id_t_conf'].")'><i class='glyphicon glyphicon-trash'></i></a>

                  <a href='genera_pdf/TConfronta.php?id=".$row['id_residente']."&tera=".$row['id_t_conf']."' target='_blank' class='btn btn-info'><i class='fa fa-file-pdf-o'></i> <strong>PDF <strong></a>
                    
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

      <!-- ./ Fin de lista de terapias de confrontación --> 
        

           
        

    

            
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
       window.location.href = "ajax/terapias/confrontacion/eliminarConfrontacion.php?id=" + id;
                        
    }
   }
</script>
</body>
</html>
