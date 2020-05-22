  <?php
 
  include("include/rol.php");

    require_once("ajax/db_connection.php");

    if(empty($_GET['id']) || empty($_GET['tera'])){
      header("location: ListaTEspecial.php");
    }


    $id_residente = $_GET['id'];
    $id_especial = $_GET['tera'];

    $q = "SELECT r.nombre, r.apellido, r.sexo, r.fecha, t.* FROM residentes r INNER JOIN especial t ON t.id_residente = r.id_residente WHERE t.id_residente = '$id_residente' AND t.id_especial = '$id_especial' ";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaTEspecial.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];
          $id_especial = $data['id_especial'];
          $lider_te = $data['lider_te'];
          $colider_te = $data['colider_te'];
          $solicita_te = $data['solicita_te'];
          $fecha_te = $data['fecha_te'];
          $h_inicio_te = $data['h_inicio_te'];
          $h_fin_te = $data['h_fin_te'];        
          $o_lider_te = $data['o_lider_te'];
          $o_colider_te = $data['o_colider_te'];
          $o_solicita_te = $data['o_solicita_te'];
          $actitud_te = $data['actitud_te'];
          $etapa_te = $data['etapa_te'];
          
          $fallas = explode(', ', $data['fallas_te']); 
        }
      }

    date_default_timezone_set("America/Santiago");

   $cumpleanos = new DateTime($fecha);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
    $edad= $annos->y;
  
    

    ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  
  <title>FUNVID | Terapia Especial</title>
  <?php include("include/head.php"); ?>
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 

  //-- Main Header -->
  include("include/header.php");

  //-- Left side column. contains the logo and sidebar -->

  include("include/aside-admin.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Terapia Especial
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Terapeuta</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Terapia Especial</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    
  

       <form action="ajax/terapias/especial/editarEspecial.php?id=<?php echo $id_residente; ?>&tera=<?php echo $id_especial; ?>" method="POST">
      
            
          
          <!-- // INICIO BOX // -->
            
                <div class="row">
        <div class="col-md-12">
          <div class="box box-default  box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de Residente</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <!-- // INICIO DEL BODY DEL BOX //-->
              <div class="containe">
                 
                 <input type="hidden" name="id_especial" value="<?php echo $id_especial; ?>"> 
                
                 <input type="hidden" name="id_residente" value="<?php echo $id_residente; ?>" >
                    <div class="row">
                      <div class="form-group col-md-3">
                         <label>Nombre:</label>
                          <input class="form-control" type="text"  value="<?php echo $nombre; ?>" disabled>
                      </div>
                      
                      <div class="form-group col-md-3">                          
                        <label>Apellido</label>
                        <input class="form-control" type="text" value="<?php echo $apellido; ?>" disabled>
                      </div>
                      
                      <div class="form-group col-md-2">
                          <label>Edad:</label>
                          <input class="form-control" type="text" value="<?php echo $edad; ?>" disabled>
                      </div>

                      <div class="form-group col-md-2">
                        <label>Etapa actual:</label> 
                        <select class="form-control" name="etapa_te" id="etapa_ta">
                          <option placeholder="Seleccionar etapa.." value="<?php echo $etapa_te; ?>"><?php echo $etapa_te; ?></option>
                          <option value="INTEGRACIÓN">INTEGRACIÓN</option>
                          <option value="CONFIANZA">CONFIANZA</option>
                          <option value="INICIATIVA">INICIATIVA</option>
                          <option value="IDENTIDAD">IDENTIDAD</option>
                          <option value="TRASCENDENCIA">TRASCENDENCIA</option>
                          <option value="EDUCADOR-1">EDUCADOR 1</option>
                          <option value="EDUCADOR-2">EDUCADOR 2</option>
                          <option value="EDUCADOR-3">EDUCADOR 3</option>
                          <option value="EDUCADOR-4">EDUDADOR 4</option>
                          <option value="REDUCADO">REDUCADO</option>
                          <option value="ABANDONO">ABANDONO</option>
                         </select>
                        
                      </div>
                      
                      <div class="form-group col-md-2">
                          <label>Sexo:</label>
                          <input class="form-control" type="text" value="<?php echo $sexo; ?>" disabled>
                      </div>
                    </div>
                 
              </div> 
              <!-- // FIN DEL BODY DEÑL BOX // -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
            
            <!-- // FIN DEL BOX // -->            
        </div>
           
                  <!-- // INICIO BOX 2 // -->
            
                <div class="row">
        <div class="col-md-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de Terapia</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <!-- // INICIO DEL BODY DEL BOX //-->
              <div class="containe">
                 <br>
                  
                     <div class="row">
                      <div class="form-group col-md-4">
                         <label>Nombre Lider:</label>
                          <input class="form-control" type="text" name="lider_te" id="lider_te" value="<?php echo $lider_te; ?>">
                      </div> 

                      <div class="form-group col-md-4">                          
                              <label>Nombre Colider:</label>
                              <input class="form-control" type="text" name="colider_te" id="colider_te" value="<?php echo $colider_te; ?>">                          
                      </div>
                      
                      <div class="form-group col-md-4">                          
                              <label>Solicitante:</label>
                              <input class="form-control" type="text" name="solicita_te" id="solicita_te" placeholder="¿Quién solicita la terapia" value="<?php echo $solicita_te; ?>">                          
                      </div>
                     </div> 
                      
                      <br>
                      
                      <div class="row">
                      
                <div class="form-group col-md-4">
                    <label>Fecha:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="fecha_te" class="form-control pull-right" value="<?php echo $fecha_te; ?>">
                </div>
                <!-- /.input group -->
              </div>
                      
                      
                      <div class="form-group col-md-4">
                          <label>Hora inicio:</label>
                          <input class="form-control" name="h_inicio_te" type="time" value="<?php echo $h_inicio_te; ?>">
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Hora termino:</label>
                          <input class="form-control" name="h_fin_te" type="time" value="<?php echo $h_fin_te; ?>" >
                      </div>
                      </div> <!--// FIN DEL FORN-INLINE//-->
                 
              </div> 
              <!-- // FIN DEL BODY DEÑL BOX // -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
            
            <!-- // FIN DEL BOX  2// --> 
                </div>   
    

    

      <div class="box box-default collapsed-box box-solid">

      <div class="box-header with-border">
        <h3 class="box-title">Fallas</h3>
      
      <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
          </div>
        <div class="box-body">
            
          <br>
                    
          <div class="col-sm-3">
            <div class="box-body">
              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.HIGIENICO" class="flat-red" <?php in_array('P.HIGIENICO', $fallas) ? print "checked" : "";  ?>>
                  P.HIGIENICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="CONFRONTA" class="flat-red" <?php in_array('CONFRONTA', $fallas) ? print "checked" : "";  ?>>
                  CONFRONTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="COJERCE PENA" class="flat-red" <?php in_array('COJERCE PENA', $fallas) ? print "checked" : "";  ?>>
                  COJERCE PENA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE PROYECTA" class="flat-red" <?php in_array('SE PROYECTA', $fallas) ? print "checked" : "";  ?>>
                  SE PROYECTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="LLEVAR BRIG." class="flat-red" <?php in_array('LLEVAR BRIG.', $fallas) ? print "checked" : "";  ?>>
                   LLEVAR BRIG.
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRRITABLE" class="flat-red" <?php in_array('IRRITABLE', $fallas) ? print "checked" : "";  ?>>
                  IRRITABLE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MELANCOLICO" class="flat-red" <?php in_array('MELANCOLICO', $fallas) ? print "checked" : "";  ?>>
                  MELANCOLICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE RECRIMINA" class="flat-red" <?php in_array('SE RECRIMINA', $fallas) ? print "checked" : "";  ?>>
                  SE RECRIMINA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MAL TACTO" class="flat-red" <?php in_array('MAL TACTO', $fallas) ? print "checked" : "";  ?>>
                  MAL TACTO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE LIMITA" class="flat-red" <?php in_array('SE LIMITA', $fallas) ? print "checked" : "";  ?>>
                  SE LIMITA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESC. SEÑALAMIENTO" class="flat-red" <?php in_array('DESC. SEÑALAMIENTO', $fallas) ? print "checked" : "";  ?>>
                  DESC. SEÑALAMIENTO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESC. FRUSTRACION" class="flat-red" <?php in_array('DESC. FRUSTRACION', $fallas) ? print "checked" : "";  ?>>
                  DESC. FRUSTRACION 
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO SE DEJA LLEVAR" class="flat-red" <?php in_array('NO SE DEJA LLEVAR', $fallas) ? print "checked" : "";  ?>>
                  NO SE DEJA LLEVAR
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MANIPULA" class="flat-red" <?php in_array('MANIPULA', $fallas) ? print "checked" : "";  ?>>
                  MANIPULA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MONTA PRESION" class="flat-red" <?php in_array('MONTA PRESION', $fallas) ? print "checked" : "";  ?>>
                  MONTA PRESION
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DISTRAIDO" class="flat-red" <?php in_array('DISTRAIDO', $fallas) ? print "checked" : "";  ?> >
                  DISTRAIDO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INCONSIENTE" class="flat-red" <?php in_array('INCONSIENTE', $fallas) ? print "checked" : "";  ?> >
                  INCONSIENTE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INCONSECUENTE" class="flat-red" <?php in_array('INCONSECUENTE', $fallas) ? print "checked" : "";  ?> >
                  INCONSECUENTE
                </label>
              </div>
               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.INDUSTRIOSO" class="flat-red" <?php in_array('P.INDUSTRIOSO', $fallas) ? print "checked" : "";  ?> >
                  P.INDUSTRIOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MIDE CONTROLES" class="flat-red" <?php in_array('MIDE CONTROLES', $fallas) ? print "checked" : "";  ?> >
                  MIDE CONTROLES
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO B.GENERATIVIDAD" class="flat-red" <?php in_array('NO B.GENERATIVIDAD', $fallas) ? print "checked" : "";  ?>>
                  NO B.GENERATIVIDAD
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE JUSTIFICA" class="flat-red" <?php in_array('SE JUSTIFICA', $fallas) ? print "checked" : "";  ?>>
                  SE JUSTIFICA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRONICO" class="flat-red" <?php in_array('IRONICO', $fallas) ? print "checked" : "";  ?>>
                  IRONICO
                </label>
              </div> 

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MIRA A MODO PERSONAL" class="flat-red" <?php in_array('MIRA A MODO PERSONAL', $fallas) ? print "checked" : "";  ?>>
                  MIRA A MODO PERSONAL
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IDEACIÓN DE ABANDONO" class="flat-red" <?php in_array('IDEACIÓN DE ABANDONO', $fallas) ? print "checked" : "";  ?>>
                  IDEACIÓN DE ABANDONO
                </label>
              </div>

            </div>
          </div>

         <div class="col-sm-3">
          <div class="box-body">
            
             <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SALE EN ACTITUD" class="flat-red" <?php in_array('SALE EN ACTITUD', $fallas) ? print "checked" : "";  ?>>
                  SALE EN  ACTITUD
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.MECANISMO" class="flat-red" <?php in_array('P.MECANISMO', $fallas) ? print "checked" : "";  ?> >
                  P.MECANISMO
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE AISLA" class="flat-red" <?php in_array('SE AISLA', $fallas) ? print "checked" : "";  ?>>
                  SE AISLA
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="EVADE" class="flat-red" <?php in_array('EVADE', $fallas) ? print "checked" : "";  ?>>
                  EVADE
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="REGRESIONA" class="flat-red" <?php in_array('REGRESIONA', $fallas) ? print "checked" : "";  ?>>
                  REGRESIONA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="RENCOROSO" class="flat-red" <?php in_array('RENCOROSO', $fallas) ? print "checked" : "";  ?>>
                  RENCOROSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MALOS MODALES" class="flat-red" <?php in_array('MALOS MODALES', $fallas) ? print "checked" : "";  ?>>
                  MALOS MODALES
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.TRASCENDENCIA" class="flat-red" <?php in_array('P.TRASCENDENCIA', $fallas) ? print "checked" : "";  ?>>
                  P.TRASCENDENCIA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRRESPETUOSO" class="flat-red" <?php in_array('IRRESPETUOSO', $fallas) ? print "checked" : "";  ?>>
                  IRRESPETUOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INMADURO" class="flat-red" <?php in_array('INMADURO', $fallas) ? print "checked" : "";  ?>>
                  INMADURO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MASETEA" class="flat-red" <?php in_array('MASETEA', $fallas) ? print "checked" : "";  ?>>
                  MASETEA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INSEGURO" class="flat-red" <?php in_array('INSEGURO', $fallas) ? print "checked" : "";  ?>>
                  INSEGURO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.INTROVIZACIÓN" class="flat-red" <?php in_array('P.INTROVIZACIÓN', $fallas) ? print "checked" : "";  ?>>
                  P.INTROVIZACIÓN
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INFATILIZA" class="flat-red" <?php in_array('INFATILIZA', $fallas) ? print "checked" : "";  ?>>
                  INFATILIZA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESCONSIDERADO" class="flat-red" <?php in_array('DESCONSIDERADO', $fallas) ? print "checked" : "";  ?>>
                  DESCONSIDERADO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="CALLOSO" class="flat-red" <?php in_array('CALLOSO', $fallas) ? print "checked" : "";  ?>>
                  CALLOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="TIMIDO" class="flat-red" <?php in_array('TIMIDO', $fallas) ? print "checked" : "";  ?>>
                  TIMIDO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="AEREO" class="flat-red" <?php in_array('AEREO', $fallas) ? print "checked" : "";  ?>>
                  AÉREO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="HIPERSOMNE" class="flat-red" <?php in_array('HIPERSOMNE', $fallas) ? print "checked" : "";  ?>>
                  HIPERSOMNE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="VERBORREA" class="flat-red" <?php in_array('VERBORREA', $fallas) ? print "checked" : "";  ?>>
                  VERBORREA
                </label>
              </div>

                 <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="PERMISIVO" class="flat-red" <?php in_array('PERMISIVO', $fallas) ? print "checked" : "";  ?>>
                  PERMISIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INEPTO EN SU BRIG." class="flat-red" <?php in_array('INEPTO EN SU BRIG.', $fallas) ? print "checked" : "";  ?>>
                  INEPTO EN SU BRIG.
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="FRUSTRADO" class="flat-red" <?php in_array('FRUSTRADO', $fallas) ? print "checked" : "";  ?>>
                  FRUSTRADO
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO COMUNICA" class="flat-red" <?php in_array('NO COMUNICA', $fallas) ? print "checked" : "";  ?>>
                  NO COMUNICA
                </label>
              </div>

          </div>
        </div>
                 
            <div class="col-sm-3">
              <div class="box-body">
                
              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INTOLERANTE" class="flat-red" <?php in_array('INTOLERANTE', $fallas) ? print "checked" : "";  ?>>
                  INTOLERANTE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="EGOISTA" class="flat-red" <?php in_array('EGOISTA', $fallas) ? print "checked" : "";  ?>>
                  EGOISTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="OBSESIVO" class="flat-red" <?php in_array('OBSESIVO', $fallas) ? print "checked" : "";  ?>>
                  OBSESIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SOBERVIO" class="flat-red" <?php in_array('SOBERVIO', $fallas) ? print "checked" : "";  ?>>
                  SOBERVIO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="ENVIDIOSO" class="flat-red" <?php in_array('ENVIDIOSO', $fallas) ? print "checked" : "";  ?>>
                  ENVIDIOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRRACIONAL" class="flat-red" <?php in_array('IRRACIONAL', $fallas) ? print "checked" : "";  ?>>
                  IRRACIONAL
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESCONFIADO" class="flat-red" <?php in_array('DESCONFIADO', $fallas) ? print "checked" : "";  ?>>
                  DESCONFIADO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.ALTRUISTA" class="flat-red" <?php in_array('P.ALTRUISTA', $fallas) ? print "checked" : "";  ?>>
                  P.ALTRUISTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DEPRESIVO" class="flat-red" <?php in_array('DEPRESIVO', $fallas) ? print "checked" : "";  ?>>
                  DEPRESIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESHONESTO" class="flat-red" <?php in_array('DESHONESTO', $fallas) ? print "checked" : "";  ?>>
                  DESHONESTO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MITOMANO" class="flat-red" <?php in_array('MITOMANO', $fallas) ? print "checked" : "";  ?>>
                  MITOMANO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="PESIMISTA" class="flat-red" <?php in_array('PESIMISTA', $fallas) ? print "checked" : "";  ?>>
                  PESIMISTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRRESPONSABLE" class="flat-red" <?php in_array('IRRESPONSABLE', $fallas) ? print "checked" : "";  ?>>
                  IRRESPONSABLE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IMPULSIVO" class="flat-red" <?php in_array('IMPULSIVO', $fallas) ? print "checked" : "";  ?>>
                  IMPULSIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DEPENDIENTE" class="flat-red" <?php in_array('DEPENDIENTE', $fallas) ? print "checked" : "";  ?>>
                  DEPENDIENTE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.EMPATICO" class="flat-red" <?php in_array('P.EMPATICO', $fallas) ? print "checked" : "";  ?>>
                  P.EMPATICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DUPLICISTA" class="flat-red" <?php in_array('DUPLICISTA', $fallas) ? print "checked" : "";  ?>>
                  DUPLICISTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="REPRIME" class="flat-red" <?php in_array('REPRIME', $fallas) ? print "checked" : "";  ?>>
                  REPRIME
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO ACEPTA" class="flat-red" <?php in_array('NO ACEPTA', $fallas) ? print "checked" : "";  ?>>
                  NO ACEPTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO SEÑALA" class="flat-red" <?php in_array('NO SEÑALA', $fallas) ? print "checked" : "";  ?>>
                  NO SEÑALA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="FALLA POR TERCERO" class="flat-red" <?php in_array('FALLA POR TERCERO', $fallas) ? print "checked" : "";  ?>>
                  FALLA POR TERCERO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="COMPITE NO RECR." class="flat-red" <?php in_array('COMPITE NO RECR.', $fallas) ? print "checked" : "";  ?>>
                  COMPITE NO RECR.
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="V.NORMAS-PAUTAS" class="flat-red" <?php in_array('V.NORMAS-PAUTAS', $fallas) ? print "checked" : "";  ?>>
                  V.NORMAS-PAUTAS
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="CLEPTÓMANO" class="flat-red" <?php in_array('CLEPTÓMANO', $fallas) ? print "checked" : "";  ?>>
                  CLEPTÓMANO
                </label>
              </div>

              </div>
            </div>

            <div class="col-sm-3">
              <div class="box-body">
                
                 <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.CAPACITACIÓN" class="flat-red" <?php in_array('P.CAPACITACIÓN', $fallas) ? print "checked" : "";  ?>>
                  P.CAPACITACIÓN
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="CONFUNDIDO" class="flat-red" <?php in_array('CONFUNDIDO', $fallas) ? print "checked" : "";  ?>>
                  CONFUNDIDO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE MUESTRA" class="flat-red" <?php in_array('SE MUESTRA', $fallas) ? print "checked" : "";  ?>>
                  SE MUESTRA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE DEJA VER" class="flat-red" <?php in_array('SE DEJA VER', $fallas) ? print "checked" : "";  ?>>
                  SE DEJA VER
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NARSISO" class="flat-red" <?php in_array('NARSISO', $fallas) ? print "checked" : "";  ?>>
                  NARSISO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MAL EJEMPLO" class="flat-red" <?php in_array('MAL EJEMPLO', $fallas) ? print "checked" : "";  ?>>
                  MAL EJEMPLO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="EGOCENTRICO" class="flat-red" <?php in_array('EGOCENTRICO', $fallas) ? print "checked" : "";  ?>>
                  EGOCENTRICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO MODIFICA" class="flat-red" <?php in_array('NO MODIFICA', $fallas) ? print "checked" : "";  ?>>
                  NO MODIFICA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="POCO TEMPLE" class="flat-red" <?php in_array('POCO TEMPLE', $fallas) ? print "checked" : "";  ?>>
                  POCO TEMPLE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESVIRTUA TERAPIA" class="flat-red" <?php in_array('DESVIRTUA TERAPIA', $fallas) ? print "checked" : "";  ?>>
                  DESVIRTUA TERAPIA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SENSIBLE" class="flat-red" <?php in_array('SENSIBLE', $fallas) ? print "checked" : "";  ?>>
                  SENSIBLE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SELECTIVO" class="flat-red" <?php in_array('SELECTIVO', $fallas) ? print "checked" : "";  ?>>
                  SELECTIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="POCO HUMILDE" class="flat-red" <?php in_array('POCO HUMILDE', $fallas) ? print "checked" : "";  ?>>
                  POCO HUMILDE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE DA SU P.ALTER" class="flat-red" <?php in_array('SE DA SU P.ALTER', $fallas) ? print "checked" : "";  ?>>
                  SE DA SU P.ALTER
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE CREE SU P.TERAP" class="flat-red" <?php in_array('SE CREE SU P.TERAP', $fallas) ? print "checked" : "";  ?>>
                  SE CREE SU P.TERAP
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="CUESTIONA" class="flat-red" <?php in_array('CUESTIONA', $fallas) ? print "checked" : "";  ?>>
                  CUESTIONA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="ORGULLOSO" class="flat-red" <?php in_array('ORGULLOSO', $fallas) ? print "checked" : "";  ?>>
                  ORGULLOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="APATICO" class="flat-red" <?php in_array('APATICO', $fallas) ? print "checked" : "";  ?>>
                  APATICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="REB. SEÑALAMIENTO" class="flat-red" <?php in_array('REB. SEÑALAMIENTO', $fallas) ? print "checked" : "";  ?>>
                  REB. SEÑALAMIENTO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="ANCIOSO" class="flat-red" <?php in_array('ANCIOSO', $fallas) ? print "checked" : "";  ?>>
                  ANCIOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INDISCRETO" class="flat-red" <?php in_array('INDISCRETO', $fallas) ? print "checked" : "";  ?>>
                  INDISCRETO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="G. CALLEGERA" class="flat-red" <?php in_array('G. CALLEGERA', $fallas) ? print "checked" : "";  ?>>
                  G. CALLEGERA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NEGATIVO" class="flat-red" <?php in_array('NEGATIVO', $fallas) ? print "checked" : "";  ?>>
                  NEGATIVO
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="AGRESIVO" class="flat-red" <?php in_array('AGRESIVO', $fallas) ? print "checked" : "";  ?>>
                  AGRESIVO
                </label>
              </div>


              </div>
            </div>


         </div>
      </div>
    
          <!-- // INICIO BOX 2 // -->
            
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Observaciones Terapia</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <!-- // INICIO DEL BODY DEL BOX //-->
              <div class="containe">
                  
                      
                    
                   
                      <div class="form-group">
                  <label>Observaciones Lider</label>
                  <textarea class="form-control" rows="3" name="o_lider_te" placeholder="Observaciones ..."><?php echo $o_lider_te; ?></textarea>
                </div>
                    
                    <div class="form-group">
                  <label>Observaciones Colider</label>
                  <textarea class="form-control" rows="3" name="o_colider_te" placeholder="Observaciones ..."><?php echo $o_colider_te; ?></textarea>
                </div>
                     
                    <div class="form-group">
                  <label>Observaciones del solicitante</label>
                  <textarea class="form-control" rows="3" name="o_solicita_te" placeholder="Observaciones del residente que solicito la terapia ..."><?php echo $o_solicita_te; ?></textarea>
                </div>
                      
               
                      
                      
                     
                      </div> <!--// FIN DEL FORN-INLINE//-->
                 
             
              <!-- // FIN DEL BODY DEÑL BOX // -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
            
            <!-- // FIN DEL BOX  3// -->
        </div>
        <!-- // INICIO BOX 4 // -->
            
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Actitud asumida</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <!-- // INICIO DEL BODY DEL BOX //-->
                <div class="containe">
                
                  <div class="form-group">
                    <!-- <label>Actitud asumida por el residente</label> -->
                    <textarea class="form-control" rows="3" name="actitud_te" placeholder="Actitud asumida ..."><?php echo $actitud_te; ?></textarea>
                  </div>
                    
                  
                    
                </div> <!--// FIN DEL FORN-INLINE//-->

              <!-- // FIN DEL BODY DEÑL BOX // -->
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
            
            <!-- // FIN DEL BOX  4// -->
              
             <center> <input type="submit" class="btn btn-primary btn-lg" value="Guardar Cambios"></center>
        </div>
            
            
            
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include("include/footer.php"); ?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include("include/scrip.php"); ?>
</body>
</html>

