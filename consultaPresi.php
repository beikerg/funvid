<?php 
  include("include/rol.php");
    

 require_once("ajax/db_connection.php");  

    $id_r = $_GET['id'];
    $id_con  = $_GET['con'];

    

    if(empty($_GET['id']) || empty($_GET['con'])){
      header("location: historialResidente.php?id".$id_r."&con=".$id_con);
    }



   $mostrar = "SELECT r.*, f.*, p.*, t.*, ap.*, n.*, c.* FROM residentes r INNER JOIN familiares f ON f.id_residente = r.id_residente INNER JOIN pareja p on p.id_residente = r.id_residente INNER JOIN tratamiento t on t.id_residente = r.id_residente INNER JOIN apoderado ap ON ap.id_residente = r.id_residente INNER JOIN antecedentes n ON n.id_residente = r.id_residente INNER JOIN consultap c ON c.id_residente = r.id_residente WHERE r.id_residente = '$id_r' ";  
      $sql = $mysql->query($mostrar);

      $result = mysqli_num_rows($sql);

      if($result == 0 ){
        header("Location: consultaPsicologia.php");
      }else{
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

          # Consulta

          $motivo = $data['motivo'];


        }
      }
      
 

    ?>
    


<!DOCTYPE html>
<html lang="es">
<head>
  <title>FUNVID | Consulta</title>
  <?php include("include/head.php"); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <?php include("include/header.php"); 
        include("include/aside-admin.php");
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     
    <section class="content-header">
     
      <h1>
        Consulta Psicologica
        <br>
        <h4><strong>Motivo de consulta:</strong> <?php echo $motivo; ?> </h4>
        <h5>
          <div class="rows">
            <div class="col-md-10">
            <strong>Etapa:</strong> <?php echo $etapa_resi; ?>
          </div>
  
    <!-- Opción de públicar o dejar privado -->

        <!-- <div class="col-md-2">
            <select class="form-control" name="public" >
              <option value="1"> Privado</option>
              <option value="2"> Públicar</option>
            </select><br/>
          </div>-->
            </div><br/></h5>
          
       </h1>
        
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Lista Consultas</a></li>
        <li>Historial</li>
        <li class="active">Consulta</li>
      </ol>

    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    
    <form action="ajax/consultaPsicologo/addConsultaP.php" method="POST">
       <div class="container">
  <div class="row">
    <div class="col-md-12">
<!-- Nav tabs --><div class="nav-tabs-custom">
            <ul class="nav nav-tabs" role="tablist">
             <li role="presentation"><a href="#Datos_residente" aria-controls="home" role="tab" data-toggle="tab">Historial</a></li>
             <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Área</a></li>
             <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Objetivos</a></li>
             <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Análisis funcional</a></li>
             <li role="presentation" class="active"><a href="#seguimiento" aria-controls="settings" role="tab" data-toggle="tab">Seguimiento</a></li>

            </ul>

