<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");
  $fHoy = date('Y-m-d');

  $query = $mysql->query("SELECT r.id_residente, r.nombre, r.apellido, a.* FROM residentes r INNER JOIN ayuda a ON r.id_residente = a.id_residente WHERE a.fecha_fin_ayuda >= '$fHoy' ");


  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(190, 7, 'Lista de ayudas', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  
  // Encabezado de la tabla RGB 174, 214, 241

  $pdf->SetFillColor(232, 232, 232);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(10, 7, utf8_decode('No.'), 1, 0, 'C',1);
  $pdf->Cell(30, 7, 'NOMBRE', 1, 0, 'C', 1);
  $pdf->Cell(30, 7, 'APELLIDO', 1, 0, 'C', 1);
  $pdf->Cell(45, 7, 'AYUDAS', 1, 0, 'C', 1);
  $pdf->Cell(38, 7, 'FECHA INICIO', 1, 0, 'C', 1);
  $pdf->Cell(38, 7, 'FECHA TERMINO', 1, 1, 'C', 1);



  $pdf->SetFont('Arial', '', 10);
  $num = 1;
  while($data = $query->fetch_assoc())

    // date("d/m/Y", strtotime($originalDate))
  {
      $pdf->Cell(10, 6, $num, 1, 0, 'C');
      $pdf->Cell(30, 6, utf8_decode($data['nombre']), 1, 0, 'C');
      $pdf->Cell(30, 6, utf8_decode($data['apellido']), 1, 0, 'C');
      $pdf->Cell(45, 6, utf8_decode($data['ayuda']) , 1, 0, 'C');
      $pdf->Cell(38, 6, date("d-m-Y",strtotime($data['fecha_inicio_ayuda'])), 1, 0, 'C');
      $pdf->Cell(38, 6, date("d-m-Y",strtotime($data['fecha_fin_ayuda'])), 1, 0, 'C');
      $num++;
  }

  $pdf->Close();
  $pdf->Output('I', 'Ayudas.pdf');


?>