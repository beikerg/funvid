<?php
 include("include/rol.php");

    require_once("ajax/db_connection.php");
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Caja General</title>
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
        Balance de Caja
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Caja</a></li>
        <li class="active">Caja General</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->



<div class="row"> 
  <?php
    include('ajax/db_connection.php');
    $calculo = "SELECT r.nombre, r.apellido, r.rut, c.* FROM caja c INNER JOIN residentes r ON c.id_residente = r.id_residente WHERE c.id_caja IN (SELECT MAX(c.id_caja) FROM caja c GROUP BY c.id_residente) ORDER BY c.id_caja DESC";

    $qc = $mysql->query($calculo);
    $positivo = 0;
    $negativo = 0;
    $total = 0;
    while($row = $qc->fetch_assoc()){
      if($row['saldo_caja'] < 0){
        $negativo += $row['saldo_caja'];
      }else{
        $positivo += $row['saldo_caja'];
      }
      $total += $row['saldo_caja'];
      
    }
    $mysql->close();
  ?>

  <div class="col-md-3">
    <h3 align='center' style='color: rgb(17,129,71);'>Saldo Positivo: <?php echo number_format($positivo, 0, ",","."); ?></h3>
  </div>
  <div class="col-md-3">
  <h3 align='center' style='color: red;'>Saldo Negativo: <?php echo number_format($negativo, 0, ",", "."); ?></h3>
  </div>
  <div class="col-md-3">
  <h3 align='center'>Saldo Total: <strong><?php echo number_format($total, 0, ",", "."); ?></strong></h3>
  </div>
<div class="pull-right col-md-3">
  <div class="pull-right">
  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Nuevo </button>
  </div>

    
</div>
</div>
<br>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header with-border">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Seleccione el Residente</h4>
      </div>
      <div class="modal-body">
        
        
          


     

      
   <!-- Archivo JS-->
  <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body table-responsive no-padding">
      <div class="row">
        <div class="col-xs-12">
        <table id="myTable" class="table table-bordered table-striped dt-responsive nowrap">
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
              $sql = "SELECT * FROM residentes";

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

                    <a href='caja.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
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
 
          
      <!-- Lista de Residentes con caja -->
    <div classs="container">    
     <div class="box box-solid">
     <div class="box-header with-border">
        <h3 class="box-title">Lista saldo residentes</h3>
      </div> 
      <div class="box-body table-responsive">
      <div class="row">
        <div class="col-xs-12">
        <table id="" class="display table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th>No.</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Saldo Actual</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT r.nombre, r.apellido, r.rut, c.* FROM caja c INNER JOIN residentes r ON c.id_residente = r.id_residente WHERE c.id_caja IN (SELECT MAX(c.id_caja) FROM caja c GROUP BY c.id_residente) ORDER BY c.id_caja DESC";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_caja']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>";
                  if($row['saldo_caja'] < 0){
                    echo "<td style='color: red;'>".number_format($row['saldo_caja'], 0, ",", ".")."</td>";
                  }else{
                    echo "<td>".number_format($row['saldo_caja'], 0, ",", ".")."</td>";
                  }
                  
                  
                  echo "<td align='center'>

                    <a class='btn btn-success' title='Gestionar' href='caja.php?id=".$row['id_residente']."'><i class='glyphicon glyphicon-pencil'></i> Gestionar</a>
                
                    
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
       window.location.href = "ajax/terapias/grupo-atras/eliminarGa.php?id=" + id;
                        
    }
   }
</script>
</body>
</html>
