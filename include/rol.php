<?php 

session_start();
  if(!$_SESSION["rol"] == 'Admin' || !$_SESSION['rol'] == 'Super_Administrador') 
  {
    header("location: index.php");
  }

 ?>