<?php
 
 include("include/rol.php");

    
    if(isset($_GET["b"]) && $_GET["b"] != "r") {
    header("Location: registrarResidente.php");
  }elseif(isset($_GET["error"]) && $_GET["error"] != "dato"){
    header("Location: resgistrarResidente.php");
  }
    
    date_default_timezone_set("America/Santiago");


 
    ?>
 <!DOCTYPE html>
<html lang="es">  
<head>
   <title>FUNVID | Historias Psicologicas.</title>
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
        Residente
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Historias</a></li>
        <li class="active">inicio</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid"><br>

  <?php
      if(isset($_GET["b"])) {
        echo "<center><p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>¡Bien Hecho!</strong> El Residente se ha agregado con éxito.</p></center>";
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
      <!-- Inicio del formulario -->
      <form action="ajax/residentes/addResidentes.php" method="POST">
     
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Residente" data-toggle="tab">Datos Residentes</a></li>
              <li><a href="#nucleo_familiar" data-toggle="tab">Núcleo Familiar</a></li>
              <li><a href="#pareja" data-toggle="tab">Pareja</a></li>
              <li><a href="#apoderado" data-toggle="tab">Apoderado</a></li>
              <li><a href="#tratamiento" data-toggle="tab">Tratamientos Anteriores</a>
              <li><a href="#legal" data-toggle="tab">Temas legales</a></li></li>
              <li><a href="#etapa" data-toggle="tab">Etapas</a></li></li>


              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="Residente">
                

                <div class="box-body pad">

              
             
                <div class="row">

          <div class="form-group col-md-3">
           <label for="nombre">Nombre completo:</label><br>
           <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo" >
         </div>
        <div class="form-group col-md-3">
            <label for="apellido" >Apellidos:</label><br>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellidos">
        </div> 
             
        
        <div class="form-group col-md-3"> 
            <label for="rut">Rut:</label><br>
            <input type="text" name="rut" id="rut" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask>
        </div>

        <div class="form-group col-md-3">
          <label for="sexo">Sexo:<br></label><br>
          <select class="form-control" name="sexo" id="sexo">
            <option>Seleccionar ...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
       </div> <!-- Cierre del row -->

        <!-- Abrir el row -->
        <div class="row">
        <div class="form-group col-md-3">
            <label for="telefono">Teléfono:</label><br>
            <input type="text" name="telefono" id="telefono" class="form-control" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
        </div>
        
        <div class="form-group col-md-3">
                <label for="fecha" >Fecha de nacimiento:</label><br>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" name="fecha" id="fecha">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        
        <div class="form-group col-md-3">
          <label for="nivel">Nivel de estudio:</label><br>
          <input type="text" class="form-control" name="nivel" id="nivel">
        </div>
  
        <div class="form-group col-md-3">
          <label for="profesion">Profesión:</label><br>
          <input type="text" class="form-control" name="profesion" id="profesion">
        </div>

      </div><!-- Cierre del row -->

      <div class="row">
         <div class="form-group col-md-3">
            <label for="direccion" >Dirección:</label><br>
            <input type="text"class="form-control" name="direccion" id="direccion"  placeholder="Dirección">
        </div> 
         
      <div class="form-group col-md-3">
            <label for="localidad" >Ciudad:</label><br>
            <input type="text" class="form-control" name="localidad" id="localidad" placeholder="Ciudad">
        </div>
        
      <div class="form-group col-md-3">
            <label for="provincia" >Comuna:</label><br>
            <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Comuna" >
        </div>
        
        <div class="form-group col-md-3">
            <label for="correo">Correo electrónico:</label><br>
            <input type="email" class="form-control" name="correo" id="correo" placeholder="ejemplo@ejemplo.com" >
        </div>
  </div><!-- cierre del row -->
      
      <div class="row">
        <div class="form-group col-md-12">
          <label for="Dirección últimos 03 meses">Dirección últimos 3 meses:</label>
          <input type="text" class="form-control" name="direccion_3_m" id="direccion_3_m" placeholder="Cual fue su residencia en los últimos 3 meses" >
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
                          <input type="text" class="form-control" name="nombre_p" id="nombre_p" placeholder="Nombre">
                    </div>

                    <div class="form-group col-md-3">
                          <label for="apellido_p">Apellidos:</label><br>
                          <input type="text" class="form-control" name="apellido_p" id="apellido_p" placeholder="Apellidos">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="fecha_p" >Fecha de nacimiento:</label><br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" name="fecha_p" id="fecha_p">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <div class="form-group col-md-3">
                          <label for="nivel_p">Nivel de estudio:</label><br>
                          <input type="text" class="form-control" name="nivel_p" id="nivel_p" placeholder="Nivel de estudio">
                    </div>
                  </div><!-- Cierre del row -->
                  <div class="row">
                    <div class="form-group col-md-4">
                          <label for="ocupacion_p">Ocupación:</label><br>
                          <input type="text" class="form-control" name="ocupacion_p" id="ocupacion_p" placeholder="Ocupación">
                    </div>

                    <div class="form-group col-md-4">
                          <label for="telefono_p">Teléfono personal:</label><br>
                          <input type="text" class="form-control" name="telefono_p" id="telefono_p" placeholder="Telefono Personal" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
                    </div>

                    <div class="form-group col-md-4">
                          <label for="telefono_p">Teléfono trabajo:</label><br>
                          <input type="text" class="form-control" name="telefono_p_t" id="telefono_p_t" placeholder="Telefono trabajo" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
                    </div>

                  <div>

                  
                    <div class="form-group col-md-6">
                            <label for="direccion_p">Dirección casa:</label><br>
                            <input type="text" class="form-control" name="direccion_p" id="direccion_p" placeholder="Dirección de casa">
                    </div>

                    <div class="form-group col-md-6">
                            <label for="direccion_p">Dirección trabajo:</label><br>
                            <input type="text" class="form-control" name="direccion_p_t" id="direccion_p_t" placeholder="Dirección trabajo actual">
                    </div>

                  
                    <div class="form-group col-md-12">
                          <label for="tipo_relacion_p">Tipo de relación:</label><br>
                          <input type="text" class="form-control" name="tipo_relacion_p" id="tipo_relacion_p" placeholder="Tipo de relacion">
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
                          <input type="text" class="form-control" name="m_nombre" id="m_nombre" placeholder="Nombre">
                    </div>

                    <div class="form-group col-md-3">
                          <label for="m_apellido">Apellidos:</label><br>
                          <input type="text" class="form-control" name="m_apellido" id="m_apellido" placeholder="Apellidos">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="m_fecha">Fecha de nacimiento:</label><br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" name="m_fecha" id="m_fecha">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

        
                    <div class="form-group col-md-3">
                          <label for="m_nivel">Nivel de estudio:</label><br>
                          <input type="text" class="form-control" name="m_nivel" id="m_nivel" placeholder="Nivel de estudio">
                    </div>

                  </div><!-- Cierre del row -->
                  <div class="row">
                    <div class="form-group col-md-4">
                          <label for="m_ocupacion">Ocupación:</label><br>
                          <input type="text" class="form-control" name="m_ocupacion" id="m_ocupacion" placeholder="Ocupación">
                    </div>

                    <div class="form-group col-md-4">
                          <label for="m_telefono">Teléfono Personal:</label><br>
                          <input type="text" class="form-control" name="m_telefono" id="m_telefono" placeholder="Teléfono personal" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
                    </div>

                    <div class="form-group col-md-4">
                          <label for="m_telefono">Teléfono Trabajo:</label><br>
                          <input type="text" class="form-control" name="m_telefono_t" id="m_telefono_t" placeholder="Teléfono trabajo" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
                    </div>

                    
                    <div> <!-- Cierre del Row -->

                    
                      <div class="form-group col-md-6">
                          <label for="m_direccion">Dirección Personal:</label><br>
                          <input type="text" class="form-control" name="m_direccion" id="m_direccion" placeholder="Dirección personal">
                      </div>

                      <div class="form-group col-md-6">
                          <label for="m_direccion">Dirección Trabajo:</label><br>
                          <input type="text" class="form-control" name="m_direccion_t" id="m_direccion_t" placeholder="Dirección trabajo actual">
                      </div>
                    

                      <div class="form-group col-md-12">
                            <label for="m_tipo_relacion">Tipo de relación:</label><br>
                            <input type="text" class="form-control" name="m_tipo_relacion" id="m_tipo_relacion" placeholder="Tipo de relacion">
                      </div>
                     
              </div>
            </div>


                </div>
                
              </div>
            </div><!-- /.tab-pane -->
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
                      <input type="radio" name="descrip"  value="si" onclick="most(0)">
                      Sí
                    </h4>  
                  </div>
                  <div class="form-group col-md-1 col-xs-3">
                    <h4> 
                      <input type="radio" name="descrip" value="no" onclick="most(1)" checked>
                      No 
                    </h4>
                  </div>
                </div>
                

                <div id="f1" style="display: none">
                
                  <div class="form-group col-md-12">
                    <label>Antecedentes</label>
                    <textarea type="text" name="antecedente_lg" class="md-textarea form-control" rows="5"></textarea>
                  </div>
                
                
                  <div class="form-group col-md-12">
                    <label>Tramites o temas pendientes</label>
                    <textarea type="text" name="tramite_p"  class="md-textarea form-control" rows="5"></textarea>
                  </div>
                
              </div>
              </div>
            </div>
          </div>

              

              <!-- /.tab-pane -->
            </div><!--- -->
            <!-- /. fin Antecedentes legales --> 

                      <!-- Apeoderado -->
          <div class="tab-pane" id="apoderado">
              
        <div class="row">
          <div class="col-md-12">
            <div class="box">
            <div class="box box-body pad">
              <div class="row">
              <div class="form-group col-md-3">
                <label>Nombre:</label>
                <input type="text" name="nombre_apo" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>Apellido:</label>
                <input type="text" class="form-control" name="apellido_apo">
              </div>
              <div class="form-group col-md-3">
                <label>Rut:</label>
                <input type="text" class="form-control" name="rut_apo" data-inputmask='"mask": " 99.999.999-*"' data-mask>
              </div>
              <div class="form-group col-md-3">
                <label>Telefono:</label>
                <input type="text" class="form-control" name="telefono_apo" data-inputmask='"mask": " +56 (9) 999-99-999"' data-mask>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label>Tipo de relación:</label>
                <input type="text" class="form-control" name="tipo_r_apo">
              </div>
            </div>
            </div>
          </div>
          </div>
        </div>
              <!-- ./ Fin de tratamiento -->

              <!-- /.tab-pane -->
            </div><!--- -->

          <!-- ./ Fin Antecedentes legales -->


              <div class="tab-pane" id="pareja">
                <div class="box box-solid">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-group col-md-3">
                          <label for="pareja_nom">Nombre Completo:</label><br>
                          <input type="text" class="form-control" name="pareja_nom" id="pareja_nom" placeholder="Nombre Completo">
                    </div>                    
                    <div class="form-group col-md-3">
                          <label for="pareja_ape">Apellido:</label><br>
                          <input type="text" class="form-control" name="pareja_ape" id="pareja_ape" placeholder="Apellidos">
                    </div>
                   <div class="form-group col-md-3">
                      <label for="pareja_fecha">Fecha de nacimiento:</label><br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" name="pareja_fecha" id="pareja_fecha">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-3">
                          <label for="pareja_ocupa">Ocupación:</label><br>
                          <input type="text" class="form-control" name="pareja_ocupa" id="pareja_ocupa" placeholder="Ocupación">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3">
                          <label for="pareja_nivel">Nivel de estudio:</label><br>
                          <input type="text" class="form-control" name="pareja_nivel" id="pareja_nivel" placeholder="Nivel de estudio">
                    </div>
                    <div class="form-group col-md-3">
                          <label for="pareja_hijos">Hijos:</label><br>
                          <input type="text" class="form-control" name="pareja_hijos" id="pareja_hijos" placeholder="Hijos">
                    </div>
                    <div class="form-group col-md-3">
                          <label for="pareja_correo">Correo electronico:</label><br>
                          <input type="email" class="form-control" name="pareja_correo" id="pareja_correo" placeholder="ejemplo@ejemplo.com">
                    </div>
                    <div class="form-group col-md-3">
                          <label for="pareja_telf">Teléfono:</label><br>
                          <input type="text" class="form-control" name="pareja_telf" id="pareja_telf" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                            <label for="pareja_trela">Tipo de relación:</label><br>
                            <input type="text" class="form-control" name="pareja_trela" id="pareja_trela" placeholder="Tipo de relación">
                      </div>
                  </div>
                    
                    </div>
                    
                  </div>
                
              </div>
              
            <!-- Tab-panel de tratamiento -->
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
                                <textarea type="text" name="remite" id="remite" class="md-textarea form-control" rows="7"></textarea>
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
                                <textarea type="text" name="tanterior" id="tanterior" class="md-textarea form-control" rows="7"></textarea>
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
                        <textarea type="text" name="aanterior" id="aanterior" class="md-textarea form-control" rows="7"></textarea>
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
                          <textarea type="text" name="tactual"  class="md-textarea form-control" rows="7"></textarea>
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
                          <textarea type="text" name="t_medica"  class="md-textarea form-control" rows="7"></textarea>
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
                        <textarea type="text" name="antecedentes" id="antecedentes" class="md-textarea form-control" rows="7"></textarea>
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
            </div><!--- -->
             <div class="tab-pane" id="etapa">
               <?php include("ajax/etapas/etapas.php"); ?>
             </div>

            
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
        
          <input type="hidden" name="fecha_registro" value="<?php echo date("Y-m-d"); ?>">

       
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->
    
        <center>
        <input type="submit"  class="btn btn-primary btn-lg" id="btn-ingresar" value="Registrar"></center>
     

           
            
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
<!-- Usuarios -->
   


</body>
</html>
