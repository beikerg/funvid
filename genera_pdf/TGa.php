<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");

  $id_residente = $_GET['id'];
  $id_ga = $_GET['tera'];

  $query = $mysql->query("SELECT r.nombre, r.apellido, r.etapa_resi, r.sexo, r.fecha, t.* FROM residentes r INNER JOIN grupo_atras t ON t.id_residente = r.id_residente WHERE t.id_residente = '$id_residente' AND t.id_ga = '$id_ga'");


 while ($data = mysqli_fetch_array($query)){
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];
          $etapa_resi = $data['etapa_resi'];
          $id_ga = $data['id_ga'];
          $lider_ga = $data['lider_ga'];
          $colider_ga = $data['colider_ga'];
          $solicita_ga = $data['solicita_ga'];
          $fecha_ga = $data['fecha_ga'];
          $h_inicio_ga = $data['h_inicio_ga'];
          $h_fin_ga = $data['h_fin_ga'];        
          $o_lider_ga = $data['o_lider_ga'];
          $o_colider_ga = $data['o_colider_ga'];
          $o_solicita_ga = $data['o_solicita_ga'];
          $actitud_ga = $data['actitud_ga'];
          $etapa_ga = $data['etapa_ga'];
          $f = $data['fallas_ga'];
          $fallas = explode(', ', $data['fallas_ga']); 
        }


  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->SetMargins(15,15,15,15);
  $pdf->Cell(190, 7, utf8_decode('Terapia Grupo Atrás'), 0, 0, 'C');
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
  if(isset($lider_ga) && $lider_ga != ""){
    $pdf->Cell(60, 7, utf8_decode($lider_ga), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // ETAPA RESIDENTE
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Etapa:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($etapa_ga), 0, 0, '', 0);

  // NOMBRE COLIDER
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'C/Lider:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($colider_ga) && $colider_ga != ""){
    $pdf->Cell(60, 7, utf8_decode($colider_ga), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // FECHA TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Fecha:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, date('d-m-Y', strtotime($fecha_ga)), 0, 0, '', 0);

  // NOMBRE DIRECTOR TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Solicitante:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($solicita_ga) && $solicita_ga != ""){
    $pdf->Cell(60, 7, utf8_decode($solicita_ga), 0, 0, '', 0); // MODIFICAR ESTO PARA QUE APARESCA EL EDUCADORES PARTICIPANTES
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // HORA DE INICIO TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Hr. Inicio:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($h_inicio_ga), 0, 0, '', 0);

  // HORA FIN TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Hr. Termino:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($h_fin_ga), 0, 0, '', 0);
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
  if(isset($actitud_ga) && $actitud_ga != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, utf8_decode('   Actitud Asumida por el residente: '), 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($actitud_ga));
    $pdf->Ln(10);
  } 

   //OBSERVACIONES DIRECTOR DE TERAPIA
   if(isset($o_solicita_ga) && $o_solicita_ga != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones del residente que solicita la terapia:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_solicita_ga));
    $pdf->Ln(10);
   }
  

  // OBSERVACIONES LIDER
  if(isset($o_lider_ga) && $o_lider_ga != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones Lider:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_lider_ga));
    $pdf->Ln(10);
  }
  
  
  // OBSERVACIONES COLIDER
  if(isset($o_colider_ga) && $o_colider_ga != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones C/Lider:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_colider_ga));
    $pdf->Ln();
  }

  
  

  $pdf->Close();
  $pdf->Output('I', 'Terapia-Grupo-Atrás-'.$fecha_ga.'.pdf');


?>