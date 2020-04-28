<?php
 include("include/rol.php");

    include("ajax/db_connection.php");

    if(!empty($_GET['id'])){
      $residente_id = $_GET['id'];
    }else{
      header("Location: residente.php");
    }

$resi_salida = $mysql->query("SELECT * FROM residentes WHERE id_residente = '$residente_id'");
  while($rSalida = mysqli_fetch_assoc($resi_salida)){
    $nombre = $rSalida['nombre'];
    $apellido = $rSalida['apellido'];
    $etapa_resi = $rSalida['etapa_resi'];
  }


    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Control de Salida</title>
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
        Control de Salida
        <small><strong>Residente:</strong> <?php echo ucwords(strtolower($nombre)); ?> <?php echo ucwords(strtolower($apellido)); ?> <strong>&nbsp;| &nbsp; Etapa actual: </strong>   <?php echo $etapa_resi; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Control Salida</a></li>
        <li class="active">Lista de salidas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
<section>

  <div class="pull-right">
    <div class="content-fluid">
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#NewTerapia"><i class="fa fa-plus"></i> Nueva</button>
  </div>
  </div>

</section>
<br>

<div id="NewTerapia" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title"><center>Nuevo pase de salida</center></h3>
      </div>
      <div class="modal-body">
        <form action="ajax/cSalida/addSalida.php" method="POST">
       <div class="container-fluid">
         <div class="form-group">
           <label>Fecha de salida:</label>
           <input type="date" class="form-control" name="fecha_salida" value="<?php echo date('Y-m-d'); ?>"/>
         </div>
         <div class="form-group">
           <label>Tramites:</label>
           <input type="text" class="form-control" name="tramite_salida"/>
         </div>
         <div class="form-group">
           <label>Observaciones: </label>
           <textarea class="form-control" row="3" name="obser_salida"></textarea>
         </div>
          <!-- Valores esenciales -->
          <input type="hidden" name="id_residente" value="<?php echo $residente_id; ?>">

       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success"> Añadir</button>

      </div>
    </form>
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
            <th style="width: 20px;">ID</th>
            <th style="width: 28px;">Fecha</th>
            <th style="width: 260px;">Tramite</th>
            <th>Observaciones</th>
            <th style="width: 40px;"><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM control_salida WHERE id_residente = '$residente_id'";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo
                "<tr>
                  <td>".$row['id_salida']."</td>
                  <td>".date('d-m-Y', strtotime($row['fecha_salida']))."</td>
                  <td>".$row['tramite_salida']."</td>
                  <td>".$row['obser_salida']."</td>


                  <td align='center'>


                    <a title='Editar' href='#' class='btn btn-warning' data-toggle='modal' data-target='#editarSalida_".$row['id_salida']."'><i class='glyphicon glyphicon-pencil'></i></a>

                    <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$row['id_salida'].",".$row['id_residente'].")'><i class='glyphicon glyphicon-trash'></i></a>



                  </td>
                </tr>";

                include("ajax/cSalida/update_modal.php");
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
  function preguntar (id,resi){
        console.log(id);
    if(confirm('¿Esta seguro que desa eliminar esta terapia?'))
      {
        console.log(id);
        window.location.href = "ajax/cSalida/deteleSalida.php?id=" + id + "&resi=" + resi;
      }
  }
</script>

</body>
</html>
