<?php 

		include("../db_connection.php");
		session_start();
	if(isset($_POST)){

		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$id = $_SESSION['idUser'];

		if($pass1 == $pass2){
			$password = password_hash($pass2, PASSWORD_DEFAULT, ['cost' => 12]);

			$query = "UPDATE usuarios SET  password = '$password' WHERE id = '$id' ";

			if($result = $mysql->query($query)){
				header("location: ../../perfil.php");
				session_destroy();
			}else{
				exit($mysql->error);
			}


		}

	}

?>
