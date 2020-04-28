<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");

  $id_residente = $_GET['id'];
  $id_t_pase = $_GET['tera'];

  $query = $mysql->query("SELECT r.id_residente, r.nombre, r.apellido, r.sexo, r.etapa_resi, r.fecha, t.* FROM residentes r INNER JOIN tera_pase t ON t.id_residente = r.id_residente  WHERE t.id_t_pase = '$id_t_pase' AND t.id_residente = '$id_residente'");


while ($data = mysqli_fetch_array($query)){
          $id_residente = $data['id_residente'];

          $etapa_resi = $data['etapa_resi'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];
          $nombre_lider = $data['nombre_lider'];
          $nombre_colider = $data['nombre_colider'];
          $nombre_director = $data['nombre_director'];
          $fecha_t = $data['fecha_t'];
          $h_inicio = $data['h_inicio'];
          $h_fin = $data['h_fin'];
          $experiencia_r = $data['experiencia_r'];
          $o_lider = $data['o_lider'];
          $o_colider = $data['o_colider'];
          $o_director = $data['o_director'];


        }


  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  // $pdf->SetMargins(15,15,15,15);
  $pdf->Cell(190, 7, 'Terapia Relato de pase', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  
  // Encabezado de la tabla RGB 174, 214, 241


  $pdf->SetFillColor(232, 232, 232);
 // NOMBRE RESIDENTE
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Nombre: ', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($nombre), 0, 0, '', 0);
  
  // NOMBRE LIDER
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Lider:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($nombre_lider) && $nombre_lider != ""){
   $pdf->Cell(60, 7, utf8_decode($nombre_lider), 0, 0, '', 0); 
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0); 
  }
  
  $pdf->Ln();

  // ETAPA RESIDENTE
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Etapa:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($etapa_resi), 0, 0, '', 0);

  // NOMBRE COLIDER
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'C/Lider:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($nombre_colider) & $nombre_colider != ""){
    $pdf->Cell(60, 7, utf8_decode($nombre_colider), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  $pdf->Ln();

  // FECHA DE TERPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Fecha:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, date('d-m-Y', strtotime($fecha_t)), 0, 0, '', 0);

  // NOMBRE DIRECTOR DE TERAPIA
  
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Director:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  if(isset($nombre_director) && $nombre_director != ""){
    $pdf->Cell(60, 7, utf8_decode($nombre_director), 0, 0, '', 0);
  }else{
    $pdf->Cell(60, 7, utf8_decode(' - '), 0, 0, '', 0);
  }
  
  $pdf->Ln();

// HORA INICIO TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(22, 7, 'Hr. Inicio:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(70, 7, utf8_decode($h_inicio), 0, 0, '', 0);

  // HORA TERMINO TERAPIA
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Hr. Termino:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($h_fin), 0, 0, '', 0);
  $pdf->Ln(15);


  // OBSERVACIONES DE EXPERIENCIA 
  if(isset($experiencia_r) && $experiencia_r != ""){
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(180, 7, 'Observaciones de Experiencia Residente', 0, 1, 'C', 0);
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($experiencia_r));
    $pdf->Ln(10); 
  }

  if(isset($o_director) && $o_director != ""){
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 7, '    Observaciones Director:', 0, 1, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Write(5, utf8_decode($o_director));
  $pdf->Ln(8);  
  }
  

  if(isset($o_lider) && $o_lider != ""){
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 7, '    Observaciones Lider:', 0, 1, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Write(5, utf8_decode($o_lider));
  $pdf->Ln(8); 
  }
  

  if(isset($o_colider) && $o_colider != ""){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(180, 7, '    Observaciones C/Lider:', 0, 1, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Write(5, utf8_decode($o_colider));
    $pdf->Ln(8);
  }
  

  

  
  

  $pdf->Close();
  $pdf->Output('I', 'Terapia-Relato-Pase.pdf');


?>