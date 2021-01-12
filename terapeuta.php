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
  <title>FUNVID | Terapeutas</title>
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
        Terapeutas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Terapeutas</a></li>
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
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#add_nuevo_Terapeutas_modal">Registrar Nuevo</button>
  </div>
  <div align="right" class="col-md-6">
        <a class="btn btn-default btn-lg" target="_blank" href="genera_pdf/ListaTerapeutas.php"><i class="fa fa-file-pdf-o"></i> PDF</a> 
      </div>
</div>
         <br><br>         
            
       
       
            <!-- /.box-header -->
            <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de Psicologos</h3>
                </div>  
                <div class="box-body">
                  
                  <div classs="container"> 
     <div class="box box-solid"> 
      <div class="box-body table-responsive no-padding">
     <!--  <div class="row"> -->
        <div class="col-xs-12">
         
        <table id="" class="display table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th style="width: 5%">No.</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Fecha</th>
            <th ><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php

            $data = "";
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM terapeutas";


    
       
       if (!$result = $mysql->query($sql)) {
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
                <th>'.$row['fecha'].'</th>
                <th><center>
                     

                    <button onclick="GetTerapeutasDetails('.$row['id'].')" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button>
          <button onclick="DeleteTerapeutas('.$row['id'].')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button> ';



            $data .= '
               </th>
            </tr>
            ';
            $number++;
        }
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
            <!-- /.box-body -->
          

  


<!-- Modal -->
<div id="add_nuevo_Terapeutas_modal" tabindex="-1" class="modal fade" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Terapeuta</h4>
      </div>
      <div class="modal-body">

      <div id="addt"></div>

        <div class="form-group">
           <label for="nombre" >Nombre completo:</label>
           <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" >
         </div>
        <div class="form-group">
            <label for="apellido" >Apellidos:</label>
            <input type="text" class="form-control" id="apellido" placeholder="Apellidos">
        </div> 
            
            
          <div class="form-group">
            <lavel for="rut" >Rut:</lavel>
            <input type="text" id="rut" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask>
        </div>
       
        
        <div class="form-group">
            <lavel for="telefono">Telefono:</lavel>
            <input type="text" id="telefono" class="form-control" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
        </div>
        
        <div class="form-group">
                <label for="fecha" >Fecha de nacimiento:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" id="fecha">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        
         <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" placeholder="Dirección">
        </div> 
         
            <div class="form-group">
            <label for="localidad" >Localidad</label>
            <input type="text" class="form-control" id="localidad" placeholder="Localidad">
        </div>
        
           <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control" id="provincia" placeholder="Provincia" required>
        </div>
        
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" placeholder="Provincia" required>
        </div>

        <div class="form-group">
            <label for="cargo_tera">Cargo que desempeñará</label>
            <input type="text" class="form-control" id="cargo_tera" placeholder="Cargo que desempeñará el terapeuta" required>
        </div>

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" onclick="addTerapeutas()">Registrar</button>
      </div>
    </div>

  </div>
</div>


<!-- // .-- FIN DEL REGISTRO TERAPEUTAS //-->


<!-- // INICIO DE UPDATE DE TERAPEUTAS // -->



<!-- Modal -->
<div id="update_Terapeutas_modal" tabindex="-1" class="modal fade" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Terapeuta</h4>
      </div>
      <div class="modal-body">
      <div id="updatet"></div>

        <div class="form-group">
           <label for="update_nombre" >Nombre completo:</label>
           <input type="text" class="form-control" id="update_nombre" placeholder="Nombre Completo" >
         </div>
        <div class="form-group">
            <label for="update_apellido" >Apellidos:</label>
            <input type="text" class="form-control" id="update_apellido" placeholder="Apellidos">
        </div> 
            
            
          <div class="form-group">
            <lavel for="update_rut">Rut:</lavel>
            <input type="text" id="update_rut" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask>
        </div>
       
        
        <div class="form-group">
            <lavel for="update_telefono">Telefono:</lavel>
            <input type="text" id="update_telefono" class="form-control" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
        </div>
        
        <div class="form-group">
                <label for="update_fecha" >Fecha de nacimiento:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" id="update_fecha">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        
         <div class="form-group">
            <label for="update_direccion">Dirección</label>
            <input type="text" class="form-control" id="update_direccion" placeholder="Dirección">
        </div> 
         
            <div class="form-group">
            <label for="update_localidad" >Localidad</label>
            <input type="text" class="form-control" id="update_localidad" placeholder="Localidad">
        </div>
        
           <div class="form-group">
            <label for="update_provincia">Provincia</label>
            <input type="text" class="form-control" id="update_provincia" placeholder="Provincia" required>
        </div>
        
        <div class="form-group">
            <label for="update_correo">Correo</label>
            <input type="email" class="form-control" id="update_correo" placeholder="Correo electronico" required>
        
        </div><div class="form-group">
            <label for="update_cargo_tera">Cargo que desempeñará</label>
            <input type="text" class="form-control" id="update_cargo_tera" placeholder="Cargo que desempeñará" required>
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