<!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane" id="Datos_residente">
      
        <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Residente" data-toggle="tab">Datos Residentes</a></li>
              <li><a href="#nucleo_familiar" data-toggle="tab">Núcleo Familiar</a></li>
              <li><a href="#pareja" data-toggle="tab">Pareja</a></li>
              <li><a href="#apoderado" data-toggle="tab">Apoderado</a></li>
              <li><a href="#tratamiento" data-toggle="tab">Tratamientos Anteriores</a></li>
              <li><a href="#legal" data-toggle="tab">Temas legales</a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="Residente">
                

                <div class="box-body pad">

              
              
                <div class="row">

          <div class="form-group col-md-3">
           <label for="nombre">Nombre completo:</label><br>
           <input type="text" class="form-control" id="nombre" value="<?php echo $nombre; ?>" disabled>
         </div>
        <div class="form-group col-md-3">
            <label for="apellido" >Apellidos:</label><br>
            <input type="text" class="form-control" id="apellido" value="<?php echo $apellido; ?>" disabled>
        </div> 
             
        
        <div class="form-group col-md-3"> 
            <label for="rut">Rut:</label><br>
            <input type="text" name="rut" id="rut" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask value="<?php echo $rut; ?>" disabled>
        </div>

        <div class="form-group col-md-3">
          <label for="sexo">Sexo:<br></label><br>
          <select class="form-control" id="sexo" disabled>
            <option value="<?php echo $sexo; ?>"> </option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
       </div> <!-- Cierre del row -->

        <!-- Abrir el row -->
        <div class="row">
           <div class="form-group col-md-3">
            <label for="telefono">Telefono:</label><br>
            <input type="text" name="telefono" id="telefono" class="form-control"  data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask placeholder="<?php echo $telefono; ?>" value="<?php echo $telefono; ?>" disabled>
        </div>

          <div class="form-group col-md-3">
                <label for="fecha" >Fecha de nacimiento:</label><br>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" name="fecha" id="fecha" value="<?php echo $fecha; ?>" disabled>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        
        <div class="form-group col-md-3">
          <label for="nivel">Nivel de estudio:</label><br>
          <input type="text" class="form-control" id="nivel" value="<?php echo $nivel; ?>" disabled>
        </div>
  
        <div class="form-group col-md-3">
          <label for="profesion">Profesion:</label><br>
          <input type="text" class="form-control" id="profesion" value="<?php echo $profesion; ?>" disabled>
        </div>

      </div><!-- Cierre del row -->

      <div class="row">
         <div class="form-group col-md-3">
            <label for="direccion" >Dirección:</label><br>
            <input type="text"class="form-control" id="direccion"  value="<?php echo $direccion; ?>" disabled>
        </div> 
         
      <div class="form-group col-md-3">
            <label for="localidad" >Ciudad:</label><br>
            <input type="text" class="form-control" id="localidad" placeholder="Ciudad" value="<?php echo $localidad; ?>" disabled>
        </div>
        
      <div class="form-group col-md-3">
            <label for="provincia" >Comuna:</label><br>
            <input type="text" class="form-control" id="provincia" value="<?php echo $provincia; ?>" disabled>
        </div>
        
        <div class="form-group col-md-3">
            <label for="correo">Correo electronico:</label><br>
            <input type="email" class="form-control" id="correo" value="<?php echo $correo; ?>" disabled>
        </div>
  </div><!-- cierre del row -->            
            </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="nucleo_familiar">
                <div class="box box-primary">
                <div class="box-header width-border">
                  <center><h2 class="box-title"><b>Padre</b></h2></center>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                          <label for="">Nombre Completo</label><br>
                          <input type="text" class="form-control" value="<?php echo $nombre_p; ?>" disabled>
                    </div>

                    <div class="form-group col-md-3">
                          <label for="">Apellidos:</label><br>
                          <input type="text" class="form-control" value="<?php echo $apellido_p; ?>" disabled>
                    </div>

                  <?php $cumpleanos = new DateTime($fecha_p);
                    $hoy = new DateTime();
                    $annos = $hoy->diff($cumpleanos);
                    $edad_p= $annos->y; ?>
                    <div class="form-group col-md-3">
                          <label for="">Edad:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $edad_p; ?>" disabled>
                    </div>

                    <div class="form-group col-md-3">
                          <label for="">Nivel de estudio:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $nivel_p; ?>" disabled>
                    </div>
                  </div><!-- Cierre del row -->
                  <div class="row">
                    <div class="form-group col-md-4">
                          <label for="">Ocupación:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $ocupacion_p; ?>" disabled>
                    </div>

                    <div class="form-group col-md-4">
                          <label for="telefono_p">Telefono:</label><br>
                          <input type="text" class="form-control" name="telefono_p" id="telefono_p" placeholder="<?php echo $telefono_p ?>" value="<?php echo $telefono_p; ?>" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask disabled>
                    </div>

                    <div class="form-group col-md-4">
                          <label for="correo">Direccion:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $direccion_p; ?>" disabled>
                    </div>
                    <div>
                    <div class="form-group col-md-9">
                          <label for="correo">Tipo de relación:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $tipo_relacion_p; ?>" disabled>
                    </div>


              </div>
              </div>
