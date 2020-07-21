<?php
 include("include/rol.php");

    include("ajax/db_connection.php");
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Introvisaciones</title>
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
        Introvisaciones
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Introvisaciones</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

  <?php include('ajax/introvisacion/TableResi.php'); ?>




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
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Evaluación</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT r.nombre, r.apellido, i.* FROM residentes r INNER JOIN introvisacion i ON i.id_residente = r.id_residente  ORDER BY i.fecha_intro DESC";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_intro']."</td>
                  <td>".$row['nombre']." ".$row['apellido']."</td>
                  <td>".date('d-m-Y', strtotime($row['fecha_intro']))."</td>";
                if($row['estado_intro'] == '1'){
                  echo "<td><span class='label label-default'>Abrierto</span></td>";
                }else{
                  echo "<td><span class='label label-default'>Cerrado</span></td>";
                }

                if($row['evaluacion_intro'] == '1'){
                  echo "<td><span class='label label-success'>Buen estado</span></td>";
                }elseif($row['evaluacion_intro'] == '2'){
                  echo "<td><span class='label label-warning'>Ayuda preventiva</span></td>";
                }elseif($row['evaluacion_intro'] == '3'){
                  echo "<td><span class='label label-danger'>Estado Crítico</span></td>";
                }
                
                echo "  
                  
                  <td align='center'>
      
                    
                    <a title='Editar' href='editarIntro.php?id=".$row['id_intro']."' class='btn btn-warning'><i class='glyphicon glyphicon-pencil'></i></a>

                    <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$row['id_intro'].")'><i class='glyphicon glyphicon-trash'></i></a>                     
                    
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
        window.location.href = "ajax/introvisacion/eliminarIntro.php?id=" + id;
      }
  }
</script>

</body>
</html>
