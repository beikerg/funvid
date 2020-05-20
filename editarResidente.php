<?php
 
include("include/rol.php");

      if(isset($_GET["b"]) && $_GET["b"] != "r") {
    header("Location: registrarResidente.php");
  }elseif(isset($_GET["error"]) && $_GET["error"] != "dato"){
    header("Location: resgistrarResidente.php");
  }
 
    ?>
 <!DOCTYPE html>
<html lang="es">  
<head>
   <title>FUNVID | Editar Residente.</title>
  <?php include("include/head.php"); ?>
  
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
  // Main Header -->
  include("include/header.php");
  // Left side column. contains the logo and sidebar -->
  include("include/aside-admin.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Actualizar Residente
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Residentes</a></li>
        <li class="active">Actualizar Residente</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid"><br>

  
       <?php
      if(isset($_GET["b"])) {
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El Residente se ha actualizado con éxito.</p></center>";
        ?>
        <script type="text/javascript"> 
          setTimeout(function(){
              location.href ="residente.php";           
          }, 1000);     
        
      </script> 
      <?php
      }elseif(isset($_GET["error"])){
          echo "<center><p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Error!</strong> Debe rellenar todos los campos.<br>
            · Datos residente.<br>
            · Núcleo familiar.<br>
            · Pareja.<br>
            · Tratamientos Anteriores</p></center>";
           
      }
  ?> 





<?php 

      if(empty($_GET['id'])){
        header("Location: residente.php");

      }
      include("ajax/db_connection.php");

      if(!empty($_GET['e']))
      {
        $g_et = $_GET['e'];
      }

      if(!empty($_GET['etapa']))
      {
        $g_id_et = $_GET['etapa'];
      }

      if(!empty($_GET['modal']))
      {
        $g_modal = $_GET['modal'];
      }

      $id_residente = $_GET['id'];

      $mostrar = "SELECT r.*, f.*, p.*, t.*, ap.*, n.* FROM residentes r INNER JOIN familiares f ON f.id_residente = r.id_residente INNER JOIN pareja p on p.id_residente = r.id_residente INNER JOIN tratamiento t on t.id_residente = r.id_residente INNER JOIN apoderado ap ON r.id_residente = ap.id_residente INNER JOIN antecedentes n ON n.id_residente = r.id_residente 
       WHERE r.id_residente = '$id_residente' ";  
      $sql = $mysql->query($mostrar);

      $result = mysqli_num_rows($sql);

      if($result == 0 ){
        header("Location: residente.php");
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
          $direccion_3_m = $data['direccion_3_m'];
          $direccion_consumo_3_m = $data['direccion_consumo_3_m'];


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
          $telefono_p_t = $data['telefono_p_t'];
          $direccion_p_t = $data['direccion_p_t'];


            #Madre

          $m_nombre = $data['m_nombre'];
          $m_apellido = $data['m_apellido'];
          $m_fecha = $data['m_fecha'];
          $m_nivel = $data['m_nivel'];
          $m_ocupacion = $data['m_ocupacion'];
          $m_telefono = $data['m_telefono'];
          $m_direccion = $data['m_direccion'];
          $m_tipo_relacion = $data['m_tipo_relacion'];
          $m_telefono_t = $data['m_telefono_t'];
          $m_direccion_t = $data['m_direccion_t'];

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
          $pareja_direccion_p = $data['pareja_direccion_p'];
          $pareja_direccion_t = $data['pareja_direccion_t'];
          $pareja_telf_t = $data['pareja_telf_t']; 

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
          $direccion_apo = $data['direccion_apo'];
          $direccion_apo_t = $data['direccion_apo_t'];
          $telefono_apo_t = $data['telefono_apo_t'];

          # Antecedentes legales

            $descrip = $data['descrip'];
            $antecedente_lg = $data['antecedente_lg'];
            $tramite_p = $data['tramite_p'];

           

           
        }
      }

 ?> 


      <!-- Inicio del formulario -->
      <form action="ajax/residentes/editResidente.php" method="POST">
     
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?=$g_et != 1 ? 'active' : '' ?>"><a href="#Residente" data-toggle="tab">Datos Residentes</a></li>
              <li><a href="#nucleo_familiar" data-toggle="tab">Núcleo Familiar</a></li>
              <li><a href="#pareja" data-toggle="tab">Pareja</a></li>
              <li><a href="#apoderado" data-toggle="tab">Apoderado</a></li>
              <li><a href="#tratamiento" data-toggle="tab">Tratamientos Anteriores</a></li>
              <li><a href="#legal" data-toggle="tab">Temas legales</a></li> 
              <li class="<?=$g_et == 1 ? 'active' : '' ?>" ><a href="#etapa" data-toggle="tab">Etapas</a></li>

              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane <?=$g_et != 1 ? 'active' : '' ?>" id="Residente">
                

                <div class="box-body pad">

              
             
                <div class="row">

             <input type="hidden" name="id_residente" id="id_residente" value="<?php echo $id_residente; ?>">     

          <div class="form-group col-md-3">
           <label for="nombre">Nombre completo:</label><br>
           <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>" >
         </div>
        <div class="form-group col-md-3">
            <label for="apellido" >Apellidos:</label><br>
            <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $apellido; ?>">
        </div> 
             
        
        <div class="form-group col-md-3"> 
            <label for="rut">Rut:</label><br>
            <input type="text" name="rut" id="rut" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask value="<?php echo $rut; ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="sexo">Sexo:<br></label><br>
          <select class="form-control" name="sexo" id="sexo">
            <option value="<?php echo $sexo; ?>"><?php echo $sexo; ?></option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
       </div> <!-- Cierre del row -->

        <!-- Abrir el row -->
        <div class="row">
        <div class="form-group col-md-3">
            <label for="telefono">Telefono:</label><br>
            <input type="text" name="telefono" id="telefono" class="form-control"  data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask placeholder="<?php echo $telefono; ?>" value="<?php echo $telefono; ?>" >
        </div>
        
        <div class="form-group col-md-3">
                <label for="fecha" >Fecha de nacimiento:</label><br>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        
        <div class="form-group col-md-3">
          <label for="nivel">Nivel de estudio:</label><br>
          <input type="text" class="form-control" name="nivel" id="nivel" value="<?php echo $nivel; ?>">
        </div>
  
        <div class="form-group col-md-3">
          <label for="profesion">Profesion:</label><br>
          <input type="text" class="form-control" name="profesion" id="profesion" value="<?php echo $profesion; ?>">
        </div>

      </div><!-- Cierre del row -->

      <div class="row">
         <div class="form-group col-md-3">
            <label for="direccion" >Dirección:</label><br>
            <input type="text"class="form-control" name="direccion" id="direccion"  value="<?php echo $direccion; ?>">
        </div> 
         
      <div class="form-group col-md-3">
            <label for="localidad" >Ciudad:</label><br>
            <input type="text" class="form-control" name="localidad" id="localidad" value="<?php echo $localidad; ?>">
        </div>
        
      <div class="form-group col-md-3">
            <label for="provincia" >Comuna:</label><br>
            <input type="text" class="form-control" name="provincia" id="provincia" value="<?php echo $provincia; ?>" >
        </div>
        
        <div class="form-group col-md-3">
            <label for="correo">Correo electronico:</label><br>
            <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $correo; ?>" >
        </div>
  </div><!-- cierre del row -->
      <div class="row">
        <div class="form-group col-md-12">
              <label for="direccion_3_m">Dirección últimos 3 meses:</label><br>
              <input type="text" class="form-control" name="direccion_3_m" id="direccion_3_m" value="<?php echo $direccion_3_m; ?>" >
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
              <label for="direccion_consumo_3_m">Dirección de consumo en los últimos 3 meses:</label><br>
              <input type="text" class="form-control" name="direccion_consumo_3_m" id="direccion_consumo_3_m" value="<?php echo $direccion_consumo_3_m; ?>" >
        </div>
      </div>
        
              

              <!-- Inicio de seccion de nucleo familiar -->
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
                          <label for="nombre_p">Nombre Completo</label><br>
                          <input type="text" class="form-control" name="nombre_p" id="nombre_p" value="<?php echo $nombre_p; ?>">
                    </div>

                    <div class="form-group col-md-3">
                          <label for="apellido_p">Apellidos:</label><br>
                          <input type="text" class="form-control" name="apellido_p" id="apellido_p" value="<?php echo $apellido_p; ?>">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="fecha_p" >Fecha de nacimiento:</label><br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" name="fecha_p" id="fecha_p" value="<?php echo $fecha_p; ?>">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <div class="form-group col-md-3">
                          <label for="nivel_p">Nivel de estudio:</label><br>
                          <input type="text" class="form-control" name="nivel_p" id="nivel_p" value="<?php echo $nivel_p; ?>">
                    </div>
                  </div><!-- Cierre del row -->
                  <div class="row">
                    <div class="form-group col-md-4">
                          <label for="ocupacion_p">Ocupación:</label><br>
                          <input type="text" class="form-control" name="ocupacion_p" id="ocupacion_p" value="<?php echo $ocupacion_p; ?>">
                    </div>

                    <div class="form-group col-md-4">
                          <label for="telefono_p">Teléfono personal:</label><br>
                          <input type="text" class="form-control" name="telefono_p" id="telefono_p" placeholder="<?php echo $telefono_p ?>" value="<?php echo $telefono_p; ?>" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask >
                    </div>

                    <div class="form-group col-md-4">
                          <label for="telefono_p_t">Teléfono trabajo:</label><br>
                          <input type="text" class="form-control" name="telefono_p_t" id="telefono_p_t" placeholder="<?php echo $telefono_p_t ?>" value="<?php echo $telefono_p_t; ?>" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask >
                    </div>

                    
                    <div>

                    <div class="form-group col-md-6">
                          <label for="direccion_p">Dirección personal:</label><br>
                          <input type="text" class="form-control" name="direccion_p" id="direccion_p" value="<?php echo $direccion_p; ?>">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="direccion_p_t">Dirección trabajo:</label><br>
                          <input type="text" class="form-control" name="direccion_p_t" id="direccion_p_t" value="<?php echo $direccion_p_t; ?>">
                    </div>
                    <div class="form-group col-md-12">
                          <label for="tipo_relacion_p">Tipo de relación:</label><br>
                          <input type="text" class="form-control" name="tipo_relacion_p" id="tipo_relacion_p" value="<?php echo $tipo_relacion_p; ?>">
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
                          <label for="m_nombre">Nombre Completo</label><br>
                          <input type="text" class="form-control" name="m_nombre" id="m_nombre" value="<?php echo $m_nombre; ?>">
                    </div>

                    <div class="form-group col-md-3">
                          <label for="m_apellido">Apellidos:</label><br>
                          <input type="text" class="form-control" name="m_apellido" id="m_apellido" value="<?php echo $m_apellido; ?>">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="m_fecha">Fecha de nacimiento:</label><br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" name="m_fecha" id="m_fecha" value="<?php echo $m_fecha; ?>">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

        
                    <div class="form-group col-md-3">
                          <label for="m_nivel">Nivel de estudio:</label><br>
                          <input type="text" class="form-control" name="m_nivel" id="m_nivel" value="<?php echo $m_nivel; ?>">
                    </div>

                  </div><!-- Cierre del row -->
                  <div class="row">
                    <div class="form-group col-md-4">
                          <label for="m_ocupacion">Ocupación:</label><br>
                          <input type="text" class="form-control" name="m_ocupacion" id="m_ocupacion" value="<?php echo $m_ocupacion; ?>">
                    </div>

                    <div class="form-group col-md-4">
                          <label for="m_telefono">Teléfono personal:</label><br>
                          <input type="text" class="form-control" name="m_telefono" id="m_telefono" placeholder="<?php echo $m_telefono; ?>" value="<?php echo $m_telefono; ?>" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
                    </div>

                    <div class="form-group col-md-4">
                          <label for="m_telefono_t">Teléfono trabajo:</label><br>
                          <input type="text" class="form-control" name="m_telefono_t" id="m_telefono_t" placeholder="<?php echo $m_telefono_t; ?>" value="<?php echo $m_telefono_t; ?>" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
                    </div>

                    <div>
                    <div class="form-group col-md-6">
                          <label for="m_direccion">Dirección personal:</label><br>
                          <input type="text" class="form-control" name="m_direccion" id="m_direccion" value="<?php echo $m_direccion; ?>">
                    </div>
                    <div class="form-group col-md-6">
                          <label for="m_direccion_t">Dirección trabajo:</label><br>
                          <input type="text" class="form-control" name="m_direccion_t" id="m_direccion_t" value="<?php echo $m_direccion_t; ?>">
                    </div>
                    <div class="form-group col-md-12">
                          <label for="m_tipo_relacion">Tipo de relación:</label><br>
                          <input type="text" class="form-control" name="m_tipo_relacion" id="m_tipo_relacion" value="<?php echo $m_tipo_relacion; ?>">
                    </div>
              </div>
            </div>


                </div>
                
              </div>
            </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="pareja">
                <div class="box box-solid">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-group col-md-3">
                          <label for="pareja_nom">Nombre Completo:</label><br>
                          <input type="text" class="form-control" name="pareja_nom" id="pareja_nom" value="<?php echo $pareja_nom; ?>">
                    </div>                    
                    <div class="form-group col-md-3">
                          <label for="pareja_ape">Apellido:</label><br>
                          <input type="text" class="form-control" name="pareja_ape" id="pareja_ape" value="<?php echo $pareja_ape; ?>">
                    </div>
                   <div class="form-group col-md-3">
                      <label for="pareja_fecha">Fecha de nacimiento:</label><br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" name="pareja_fecha" id="pareja_fecha" value="<?php echo $pareja_fecha; ?>">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-3">
                          <label for="pareja_ocupa">Ocupcaión:</label><br>
                          <input type="text" class="form-control" name="pareja_ocupa" id="pareja_ocupa" value="<?php echo $pareja_ocupa; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3">
                          <label for="pareja_nivel">Nivel de estudio:</label><br>
                          <input type="text" class="form-control" name="pareja_nivel" id="pareja_nivel" value="<?php echo $pareja_nivel; ?>">
                    </div>
                    <div class="form-group col-md-3">
                          <label for="pareja_hijos">Hijos:</label><br>
                          <input type="text" class="form-control" name="pareja_hijos" id="pareja_hijos" value="<?php echo $pareja_hijos; ?>">
                    </div>
                    <div class="form-group col-md-3">
                          <label for="pareja_correo">Correo electronico:</label><br>
                          <input type="email" class="form-control" name="pareja_correo" id="pareja_correo" value="<?php echo $pareja_correo; ?>">
                    </div>
                    <div class="form-group col-md-3">
                          <label for="pareja_telf">Teléfono:</label><br>
                          <input type="text" class="form-control" name="pareja_telf" id="pareja_telf" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask placeholder="<?php echo $pareja_telf; ?>" value="<?php echo $pareja_telf; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                            <label for="pareja_direccion_p">Dirección personal:</label><br>
                            <input type="text" class="form-control" name="pareja_direccion_p" id="pareja_direccion_p" value="<?php echo $pareja_direccion_p; ?>">
                    </div>
                    <div class="form-group col-md-4">
                            <label for="pareja_direccion_t">Dirección trabajo:</label><br>
                            <input type="text" class="form-control" name="pareja_direccion_t" id="pareja_direccion_t" value="<?php echo $pareja_direccion_t; ?>">
                    </div>
                    <div class="form-group col-md-4">
                          <label for="pareja_telf_t">Teléfono trabajo:</label><br>
                          <input type="text" class="form-control" name="pareja_telf_t" id="pareja_telf_t" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask placeholder="<?php echo $pareja_telf_t; ?>" value="<?php echo $pareja_telf_t; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                            <label for="pareja_trela">Tipo de relación:</label><br>
                            <input type="text" class="form-control" name="pareja_trela" id="pareja_trela" value="<?php echo $pareja_trela; ?>">
                      </div>
                  </div>
                    
                    </div>
                    
                  </div>
                
              </div> <!-- -->
              
            <!-- Apoderado  -->
            
            <div class="tab-pane" id="apoderado">
                <div class="box box-solid">
                  <div class="box-body">
                    <div class="row">
                      <div class="box box-solid">
                        <div class="form-group col-md-3">
                          <label>Nombre:</label>
                          <input type="text" class="form-control" name="nombre_apo" value="<?php echo $nombre_apo; ?>">                        
                        </div>
                        <div class="form-group col-md-3">
                          <label>Apellido:</label>
                          <input type="text" class="form-control" name="apellido_apo" value="<?php echo $apellido_apo; ?>">
                        </div>
                        <div class="form-group col-md-3"> 
                          <label for="rut_apo">Rut:</label><br>
                          <input type="text" name="rut_apo" id="rut_apo" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask value="<?php echo $rut_apo; ?>">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="telefono_apo">Teléfono:</label><br>
                          <input type="text" class="form-control" name="telefono_apo" id="telefono_apo" placeholder="<?php echo $telefono_apo; ?>" value="<?php echo $telefono_apo; ?>" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
                        </div>
                        <div class="form-group col-md-4">
                          <label>Dirección personal:</label>
                          <input type="text" class="form-control" name="direccion_apo" value="<?php echo $direccion_apo; ?>">
                        </div>
                        <div class="form-group col-md-4">
                          <label>Dirección trabajo:</label>
                          <input type="text" class="form-control" name="direccion_apo_t" value="<?php echo $direccion_apo_t; ?>">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="telefono_apo_t">Teléfono trabajo:</label><br>
                          <input type="text" class="form-control" name="telefono_apo_t" id="telefono_apo_t" placeholder="<?php echo $telefono_apo_t; ?>" value="<?php echo $telefono_apo_t; ?>" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
                        </div>
                        <div class="form-group col-md-12">
                          <label>Tipo de relación:</label>
                          <input type="text" class="form-control" name="tipo_r_apo" value="<?php echo $tipo_r_apo; ?>">
                        </div>
                      </div>
                    </div>
                  </div>                
              </div>
            </div>

            <!-- ./ Fin apoderado -->

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
            <!-- Antecedentes legales -->
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
                      <input type="radio" name="descrip"  value="si" onclick="most(0)" <?php if($descrip == 'si') echo "checked"; ?>>
                      Sí
                    </h4>  
                  </div>
                  <div class="form-group col-md-1 col-xs-3">
                    <h4> 
                      <input type="radio" name="descrip" value="no" onclick="most(1)" <?php if($descrip == 'no') echo "checked"; ?>>
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
                    <textarea type="text" name="antecedente_lg" class="md-textarea form-control" rows="5"><?php echo $antecedente_lg; ?></textarea>
                  </div>
                
                
                  <div class="form-group col-md-12">
                    <label>Tramites o temas pendientes</label>
                    <textarea type="text" name="tramite_p"  class="md-textarea form-control" rows="5"><?php echo $tramite_p; ?></textarea>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
              

              <!-- /.tab-pane -->
            <!--- -->
            <!-- /. fin Antecedentes legales --> 

            <!-- Tab-panel de tratamiento -->
              <div class="tab-pane" id="tratamiento">
              
                      <div class="row">
          <div class="col-md-12">
          <div class="box box-solid">

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
                                <textarea type="text" name="remite" id="remite" class="md-textarea form-control" rows="7" ><?php echo $remite; ?></textarea>
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
                                <textarea type="text" name="tanterior" id="tanterior" class="md-textarea form-control" rows="7"><?php echo $tanterior; ?></textarea>
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
                        <textarea type="text" name="aanterior" id="aanterior" class="md-textarea form-control" rows="7"><?php echo $aanterior; ?></textarea>
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
                          <textarea type="text" name="tactual"  class="md-textarea form-control" rows="7"><?php echo $tactual; ?></textarea>
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
                          <textarea type="text" name="t_medica" placeholder="Indicar cuales toma..." class="md-textarea form-control" rows="7"><?php echo $t_medica; ?></textarea>
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
                        <textarea type="text" name="antecedentes" id="antecedentes" class="md-textarea form-control" rows="7"><?php echo $antecedentes; ?></textarea>
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
            <div class="tab-pane <?=$g_et == 1 ? 'active' : '' ?>" id="etapa">
<?php 
date_default_timezone_set("America/Santiago");
$Dhoy = date('Y-m-d');



?>
      <div class="row">
        <div class="col-md-offset-5 col-md-4">
          <h3>Etapas del residente</h3>
        </div>
        <div class="col-md-3">
          <!-- Button trigger modal -->
<h4><button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_new_Etapas_modal">
 <i class="fa fa-plus"></i> Etapa
</button><h4><br>
        </div>

<br>
        <div class="col-md-offset-1 col-md-10">
          <div class="box box-solid">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

          
            <div class="archivo"></div>
     
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
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
    
        <center>
        <input type="submit"  class="btn btn-primary btn-lg" id="btn-ingresar" value="Guardar"></center>
     


           <br>
            <br>
  </form>

<?php include("ajax/etapas/addEtapaModal.php"); ?>
<?php include("ajax/etapas/edit_delete_modal.php"); ?>

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
<!-- Usuarios -->
<script type="text/javascript" src="js/etapas.js"></script>

</body>
</html>