</div></div>
                  
             
             <div class="box box-primary">
             <div class="box-header width-border">
                  <center><h2 class="box-title"><b>Madre</b></h2></center>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                          <label for="">Nombre Completo</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $m_nombre; ?>" disabled>
                    </div>

                    <div class="form-group col-md-3">
                          <label for="">Apellidos:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $m_apellido; ?>" disabled>
                    </div>
                    <?php
                      $cumpleanos = new DateTime($m_fecha);
                      $hoy = new DateTime();
                      $annos = $hoy->diff($cumpleanos);
                      $edad_m= $annos->y;

                     ?>
                    <div class="form-group col-md-3">
                          <label for="">Edad:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $edad_m; ?>" disabled>
                    </div>

                    <div class="form-group col-md-3">
                          <label for="">Nivel de estudio:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $m_nivel; ?>" disabled>
                    </div>
                  </div><!-- Cierre del row -->
                  <div class="row">
                    <div class="form-group col-md-4">
                          <label for="">Ocupación:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $m_ocupacion; ?>" disabled>
                    </div>

                    <div class="form-group col-md-4">
                          <label for="m_telefono">Telefono:</label><br>
                          <input type="text" class="form-control" name="m_telefono" id="m_telefono" placeholder="<?php echo $m_telefono; ?>" value="<?php echo $m_telefono; ?>" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask disabled>
                    </div>

                    <div class="form-group col-md-4">
                          <label for="correo">Direccion:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $m_direccion; ?>" disabled>
                    </div>
                    <div>
                    <div class="form-group col-md-9">
                          <label for="correo">Tipo de relación:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $m_tipo_relacion; ?>" disabled>
                    </div>
              </div>
            </div>


                </div>
              </div>
            </div>
<div class="tab-pane" id="apoderado">
                <div class="box box-solid">
                  <div class="box-body">
                    <div class="row">
                      <div class="box box-solid">
                        <div class="form-group col-md-3">
                          <label>Nombre:</label>
                          <input type="text" class="form-control" name="nombre_apo" value="<?php echo $nombre_apo; ?>" disabled>                        
                        </div>
                        <div class="form-group col-md-3">
                          <label>Apellido:</label>
                          <input type="text" class="form-control" name="apellido_apo" value="<?php echo $apellido_apo; ?>" disabled>
                        </div>
                        <div class="form-group col-md-3"> 
                          <label for="rut_apo">Rut:</label><br>
                          <input type="text" name="rut_apo" id="rut_apo" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask value="<?php echo $rut_apo; ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="telefono_apo">Telefono:</label><br>
                          <input type="text" class="form-control" name="telefono_apo" id="telefono_apo" placeholder="<?php echo $telefono_apo; ?>" value="<?php echo $telefono_apo; ?>" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask disabled>
                        </div>
                        <div class="form-group col-md-12">
                          <label>Tipo de relación:</label>
                          <input type="text" class="form-control" name="tipo_r_apo" value="<?php echo $tipo_r_apo; ?>" disabled>
                        </div>
                      </div>
                    </div>
                  </div>                
              </div>
            </div>
<!-- ./ FIN DE APODERADOS -->
<script>
  function most(x)
  {
    if(x == 0)
    {
      document.getElementById("f1").style.display='block';
    }else{
      document.getElementById("f1").style.display='none';
    }
    

     
  }
