<?php
 include("include/rol.php");

date_default_timezone_set("America/Santiago");
    include("ajax/db_connection.php");

$resi_caja = $mysql->query("SELECT * FROM residentes");
  while($rCja = mysqli_fetch_assoc($resi_caja)){
    $nombre = $rCja['nombre'];
    $apellido = $rCja['apellido'];
  }


  if(!empty($_GET['id'])){
      $residente_id = $_GET['id']; 
    }else{
      //header("Location: residente.php");
    }


    ?>


<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Ayudas</title>
  <?php  include("include/head.php"); ?>
  <style type="text/css">
    /* The customcheck */
.customcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.customcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #02cf32;
    border-radius: 5px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.customcheck .checkmark:after {
    left: 9px;
    top: 6px;
    width: 7px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
  </style>
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
        Ayudas Activas
        <small></small>
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
    <div class="containet">
    <div class="inline">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ayuda_resi"><i class="fa fa-plus"></i> Nuevo</button>
      <a href="historial_ayudas.php" class="btn btn-warning"><i class="fa  fa-folder-open"></i> Historial</a>
    </div>
      <div class="pull-right">
        <a class="btn btn-default btn-lg" target="_blank" href="genera_pdf/ayudasPDF.php"><i class="fa fa-file-pdf-o"></i> PDF</a> 
      </div> 
    </div>

    <!-- Modal -->
<div class="modal fade" id="ayuda_resi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h3 class="modal-title" id="exampleModalLabel"> Nueva Ayuda</h3><center>
      </div>
      <div class="modal-body">
        <form action="ajax/ayudas/addAyuda.php" method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="form-group col-md-5">
            <label>Nombre: </label>
            <input type="text" class="form-control" name="nombre_residente" id="nombre_residente" readonly="readonly">
          </div>
          <div class="form-group col-md-5">
            <label>Apellido: </label>
            <input type="text" class="form-control" name="apellido_residente" id="apellido_residente" readonly="readonly">
          </div>
          <div class="form-group col-md-2">
            <br>
            <button type="button" title="Buscar" class="btn btn-success" data-toggle="modal" data-target="#busca"><i class="glyphicon glyphicon-search"></i></button>
          </div>
           <!-- Date range -->
              <div class="form-group col-md-6">
                <label>Fecha Inicio:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="fecha_inicio_ayuda" class="form-control" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <!-- Date range -->
              <div class="form-group col-md-6">
                <label>Fecha Termino:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="fecha_fin_ayuda" class="form-control" >
                </div>
                <!-- /.input group -->
              </div>
          <div class="form-group col-md-10">
             <center> 
              <div class="form-group col-md-12">
              <label>Seleccione las ayudas:</label>
              </div>
            <div class="form-check col-md-4">
              <label>
                <input type="checkbox" name="ayuda[]" value="Llamada" class="flat-red">
                    Llamada
              </label>
            </div>
            <div class="form-check col-md-4">
              <label>
                <input type="checkbox" name="ayuda[]" value="Visitar" class="flat-red">
                    Visitar
              </label>
            </div>
            <div class="form-check col-md-4">
              <label>
                <input type="checkbox" name="ayuda[]" value="Sin pase" class="flat-red">
                    Sin pase
              </label>
            </div>
           
          </center>
          </div>
          <div class="form-group col-md-12">
            <label>Observaciones:</label>
            <textarea name="obser_ayuda" class="form-control"></textarea>
          </div>
          </div>
        </div>
        <!-- Inputs necesarios -->
          <input type="hidden" name="id_residente" id="id_residente">
          
        <!-- ./ -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Añadir</button>
      </div>
    </form>
    </div>
  </div>
</div>

<?php include("ajax/ayudas/ayuda_modal.php"); ?> 

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
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de termino</th>
            <th>Ayudas</th>
            <th>Status</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
            $fHoy = date('Y-m-d');
              include('ajax/db_connection.php');
              $sql = "SELECT r.id_residente, r.nombre, r.apellido, a.*, if(a.fecha_fin_ayuda >= '$fHoy', 'Activo', 'Finalizado') AS estado FROM residentes r INNER JOIN ayuda a ON r.id_residente = a.id_residente WHERE a.fecha_fin_ayuda >= '$fHoy'";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                $ayudas = explode(", ", $row['ayuda']);
                echo 
                "<tr>
                  <td>".$row['id_ayuda']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".date('d-m-Y', strtotime($row['fecha_inicio_ayuda']))."</td>
                  <td>".date('d-m-Y', strtotime($row['fecha_fin_ayuda']))."</td>
                  
                  <td>";
                  if($row ['ayuda'] != ''){
                   for ($i = 0; $i < count($ayudas); $i++) {
                        echo " • <strong>".$ayudas[$i]."</strong><br>";
                    } 
                  }else{
                    echo "";
                  }
                   
                  echo "</td>
                  <td>".$row['estado']."</td>
                  
                    
                  <td align='center'>
      
                    
                    <a title='Editar' href='#' class='btn btn-warning' data-toggle='modal' data-target='#ayuda_resi_".$row['id_ayuda']."'><i class='glyphicon glyphicon-pencil'></i></a>

                    <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$row['id_ayuda'].")'><i class='glyphicon glyphicon-trash'></i></a> 

                    
                    
                  </td>
                </tr>";
                
  include("ajax/ayudas/edit_modal.php");   
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
  function preguntar (id,r){
        console.log(id);
    if(confirm('¿Esta seguro que desa eliminarlo?'))
      {
        console.log(id);
        window.location.href = "ajax/caja/deleteCaja.php?id=" + id;
      }
  }



    

</script>



</body>
</html>
