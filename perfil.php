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
  <title>FUNVID | Perfil</title>
  <?php include("include/head.php"); ?>  
<style>
  label{
    display: block;
  }
  div#error{
    height: 24px;
    width: 24px;
    display: inline-block;
    position: relative;
    top: 25px; 
  }
  div#error1{
    height: 24px;
    width: 24px;
    display: inline-block;
    position: relative;
    top: 25px; 
  }

</style>


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
        Mi Perfil
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Perfil </a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <form action="ajax/usuarios/updatePass.php" method="POST">
    <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-key"></i>

              <h3 class="box-title">Cambio de contraseña</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
            <div class="form-group col-md-10">
              <label>Nueva contraseña:</label>
              <input type="password" name="pass1" id="pass1" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <div id="error1"></div>
            </div>
            <div class="form-group col-md-10">
              <label>Repita contraseña:</label>
              <input type="password" name="pass2" id="pass2" class="form-control">
              
            </div>
            <div class="form-group col-md-2">
              <div id="error"></div>
            </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" name="id_residente" id="id_residente">

              <button type="button" data-toggle="modal" data-target="#confirmar" class="btn btn-primary">Guardar Cambio</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="confirmar" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
        
      </div>
      <div class="modal-body">
        <center><h2 class="modal-title" id="exampleModalLabel">¿Seguro que desea actualizar</br> su contraseña?</h2></center>
      </div>
      
      <div class="modal-footer">
<center>
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> No </button>
        <button type="submit" class="btn btn-success btn-lg"> Sí </button>
</center>
      </div>
    </div>
  </div>
</div>

  </form>
    

            
       
    
            
            
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

     <script type="text/javascript" src="js/psicologo.js"></script>

     <script type="text/javascript">
       $(document).ready(function(){

       $('#pass1').val('');
       $('#pass2').val('');

        $('#pass2').keyup(function() {
        

        var pass1 = $('#pass1').val();
        var pass2 = $('#pass2').val();


        if(pass1 == pass2)
        {
          $('#error').css("background","url(img/check.png)");
         
        }else{
           $('#error').css("background","url(img/check-.png)"); 
        }    

        });
       });
     </script>
</body>
</html>


