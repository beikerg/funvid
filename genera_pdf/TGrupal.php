<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");

  $id_residente = $_GET['id'];
  $id_tg = $_GET['tera'];

  $query = $mysql->query("SELECT r.id_residente, r.nombre, r.apellido, r.fecha, r.sexo, r.etapa_resi, t.* FROM residentes r INNER JOIN tera_grupal t ON r.id_residente = t.id_residente WHERE r.id_residente = '$id_residente' AND t.id_tg = '$id_tg'  ");


  while ($data = mysqli_fetch_array($query)){
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];
          $etapa_resi = $data['etapa_resi'];
        # Data terapia Grupal
          $id_tg = $data['id_tg'];
          $lider_tg = $data['lider_tg'];
          $colider_tg = $data['colider_tg'];
          $director_tg = $data['director_tg'];
          $h_inicio_tg = $data['h_inicio_tg'];
          $h_fin_tg = $data['h_fin_tg'];
          $fecha_tg = $data['fecha_tg'];
          $o_lider_tg = $data['o_lider_tg'];
          $o_colider_tg = $data['o_colider_tg'];
          $o_director_tg = $data['o_director_tg'];
          $expo_tg = $data['expo_tg'];
          $actitud_tg = $data['actitud_tg'];

        }


  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->SetMargins(15,15,15,15);
  $pdf->Cell(190, 7, 'Terapia Grupal (Exponiencia)', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  
  // Encabezado de la tabla RGB 174, 214, 241

  $pdf->SetFillColor(232, 232, 232);

  //NOMBRE RESIDENTE
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Nombre: ', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($nombre), 0, 0, '', 0);

  // NOMBRE LIDER TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Lider:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($lider_tg), 0, 0, '', 0);
  $pdf->Ln();

  // ETAPA RESINDETE
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Etapa:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($etapa_resi), 0, 0, '', 0);

  // NOMBRE COLIDER TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'C/Lider:', 0, 0, '', 0); 
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($colider_tg), 0, 0, '', 0);
  $pdf->Ln();

  // FECHA TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Fecha:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, date('d-m-Y', strtotime($fecha_tg)), 0, 0, '', 0);

  // NOMBRE DEL DIRECTOR
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Director:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($director_tg), 0, 0, '', 0);
  $pdf->Ln();

  //HORA INICIO TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Hr. Inicio:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($h_inicio_tg), 0, 0, '', 0);

  // HORA FIN TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Hr. Termino:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($h_fin_tg), 0, 0, '', 0);
  $pdf->Ln(15);

  // EXPERIENCIA O PROBLEMATICA
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(180, 7, 'Exponiencia o problematica', 0, 1, 'C', 0);
  $pdf->Ln();
  $pdf->SetFont('Arial', '', 12);
  $pdf->Write(5, utf8_decode($expo_tg));
  $pdf->Ln(10);

  // ACTITUD ASUMIDA
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(180, 7, 'Actitud Asumida', 0, 1, 'C', 0);
  $pdf->Ln();
  $pdf->SetFont('Arial', '', 12);
  $pdf->Write(5, utf8_decode($actitud_tg));
  $pdf->Ln(8);

  // OBSERVACIONES DEL DIRECTOR
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 7, '    Observaciones Director:', 0, 1, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Write(5, utf8_decode($o_director_tg));
  $pdf->Ln(8);

  // OBSERVACIONES LIDER
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 7, '    Observaciones Lider:', 0, 1, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Write(5, utf8_decode($o_lider_tg));
  $pdf->Ln(8);

  // OBSERVACIONES COLIDER
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 7, '    Observaciones C/Lider:', 0, 1, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Write(5, utf8_decode($o_colider_tg));
  $pdf->Ln();

  

  
  

  $pdf->Close();
  $pdf->Output('I', 'Terapia-Grupal.pdf');


?>