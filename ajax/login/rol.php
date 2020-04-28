<?php
	
 session_start();

 	if($_SESSION['rol'] == 'Admin')
 	{
 		header("location: ../../residente.php");
 	
 	}elseif($_SESSION['rol'] == 'Super_Administrador'){

 		header("location: ../../residente.php");

 	}elseif($_SESSION['rol'] == 'Administracion'){

 		header("location: ../../calendario.php");
 	
 	}elseif($_SESSION['rol'] == 'Psicologo'){

 		header("location: ../../calendario.php");
 	
 	}elseif($_SESSION['rol'] == 'Educadores'){

 		header("location: ../../calendario.php");
 	
 	}elseif($_SESSION['rol'] == 'Terapeutas'){

 		header("location: ../../calendario.php");
 	
 	}elseif($_SESSION['rol'] == 'Reducados'){

 		header("location: ../../reducado.php");
 	
 	}



?>