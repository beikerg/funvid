<?php 

  include("plantilla.php");

  require_once("../ajax/db_connection.php");

  $id_residente = $_GET['id'];

  $mostrar = "SELECT r.*, f.*, p.*, t.*, ap.*, n.* FROM residentes r INNER JOIN familiares f ON f.id_residente = r.id_residente INNER JOIN pareja p on p.id_residente = r.id_residente INNER JOIN tratamiento t on t.id_residente = r.id_residente INNER JOIN apoderado ap ON r.id_residente = ap.id_residente INNER JOIN antecedentes n ON n.id_residente = r.id_residente 
       WHERE r.id_residente = '$id_residente' ";  
      $sql = $mysql->query($mostrar);
 

          while ($data = mysqli_fetch_array($sql)){
          #Residentes
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $fecha = $data['fecha'];
          $sexo = $data['sexo'];
          $rut = $data['rut'];
          $telefono = $data['telefono'];
          $nivel = $data['nivel'];
          $profesion = $data['profesion'];
          $direccion = $data['direccion'];
          $localidad = $data['localidad'];
          $provincia = $data['provincia'];
          $correo = $data['correo'];
          $etapa_resi = $data['etapa_resi'];

          #Familiares
            #Padre 
          $nombre_p = $data['nombre_p'];
          $apellido_p = $data['apellido_p'];
          $fecha_p = $data['fecha_p'];
          $nivel_p = $data['nivel_p'];
          $ocupacion_p = $data['ocupacion_p'];
          $telefono_p = $data['telefono_p'];
          $direccion_p = $data['direccion_p'];
          $tipo_relacion_p = $data['tipo_relacion_p'];

            #Madre

          $m_nombre = $data['m_nombre'];
          $m_apellido = $data['m_apellido'];
          $m_fecha = $data['m_fecha'];
          $m_nivel = $data['m_nivel'];
          $m_ocupacion = $data['m_ocupacion'];
          $m_telefono = $data['m_telefono'];
          $m_direccion = $data['m_direccion'];
          $m_tipo_relacion = $data['m_tipo_relacion'];

          #Pareja

          $pareja_nom = $data['pareja_nom'];
          $pareja_ape = $data['pareja_ape'];
          $pareja_fecha = $data['pareja_fecha'];
          $pareja_ocupa = $data['pareja_ocupa'];
          $pareja_nivel = $data['pareja_nivel'];
          $pareja_nivel = $data['pareja_nivel'];
          $pareja_hijos = $data['pareja_hijos'];
          $pareja_correo = $data['pareja_correo'];
          $pareja_telf = $data['pareja_telf'];
          $pareja_trela = $data['pareja_trela']; 

          #Tratamiento

          $remite = $data['remite'];
          $tanterior = $data['tanterior'];
          $aanterior = $data['aanterior'];
          $tactual  = $data['tactual'];
          $antecedentes = $data['antecedentes'];
          $t_medica = $data['t_medica'];

          #Apoderado

          $nombre_apo = $data['nombre_apo'];
          $apellido_apo = $data['apellido_apo'];
          $rut_apo = $data['rut_apo'];
          $telefono_apo = $data['telefono_apo'];
          $tipo_r_apo = $data['tipo_r_apo'];

          # Antecedentes legales

            $descrip = $data['descrip'];
            $antecedente_lg = $data['antecedente_lg'];
            $tramite_p = $data['tramite_p'];

   
        }
