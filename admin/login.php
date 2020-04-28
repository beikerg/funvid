<?php
 
if(isset($_GET["error"]) && $_GET["error"] != "login") {
    header("Location: index.php");
  }elseif(isset($_GET["acceso"]) && $_GET["acceso"] != "login"){
    header("Location: index.php");
  }elseif(isset($_GET["sin"]) && $_GET["sin"] != "ney"){
    header("Location: index.php");
  }
  
  

 ?>


<!DOCTYPE html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <link rel="shortcut icon" href="../img/letra-f.png" type="image/x-icon">
    <meta charset="utf-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FUNVID | Ingresar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  </head>
  
  
  <body class="hold-transition login-page">
    

   

    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>FUNVID</b></a>
      </div><!-- /.login-logo -->
    

      <div class="login-box-body">
        <p class="login-box-msg">Ingrese al sistema</p>
         
    <div class="login">

      <?php
 
      if(isset($_GET["error"])) {
        echo "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>* Usuario y / o Contraseña invalidos.<br>
              Intentelo de nuevo.</p></center>";

      }elseif(isset($_GET["acceso"])){
        echo "<center><p class='acceso'>* No tiene privilegios para ingresar.<br></p></center>";
      
      }elseif(isset($_GET["sin"])){
        echo "<center><p class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>* Usuario no registrado.      </p></center>";
      }
      

     ?>
        <form action="../ajax/login/login.php" method="POST" >
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required pattern="[A-Za-z0-9]+" title="Se necesita un usuario" >
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required pattern="[A-Za-z0-9]+" title="Se necesita una contraseña" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
         
            <div class="row">                      
              <div class="col-xs-4">
              <input type="Submit" value="Entrar"  class="btn btn-primary btn-block btn-flat">
            </div><!-- /.col -->
          </div>
        </form>
    </div>
     
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 3.3.1 -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script type="../text/javascript" src="js/login.js"></script>
   
    
  </body>
</html>
