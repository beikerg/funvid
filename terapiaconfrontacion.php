<?php
 
  include("include/rol.php");
 

    include("ajax/db_connection.php");

    if(empty($_GET['id'])){
      header("location: ListaTConf.php");
    }


    $id_residente = $_GET['id'];

    $q = "SELECT * FROM residentes WHERE id_residente = '$id_residente' ";
    $sql = $mysql->query($q);
    mysqli_close($mysql);
    $result = mysqli_num_rows($sql);

      if($result == 0 )
      {
        header('Location: ListaTConf.php');
      }else{

        while ($data = mysqli_fetch_array($sql)){
          $id_residente = $data['id_residente'];
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $sexo = $data['sexo'];
          $fecha = $data['fecha'];

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
  
  <title>FUNVID | Terapia de confrontación</title>
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
        Terapia de confrontación
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Terapia de confrontación</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    
  

       <form action="ajax/terapias/confrontacion/addConfrontacion.php?id=<?php echo $id_residente; ?>" method="POST">
      
            
          
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
                      
                      <div class="form-group col-md-3">
                          <label>Edad:</label>
                          <input class="form-control" type="text" value="<?php echo $edad; ?>" disabled>
                      </div>
                      
                      <div class="form-group col-md-3">
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
                          <input class="form-control" type="text" name="lider_tc" id="lider_tc" placeholder="Nombre">
                      </div> 

                      <div class="form-group col-md-4">                          
                              <label>Nombre Colider:</label>
                              <input class="form-control" type="text" name="colider_tc" id="colider_tc" placeholder="Nombre Colider">                          
                      </div>
                      
                      <div class="form-group col-md-4">                          
                              <label>Director:</label>
                              <input class="form-control" type="text" name="director_tc" id="director_tc" placeholder="Nombre del director">                          
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
                  <input type="date" name="fecha_tc" class="form-control pull-right" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <!-- /.input group -->
              </div>
                      
                      
                      <div class="form-group col-md-4">
                          <label>Hora inicio:</label>
                          <input class="form-control" name="h_inicio_tc" type="time" value="<?php echo date("H:i"); ?>">
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Hora termino:</label>
                          <input class="form-control" name="h_fin_tc" type="time">
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
                  <input type="checkbox" name="falla[]" value="P.HIGIENICO" class="flat-red">
                  P.HIGIENICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="CONFRONTA" class="flat-red">
                  CONFRONTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="COJERCE PENA" class="flat-red">
                  COJERCE PENA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE PROYECTA" class="flat-red">
                  SE PROYECTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="LLEVAR BRIG." class="flat-red">
                   LLEVAR BRIG.
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRRITABLE" class="flat-red">
                  IRRITABLE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MELANCOLICO" class="flat-red">
                  MELANCOLICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE RECRIMINA" class="flat-red">
                  SE RECRIMINA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MAL TACTO" class="flat-red">
                  MAL TACTO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE LIMITA" class="flat-red">
                  SE LIMITA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESC. SEÑALAMIENTO" class="flat-red">
                  DESC. SEÑALAMIENTO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESC. FRUSTRACION" class="flat-red">
                  DESC. FRUSTRACION 
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO SE DEJA LLEVAR" class="flat-red">
                  NO SE DEJA LLEVAR
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MANIPULA" class="flat-red">
                  MANIPULA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MONTA PRESION" class="flat-red">
                  MONTA PRESION
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DISTRAIDO" class="flat-red">
                  DISTRAIDO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INCONSIENTE" class="flat-red">
                  INCONSIENTE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INCONSECUENTE" class="flat-red">
                  INCONSECUENTE
                </label>
              </div>
               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.INDUSTRIOSO" class="flat-red">
                  P.INDUSTRIOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="" class="flat-red">
                  MIDE CONTROLES
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO V.GENERATIVO" class="flat-red">
                  NO V.GENERATIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE JUSTIFICA" class="flat-red">
                  SE JUSTIFICA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRONICO" class="flat-red">
                  IRONICO
                </label>
              </div>   

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MIRA A MODO PERSONAL" class="flat-red">
                  MIRA A MODO PERSONAL
                </label>
              </div>

            </div>
          </div>

         <div class="col-sm-3">
          <div class="box-body">
            
             <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SALE EN ACTITUD" class="flat-red">
                  SALE EN  ACTITUD
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.MECANISMO" class="flat-red">
                  P.MECANISMO
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE AISLA" class="flat-red">
                  SE AISLA
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="EVADE" class="flat-red">
                  EVADE
                </label>
              </div>

              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="REGRESIONA" class="flat-red">
                  REGRESIONA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="RENCOROSO" class="flat-red">
                  RENCOROSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MALOS MODALES" class="flat-red">
                  MALOS MODALES
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.TRASCENDENCIA" class="flat-red">
                  P.TRASCENDENCIA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRRESPETUOSO" class="flat-red">
                  IRRESPETUOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INMADURO" class="flat-red">
                  INMADURO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MASETEA" class="flat-red">
                  MASETEA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INSEGURO" class="flat-red">
                  INSEGURO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.INTROVIZACIÓN" class="flat-red">
                  P.INTROVIZACIÓN
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INFATILIZA" class="flat-red">
                  INFATILIZA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESCONSIDERADO" class="flat-red">
                  DESCONSIDERADO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="CALLOSO" class="flat-red">
                  CALLOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="TIMIDO" class="flat-red">
                  TIMIDO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="AEREO" class="flat-red">
                  AÉREO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="HIPERSOMNE" class="flat-red">
                  HIPERSOMNE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="VERBORREA" class="flat-red">
                  VERBORREA
                </label>
              </div>

                 <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="PERMISIVO" class="flat-red">
                  PERMISIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INECTO EN SU BRIG." class="flat-red">
                  INECTO EN SU BRIG.
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="FRUSTRADO" class="flat-red">
                  FRUSTRADO
                </label>
              </div>
          </div>
        </div>
                 
            <div class="col-sm-3">
              <div class="box-body">
                
              <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INTOLERANTE" class="flat-red">
                  INTOLERANTE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="EGOISTA" class="flat-red">
                  EGOISTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="OBSESIVO" class="flat-red">
                  OBSESIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SOBERVIO" class="flat-red">
                  SOBERVIO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="ENVIDIOSO" class="flat-red">
                  ENVIDIOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRRACIONAL" class="flat-red">
                  IRRACIONAL
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESCONFIADO" class="flat-red">
                  DESCONFIADO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.ALTRUISTA" class="flat-red">
                  P.ALTRUISTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DEPRESIVO" class="flat-red">
                  DEPRESIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESHONESTO" class="flat-red">
                  DESHONESTO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MITOMANO" class="flat-red">
                  MITOMANO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="PESIMISTA" class="flat-red">
                  PESIMISTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IRRESPONSABLE" class="flat-red">
                  IRRESPONSABLE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="IMPULSIVO" class="flat-red">
                  IMPULSIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DEPENDIENTE" class="flat-red">
                  DEPENDIENTE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.EMPATICO" class="flat-red">
                  P.EMPATICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DUPLICISTA" class="flat-red">
                  DUPLICISTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="REPRIME" class="flat-red">
                  REPRIME
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO ACEPTA" class="flat-red">
                  NO ACEPTA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO SEÑALA" class="flat-red">
                  NO SEÑALA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="FALLA POR TERCERO" class="flat-red">
                  FALLA POR TERCERO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="COMPITE NO RECR." class="flat-red">
                  COMPITE NO RECR.
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="V.NORMAS-PAUTAS" class="flat-red">
                  V.NORMAS-PAUTAS
                </label>
              </div>

              </div>
            </div>

            <div class="col-sm-3">
              <div class="box-body">
                
                 <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="P.CAPACITACIÓN" class="flat-red">
                  P.CAPACITACIÓN
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="CONFUNDIDO" class="flat-red">
                  CONFUNDIDO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE MUESTRA" class="flat-red">
                  SE MUESTRA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE DEJA VER" class="flat-red">
                  SE DEJA VER
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NARSISO" class="flat-red">
                  NARSISO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="MAL EJEMPLO" class="flat-red">
                  MAL EJEMPLO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="EGOCENTRICO" class="flat-red">
                  EGOCENTRICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NO MODIFICA" class="flat-red">
                  NO MODIFICA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="POCO TEMPLE" class="flat-red">
                  POCO TEMPLE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="DESVIRTUA TERAPIA" class="flat-red">
                  DESVIRTUA TERAPIA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SENSIBLE" class="flat-red">
                  SENSIBLE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SELECTIVO" class="flat-red">
                  SELECTIVO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="POCO HUMILDE" class="flat-red">
                  POCO HUMILDE
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE DA SU P.ALTER" class="flat-red">
                  SE DA SU P.ALTER
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="SE CREE SU P.TERAP" class="flat-red">
                  SE CREE SU P.TERAP
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="CUESTIONA" class="flat-red">
                  CUESTIONA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="ORGULLOSO" class="flat-red">
                  ORGULLOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="APATICO" class="flat-red">
                  APATICO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="REB. SEÑALAMIENTO" class="flat-red">
                  REB. SEÑALAMIENTO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="ANCIOSO" class="flat-red">
                  ANCIOSO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="INDISCRETO" class="flat-red">
                  INDISCRETO
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="G. CALLEGERA" class="flat-red">
                  G. CALLEGERA
                </label>
              </div>

               <div class="form-check">
                <label>
                  <input type="checkbox" name="falla[]" value="NEGATIVO" class="flat-red">
                  NEGATIVO
                </label>
              </div>



              </div>
            </div>


         </div>
      </div>
    
          <!-- // INICIO BOX 3 // -->
            
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
                    <textarea class="form-control" rows="3" name="o_lider_tc" placeholder="Observaciones ..."></textarea>
                  </div>
                    
                  <div class="form-group">
                    <label>Observaciones Colider</label>
                    <textarea class="form-control" rows="3" name="o_colider_tc" placeholder="Observaciones ..."></textarea>
                  </div>
                     
                  <div class="form-group">
                    <label>Observaciones Director</label>
                    <textarea class="form-control" rows="3" name="o_director_tc" placeholder="Observaciones ..."></textarea>
                  </div>
                    
                </div> <!--// FIN DEL FORN-INLINE//-->
                 
             
              <!-- // FIN DEL BODY DEÑL BOX // -->
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col --> 
        </div><!-- // FIN DEL BOX  3// -->

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
                    <textarea class="form-control" rows="3" name="actitud_tc" placeholder="Actitud asumida ..."></textarea>
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
        </div> 


        <!-- BOTON PARA GUARDAR CAMBIOS -->
        <center> <input type="submit" class="btn btn-primary btn-lg" value="Guardar"></center>
        
            
            
            
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

