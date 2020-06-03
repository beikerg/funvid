<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");

  $id_residente = $_GET['id'];
  $id_redu = $_GET['tera'];

  $query = $mysql->query("SELECT r.nombre, r.apellido, r.etapa_resi, r.sexo, r.fecha, t.* FROM residentes r INNER JOIN reunion_educadores t ON t.id_residente = r.id_residente WHERE t.id_residente = '$id_residente' AND t.id_redu = '$id_redu'");


 while ($data = mysqli_fetch_array($query)){
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];
          $etapa_resi = $data['etapa_resi'];
          $id_redu = $data['id_redu'];
          $lider_redu = $data['lider_redu'];
          $colider_redu = $data['colider_redu'];
          $edu_redu = $data['edu_redu'];
          $fecha_redu = $data['fecha_redu'];
          $h_inicio_redu = $data['h_inicio_redu'];
          $h_fin_redu = $data['h_fin_redu'];        
          $o_lider_redu = $data['o_lider_redu'];
          $o_colider_redu = $data['o_colider_redu'];
          $o_edu_redu = $data['o_edu_redu'];
          $actitud_redu = $data['actitud_redu'];
          $etapa_redu = $data['etapa_redu'];
          $f = $data['fallas_redu'];
          $fallas = explode(', ', $data['fallas_redu']); 
        }


  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->SetMargins(15,15,15,15);
  $pdf->Cell(190, 7, utf8_decode('Terapia Reunión de Educadores'), 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  
  // Encabezado de la tabla RGB 174, 214, 241

  $pdf->SetFillColor(232, 232, 232);

  // NOMBRE RESIDENTE
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Nombre: ', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, ucwords(strtolower(utf8_decode($nombre.' '.$apellido))), 0, 0, '', 0);

  // NOMBRE LIDER TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Lider:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($lider_redu) && $lider_redu != ""){
    $pdf->Cell(60, 7, utf8_decode($lider_redu), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // ETAPA RESIDENTE
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Etapa:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($etapa_redu), 0, 0, '', 0);

  // NOMBRE COLIDER
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'C/Lider:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($colider_redu) && $colider_redu != ""){
    $pdf->Cell(60, 7, utf8_decode($colider_redu), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // FECHA TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Fecha:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, date('d-m-Y', strtotime($fecha_redu)), 0, 0, '', 0);

  // NOMBRE DIRECTOR TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Educadores:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($director_redu) && $director_redu != ""){
    $pdf->Cell(60, 7, utf8_decode($director_ta), 0, 0, '', 0); // MODIFICAR ESTO PARA QUE APARESCA EL EDUCADORES PARTICIPANTES
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // HORA DE INICIO TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Hr. Inicio:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($h_inicio_redu), 0, 0, '', 0);

  // HORA FIN TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Hr. Termino:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($h_fin_redu), 0, 0, '', 0);
  $pdf->Ln(15);

        
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(180, 7, 'Fallas', 0, 1, 'C', 0);
  $pdf->Ln();


  //Ayudas 
 $pdf->SetFont('Arial', '', 10);
 
   
if(isset($f) && $f != ""){
  
  for ($i=0; $i < count($fallas) ; $i+=3) { 


      $pdf->Cell(60, 5.5, utf8_decode($fallas[$i]), 0, 0, '', 0);
      $h = $i+1;
      if($h < count($fallas)){
        $pdf->Cell(60, 5.5, utf8_decode($fallas[$h]), 0, 0, '', 0);
         $q = $h+1; 
        if($q < count($fallas)){
           $pdf->Cell(60, 5.5, utf8_decode($fallas[$q]), 0, 1, '', 0);
        }
      }

    }
}else{
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode('El residente no precento ninguna falla durante la terapia'), 0, 0, '', 0);
 
}
    


   $pdf->Ln(15);

  // ACTITUD ASUMIDA POR EL RESIDNETE
  if(isset($actitud_redu) && $actitud_redu != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, utf8_decode('   Actitud Asumida por el residente: '), 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($actitud_redu));
    $pdf->Ln(10);
  } 

   //OBSERVACIONES DIRECTOR DE TERAPIA
   if(isset($o_edu_redu) && $o_edu_redu != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones Director:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_edu_redu));
    $pdf->Ln(10);
   }
  

  // OBSERVACIONES LIDER
  if(isset($o_lider_redu) && $o_lider_redu != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones Lider:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_lider_redu));
    $pdf->Ln(10);
  }
  
  
  // OBSERVACIONES COLIDER
  if(isset($o_colider_redu) && $o_colider_redu != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones C/Lider:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_colider_redu));
    $pdf->Ln();
  }

  
  

  $pdf->Close();
  $pdf->Output('I', 'Terapia-Reunión-Educadores-'.$fecha_redu.'.pdf');


?>