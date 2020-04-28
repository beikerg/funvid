<?php 

session_start();

	$usuario = $_SESSION['usuario'];

header('Content-Type: application/json');
include('../db_connection.php');

	$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

	switch ($accion) {
		case 'agregar':

			$title = $_POST['title'];
			$descripcion = $_POST['descripcion'];
			$color = $_POST['color'];
			$textColor = $_POST['textColor'];
			$start = $_POST['start'];
			$end = $_POST['end'];

			
			$qAgregar = "INSERT INTO eventos (title,descripcion,color,textColor,start,end,usuario) VALUES ('$title','$descripcion','$color','$textColor','$start','$end','$usuario')";
			$respuesta = $mysql->query($qAgregar);
			echo json_encode($respuesta); 
			break;
		case 'eliminar':
			$respuesta = false;
			if(isset($_POST['id'])){
				$id = $_POST['id'];
				$query = "DELETE FROM eventos where id= '$id' ";
				$respuesta = $mysql->query($query);

			}
			echo json_encode($respuesta);
			break;
		case 'modificar':
			
			$id = $_POST['id'];
			$title = $_POST['title'];
			$descripcion = $_POST['descripcion'];
			$color = $_POST['color'];
			$textColor = $_POST['textColor'];
			$start = $_POST['start'];
			$end = $_POST['end'];


			$query = "UPDATE eventos SET 
					title = '$title', 
					descripcion = '$descripcion',
					color = '$color',
					textColor = '$textColor',
					start = '$start',
					end='$end'
						WHERE id = '$id'";
			$respuesta = $mysql->query($query);

			echo json_encode($respuesta);

			break;
		default:
			$result = $mysql->query("SELECT * FROM eventos WHERE usuario = '$usuario' ");
			
			     $result_list = array();
while($row = mysqli_fetch_array($result)) {
   $result_list[] = $row;
}

foreach($result_list as $row) {

    $eventos[] = array(
        'id' => $row['id'],
        'title'  => $row['title'],
        'descripcion'  => $row['descripcion'],
        'color'  => $row['color'],
        'textColor'  => $row['textColor'],
        'start'  => $row['start'],
        'end'  => $row['end']


    );              
}

echo json_encode($eventos);
			
		break;
	}

	

	
?>