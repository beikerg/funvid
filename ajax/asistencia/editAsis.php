<?php 

    if(!Empty($_POST['resi'])){
        
        

         include("../db_connection.php");

        $status = '0';
        $number_resi = count($_POST['resi']);
        $id_ts =  $_POST['id_ts'];
       
        $sql = "SELECT * FROM asistencia WHERE id_ts = '$id_ts' ";                        //use for MySQLi-OOP
         $query = $mysql->query($sql);
            while($row = $query->fetch_assoc()){
                $residente = $row['id_residente'];

                $data = "UPDATE asistencia SET status_asis = '$status' WHERE id_ts = '$id_ts' ";
		
                $result = $mysql->query($data);
            }
            $mysql->close();
   
        
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


            foreach ($_POST['id'] as $ids) {

                $ina = $_POST['item'][$ids];
                $item = implode(',',$ina);
                $id_residente = $_POST['id_residente'][$ids];
                $observ_asis = $_POST['observ_asis'][$ids];
              
                
                include('../db_connection.php');
                $update_asis = "UPDATE asistencia SET observ_asis = '$observ_asis', item_asis = '$item' WHERE id_residente = '$id_residente' AND id_asis = '$ids' ";
                $resu_asis = $mysql->query($update_asis);
                if(!$resu_asis){
                    echo "Error al agregar detalles de inasistencia ".$mysql->error;
                }
            }
             $mysql->close();
            
			header("Location: ../../editarTs.php?id=".$id_ts);
        }


    }

?>