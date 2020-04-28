<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");

  $query = $mysql->query("SELECT * FROM psicologos");

  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(190, 7, 'Lista de Psicologos registrados', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  
  // Encabezado de la tabla RGB 174, 214, 241

  $pdf->SetFillColor(232, 232, 232);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(30, 7, 'NOMBRE', 1, 0, 'C', 1);
  $pdf->Cell(30, 7, 'APELLIDO', 1, 0, 'C', 1);
  $pdf->Cell(32, 7, 'RUT', 1, 0, 'C', 1);
  $pdf->Cell(45, 7, 'CORREO', 1, 0, 'C', 1);
  $pdf->Cell(32, 7, 'FECHA', 1, 1, 'C', 1);

  $pdf->SetFont('Arial', '', 10);
  while($data = $query->fetch_assoc())

    // date("d/m/Y", strtotime($originalDate))
  {
      $pdf->Cell(30, 6, $data['nombre'], 1, 0, 'C');
      $pdf->Cell(30, 6, $data['apellido'], 1, 0, 'C');
      $pdf->Cell(32, 6, $data['rut'], 1, 0);
      $pdf->Cell(45, 6, $data['correo'], 1, 0);
      $pdf->Cell(32, 6, date("d-m-Y",strtotime($data['fecha'])), 1, 1);
  }

  $pdf->Close();
  $pdf->Output('I', 'Psicologos-Registrados.pdf');


?>