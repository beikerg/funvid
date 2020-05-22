<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");

  $id_residente = $_GET['id'];
  $id_especial = $_GET['tera'];

  $query = $mysql->query("SELECT r.nombre, r.apellido, r.etapa_resi, r.sexo, r.fecha, t.* FROM residentes r INNER JOIN especial t ON t.id_residente = r.id_residente WHERE t.id_residente = '$id_residente' AND t.id_especial = '$id_especial'");


 while ($data = mysqli_fetch_array($query)){
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];
          $etapa_resi = $data['etapa_resi'];
          $id_especial = $data['id_especial'];
          $lider_te = $data['lider_te'];
          $colider_te = $data['colider_te'];
          $solicita_te = $data['solicita_te'];
          $fecha_te = $data['fecha_te'];
          $h_inicio_te = $data['h_inicio_te'];
          $h_fin_te = $data['h_fin_te'];        
          $o_lider_te = $data['o_lider_te'];
          $o_colider_te = $data['o_colider_te'];
          $o_solicita_te = $data['o_solicita_te'];
          $actitud_te = $data['actitud_te'];
          $etapa_te = $data['etapa_te'];
          $f = $data['fallas_te'];
          $fallas = explode(', ', $data['fallas_te']); 
        }


  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->SetMargins(15,15,15,15);
  $pdf->Cell(190, 7, utf8_decode('Terapia Especial'), 0, 0, 'C');
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
  if(isset($lider_te) && $lider_te != ""){
    $pdf->Cell(60, 7, utf8_decode($lider_te), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // ETAPA RESIDENTE
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Etapa:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($etapa_te), 0, 0, '', 0);

  // NOMBRE COLIDER
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'C/Lider:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($colider_te) && $colider_te != ""){
    $pdf->Cell(60, 7, utf8_decode($colider_te), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // FECHA TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Fecha:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, date('d-m-Y', strtotime($fecha_te)), 0, 0, '', 0);

  // NOMBRE DIRECTOR TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Solicitante:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($solicita_te) && $solicita_te != ""){
    $pdf->Cell(60, 7, utf8_decode($solicita_te), 0, 0, '', 0); // MODIFICAR ESTO PARA QUE APARESCA EL EDUCADORES PARTICIPANTES
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // HORA DE INICIO TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Hr. Inicio:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($h_inicio_te), 0, 0, '', 0);

  // HORA FIN TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Hr. Termino:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($h_fin_te), 0, 0, '', 0);
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
  if(isset($actitud_te) && $actitud_te != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, utf8_decode('   Actitud Asumida por el residente: '), 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($actitud_te));
    $pdf->Ln(10);
  } 

   //OBSERVACIONES DIRECTOR DE TERAPIA
   if(isset($o_solicita_te) && $o_solicita_te != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones del residente que solicita la terapia:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_solicita_te));
    $pdf->Ln(10);
   }
  

  // OBSERVACIONES LIDER
  if(isset($o_lider_te) && $o_lider_te != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones Lider:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_lider_te));
    $pdf->Ln(10);
  }
  
  
  // OBSERVACIONES COLIDER
  if(isset($o_colider_te) && $o_colider_te != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones C/Lider:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_colider_te));
    $pdf->Ln();
  }

  
  

  $pdf->Close();
  $pdf->Output('I', 'Terapia-Avanzada-'.$fecha_te.'.pdf');


?>