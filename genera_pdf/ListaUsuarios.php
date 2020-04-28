<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");


  $query = $mysql->query("SELECT * FROM usuarios");



  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(190, 7, 'Lista de usuarios registrados', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  
  // Encabezado de la tabla RGB 174, 214, 241

  $pdf->SetFillColor(232, 232, 232);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(60, 7, 'NOMBRE', 1, 0, 'C', 1);
  $pdf->Cell(60, 7, 'USUARIO', 1, 0, 'C', 1);
  $pdf->Cell(60, 7, 'PRIVILEGIO', 1, 1, 'C', 1);

  $pdf->SetFont('Arial', '', 10);
  while($data = $query->fetch_assoc())
  {
      $pdf->Cell(60, 6, $data['nombre'], 1, 0, 'C');
      $pdf->Cell(60, 6, $data['usuario'], 1, 0, 'C');
      $pdf->Cell(60, 6, $data['tipo_usuario'], 1, 1);

  }

  $pdf->Close();
  $pdf->Output('I', 'Usuarios-Registrados.pdf');


?>