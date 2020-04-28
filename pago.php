<?php
 
 date_default_timezone_set("America/Santiago");
 
  include("include/rol.php");
    
    $id_r = $_GET['id'];

     if(isset($_GET["p"]) && $_GET["p"] != "error") {
    header("Location: pago.php?id=".$id_r);
  }
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

      <?php

          include("ajax/db_connection.php");

        if(empty($_GET['id'])){
          header("LisPagoU.php");

        }else{

          $query = $mysql->query("SELECT * FROM residentes WHERE id_residente = '$id_r' ");
          $result = mysqli_num_rows($query);

          if($result  > 0){

            while($data = mysqli_fetch_array($query)){

              $id_residente = $data['id_residente'];
              $nombre = $data['nombre'];
              $apellido = $data['apellido'];
              $rut = $data['rut'];
            }
          }else{
            header("LisPagoU.php");
          }
        }

       ?>

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

         <?php
      if(isset($_GET["p"])) {
        echo "<center><p class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Alerta!</strong> Debe rellanar los cambos.</p></center>";
      }
        ?>
       

        <form action="ajax/pago/addPago.php" method="POST">

        <input type="hidden" name="id_residente" value="<?php echo $id_residente; ?>">
       
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-header with-border">
      
        <div class="box-body">



        
        <div class="">
         <!-- Inicio datos pago -->
          <div class="col-md-6">           
            <div class="box box-solid">
              <div class="box-header with-border">
                <center><b><div class="box-title">Datos residente</div></b></center>
              </div>
              <div class="box-body">
                <div class="row">

                  <div class="form-group col-md-4">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" value="<?php echo $nombre; ?>" disabled>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Apellido:</label>
                    <input type="text" class="form-control" value="<?php echo $apellido; ?>" disabled>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Rut:</label>
                    <input type="text" class="form-control" value="<?php echo $rut; ?>" disabled>
                  </div>
                  

                </div>
              </div>
              <div class="box-header with-border">
                <center><b><div class="box-title">Datos del Pago</div></b></center>
              </div>
                <div class="box-body">
                   <div class="row">
                     <div class="form-group col-md-4">
                       <label>Nombre:</label>
                       <input type="text" class="form-control" name="nombre_pago" placeholder="Nombre">                        
                     </div>
                     <div class="form-group col-md-4">
                       <label>Apellido:</label>
                       <input type="text" class="form-control" name="apellido_pago" placeholder="Apellido">
                     </div>

                      
                  <div class="form-group col-md-4"> 
                    <label for="rut">Rut:</label><br>
                    <input type="text" name="rut_pago" id="rut" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask placeholder="RUT" >
                </div>
                  </div>
                                    
                </div>
              
                <div class="box-body">

                           
                    <div class="row"> 
                     <div class="form-group col-md-6">
                      <label>Monto:</label>
                      <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="number" class="form-control">
                        <span class="input-group-addon">.00</span>
                      </div> 
                       
                     </div>

                      <div class="form-group col-md-6">
                <label>Mes de pago</label>
                <select class="form-control" name="mes_pago">
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
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Metodo de pago:</label>
                    <select class="form-control" name="metodo_pago">
                      <option></option>
                      <option value="Efectivo">Efectivo</option>
                      <option value="Deposito">Deposito</option>
                      <option value="Transferencia">Transferencia</option>
                      
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    
                    
                      <label>Monto a pagar:</label>
                      <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="number" name="monto_pago" class="form-control">
                        
                      </div> 
                       
                     </div>
                     <!-- Almacena la fecha en que se ha generado el pago -->
                      <input type="date" name="fecha_pago" value="<?php echo date("Y-m-d"); ?>" hidden>
                  </div>
                </div>

              </div>
            </div>
          </div>



        <!-- ./ Datos pago -->

        <!-- Inicio Pagos anteriores -->
       <div class="clearfix visible-sm-block"></div>   
          <div class="row">
          <div class="col-md-6">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Listar Pagos Anteriores</h3>
                <div class="box-body">
                  
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
              include_once('ajax/db_connection.php');
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

                    <a href='#edit_".$row['id_residente']."' title='Seleccionar' class='btn btn-success  btn-sm' data-toggle='modal'><span class=' glyphicon glyphicon-eye-open '></span> </a>
                    
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
                  
                </div>
              </div>
           </div>
          </div>

         <!-- ./ Fin pagos anteriores -->
        </div>
      </div>
  
     <div class="col-md-6" align="center">
          <input type="submit" class="btn btn-success btn-lg" name="" value="Pagar">
        </div>
     
       </div></b>
      
      </div>

        
      
            

          </div>
          </div>        
        
      </div>
    </div>
 
  </form>  
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