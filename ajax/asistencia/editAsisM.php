<?php 

    if(!Empty($_POST['resi'])){
        
        

        // include("../db_connection.php");

        $status = '0';
        $number_resi = count($_POST['resi']);
        $id_ts =  $_POST['id_ts'];
       
        // $sql = "SELECT * FROM residentes WHERE etapa_resi <> 'REDUCADO' AND etapa_resi <> 'ABANDONO' ";                        //use for MySQLi-OOP
        //  $query = $mysql->query($sql);
        //     while($row = $query->fetch_assoc()){
        //         $residente = $row['id_residente'];

        //         $data = "INSERT INTO asistencia (id_ts, id_residente, status_asis) 
		//                  VALUES ('$id_ts', '$residente', '$status')";
		
        //         $result = $mysql->query($data);
        //     }
        //     $mysql->close();
   
        
        include('../db_connection.php');
        $i = 0;
        while ($i < $number_resi){
            $id_data = $_POST['resi'][$i];
            
            $data_resi = "UPDATE asistencia SET status_asis = '1' WHERE id_residente = '$id_data' AND id_ts = '$id_ts' ";
		
           $resultado = $mysql->query($data_resi);
		
        $i++;    
        }
        $mysql->close();
       

        if(!$resultado)
		{
            echo  "Error al agregar Terapia Sensei (Deportiva)",$mysql->error;

		}else{

			header("Location: ../../editarTs.php?id=".$id_ts);
		}

        
        // include("../db_connection.php");

        // $query = $mysql->query("SELECT * FROM asistencia WHERE id_ts = '$id_ts'");
        
        // while($row = $query->fetch_assoc()){
        
            

        // }

    }

?>