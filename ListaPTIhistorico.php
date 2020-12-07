<?php
 include("include/rol.php");

    include("ajax/db_connection.php");

    $id_residente = $_GET['id'];

    include('ajax/db_connection.php');
    $sql_resi = "SELECT nombre, apellido FROM residentes WHERE id_residente = '$id_residente'";

    //use for MySQLi-OOP
    $resi_query = $mysql->query($sql_resi);
    while($as = $resi_query->fetch_assoc()){
      $nombre = $as['nombre'];
      $apellido = $as['apellido']; 
    }
    $mysql->close();
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | PTI</title>
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
        Plan de tratamiento individual - Activos 
        <small><b> Residente: <?php echo $nombre. "  ".$apellido; ?>
       </b> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Plan de tratamiento individual</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <?php include('ajax/PTI/historicoResi.php'); ?>
  <?php include('ajax/PTI/TableResi.php'); ?>




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
         
        <table id="introvisacion" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha Inic.</th>
            <th>Fecha Term.</th>
            <th>Estado</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT r.nombre, r.apellido, i.* FROM residentes r INNER JOIN pti i ON i.id_residente = r.id_residente WHERE i.id_residente = '$id_residente' ORDER BY i.id_pti DESC";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_pti']."</td>
                  <td>".$row['nombre']." ".$row['apellido']."</td>
                  <td>".date('d-m-Y', strtotime($row['periodo_inicio_pti']))."</td>
                  <td>".date('d-m-Y', strtotime($row['periodo_fin_pti']))."</td>";
                if($row['status_pti'] == '1'){
                  echo "<td><span class='label label-success'>Abrierto</span></td>";
                }elseif($row['status_pti'] == '0'){
                  echo "<td><span class='label label-default'>Cerrado</span></td>";
                }

                                
                echo "  
                  
                  <td align='center'>
      
                    
                    <a title='Editar' href='editarPTI.php?id=".$row['id_pti']."' class='btn btn-warning'><i class='glyphicon glyphicon-pencil'></i></a>
                
                    <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$row['id_pti'].")'><i class='glyphicon glyphicon-trash'></i></a>                     
                    
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
    if(confirm('¿Esta seguro que desa eliminar este registro?'))
      {
        console.log(id);
        window.location.href = "ajax/PTI/eliminarPTI.php?id=" + id;
      }
  }
</script>

</body>
</html>
