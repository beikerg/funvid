<?php 

/*

	if(isset($_POST)) {
 
		require("../db_connection.php");
 
			$loginNombre = $_POST["usuario"];
			$loginPassword =$_POST["password"];
			
 
			$consulta = "SELECT * FROM usuarios WHERE usuario='$loginNombre' AND password='$loginPassword'";
 
			if($resultado = $mysql->query($consulta)) {
				while($row = $resultado->fetch_array()) {
 
					$userok = $row["usuario"];
					$passok = $row["password"];
					$tipo = $row['tipo_usuario'];
					$name = $row['nombre'];

					session_start();
					$_SESSION['nombre'] = $name;
					$_SESSION['tipo_usuario'];
				}
				$resultado->close();
			}
			$mysql->close();
 
 
			if(isset($loginNombre) && isset($loginPassword)) {
 
				if($loginNombre == $userok && $loginPassword == $passok) {

					if($tipo = "Admin"){
					
						session_start();
						$_SESSION["logueado"] = TRUE;
						
						header("Location: ../../usuarios.php");
					
					}elseif ($tipo = "Psicologo") {
						session_start();
						$_SESSION["logueado"] = TRUE;	
								
						header("Location: ../../psicologo.php");
					

					}else{
						header("Location: ../../admin/login.php?acceso=login");
					}

					
 
				}
				else {
					Header("Location: ../../admin/login.php?error=login");
				}
 
			}
 
		} else {
			header("Location: ../../index.php");
		}
 
*/

		if(empty($_POST['usuario']) || empty($_POST['password']))
		{
			header("location: ../../index.php");
		}else{

			require_once("../db_connection.php");

			$user = $mysql->real_escape_string($_POST['usuario']);
			$pass = $mysql->real_escape_string($_POST['password']);
			

			$query = $mysql->query("SELECT * FROM usuarios WHERE usuario = '$user'  ");


			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$data = mysqli_fetch_array($query);

				$very_user = $data['usuario'];
				$s= '';

				if($very = password_verify($pass, $data['password'])){
					$s .= 'true';
				}else{
					$s .= 'false';
				}

				if($very_user == $user && $s == 'true'){

					session_start();
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['id'];
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['usuario'] = $data['usuario'];
				$_SESSION['rol'] = $data['tipo_usuario'];


				header("location:  rol.php");

				}else{
					Header("Location: ../../admin/login.php?error=login");
				}		

			}else{
				Header("Location: ../../admin/login.php?sin=ney");
			}


		}


 	


?>