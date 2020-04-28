<?php
 
  include("include/rol.php");
    
    ?>
 <!DOCTYPE html>
<html lang="es">  
<head>
   <title>FUNVID | Lista de últimos pagos</title>
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
        Lista de pagos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Pagos y Abonos</a></li>
        <li class="active">inicio</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
<div class="row">
  <div class=" pull-right col-md-3 ">
    <div class="pull-right">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newPago"><i class="fa fa-plus"></i> Nuevo Pago</button><br>
    </div>
  </div>


<div id="newPago" class="modal" tabindex="-1" role="dialog">
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
                  
                  
                  <td align='center'>

                    <a href='pago.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
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

</div><br>

     <div classs="container"> 
     <div class="box"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="" class="display table table-bordered table-striped">
          <thead>
            <th>ID</th>
            <th>Nombres</th>
            <th>rut</th>
            <th>fecha de pago</th>
            <th>Monto</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT r.id_residente, r.nombre, r.apellido, r.rut, p.* FROM residente_pago p INNER JOIN residentes r ON r.id_residente = p.id_residente ";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_pago']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['fecha_pago']."</td>
                  <td>".$row['monto_pago']."</td>
                  
                  <td align='center' style='width: 180px'>

                    <a href='editarPago.php?id=".$row['id_residente']."&pago=".$row['id_pago']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Editar</a>
                    <a href='#delete_".$row['id_pago']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Eliminar</a>
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
