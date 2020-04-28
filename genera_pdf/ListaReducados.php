<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");


  $query = $mysql->query("SELECT * FROM residentes WHERE id_etapa_resi = '10' ");



  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(190, 7, 'Lista de Reducados', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  
  // Encabezado de la tabla RGB 174, 214, 241

  $pdf->SetFillColor(232, 232, 232);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(8, 7, utf8_decode('No.'), 1, 0, 'C', 1);
  $pdf->Cell(35, 7, 'Nombre', 1, 0, 'C', 1);
  $pdf->Cell(35, 7, 'Apellido', 1, 0, 'C', 1);
  $pdf->Cell(26, 7, 'Rut', 1, 0, 'C', 1);
  $pdf->Cell(36, 7, 'Telefono', 1, 0, 'C', 1);
  $pdf->Cell(50, 7, 'Correo', 1, 1, 'C', 1);


  $pdf->SetFont('Arial', '', 10);
  $num = 1;
  while($data = $query->fetch_assoc())
  {
      $pdf->Cell(8,6, $num, 1, 0, 'C');
      $pdf->Cell(35, 6, utf8_decode($data['nombre']), 1, 0);
      $pdf->Cell(35, 6, utf8_decode($data['apellido']), 1, 0);
      $pdf->Cell(26, 6, utf8_decode($data['rut']), 1, 0, 'C');
      $pdf->Cell(36, 6, utf8_decode($data['telefono']), 1, 0, 'C');
      $pdf->Cell(50, 6, utf8_decode($data['correo']), 1, 1, 'C');
      $num++;
  }

  $pdf->Close();
  $pdf->Output('I', 'Lista-Reducados.pdf');


?>