<?php
 
  include("include/rol.php");

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <title>FUNVID | Planes de cobros</title>
  <?php include("include/head.php");  ?>
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
          Planes de cobros
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Planes de cobros</a></li>
        <li class="active">inicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
<div class="row">
  <div class="col-md-6">
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addNuevoPlan">Nuevo</button>
  </div>
  <!--<div align="right" class="col-md-6">
        <a class="btn btn-default btn-lg" target="_blank" href="genera_pdf/ListaTerapeutas.php"><i class="fa fa-file-pdf-o"></i> PDF</a> 
      </div>-->
</div>
         <br><br>         
            

            <!-- Lista de los planes agregadoos  -->

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
              include_once('ajax/db_connection.php');
              $sql = "SELECT * FROM plan ";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_plan']."</td>
                  <td>".$row['nombre_plan']."</td>
                  <td>".$row['descripcion_plan']."</td>
                  <td>".$row['precio']."</td>
                  
                  
                  <td align='center'>

                    <a href='#edit' title='Seleccionar' class='btn btn-success  btn-sm' data-toggle='modal'><span class=' glyphicon glyphicon-eye-open '></span> </a>
                    
                  </td>
                </tr>";
                
              }


            ?>
          </tbody>
        </table>


            <!-- ./ Fin lista de planes agregados -->
       

  


<!-- Modal -->
<div id="addNuevoPlan" tabindex="-1" class="modal fade" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Plan</h4>
      </div>
      <div class="modal-body">

        <form action="ajax/plan/addPlan.php" method="POST">

        <div class="form-group">
           <label for="nombre_plan" >Nombre:</label>
           <input type="text" class="form-control" name="nombre_plan" id="" placeholder="Nombre del Plan" >
         </div>
        <div class="form-group">
            <label for="descripcion_plan" >Descripciòn</label>
            <input type="text" class="form-control" name="descripcion_plan" id="" placeholder="Apellidos">
        </div> 
            
            <div class="row">
          <div class="form-group col-md-6">
            <lavel for="precio">Costo:</lavel>
            <input type="number" name="precio" id="" class="form-control" >
        </div>
      </div>
      

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" value="Registrar">
      </div>
    </div>
  </form>

  </div>
</div>


<!-- // .-- FIN DEL REGISTRO TERAPEUTAS //-->


<!-- // INICIO DE UPDATE DE TERAPEUTAS // -->



<!-- Modal -->
<div id="edit" tabindex="-1" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Plan</h4>
      </div>  
      <div class="modal-body">

        <div class="form-group">
           <label for="nombre_plan" >Nombre :</label>
           <input type="text" class="form-control" name="nombre_plan" id="" placeholder="Nombre del plan" >
         </div>
        <div class="form-group">
            <label for="descripcion_plan" >Apellidos:</label>
            <input type="text" class="form-control" id=""  name="descripcion_plan" placeholder="Descripción plan">
        </div> 

        <div class="row">
          <div class="form-group col-md-6">
            <label>Costo:</label>
            <input type="number" name="precio" class="form-control" >
          </div>
        </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" onclick="UpdateTerapeutasDetails()">Guardar Cambios</button>
        <input type="hidden" id="hidden_Terapeutas_id">
      </div>
    </div>

  </div>
</div>


<!-- // .-- FIN UPDATE TERAPEUTAS -->
    
 
            
            
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
<!-- Terapeutas -->
<script type="text/javascript" src="js/terapeutas.js"></script>     
</body>
</html>

