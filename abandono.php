<?php  
  include("include/rol.php");
    ?>
 <!DOCTYPE html>
<html lang="es">  
<head>
   <title>FUNVID | Lista de abandono</title>
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
      Residentes - Abandono
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Residentes</a></li>
        <li class="active">Abandono</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    <div class="row">
      <div align="right" class="col-md-12">
        <a class="btn btn-default btn-lg" target="_blank" href="genera_pdf/ListaReducados.php"><i class="fa fa-file-pdf-o"></i> PDF</a> 
      </div>
   </div> 

    

        <br>
        


            <!-- /.box-header -->
            <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de Abandono</h3>
                </div>  
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
            <th>Rut</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th style="width: 40px;"><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php

            $data = "";
              include('ajax/db_connection.php');
              $query = "SELECT * FROM residentes WHERE etapa_resi = 'ABANDONO' ";


       
       if (!$result = $mysql->query($query)) {
        echo "Error".$mysql->error;
    }

          // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= '
            
            <tr>
                <th>'.$number.'</th>
                <th>'.$row['nombre'].'</th>
                <th>'.$row['apellido'].'</th>
                <th>'.$row['rut'].'</th>
                <th>'.$row['telefono'].'</th>
                <th>'.$row['correo'].'</th>
                <th>
                     

                    <a class="btn btn-warning" href="editarResidente.php?id='.$row['id_residente'].'"><i class="glyphicon glyphicon-pencil"></i> Editar</a>

                    <a href="genera_pdf/fichaResidente.php?id='.$row['id_residente'].'" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> <strong>PDF <strong></a>
           ';
                
            



            $data .= '
               </th>
            </tr>
            ';
            $number++;
        }
    }
    $data .= '</table>';

    echo $data;
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
            <!-- /.box-body -->
         
           <br>
            <br>
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
<script>
  function preguntar (id){
        console.log(id);
    if(confirm('¿Esta seguro que desa eliminar esta terapia?'))
      {
        console.log(id);
        window.location.href = "ajax/residentes/deleteResidentes.php?id=" + id;
      }
  }
</script>
</body>
</html>
