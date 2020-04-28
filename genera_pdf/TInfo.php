<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");

  $id_ti = $_GET['id'];
  

  $query = $mysql->query("SELECT * FROM tera_inf WHERE id_ti = '$id_ti'");


while ($data = mysqli_fetch_array($query)){
         
          $id_ti = $data['id_ti'];
          $director_ti = $data['director_ti'];
          $fecha_ti = $data['fecha_ti'];
          $h_inicio_ti = $data['h_inicio_ti'];
          $h_fin_ti = $data['h_fin_ti'];
          $tematica_ti = $data['tematica_ti'];
          $obj_ti = $data['obj_ti'];
          $obser_ti = $data['obser_ti'];
        

        }


  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->SetMargins(15,15,15,15);
  $pdf->Cell(190, 7, 'Terapia Relato de pase', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  
  // Encabezado de la tabla RGB 174, 214, 241

  $pdf->SetFillColor(232, 232, 232);
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Director: ', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($director_ti), 0, 0, '', 0);
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, utf8_decode('Temática: '), 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($tematica_ti), 0, 0, '', 0);
  $pdf->Ln();
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Fecha:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, date('d-m-Y', strtotime($fecha_ti)), 0, 0, '', 0);
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, '', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode(''), 0, 0, '', 0);
  $pdf->Ln();
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Hr. Inicio:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($h_inicio_ti), 0, 0, '', 0);
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(30, 7, 'Hr. Termino:', 0, 0, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, utf8_decode($h_fin_ti), 0, 0, '', 0);
  $pdf->Ln(15);


  
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 7, '    Objetivos trabajados:', 0, 1, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Write(5, utf8_decode($obj_ti));
  $pdf->Ln(8);
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 7, '    Observaciones generales:', 0, 1, '', 0);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Write(5, utf8_decode($obser_ti));
  $pdf->Ln(8);



  

  
  

  $pdf->Close();
  $pdf->Output('I', 'Terapia-Grupal.pdf');


?>