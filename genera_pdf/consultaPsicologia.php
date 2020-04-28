<?php 

  if(isset($_GET['id']) && isset($_GET['consul'])){

    $id_residente = $_GET['id'];
    $id_consulta = $_GET['consul'];
  }

  include("plantilla.php");

  include("../ajax/db_connection.php");



  $query = $mysql->query("SELECT r.*, f.*, p.*, t.*, c.*, a.*, o.*, s.*, an.*, ap.*, n.* FROM residentes r INNER JOIN familiares f ON f.id_residente = r.id_residente INNER JOIN pareja p on p.id_residente = r.id_residente INNER JOIN tratamiento t on t.id_residente = r.id_residente INNER JOIN consultap c ON c.id_residente = r.id_residente INNER JOIN apoderado ap ON ap.id_residente = r.id_residente INNER JOIN antecedentes n ON n.id_residente = r.id_residente INNER JOIN area a ON a.id_consulta = c.id_consulta INNER JOIN objetivo o ON o.id_consulta = c.id_consulta INNER JOIN seguimiento s ON s.id_consulta = c.id_consulta INNER JOIN analisis an ON an.id_consulta = c.id_consulta WHERE r.id_residente = '$id_residente' and c.id_consulta = '$id_consulta' ");

            while ($data = mysqli_fetch_array($query)){
          #Residentes
          
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
          $tactual = $data['tactual'];
          $antecedentes = $data['antecedentes'];
          $t_medica = $data['t_medica'];

          #Apoderado

          $nombre_apo = $data['nombre_apo'];
          $apellido_apo = $data['apellido_apo'];
          $rut_apo = $data['rut_apo'];
          $telefono_apo = $data['telefono_apo'];
          $tipo_r_apo = $data['tipo_r_apo'];

          # Antecedentes Legales

          $descrip = $data['descrip'];
          $antecedente_lg = $data['antecedente_lg'];
          $tramite_p = $data['tramite_p'];

          #Consulta (Tabla)

          $id_consulta = $data['id_consulta'];
          $id_psicolog = $data['id_psicolog'];
          $motivo = $data['motivo'];
          $categoria = $data['categoria'];
          $fecha_c = $data['fecha_c'];
          $etapa = $data['etapa'];

          #Area

          $id_area = $data['id_area'];
          $familiar = $data['familiar'];
          $social = $data['social'];
          $laboral = $data['laboral'];
          $academica = $data['academica'];
          $afectiva = $data['afectiva'];
          $conyugal = $data['conyugal'];

          #Objetivo

          $id_objetivo = $data['id_objetivo'];
          $objetivo = $data['objetivo'];
          $apariencia = $data['apariencia'];
          $recomendacion = $data['recomendacion'];

          #Seguimiento 

          $id_seguir = $data['id_seguir'];
          $ante_relevantes = $data['ante_relevantes'];
          $rela_familiares = $data['rela_familiares'];
          $craving = $data['craving'];
          $rela_resi = $data['rela_resi'];
          $comen_session = $data['comen_session'];

          #Analisis

          $id_analisis = $data['id_analisis'];
          $antecedentes = $data['antecedentes'];
          $conductas = $data['conductas'];
          $consecuencia = $data['consecuencia'];


        }


  $pdf = new PDF ();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  // titulo de la pagina.
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(190, 7, 'Consulta Psicologia', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  

  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(20, 6, utf8_decode('Nombre:'), 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(45, 6, utf8_decode($nombre), 0, 0, '', 0);
  
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(20, 6, utf8_decode('Apellido:'), 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(45, 6, utf8_decode($apellido), 0, 0, '', 0);

  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(10, 6, utf8_decode('Rut:'), 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 6, utf8_decode($rut), 0, 1, '', 0);

    //Siguiente línea.
  $pdf->SetFont('Arial', 'B', 12);  
  $pdf->Cell(40, 6, utf8_decode('Fecha de consulta: '), 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(30, 6, date('d-m-Y', strtotime($fecha_c)), 0, 0, '', 0);
  
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(15, 6, utf8_decode('Etapa: '), 0, 0, '', 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(95, 6, utf8_decode($etapa), 0, 1, '', 0);
  $pdf->Ln(15);


  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(180, 7, utf8_decode('Motivo de consulta: '), 0, 1, 'L', 0);
   $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(180,5, utf8_decode($motivo) ,0, 'J',0);
  $pdf->Ln();



  // ---------      AREA        ---------------------- ///
  if(isset($familiar) && $familiar != "" || isset($social) && $social != "" || isset($laboral) && $laboral != "" || isset($afectiva) && $afectiva != "" || isset($conyugal) && $conyugal != "" ){

    // Título Área
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(180, 7, utf8_decode('Área '), 0, 1, 'C', 0);

    // Familiar
    if(isset($familiar) && $familiar != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Familiar: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($familiar) ,0, 'J',0);
      $pdf->Ln();
    }

    // Social
    if(isset($social) && $social != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Solical: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($social) ,0, 'J',0);
      $pdf->Ln();
    }

    // Laboral
    if(isset($laboaral) && $laboaral != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Laboaral - Económica: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($laboaral) ,0, 'J',0);
      $pdf->Ln();
    }

    // Academica
    if(isset($academica) && $academica != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Academica: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($academica) ,0, 'J',0);
      $pdf->Ln();
    }

    // Afectiva
    if(isset($afectiva) && $afectiva != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Afectiva: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($afectiva) ,0, 'J',0);
      $pdf->Ln();
    }



    // Conyugal
    if(isset($conyugal) && $conyugal != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Conyugal: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($conyugal) ,0, 'J',0);
      $pdf->Ln();
    }
  }

  // ------------------------ OBJETIVOS ---------------- //
  if(isset($objetivo) && $objetivo != "" || isset($apariencia) && $apariencia != "" || isset($recomendacion) && $recomendacion != "")
  {

    // Título Objetivo
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(180, 7, utf8_decode('Objetivos '), 0, 1, 'C', 0);

    // objetivo
    if(isset($objetivo) && $objetivo != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Objetivos: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($objetivo) ,0, 'J',0);
      $pdf->Ln();
    }

    // Apariencia
    if(isset($apariencia) && $apariencia != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Apariencia: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($apariencia) ,0, 'J',0);
      $pdf->Ln();
    }

    // Apariencia
    if(isset($recomendacion) && $recomendacion != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Recomendación: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($recomendacion) ,0, 'J',0);
      $pdf->Ln();
    }
  }


  //--------------------------      SEGUIMIENTO ---------------------//
  if(isset($ante_relevantes) && $ante_relevantes != "" || isset($rela_familiares) && $rela_familiares != "" || isset($craving) && $craving != "" || isset($rela_resi) && $rela_resi != "" || isset($comen_session) && $comen_session != "")
  {
    // Título Seguimiento
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(180, 7, utf8_decode('Seguimiento '), 0, 1, 'C', 0);

    // Antecedentes Relevantes
    if(isset($ante_relevantes) && $ante_relevantes != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Antecedentes Relavantes: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($ante_relevantes) ,0, 'J',0);
      $pdf->Ln();
    }

    // Relacion Familiar
    if(isset($rela_familiares) && $rela_familiares != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Relaciones familiares: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($rela_familiares) ,0, 'J',0);
      $pdf->Ln();
    }

    // Craving
    if(isset($craving) && $craving != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Situaciones de craving o crisis de abstinencia: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($craving) ,0, 'J',0);
      $pdf->Ln();
    }

    // Comentarios de sección
    if(isset($comen_session) && $comen_session != "")
    {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(180, 8, utf8_decode('Comentarios de sección: '), 0, 1, '', 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(180,5, utf8_decode($comen_session) ,0, 'J',0);
      $pdf->Ln();
    }
  }



