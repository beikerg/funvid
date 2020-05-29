<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");

  $id_residente = $_GET['id'];
  $id_avanzada = $_GET['tera'];

  $query = $mysql->query("SELECT r.nombre, r.apellido, r.etapa_resi, r.sexo, r.fecha, t.* FROM residentes r INNER JOIN avanzada t ON t.id_residente = r.id_residente WHERE t.id_residente = '$id_residente' AND t.id_avanzada = '$id_avanzada'");


 while ($data = mysqli_fetch_array($query)){
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];
          $etapa_resi = $data['etapa_resi'];
          $id_avanzada = $data['id_avanzada'];
          $lider_ta = $data['lider_ta'];
          $colider_ta = $data['colider_ta'];
          $edu_ta = $data['edu_ta'];
          $fecha_ta = $data['fecha_ta'];
          $h_inicio_ta = $data['h_inicio_ta'];
          $h_fin_ta = $data['h_fin_ta'];        
          $o_lider_ta = $data['o_lider_ta'];
          $o_colider_ta = $data['o_colider_ta'];
          $o_edu_ta = $data['o_edu_ta'];
          $actitud_ta = $data['actitud_ta'];
          $etapa_ta = $data['etapa_ta'];
          $f = $data['fallas_ta'];
          $fallas = explode(', ', $data['fallas_ta']); 
        }


  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->SetMargins(15,15,15,15);
  $pdf->Cell(190, 7, utf8_decode('Terapia de avanzada'), 0, 0, 'C');
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
  if(isset($lider_ta) && $lider_ta != ""){
    $pdf->Cell(60, 7, utf8_decode($lider_ta), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // ETAPA RESIDENTE
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Etapa:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($etapa_ta), 0, 0, '', 0);

  // NOMBRE COLIDER
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'C/Lider:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($colider_ta) && $colider_ta != ""){
    $pdf->Cell(60, 7, utf8_decode($colider_ta), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // FECHA TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Fecha:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, date('d-m-Y', strtotime($fecha_ta)), 0, 0, '', 0);

  // NOMBRE DIRECTOR TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Educadores:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($director_ta) && $director_ta != ""){
    $pdf->Cell(60, 7, utf8_decode($director_ta), 0, 0, '', 0); // MODIFICAR ESTO PARA QUE APARESCA EL EDUCADORES PARTICIPANTES
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

  // HORA DE INICIO TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Hr. Inicio:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($h_inicio_ta), 0, 0, '', 0);

  // HORA FIN TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Hr. Termino:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($h_fin_ta), 0, 0, '', 0);
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
  if(isset($actitud_ta) && $actitud_ta != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, utf8_decode('   Actitud Asumida por el residente: '), 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($actitud_ta));
    $pdf->Ln(10);
  } 

   //OBSERVACIONES DIRECTOR DE TERAPIA
   if(isset($o_edu_ta) && $o_edu_ta != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones Director:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_edu_ta));
    $pdf->Ln(10);
   }
  

  // OBSERVACIONES LIDER
  if(isset($o_lider_ta) && $o_lider_ta != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones Lider:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_lider_ta));
    $pdf->Ln(10);
  }
  
  
  // OBSERVACIONES COLIDER
  if(isset($o_colider_ta) && $o_colider_ta != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones C/Lider:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_colider_ta));
    $pdf->Ln();
  }

  
  

  $pdf->Close();
  $pdf->Output('I', 'Terapia-Avanzada-'.$fecha_ta.'.pdf');


?>