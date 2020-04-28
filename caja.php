<?php
 include("include/rol.php");

    include("ajax/db_connection.php");

    if(!empty($_GET['id'])){
      $residente_id = $_GET['id']; 
    }else{
      header("Location: residente.php");
    }

$resi_caja = $mysql->query("SELECT * FROM residentes WHERE id_residente = '$residente_id'");
  while($rCja = mysqli_fetch_assoc($resi_caja)){
    $nombre = $rCja['nombre'];
    $apellido = $rCja['apellido'];
  }


  
    ?>


<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Caja</title>
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
        Caja
        <small><strong>Residente:</strong> <?php echo ucwords(strtolower($nombre)); ?> <?php echo ucwords(strtolower($apellido)); ?> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Lista de Terapia Informativa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

  <div class="">
    <center><a href="#" data-toggle="modal" data-target="#abono" class="btn btn-success" ><i class="fa fa-plus"> </i> &nbsp;Abono</a>
    <a href="#" data-toggle="modal" data-target="#gasto" class="btn btn-warning" ><i class="fa  fa-minus"> </i> &nbsp;Cargo</a>
    </center>

  </div>

<div class="modal fade" id="abono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h3 class="modal-title" id="myModalLabel">Abono</h3></center>
            </div>
            <form action="ajax/caja/addAbono.php" method="POST">
            <div class="modal-body">
                    
              <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">

        <div class="form-group col-md-6">
          <label>Tipo de transacción:</label>
          <select class="form-control" name="tipo_caja">
            <option></option>
            <option value="efectivo">Efectivo</option>
            <option value="deposito">Deposito</option>
            <option value="transferencia">Transferencia</option>
          </select>
        </div>

        <div class="form-group col-md-6">
          <label for="">Fecha:</label>
          <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
            <input type="date" name="fecha_caja" class="form-control pull-right" value="<?php echo date('Y-m-d'); ?>" >
          </div>
          

          
        </div>

        <div class="form-group col-md-12">
          <label for="">Cantidad:</label>
          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="abono_caja" class="form-control">
            <span class="input-group-addon">.00</span>
          </div>
        </div>
        <div class="form-group col-md-12">
          <label for="">Descripción:</label>
          <textarea class="form-control" name="descrip_caja"></textarea>
        </div>
      </div>
      </div>
      </div>
      </div>  
                 <input type="hidden" name="id_residente" value="<?php echo $residente_id; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Guardar</button>
            </div>
          </form>
        </div>
    </div>
</div>

<div class="modal fade" id="gasto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h3 class="modal-title" id="myModalLabel">Cargo o Gasto</h3></center>
            </div>
            <form action="ajax/caja/addCargo.php" method="POST">
            <div class="modal-body">
                    
              <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
      
     <div class="form-group col-md-12">
      <label for="">Fecha:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="date" class="form-control pull-right" name="fecha_caja" value="<?php echo date('Y-m-d'); ?>" >
      </div>
    </div>
    <div class="form-group col-md-12">
          <label for="">Cantidad:</label>
          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="cargo_caja" class="form-control">
            <span class="input-group-addon">.00</span>
          </div>
        </div>

      <div class="form-group col-md-12">
        <label for="">Descripción:</label>
        <textarea class="form-control" name="descrip_caja"></textarea>
      </div>
    
      </div>
      </div>
      </div>
      </div>  
      <input type="hidden" name="id_residente" value="<?php echo $residente_id; ?>">
      <input type="hidden" name="tipo_caja" value="Gasto">

                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Pagar</button>
            </div>
          </form>
        </div>
    </div>
</div>    

<br>
      
      <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="myTable" class=" table table-bordered table-striped">
          <thead>
            
            <th style="display: 15%">Fecha</th>
            <th style="display: 5%">Descripción</th>
            <th style="display: 5%">Cargos $</th>
            <th style="display: 5%">Abonos $</th>
            <th style="display: 5%">Saldo $</th>
            <th style="display: 5px"><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM caja WHERE id_residente = '$residente_id' ORDER BY id_caja DESC ";
              $ta = "";
              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              $cargo = 0;
              $abono = 0;
              while($row = $query->fetch_assoc()){
                  $abono += $row['abono_caja'];
                  $cargo += $row['cargo_caja'];
                $ta .= 
                "<tr>
                  <td align='center'>".date('d-m-Y', strtotime($row['fecha_caja']))."</td>
                  <td>".$row['descrip_caja']."</td>
                  <td align='right'>".number_format($row['cargo_caja'], 0, ",", ".")."</td>
                  <td align='right'>".number_format($row['abono_caja'], 0, ",", ".")."</td>
                  <td align='right'>".number_format($row['saldo_caja'], 0, ",", ".")."</td>
                  
                  
                  <td align='center'>";

                  if($_SESSION['rol'] == 'Admin' || $_SESSION['rol'] == 'Administracion'){
                    $ta .= "<a href='#' onclick='preguntar(".$row['id_caja'].','.$row['id_residente'].")' title='Eliminar' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> </a>";
                  }
                    

                   $ta .= " <a href='' title='Seleccionar' class='btn btn-success btn-sm' data-toggle='modal' data-target='#ver_".$row['id_caja']."'><span class='glyphicon glyphicon-eye-open'></span> </a>
                    
                  </td></tr>";
                include("ajax/caja/ver_modal.php");
              }

  $ta .= "<tfoot>
            <tr>
              <td align='right' colspan='2'><strong>Subtotales $ </strong></td>
              <td align='right'><b> ".number_format($cargo, 0, ",", ".")." </b></td>
              <td align='right'><b> ".number_format($abono, 0, ",", ".")." </b></td>
              <td><b></b></td>
              <td></td>
            </tr>
          </tfoot>";
              echo $ta; 
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
<script>
  function preguntar (id,r){
        console.log(id);
    if(confirm('¿Esta seguro que desa eliminarlo?'))
      {
        console.log(id);
        window.location.href = "ajax/caja/deleteCaja.php?id=" + id + "&r=" + r;
      }
  }
</script>

</body>
</html>
