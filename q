
Residentes

id_residentes
nombre
apellido
fecha
sexo
rut
telefono
nivel
profesion
direccion
localidad
provincia

Familiares

id_f
nombre_f
apellido_f
rut_f
telefono_f
direccion_f
localidad_f
provincia_f
parentesco_f
id_residente

<?php
 
	/*if(empty($_POST['nombre']) ||
		empty($_POST['apellido']) ||
		empty($_POST['rut']) ||
		empty($_POST['sexo']) ||
		empty($_POST['telefono']) ||
		empty($_POST['fecha']) ||
		empty($_POST['nivel']) ||
		empty($_POST['profesion']) ||	
		empty($_POST['direccion']) ||
		empty($_POST['localidad']) ||
		empty($_POST['provincia']) ||
		empty($_POST['correo'])	){

		$error = "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.</p></center>";

		echo $error;

	}*/if(isset($_POST['nombre']) 
		&& isset($_POST['apellido']) 
		&& isset($_POST['rut']) 
		&& isset($_POST['sexo'])
		&& isset($_POST['telefono']) 
		&& isset($_POST['fecha'])
		&& isset($_POST['nivel'])
		&& isset($_POST['profesion']) 
		&& isset($_POST['direccion']) 
		&& isset($_POST['localidad']) 
		&& isset($_POST['provincia']) 
		&& isset($_POST['correo'])


		&& isset($_POST['nombre_f'])
		&& isset($_POST['apellido_f'])
		&& isset($_POST['rut_f'])
		&& isset($_POST['telefono_f'])
		&& isset($_POST['direccion_f'])
		&& isset($_POST['localidad_f'])
		&& isset($_POST['provincia_f'])
		&& isset($_POST['parentesco_f']) )
	{
		// include Database connection file 
		include("../db_connection.php");

		// get values 
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$rut = $_POST['rut'];
		$sexo = $_POST['sexo'];
		$telefono = $_POST['telefono'];
		$fecha = $_POST['fecha'];
		$nivel = $_POST['nivel'];
		$profesion = $_POST['profesion'];
		$direccion = $_POST['direccion'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
		$correo = $_POST['correo'];

		$nombre_f = $_POST['nombre_f'];
		$apellido_f = $_POST['apellido_f'];
		$rut_f = $_POST['rut_f'];
		$telefono_f = $_POST['telefono_f'];
		$direccion_f = $_POST['direccion_f'];
		$localidad_f = $_POST['localidad_f'];
		$provincia_f = $_POST['provincia_f'];
		$parentesco_f = $_POST['parentesco_f'];






		$ejecutar = "SELECT * FROM residentes WHERE rut = '$rut' OR correo = '$correo' ";


		$resul= $mysql->query($ejecutar);
		

		if(mysqli_num_rows($resul) == 1){

			echo "<center><p class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> El RUT o correo ingresado ya existe. </p></center>";

		}else{

			 $mysql->query("INSERT INTO residentes
				(nombre, apellido, rut, sexo, telefono, fecha, nivel, profesion,  direccion, localidad, provincia, correo) 
				VALUES('$nombre', '$apellido', '$rut', '$sexo', '$telefono', '$fecha', '$nivel', '$profesion', '$direccion', '$localidad', '$provincia', '$correo')");

			 $mysql->query("INSERT INTO familiares (nombre_f, apellido_f, rut_f, telefono_f, direccion_f, localidad_f, provincia_f, parentesco_f, id_residente) 
					VALUES ('$nombre_f', '$apellido_f', '$rut_f', '$telefono_f', '$direccion_f', '$localidad_f', '$provincia_f', '$parentesco_f' '".$mysql->insert_id."'')");



		if (!$result = $mysql->query($result)) {
	        exit($mysql->error);
	    }
	       echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El residente se ha agregado con éxito.</p></center>";

	    ?> <script type="text/javascript">	
	    	 	setTimeout(function(){
	    	 		$("#add_nuevo_Residentes_modal").modal("hide");
	    	 	}, 1000);    	
	    	
	    </script>
	    <?php 

		}

	
	}
?>


<script type="text/javascript">	
	    	 	setTimeout(function(){
	    	 			location.href ="../../residente.php";	    	 		
	    	 	}, 2000);    	
	    	
	    </script>


	    <form action="reducado.php" method="POST">
  <label>Fecha de nacimiento</label>
  <input type ="date" name="nacimento">
  
  
  <input type ="submit" name="submit" value="Calcular">
 </form>
  


<?php
if($_POST){
  $fechaN= $_POST['nacimento'];

  $cumpleanos = new DateTime($fechaN);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
    $edad= $annos->y;
  
    echo "<input type'text' value='".$edad."'>";
}
   

 
    
  ?>

  $a = "SELECT * FROM area WHERE id_consulta = '$id_con' ";
    $k = $mysql->query($a);
    $d = mysqli_num_rows($k);
    if($d == 0){
      header("location: editarConsultaPresi.php?id=".$id_r."&con=".$id_con);
    }