</script>
<!-- -->
<div class="tab-pane" id="legal">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="row">
          <div class="form-group col-md-4 col-xs-6">
            <h4>¿Tiene antecedentes legales?</h4>
          </div>
          <div class="form-group col-md-1 col-xs-3">
              <h4>
              <input type="radio" name="descrip"  value="si" onclick="most(0)" <?php if($descrip == 'si') echo "checked"; ?> disabled>
                      Sí
            </h4>  
          </div>
          <div class="form-group col-md-1 col-xs-3">
            <h4> 
              <input type="radio" name="descrip" value="no" onclick="most(1)" <?php if($descrip == 'no') echo "checked"; ?> disabled>
                      No 
            </h4>
          </div>
        </div>
         <?php if($descrip == 'si')
                {
                  echo '<div id="f1" style="display: block">';
                }
                elseif($descrip == 'no')
                {
                  echo '<div id="f1" style="display: none">';
                }

                 ?>

              <div class="form-group col-md-12">
                    <label>Antecedentes</label>
                    <textarea type="text" name="antecedente_lg" class="md-textarea form-control" rows="5" disabled><?php echo $antecedente_lg; ?></textarea>
                  </div>
                
                
                  <div class="form-group col-md-12">
                    <label>Tramites o temas pendientes</label>
                    <textarea type="text" name="tramite_p"  class="md-textarea form-control" rows="5" disabled><?php echo $tramite_p; ?></textarea>
                  </div>

          </div>
      </div>
    </div>
  </div>
</div>
<!-- ./ -->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="pareja">
                <div class="box box-solid">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-group col-md-3">
                          <label for="">Nombre Completo:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $pareja_nom; ?>" disabled>
                    </div>                    
                    <div class="form-group col-md-3">
                          <label for="">Apellido:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $pareja_ape; ?>" disabled>
                    </div>
                    <?php
                    $cumpleanos = new DateTime($pareja_fecha);
                    $hoy = new DateTime();
                    $annos = $hoy->diff($cumpleanos);
                    $edad_p= $annos->y; ?>
                    <div class="form-group col-md-3">
                          <label for="">Edad:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $edad_p; ?>" disabled>
                    </div>
                    <div class="form-group col-md-3">
                          <label for="">Opcación:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $pareja_ocupa; ?>" disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3">
                          <label for="">Nivel de estudio:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $pareja_nivel; ?>" disabled>
                    </div>
                    <div class="form-group col-md-3">
                          <label for="">Hijos:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $pareja_hijos; ?>" disabled>
                    </div>
                    <div class="form-group col-md-3">
                          <label for="">Correo electronico:</label><br>
                          <input type="email" class="form-control" name="" id="" value="<?php echo $pareja_correo; ?>" disabled>
                    </div>
                    <div class="form-group col-md-3">
                          <label for="pareja_telf">Teléfono:</label><br>
                          <input type="text" class="form-control" name="pareja_telf" id="pareja_telf" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask placeholder="<?php echo $pareja_telf; ?>" value="<?php echo $pareja_telf; ?>" disabled>
                    </div>
                  </div>
                    <div class="form-group col-md-12">
                          <label for="">Tipo de relación:</label><br>
                          <input type="text" class="form-control" name="" id="" value="<?php echo $pareja_trela; ?>" disabled>
                    </div>
                    </div>
                    
                  </div>
                
              </div>

              <div class="tab-pane" id="tratamiento">
              
                      <div class="row">
          <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-solid">
                  
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <div style="color: black;">¿Quién lo remite?</div>
                      </a>
                    </h4>
                  </div>

                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                          <div class="form-group">
                            <label class="sr-only" for="remite"></label>
                                <textarea type="text" name="remite" id="remite" class="md-textarea form-control" rows="7" disabled><?php echo $remite; ?></textarea>
                            </div>
                    </div>
                  </div>
                </div>
                <div class="panel box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <div style="color: black;">Tratamientos psicologicos anteriores</div>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                             <div class="form-group">
                              <label class="sr-only" for="tanterior"></label>
                                <textarea type="text" name="tanterior" id="tanterior" class="md-textarea form-control" rows="7" disabled><?php echo $tanterior; ?></textarea>
                            </div> 
                    </div>
                  </div>
                </div>
                <div class="panel box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <div style="color:black;">Antecedentes Medicos Anteriores</div>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="sr-only" for="aanterior"></label>
                        <textarea type="text" name="aanterior" id="aanterior" class="md-textarea form-control" rows="7" disabled><?php echo $aanterior; ?></textarea>
                      </div> 
                    </div>
                  </div>
                </div>
                 <div class="panel box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsecuatro">
                        <div style="color: black;">Tratamientos Actuales</div>
                      </a>
                    </h4>
                  </div>
                  <div id="collapsecuatro" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="sr-only" for="tactual"></label>
                          <textarea type="text" name="tactual"  class="md-textarea form-control" rows="7" disabled><?php echo $tactual; ?></textarea>
                      </div> 
                    </div>
                  </div>
                </div>
                <div class="panel box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsemedica">
                        <div style="color: black;">Toma medicamentos</div>
                      </a>
                    </h4>
                  </div>
                  <div id="collapsemedica" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="sr-only" for="tactual"></label>
                          <textarea type="text" name="t_medica" placeholder="Indicar cuales toma..." class="md-textarea form-control" rows="7" disabled><?php echo $t_medica; ?></textarea>
                      </div> 
                    </div>
                  </div>
                </div>
                <div class="panel box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefamiliar">
                        <div style="color:black;">Antecedentes Medicos Familiares</div>
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefamiliar" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="sr-only" for="antecedentes"></label>
                        <textarea type="text" name="antecedentes" id="antecedentes" class="md-textarea form-control" rows="7" disabled><?php echo $antecedentes; ?></textarea>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
              </div>
              <!-- ./ Fin de tratamiento -->
              <!-- /.tab-pane -->
