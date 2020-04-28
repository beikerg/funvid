<?php
 
  session_start();
  if($_SESSION["logueado"] == TRUE) {
    
    ?>
 


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">  
<head>
   <title>FUNVID | Usuarios</title>
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
        Usuarios
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Usuarios</a></li>
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
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#add_nuevo_User_modal">Registrar Nuevo</button>
      </div>
    </div> 




        <br><br>
        <div class="row">
          <div class="container">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Usuarios</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <label for="caja_busqueda" class="sr-only">Buscar</label>
                  <input type="text" name="caja_busqueda" id="caja_busqueda" class="form-control pull-right" placeholder="Buscar Usuario">
                  <div class="input-group-btn">
                    <button type="" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>


            <!-- /.box-header -->
            <div class="usuario"></div>  
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
            </div>
            </div>

    
    


<!-- Modal -->
<div id="add_nuevo_User_modal" tabindex="-1" class="modal fade" role="dialog" >
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" class="form-control" required="true"  id="nombre" placeholder="Nombre Completo" >
         </div>
        <div class="form-group">
            <label for="usuario" >Usuario:</label>
            <input type="text" class="form-control" id="usuario" placeholder="Nombre de usuario" REQUIRED>
        </div> 
            
            
          <div class="form-group"> 
            <lavel for="password" >Contraseña:</lavel>
            <input type="password"  id="password" class="form-control" placeholder="Contraseña" REQUIRED>
        </div>
       
         <div class="form-group"> 
            <lavel for="password" >Repetir contraseña:</lavel>
            <input type="password" id="" class="form-control" placeholder="Repetir Contraseña" required>
        </div>

    
        
        <div class="form-group">
          <label for="tipo_usuario">Privilegios:</label>
          <select class="form-control" id="tipo_usuario" required>
            <option></option>
            <option value="Psicologo">Psicologo</option>
            <option value="Educadores">Educadores</option>
            <option value="Residentes">Residentes</option>
            <option value="Terapeutas">Terapeutas</option>
            <option value="Administracion">Administración</option>
            <option value="Reducados">Reducados</option>
            <option value="Pagos">Pagos</option>
          </select>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" onclick="addUser()">Registrar</button>
      </div>
    </div>
  </div>
</div>

  <!-- // .-- FIN DEL MODAL -->
  

  <!-- // INICIO DEL MODAL UPDATE // --> 

  <!-- Modal -->
<div id="update_User_modal" tabindex="-1" class="modal fade" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Psicologo</h4>
      </div>
      <div class="modal-body">



        <div class="form-group">
           <label for="update_nombre">Nombre</label>
           <input type="text" class="form-control" required id="update_nombre" placeholder="Nombre Completo" >
         </div>
        <div class="form-group">
            <label for="update_usuario" >Usuario:</label>
            <input type="text" class="form-control" id="update_usuario" placeholder="Nombre de usuario" REQUIRED>
        </div> 
            
            
          <div class="form-group"> 
            <lavel for="update_password" >Contraseña:</lavel>
            <input type="password"  id="update_password" class="form-control" placeholder="Contraseña" REQUIRED>
        </div>
       
         <div class="form-group"> 
            <lavel for="" >Repetir contraseña:</lavel>
            <input type="password" id="" class="form-control" placeholder="Repetir Contraseña" required>
        </div>

    
        
        <div class="form-group">
          <label for="update_tipo_usuario">Privilegios:</label>
          <select class="form-control" id="update_tipo_usuario" required>
            <option></option>
            <option value="Psicologo">Psicologo</option>
            <option value="Educadores">Educadores</option>
            <option value="Residentes">Residentes</option>
            <option value="Terapeutas">Terapeutas</option>
            <option value="Administracion">Administración</option>
            <option value="Reducados">Reducados</option>
            <option value="Pagos">Pagos</option>
          </select>
        </div> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="UpdateUserDetails  ()">Guardar Cambios</button>
        <input type="hidden" id="hidden_User_id">
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
<!-- Usuarios -->
<script type="text/javascript" src="js/users.js"></script>

</body>
</html>


<?php
  } else {
    header("Location: index.php");
  }
 
 ?>