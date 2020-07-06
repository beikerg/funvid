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

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";


            // // echo "<pre>";
            // // print_r($_POST['item']);
            // // echo "</pre>";

            // // echo "<pre>";
            // // $observ_asis = ($_POST['observ_asis']);
            // // print_r($observ_asis);
            // // echo "</pre>";



            // foreach ($_POST['id_asis'] as $key => $value) {
            //     echo "Indice: ".$_POST['observ_asis'][$value]."<br>";
            //     foreach ($value as $v){
            //         echo "item ".$v." <br>";
                
            }
			header("Location: ../../editarTs.php?id=".$id_ts);
		


    }

?>