date_default_timezone_set("America/Santiago");

   $cumpleanos = new DateTime($fecha);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
    $edad= $annos->y;

    require_once("../fpdf/fpdf.php");

  class PDFD extends FPDF
  {
    function Header()
    {
      // Logo
    $this->Image('image/CAMINO.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'',0,0,'C');
    // Salto de línea
    $this->Ln(30);
    }

    function Footer()
    {
      // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    }
  }

  $pdf = new PDFD ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 18);
  $pdf->Cell(190, 8, 'Historial Residente', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
 
  // Encabezado de la tabla RGB 174, 214, 241

  $pdf->SetFillColor(232, 232, 232);
  
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, 'Datos Residente ', 0, 1, 'C', 0);

  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(17, 6, 'Nombre: ', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(37, 6, utf8_decode($nombre), 0, 0, '', 0);
  
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(17, 6, 'Apellido: ', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(40, 6, utf8_decode($apellido), 0, 0, '', 0);
  
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(8, 6, 'Rut: ', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(30, 6, utf8_decode($rut), 0, 0, '', 0);
  
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(12, 6, 'Sexo: ', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(20, 6, utf8_decode($sexo) ,0, 1, '', 0);
  
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(22, 6, 'Fecha Nac: ', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(32, 6, date('d-m-Y', strtotime($fecha)), 0, 0, '', 0);
  
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(17, 6, 'Edad:', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(40, 6, utf8_decode($edad), 0, 0, '', 0);

  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(12, 6, 'Etapa: ', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(28, 6, utf8_decode($etapa_resi), 0, 1, '', 0);
  $pdf->Ln();

  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, 'Datos Apoderado ', 0, 1, 'C', 0);

  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(17, 6, 'Nombre: ', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(33, 6, utf8_decode($nombre_apo), 0, 0, '', 0);
  
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(17, 6, 'Apellido: ', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(33, 6, utf8_decode($apellido_apo), 0, 0, '', 0);
  
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(8, 6, 'Rut: ', 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(26, 6, utf8_decode($rut_apo), 0, 0, '', 0);
  
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->Cell(18, 6, utf8_decode('Teléfono:'), 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(20, 6, utf8_decode($telefono_apo) ,0, 1, '', 0);
  $pdf->Ln();


  $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 6, utf8_decode('Etapas '), 0, 1, 'C', 0);
      $pdf->Ln();


      // tbody table
      $pdf->SetFillColor(163, 228, 215);
      $pdf->SetTextColor( 39, 55, 70 );
      $pdf->SetFont('Arial', 'B', 12);

      $pdf->Cell(50, 10, 'Etapa', 0, 0, 'C', 1);
      $pdf->Cell(40, 10, 'Fecha Inicio', 0, 0, 'C', 1);
      $pdf->Cell(40, 10, 'Fecha Termino', 0, 0, 'C', 1);
      $pdf->Cell(50, 10, utf8_decode('Duración'), 0, 1, 'C', 1);
      $pdf->Ln(3);
     
      $pdf->SetFillColor(234, 237, 237);
      $pdf->SetTextColor( 0, 0, 0 );
      $pdf->SetFont('Arial', 'B', 11);

$query = "SELECT * FROM etapa WHERE id_residente = '$id_residente' ";
$result = $mysql->query($query);
$number = 1;
      while($row = mysqli_fetch_assoc($result))
      {
        
        $n = $row['desc_etapa'];
  if($n == 1)
  {
    $pdf->Cell(50, 8, utf8_decode('INTEGRACIÓN'), 0, 0, 'C', 0);
  }
  if($n == 2)
  {
    $pdf->Cell(50, 8, utf8_decode('CONFIANZA'), 0, 0, 'C', 0);
  }
  if($n == 3)
  {
    $pdf->Cell(50, 8, utf8_decode('INICIATIVA'), 0, 0, 'C', 0);

  }
  if($n == 4)
  {
    $pdf->Cell(50, 8, utf8_decode('IDENTIDAD'), 0, 0, 'C', 0);
  }
  if($n == 5)
  {
    $pdf->Cell(50, 8, utf8_decode('TRASCENDENCIA'), 0, 0, 'C', 0);
  }
  if($n == 6)
  {
    $pdf->Cell(50, 8, utf8_decode('EDUCADOR 1'), 0, 0, 'C', 0);
  }
  if($n == 7)
  {
    $pdf->Cell(50, 8, utf8_decode('EDUCADOR 2'), 0, 0, 'C', 0);
  }
  if($n == 8)
  {
    
    $pdf->Cell(50, 8, utf8_decode('EDUCADOR 3'), 0, 0, 'C', 0);
  }
  if($n == 9)
  {
    
    $pdf->Cell(50, 8, utf8_decode('EDUCADOR 4'), 0, 0, 'C', 0);
  }
  if($n == 10)
  {
    
    $pdf->Cell(50, 8, utf8_decode('REDUCADO'), 0, 0, 'C', 0);
  }     
$pdf->SetFont('Arial', '', 12);
  $pdf->Cell(40, 8, date('d-m-Y', strtotime($row['fecha_inicio_etapa'])), 0, 0, 'C', 0);
        
       
        $ft = $row['fecha_fin_etapa'];
          if($ft == '0000-00-00')
          {
            $pdf->Cell(40, 8, utf8_decode(' Actual '), 0, 0, 'C', 0);
          }else{
            $pdf->Cell(40, 8, date('d-m-Y',strtotime($ft)), 0, 0, 'C', 0);
          }
          

$Dhoy = date('Y-m-d');
$date1 = new DateTime($row['fecha_inicio_etapa']);
$o_ff = $row['fecha_fin_etapa'];
    
  if($o_ff == "0000-00-00") 
  {
    $ff = $Dhoy;
  }else{
    $ff = $o_ff;
  }
  $date2 = new DateTime($ff);
  $df = $date1->diff($date2);


    $fd = "";
    $fd .= ($df->invert == 1) ? ' - ' : '';
    if ($df->d == 0 and $df->m == 0){
      $fd .= ' Hoy ';
      
    }
    if ($df->y > 0) {
        // Años
        $fd .= ($df->y > 1) ? $df->y . ' Años ' : $df->y . ' Año ';
        
    } if ($df->m > 0) {
        // Meses
        $fd .= ($df->m > 1) ? $df->m . ' Meses ' : $df->m . ' Mes ';
        
    } if ($df->d > 0) {
        // Dias 
        $fd .= ($df->d > 1) ? $df->d . ' Días ' : $df->d . ' Dia ';
        
      }

      $pdf->Cell(50, 8, utf8_decode($fd), 0, 0, 'C', 0);
  $pdf->Ln();
  
    }
    $pdf->Ln();
   
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, 'Tratamientos Anteriores ', 0, 1, 'C', 0);

  

if(isset($remite) && $remite != "")
{
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, utf8_decode('¿Quién lo remite?'), 0, 1, '', 0);

  $pdf->SetFont('Arial', '', 11);
  $pdf->Write(5, utf8_decode($remite));
  $pdf->Ln();
  $pdf->Ln();
}

if(isset($tanterior) && $tanterior != "")
{
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, utf8_decode('Tratamientos psicologicos anteriores'), 0, 1, '', 0);

  $pdf->SetFont('Arial', '', 11);
  $pdf->Write(5, utf8_decode($tanterior));
  $pdf->Ln();
  $pdf->Ln();
}

if(isset($aanterior) && $aanterior != "")
{
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, utf8_decode('Antecedentes medicos anteriores'), 0, 1, '', 0);

  $pdf->SetFont('Arial', '', 11);
  $pdf->Write(5, utf8_decode($aanterior));
  $pdf->Ln();
  $pdf->Ln();
}

if(isset($tactual) && $tactual  != "")
{
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, utf8_decode('Tratamientos actuales'), 0, 1, '', 0);

  $pdf->SetFont('Arial', '', 11);
  $pdf->Write(5, utf8_decode($tactual));
  $pdf->Ln();
  $pdf->Ln();
}

if(isset($t_medica) && $t_medica != "")
{
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, utf8_decode('Toma medicamentos'), 0, 1, '', 0);

  $pdf->SetFont('Arial', '', 11);
  $pdf->Write(5, utf8_decode($t_medica));
  $pdf->Ln();
  $pdf->Ln();
}

if(isset($antecedentes) && $antecedentes != "")
{
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, utf8_decode('Antecedentes Medicos Familiares'), 0, 1, '', 0);

  $pdf->SetFont('Arial', '', 11);
  $pdf->Write(5, utf8_decode($antecedentes));
  $pdf->Ln();
  $pdf->Ln();
}

 

  if(isset($descrip) && $descrip != "")
{
  
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 6, utf8_decode('Temas legales'), 0, 1, 'C', 0);

}


if(isset($descrip) && $descrip == 'si')
{
  if(isset($antecedente_lg) && $antecedente_lg != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 6, utf8_decode('Antecedentes: '), 0, 1, '', 0);

      $pdf->SetFont('Arial', '', 11);
      $pdf->Write(5, utf8_decode($antecedente_lg));
      $pdf->Ln();
      $pdf->Ln();
    }

    if(isset($tramite_p) && $tramite_p != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 6, utf8_decode('Tramites o temas pendientes: '), 0, 1, '', 0);

      $pdf->SetFont('Arial', '', 11);
      $pdf->Write(5, utf8_decode($tramite_p));
      $pdf->Ln();
      $pdf->Ln();
    }
}
  if(isset($descrip) && $descrip == 'no')
    {
      $pdf->SetFont('Arial', 'B', 11);
      $pdf->Write(5, utf8_decode('Posee Antecedentes legales: '."\t"));
      $pdf->SetFont('Arial', '', 11);
      $pdf->Write(5, utf8_decode('No posee.'));
      $pdf->Ln();
      $pdf->Ln();
    }

  





    

  $pdf->Ln(20);
 
  

  $pdf->Close();
  $pdf->Output('I', 'Lista-Residentes.pdf');


?>