// -------------------------- ANALISIS -------------- //
  if(isset($antecedentes) && $antecedentes != "" || isset($conductas) && $conductas != "" || isset($consecuencias) && $consecuencias != "")
  {
    // Título Análisis
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(180, 7, utf8_decode('Análisis '), 0, 1, 'C', 0);

       // Antecedentes
      if(isset($antecedentes) && $antecedentes != "")
      {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(180, 8, utf8_decode('Antecedentes: '), 0, 1, '', 0);
          $pdf->SetFont('Arial', '', 12);
          $pdf->MultiCell(180,5, utf8_decode($antecedentes) ,0, 'J',0);
        $pdf->Ln();
      }

       // Conductas
      if(isset($conductas) && $conductas != "")
      {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(180, 8, utf8_decode('Conductas: '), 0, 1, '', 0);
          $pdf->SetFont('Arial', '', 12);
          $pdf->MultiCell(180,5, utf8_decode($conductas) ,0, 'J',0);
        $pdf->Ln();
      } 

       // Consecuencias
      if(isset($consecuencias) && $consecuencias != "")
      {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(180, 8, utf8_decode('Consecuencias: '), 0, 1, '', 0);
          $pdf->SetFont('Arial', '', 12);
          $pdf->MultiCell(180,5, utf8_decode($consecuencias) ,0, 'J',0);
        $pdf->Ln();
      }
  }



  $pdf->Close();
  $pdf->Output('I', 'Consulta-Psicoliga.pdf');


?>