</div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

       
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->
      </div>

  

      <div role="tabpanel" class="tab-pane" id="profile">
        <!-- // Incicio de area  -->
        
    <div class="row">
        <div class="col-md-12">
            <div class="panel-group" id="accordion">
              <!-- // Familiar -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#familiar"><span  class="">
                            </span> Familiar</a>
                        </h4>
                    </div>
                    <div id="familiar" class="panel-collapse collapse in">
                        <div class="panel-body"> 
                            <div class="form-group">
                                <textarea type="text" name="familiar"  class="md-textarea form-control" rows="12"></textarea>
                            </div>                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin Familiar -->

                <!-- // Social -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#social"><span class="">
                            </span> Social</a>
                        </h4>
                    </div>
                    <div id="social" class="panel-collapse collapse">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="social"  class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin social -->
                
                <!-- // Laboral - Económica -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#laboral"><span class="">
                            </span> Laboral - Económica</a>
                        </h4>
                    </div>
                    <div id="laboral" class="panel-collapse collapse">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="laboral" class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin Laboral - Económica -->

                <!-- // Académica -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#academica"><span class="">
                            </span> Académica</a>
                        </h4>
                    </div>
                    <div id="academica" class="panel-collapse collapse">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="academica" class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin académica -->

                <!-- // Afecetiva -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#afectiva"><span class="">
                            </span> Afectiva</a>
                        </h4>
                    </div>
                    <div id="afectiva" class="panel-collapse collapse">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="afectiva" class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin Afectiva -->

                <!-- // Conyugal -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#conyugal"><span class="">
                            </span> Conyugal</a>
                        </h4>
                    </div>
                    <div id="conyugal" class="panel-collapse collapse">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="conyugal"  class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin conyugal -->
                

            </div>
        </div>
    </div>


        <!-- /. fin de area tab-panel -->
      </div><!-- /. #area -->
      <div role="tabpanel" class="tab-pane" id="messages">
       
    <div class="row">
        <div class="col-md-12">
            <div class="panel-group" id="accordion">
              <!-- // Objetivos del paciente -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#objetivo-p"><span class="">
                            </span> Objetivo del paciente</a>
                        </h4>
                    </div>
                    <div id="objetivo-p" class="panel-collapse collapse in">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="objetivo"  class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin Objetivos del paciente -->

                <!-- // Comportamientos -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#comportamiento"><span class="">
                            </span> Apariencia y comportamiento durante la sesión</a>
                        </h4>
                    </div>
                    <div id="comportamiento" class="panel-collapse collapse">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="apariencia" class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin comportamientos -->
                
                <!-- // -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#recomendacion"><span class="">
                            </span> Observaciones y recomendaciones</a>
                        </h4>
                    </div>
                    <div id="recomendacion" class="panel-collapse collapse">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="recomendacion" class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. -->

            </div>
        </div>
    </div>


      </div>
      <div role="tabpanel" class="tab-pane" id="settings">
        
    <div class="row">
        <div class="col-md-12">
            <div class="panel-group" id="accordion">

              <!-- // Antecedentes -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseD"><span class="">
                            </span> Antecedentes</a>
                        </h4>
                    </div>
                    <div id="collapseD" class="panel-collapse collapse in">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="antecedentes" class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin antecedentes -->

                <!-- // Conductas -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseDow"><span class="">
                            </span> Conducta</a>
                        </h4>
                    </div>
                    <div id="collapseDow" class="panel-collapse collapse">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="consecuencia" class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /. Fin Conducatas -->

                <!-- Consecuencias -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTre"><span class="">
                            </span> Consecuencias</a>
                        </h4>
                    </div>
                    <div id="collapseTre" class="panel-collapse collapse">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <textarea type="text" name="consecuencia" class="md-textarea form-control" rows="12"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- // Fin consecuencias -->
                
            </div>
        </div>
    </div>


        
      </div>
      <div role="tabpanel" class="tab-pane active" id="seguimiento">
        
         <div class="row">
          <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-solid">
                  
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#segAnte">
                        <div style="color: black;">Antecedentes relevantes de la sesión</div>
                      </a>
                    </h4>
                  </div>

                  <div id="segAnte" class="panel-collapse collapse in">
                    <div class="box-body">
                          <div class="form-group">
                            <label class="sr-only" for="ante_relevantes"></label>
                                <textarea type="text" name="ante_relevantes" id="" class="md-textarea form-control" rows="7"></textarea>
                            </div>
                    </div>
                  </div>
                </div>
                <div class="panel box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#segRela">
                        <div style="color: black;">Relaciones Familiares</div>
                      </a>
                    </h4>
                  </div>
                  <div id="segRela" class="panel-collapse collapse">
                    <div class="box-body">
                             <div class="form-group">
                              <label class="sr-only" for="rela_familiares"></label>
                                <textarea type="text" name="rela_familiares" id="" class="md-textarea form-control" rows="7" ></textarea>
                            </div> 
                    </div>
                  </div>
                </div>
                <div class="panel box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#segSit">
                        <div style="color:black;">Situaciones de craving o crisis de abstinencia</div>
                      </a>
                    </h4>
                  </div>
                  <div id="segSit" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="sr-only" for="craving"></label>
                        <textarea type="text" name="craving" id="" class="md-textarea form-control" rows="7" ></textarea>
                      </div> 
                    </div>
                  </div>
                </div>
                 <div class="panel box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#segResi">
                        <div style="color: black;">Relación entre residentes</div>
                      </a>
                    </h4>
                  </div>
                  <div id="segResi" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="sr-only" for="rela_resi"></label>
                          <textarea type="text" name="rela_resi"  class="md-textarea form-control" rows="7" ></textarea>
                      </div> 
                    </div>
                  </div>
                </div>
                <div class="panel box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#segCo">
                        <div style="color: black;">Sesión</div>
                      </a>
                    </h4>
                  </div>
                  <div id="segCo" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="sr-only" for="  "></label>
                          <textarea type="text" name="comen_session"  class="md-textarea form-control" rows="7" ></textarea>
                      </div> 
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
              </div>
              <!-- almacena el id residente -->
            <input type="hidden" name="id_residente" value="<?php echo $id_r; ?>">
            <!-- Almacena el id de consulta -->
            <input type="hidden" name="id_consulta" value="<?php echo $id_con; ?>">
      
      </div><!-- /. Fin de seguimineto -->
    </div>
             </div>
   </div>
  </div>
  <div class="form-group">   
          <center>
            <input type="submit" class="btn btn-primary btn-lg" value="Guardar">
          </center>
        </div>
</div>



    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <?php include("include/footer.php"); ?>
  <!-- Control Sidebar -->   
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

    <?php include("include/scrip.php"); ?>

     <script type="text/javascript" src="js/residentes.js"></script>
</body>
</html>


