<?php 
  include("include/rol.php");
 
    ?>
    
<!DOCTYPE html>
<html lang="es">
<head>
  <title>FUNVID | Residentes</title>
  <?php include("include/head.php"); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <?php include("include/header.php"); 
        include("include/aside-admin.php");
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Residentes
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Residentes</a></li>
        <li class="active">inicio</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">
      <div class="col-md-6"> 
    <a href="registrarResidente.php"><button type="button"  class="btn btn-success btn-lg" data-toggle="modal" data-target="">Registrar Nuevo</button></a>
      </div>
      <div align="right" class="col-md-6">
        <a class="btn btn-default btn-lg" target="_blank" href="genera_pdf/ListaResidente.php"><i class="fa fa-file-pdf-o"></i> PDF</a> 
      </div>
    </div> 
        <br><br>
       
          
            <!-- /.box-header -->
            <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de Residentes</h3>
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
            <th>Rut</th>
            <th>Fecha Ingreso</th>
            <th>Etapa actual</th>
            <th style="width: 100px;"><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php

            $data = "";
              include('ajax/db_connection.php');
              // $sql = "SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' ";
              $sql = "SELECT r.*, e.* FROM residentes r INNER JOIN etapa e ON r.id_residente = e.id_residente WHERE e.desc_etapa = 1 and r.etapa_resi <> 'REDUCADO' AND r.etapa_resi <> 'ABANDONO'";

    
       
       if (!$result = $mysql->query($sql)) {
        echo $mysql->error;
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
                <th>'.date('d-m-Y',  strtotime($row['fecha_inicio_etapa'])).'</th>
                <th>'.$row['etapa_resi'].'</th>
                <th><center>
                     

              <a class="btn btn-warning" href="editarResidente.php?id='.$row['id_residente'].'"><i class="glyphicon glyphicon-pencil"></i></a>
          
              <button onclick="preguntar('.$row['id_residente'].')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button> 

              
              <a href="genera_pdf/fichaResidente.php?id='.$row['id_residente'].'" target="_blank" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> <strong>PDF <strong></a>
              </center>       
               ';



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
<div id="add_nuevo_Residentes_modal" tabindex="-1" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Residente</h4>
      </div>
      <div class="modal-body">

      <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
        <div class="box-header width-border">
          <h3 class="box-title">Datos Residente</h3>
        </div>
        <div class="box-body">
        <div class="form-group">
           <label for="nombre">Nombre completo:</label>
           <input type="text" class="form-control required" id="nombre" placeholder="Nombre Completo" required="true">
         </div>
        <div class="form-group">
            <label for="apellido" >Apellidos:</label>
            <input type="text" class="required form-control" id="apellido" placeholder="Apellidos">
        </div> 
             
        
        <div class="form-group"> 
            <lavel for="rut" >Rut:</lavel>
            <input type="text" id="rut" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask>
        </div>

        <div class="form-group">
          <label for="sexo">Sexo:</label>
          <select class="form-control" id="sexo">
            <option></option>
            <option value"Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
       
        <div class="form-group">
            <lavel for="telefono" >Telefono:</lavel>
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
          <label for="nivel">Nivel de estudio:</label>
          <input type="text" class="form-control" id="nivel">
        </div>
  
        <div class="form-group">
          <label for="profesion">Profesion:</label>
          <input type="text" class="form-control" id="profesion">
        </div>

         <div class="form-group">
            <label for="direccion" >Dirección</label>
            <input type="text"class="form-control" id="direccion"  placeholder="Dirección">
        </div> 
         
      <div class="form-group">
            <label for="localidad" >Ciudad</label>
            <input type="text" class="form-control" id="localidad" placeholder="Ciudad">
        </div>
        
      <div class="form-group">
            <label for="provincia" >Comuna</label>
            <input type="text" class="form-control" id="provincia" placeholder="Comuna" required>
        </div>
        
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" placeholder="Provincia" required>
        </div>

        
        </div>
        </div>
      </div>
    </div>

<div id="addR"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" onclick="addResidentes()">Registrar</button>
      </div>
    </div>
  </div>
</div>

  <!-- // .-- FIN DEL MODAL -->
  <!-- // INICIO DEL MODAL UPDATE // --> 

  <!-- Modal -->
<div id="update_Residentes_modal" tabindex="-1" class="modal fade" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Residente</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
           <label for="update_nombre">Nombre completo:</label>
           <input type="text" class="form-control" id="update_nombre" placeholder="Nombre Completo" >
         </div>
        <div class="form-group">
            <label for="update_apellido" >Apellidos:</label>
            <input type="text" class="form-control" id="update_apellido" placeholder="Apellidos">
        </div>   
            
          <div class="form-group">
            <lavel for="update_rut" >Rut:</lavel>
            <input type="text" id="update_rut" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask>
        </div>
        
        <div class="form-group">
            <lavel for="update_telefono" >Telefono:</lavel>
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
            <label for="update_direccion" >Dirección</label>
            <input type="text" id="update_direccion" class="form-control" placeholder="Dirección">
        </div> 
         
            <div class="form-group">
            <label for="update_localidad" >Localidad</label>
            <input type="text" class="form-control" id="update_localidad" placeholder="Localidad">
        </div>
        
           <div class="form-group">
            <label for="update_provincia" >Provincia</label>
            <input type="text" class="form-control" id="update_provincia" placeholder="Provincia" required>
        </div>
        
        <div class="form-group">
            <label for="update_correo">Correo</label>
            <input type="email" class="form-control" id="update_correo" placeholder="Provincia" required>
        </div>
        <div id ="updateR"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="UpdateResidentesDetails()">Guardar Cambios</button>
        <input type="hidden" id="hidden_Residentes_id">
        
      </div>
    </div>
  </div>
</div>
<!-- // .-- FIN DEL MODAL UPDATE // -->
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

     <script type="text/javascript" src="js/residentes.js"></script>
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


