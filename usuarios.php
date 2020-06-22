<?php 
  include("include/rol.php");
    ?>
 <!DOCTYPE html>
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
      <div class="col-md-6"> 
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#add_nuevo_User_modal">Registrar Nuevo</button>
      </div>
      <div align="right" class="col-md-6">
        <a class="btn btn-default btn-lg" target="_blank" href="genera_pdf/ListaUsuarios.php"><i class="fa fa-file-pdf-o"></i> PDF</a> 
      </div>
   </div> 

    

        <br>
        


            <!-- /.box-header -->
            <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Lista de Usuarios</h3>
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
            <th>Usuario</th>
            <th>Privilegios</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php

            $data = "";
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM usuarios ";

if($_SESSION['rol'] == 'Admin'){
         $query = "SELECT * FROM usuarios  ORDER BY id";
    }elseif($_SESSION['rol'] == 'Super Administrador'){
        $query = "SELECT * FROM usuarios WHERE tipo_usuario <> 'Admin' AND tipo_usuario <> 'Super Administrador' ORDER BY id";
    }else{
        $query = "SELECT * FROM usuarios WHERE tipo_usuario <> 'Admin' AND tipo_usuario <> 'Super Administrador' ORDER BY id ";
    }
       
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
                <th>'.$row['usuario'].'</th>
                <th>'.$row['tipo_usuario'].'</th>
                <th>
                     

                    <button onclick="GetUserDetails('.$row['id'].')" title="Editar" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button> ';
                
            if($row['tipo_usuario'] == 'Admin' and $_SESSION['rol'] == 'Admin'){ 
              
                     $data .=  '  <button onclick="DeleteUser('.$row['id'].')" title="Eliminar" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button> ';
                
                }elseif($row['tipo_usuario'] != 'Admin'){
                    $data .=  '  <button onclick="DeleteUser('.$row['id'].')" title="Eliminar" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button> ';
                }



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
<div id="add_nuevo_User_modal" tabindex="-1" class="modal fade" role="dialog" >
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        
        <div id="addu"></div>
      
        <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" class="form-control" name="nombre" id="nombre" required pattern="[A-Za-z0-9]+" title="Se necesita un nombre"   placeholder="Nombre Completo" >
         </div>
        <div class="form-group">
            <label for="usuario" >Usuario:</label>
            <input type="text" class="form-control" name="usuario" id="usuario" required pattern="[A-Za-z0-9]+" title="Se necesita un usuario" placeholder="Nombre de usuario" >
        </div> 
            
            
          <div class="form-group"> 
            <lavel for="password" >Contraseña:</lavel>
            <input type="password"  name="password" id="password" class="form-control" placeholder="Contraseña" REQUIRED>
        </div>
       
           
        
        <div class="form-group">
          <label for="tipo_usuario">Privilegios:</label>
          <select class="form-control" name="tipo_usuario" id="tipo_usuario"  required>
            <option></option>
            <?php 


            if($_SESSION['rol'] == 'Admin') {
              echo '<option value="Admin">Root</option>
                    <option value="Super_Administrador">Super administrador</option>
                    ';
            }

            if($_SESSION['rol'] == 'Super Administrador' || $_SESSION['rol'] == 'Admin'){
              echo '<option value="Administracion">Administración</option>';
            }
            ?>
            
           
            <option value="Psicologo">Psicologo</option>
            <option value="Educadores">Educadores</option>
            <option value="Terapeutas">Terapeutas</option>            
            <option value="Reducados">Reducados</option>
            
          </select>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       <button type="submit" class="btn btn-primary" onclick="addUser()">Registrar</button>
      </div>
    </form>
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
        <h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
      </div>
      <div class="modal-body">
    
    <div id="up"></div>
    
      

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
          <label for="update_tipo_usuario">Privilegios:</label>
          <select class="form-control" id="update_tipo_usuario" required>
            <option></option>
  
            <?php if($_SESSION['rol'] == 'Admin') {
              echo '<option value="Admin">Root</option>
                    <option value="Super_Administrador">Super administrador</option>
                    ';
            }

            if($_SESSION['rol'] == 'Super_Administrador' || $_SESSION['rol'] == 'Admin'){
              echo '<option value="Administracion">Administración</option>';
            }
            ?>
            
            <option value="Psicologo">Psicologo</option>
            <option value="Educadores">Educadores</option>
            <option value="Terapeutas">Terapeutas</option>            
            <option value="Reducados">Reducados</option>
            
          </select>
        </div> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()">Guardar Cambios</button>
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
