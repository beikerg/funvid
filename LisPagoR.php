<?php
 
  include("include/rol.php");
    
    ?>
 <!DOCTYPE html>
<html lang="es">  
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

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-header with-border">
      
        <div class="box-body">



        
        <div class="row">
         <!-- Inicio datos pago -->
          <div class="col-md-6">           
            <div class="box box-warning">
              <div class="box-header with-border">
                <div class="box-title">Datos del Pago</div>
                <div class="box-body">
                   <div class="row">
                     <div class="form-group col-md-4">
                       <label>Nombre:</label>
                       <input type="text" class="form-control" name="" placeholder="Nombre">                        
                     </div>
                     <div class="form-group col-md-4">
                       <label>Apellido:</label>
                       <input type="text" class="form-control" name="" placeholder="Apellido">
                     </div>

                      
                    <div class="form-group col-md-4">
                      <label>Rut:</label>
                      <input type="text" class="form-control" name="" placeholder="Rut">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label>Dirección:</label>
                      <input type="text" class="form-control" name="" placeholder="Direccion">
                    </div>
                  </div>
                   
                </div>
              </div>
            </div>
          </div>
        <!-- ./ Datos pago -->

        <!-- Inicio Pagos anteriores -->
          
          
          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Listar Pagos Anteriores</h3>
                <div class="box-body">
                  <table class="table table-bordered">

                  </table>
                </div>
              </div>
           </div>
          </div>

         <!-- ./ Fin pagos anteriores -->
        </div>

    

        <div class="row">
          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header with-border">
                <div class="box-title">Concepto de pago</div>
                <div class="box-body">
                   <div class="row">
                     <div class="form-group col-md-12">
                       <label>Descripción:</label>
                       <input type="text" class="form-control" name="" placeholder="Concepto de pago">                        
                     </div>
                    </div>
                    <div class="row"> 
                     <div class="form-group col-md-6">
                       <label>Monto:</label>
                       <input type="text" class="form-control" name="" placeholder="$pesos">
                     </div>

                      <div class="form-group col-md-6">
                <label>Mes de pago</label>
                <select class="form-control">
                  <option></option>
                  <option value="Enero">Enero</option>
                  <option value="Febrero">Febrero</option>
                  <option value="Marzo">Marzo</option>
                  <option value="Abril">Abril</option>
                  <option value="Mayo">Mayo</option>
                  <option value="Junio">Junio</option>
                  <option value="Julio">Julio</option>
                  <option value="Agosto">Agosto</option>
                  <option value="Septiembre">Septiembre</option>
                  <option value="Octubre">Octubre</option>
                  <option value="Noviembre">Noviembre</option>
                  <option value="Diciembre">Diciembre</option>
                </select>
              </div>
                    
                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6" align="center">
          <input type="submit" class="btn btn-success btn-lg" name="" value="Pagar">
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
<!-- Usuarios -->
<script type="text/javascript" src="js/users.js"></script>
</body>
</html>
