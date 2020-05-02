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
   <title>FUNVID | Historico Ayudas</title>
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
        Historico de ayudas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ayudas</a></li>
        <li>Ayudas Activas</li>
        <li class="active">Historico ayudas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    





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
              $sql = "SELECT r.id_residente, r.nombre, r.apellido, a.*, if(a.fecha_fin_ayuda >= '$fHoy', 'Activo', 'Finalizado') AS estado FROM residentes r INNER JOIN ayuda a ON r.id_residente = a.id_residente WHERE a.fecha_fin_ayuda < '$fHoy'";

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
                  
                    
                  <td align='center'>";
      
                  if($_SESSION['rol'] == 'Admin'){
                    echo "<a title='Editar' href='#' class='btn btn-warning' data-toggle='modal' data-target='#ayuda_resi_".$row['id_ayuda']."'><i class='glyphicon glyphicon-pencil'></i></a>";
                  }
                  
                    
                   echo " <a title='Editar' href='#' class='btn btn-success' data-toggle='modal' data-target='#ver_ayuda_".$row['id_ayuda']."'><i class='glyphicon glyphicon-eye-open'></i></a>

                    

                    
                    
                  </td>
                </tr>";
                
  include("ajax/ayudas/edit_modal.php");               
  include("ajax/ayudas/ver_modal.php");   
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
