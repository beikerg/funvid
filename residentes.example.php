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
  
  <title>FUNVID | Residentes</title>
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

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    <div class="row">
      <div class="col-md-12"> 
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#add_nuevo_Residentes_modal">Registrar Nuevo</button>
      </div>
    </div> 




        <br><br>
        <div class="row">
          <div class="container">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Residentes</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>


            <!-- /.box-header -->
            <div class="residentes"></div>  
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
            </div>
            </div>

    
    


<!-- Modal -->
<div id="add_nuevo_Residentes_modal" tabindex="-1" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
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
           <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" required="true">
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
          <label for="sexo">Sexo:</label>
          <select class="form-control" id="sexo">
            <option></option>
            <option value="Masculino">Masculino</option>
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
          <label for="profesion">Profesión:</label>
          <input type="text" class="form-control" id="profesion">
      </div>
        
         <div class="form-group">
            <label for="direccion" >Dirección</label>
            <input type="text" id="direccion" class="form-control" placeholder="Dirección">
        </div> 
         
            <div class="form-group">
            <label for="localidad" >Localidad</label>
            <input type="text" class="form-control" id="localidad" placeholder="Localidad">
        </div>
        
           <div class="form-group">
            <label for="provincia" >Provincia</label>
            <input type="text" class="form-control" id="provincia" placeholder="Provincia" required>
        </div>
        
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control required" id="correo" placeholder="Provincia" required>
        </div>
                
              </div>
           
          </div>      
    </div>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header width-border">
          <h3 class="box-title">Datos Familiar</h3>
               <div class="box-tools pull-right">               
        </div>


     
        <div class="box-body">
            
            <div class="form-group">
              <label for="nombre_f">Nombre completo:</label>
              <input type="text" name="" class="form-control" placeholder="Nombre Completo" required>
            </div>

            <div class="form-group">
              <label for="apellido_f">Apellidos:</label>
              <input type="text" name="" class="form-control" placeholder="Apellido" required>
            </div>
 
            <div class="form-group">
              <label for="rut_f">Rut:</label>
              <input type="text" name="" class="form-control" required data-inputmask='"mask": " 99.999.999-*"' data-mask>
            </div>

            <div class="form-group">
              <label for="telefono_f">Telefono:</label>
              <input type="text" name="" class="form-control" required data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
            </div>

            <div class="form-group">
              <label for="direccion_f">Dirección:</label>
              <input type="text" name="" class="form-control" required placeholder="Direccion">
            </div>

            <div class="form-group">
              <label for="localidad_f" >Localidad:</label>
              <input type="text" name="" class="form-control" required placeholder="Localidad">
            </div>

            <div class="form-group">
              <label for="provincia_f">Provincia:</label>
              <input type="text" name="" class="form-control" required placeholder="Provincia">
            </div>

            <div class="form-group">
              <label for="parentesco_f" >Parentesco</label>
              <input type="text" name="" class="form-control" required placeholder="Mamá, Papá, Hermano, etc.">
            </div>
        
          </div>       
         
        </div>
      </div>            
    </div> 


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
        <h4 class="modal-title" id="myModalLabel">Editar Residentes</h4>
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
            <label for="update_sexo">Sexo:</label>
            <select class="form-control" id="update_sexo">
              <option></option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
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
          <label for="update_nivel">Nivel de estudio:</label>
          <input type="text" class="form-control" id="update_nivel">
        </div>      

        <div class="form-group">
          <label for="update_profesion">Profesión:</label>
          <input type="text" class="form-control" id="update_profesion">
        </div>  
        
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

</body>
</html>

