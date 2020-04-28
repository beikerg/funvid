<?php
 
  include("include/rol.php");
    
    ?>
 <!DOCTYPE html>
<html lang="es">  
<head>
   <title>FUNVID | Lista de llamadas</title>
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
        Reducados
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Reducados</a></li>
        
        <li class="active">inicio</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
<!-- Boton Nueva Consulta Psicologia -->
<div class="row">
  <div class=" pull-right col-md-3 col-offset-9">
    <div class="pull-right">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newConsulta"><i class="fa fa-plus"></i> Nueva Llamada</button><br>
    </div>
  </div>
</div><br>
<!-- ./ Boton Nueva Consulta -->


<!-- Buscar Residente para consulta -->
<div id="newConsulta" tabindex="-1" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar reducado</h4>
      </div>
      <div class="modal-body">
        <!-- Contenido del modal -->      
         

              
<!-- Datatable buscar Reducados  -->
<div class="row">
          <div class="col-md-12">
            <div class="box box-solid">
              
                <div class="box-body">
                  
                  <div classs="container"> 
     <div class="box box-solid"> 
      <div class="box-body table-responsive no-padding">
     <!--  <div class="row"> -->
        <div class="col-xs-12">
         
        <table id="" class="display table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Teléfono</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php

            $data = "";
              include('ajax/db_connection.php');
             
             $query = "SELECT * FROM residentes WHERE id_etapa_resi = '10' ";


       
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
                <th>'.$row['id_residente'].'</th>
                <th>'.$row['nombre'].'</th>
                <th>'.$row['apellido'].'</th>
                <th>'.$row['rut'].'</th>
                <th>'.$row['telefono'].'</th>
                <th> <center>
                     

                    <center><a href="reducadoLlamada.php?id='.$row['id_residente'].'"class="btn btn-primary"><i class="glyphicon glyphicon-check"></i></a></center> </center> ';
                }



            $data .= '
               </th>
            </tr>
            ';
            $number++;
        }
    
    else
    {
        // records now found 
        $data .= '<tr><td colspan="6"><center><h4>¡Aún no hay ningún registro!<h4></center></td></tr>';
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

<!-- ./ Datatable buscar reducados -->
 
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       <input type="submit" class="btn btn-primary" value="Registrar">
      </div>
    </div>
  </div>
</div>

<!-- ./ fin busqueda Residente -->


            
              
              <!-- Datatable reducados -->
<div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de llamadas</h3>
                </div>  
                <div class="box-body">
                  
                  <div classs="container"> 
     <div class="box box-solid"> 
      <div class="box-body table-responsive no-padding">
     <!--  <div class="row"> -->
        <div class="col-xs-12">
         
        <table id="reducadosTable" class="table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Ultima llamada</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php

            $data = "";
              include('ajax/db_connection.php');
             
             $query = "SELECT l.*, r.nombre, r.apellido, r.telefono, r.id_residente FROM llamada_reducado l INNER JOIN residentes r ON l.id_residente = r.id_residente WHERE  l.fecha_l NOT LIKE '' ORDER By l.id_llamada DESC";


       
       if (!$result = $mysql->query($query)) {
        echo "Error".$mysql->error;

        $mysql->close();
    }

          // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= '
            
            <tr>
                <th>'.$row['id_llamada'].'</th>
                <th>'.$row['nombre'].'</th>
                <th>'.$row['apellido'].'</th>
                <th>'.$row['telefono'].'</th>
                <th>'.date('d-m-Y', strtotime($row['fecha_l'])).'</th>
                <th><center>
                     

                    <a href="editarReducadoLlamada.php?id='.$row['id_llamada'].'" title="Editar" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>

                       <a class="btn btn-danger" title="Eliminar" href="#" onclick="preguntar('.$row['id_llamada'].')"><i class="glyphicon glyphicon-trash"></i></a> </center> ';
                }



            $data .= '
               </th>
            </tr>
            ';
            $number++;
        }
    
    else
    {
        // records now found 
        $data .= '<tr><td colspan="6">No hay ningun registro.</td></tr>';
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
              <!-- ./ Datatable reducados -->
 



<script type="text/javascript">
    function preguntar (id, con){
      if(confirm('¿Esta seguro que desa eliminar esta terapia?')){
        window.location.href = "ajax/reducado/eliminarLlamada.php?id=" + id+ "&con=" + con;

      }
   }
</script>


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
