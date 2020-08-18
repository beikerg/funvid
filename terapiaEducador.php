<?php
 
  include("include/rol.php");
 

    include("ajax/db_connection.php");

    if(empty($_GET['id'])){
      header("location: ListaTEspecial.php");
    }


    $id_residente = $_GET['id'];

    $q = "SELECT * FROM residentes WHERE id_residente = '$id_residente' ";
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
          $etapa_resi = $data['etapa_resi'];

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
  
  <title>FUNVID | Terapia Reunión de educadores</title>
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
        Terapia Reunión de Educadores
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Terapia Reunión de Educadores</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="form-group pull-right">
          <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#asistencia-modal" >Asistencia</button>
        </div>
         <br>

       <form action="ajax/terapias/reunion-educadores/addEducador.php?id=<?php echo $id_residente; ?>" method="POST">

       <?php include("ajax/terapias/reunion-educadores/tableTResidente.php"); ?>
      
            
          
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
                      
                      <div class="form-group col-md-2">
                          <label>Edad:</label>
                          <input class="form-control" type="text" value="<?php echo $edad; ?>" disabled>
                      </div>

                      <div class="form-group col-md-2">
                        <label>Etapa actual:</label> 
                        <select class="form-control" name="etapa_redu" id="etapa_redu">
                          <option placeholder="Seleccionar etapa.." value="<?php echo $etapa_resi; ?>"><?php echo $etapa_resi; ?></option>
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
                        <!-- <input class="form-control" type="text" value="<?php// echo $etapa_resi; ?>" disabled> -->
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
                                 
                     <div class="row">
                      <div class="form-group col-md-4">
                         <label>Nombre Lider:</label>
                          <input class="form-control" type="text" name="lider_redu" id="lider_redu" placeholder="Nombre">
                      </div> 

                      <div class="form-group col-md-4">                          
                              <label>Nombre Colider:</label>
                              <input class="form-control" type="text" name="colider_redu" id="colider_redu" placeholder="Nombre Colider">                          
                      </div>
                      
                      <div class="form-group col-md-4">                          
                              <label>Educadores:</label>
                              <input class="form-control" type="text" name="edu_redu" id="edu_redu" placeholder="Nombre de los educadores que participan">                          
                      </div>
                     </div> 
                    
                      
                      <div class="row">
                      
                <div class="form-group col-md-4">
                    <label>Fecha:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="fecha_redu" class="form-control pull-right" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <!-- /.input group -->
              </div>
                      
                      
                      <div class="form-group col-md-4">
                          <label>Hora inicio:</label>
                          <input class="form-control" name="h_inicio_redu" type="time" value="<?php echo date("H:i"); ?>">
                      </div>
                      
                      <div class="form-group col-md-4">
                          <label>Hora termino:</label>
                          <input class="form-control" name="h_fin_redu" type="time">
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
    

            <?php include("ajax/terapias/fallas/fallas-add.php"); ?>
    


    
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
                    <textarea class="form-control" rows="3" name="o_lider_redu" placeholder="Observaciones ..."></textarea>
                  </div>
                    
                  <div class="form-group">
                    <label>Observaciones Colider</label>
                    <textarea class="form-control" rows="3" name="o_colider_redu" placeholder="Observaciones ..."></textarea>
                  </div>
                     
                  <div class="form-group">
                    <label>Observaciones Generales Educadores</label>
                    <textarea class="form-control" rows="3" name="o_edu_redu" placeholder="Observaciones generales de educadores"></textarea>
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
                    <textarea class="form-control" rows="3" name="actitud_redu" placeholder="Actitud asumida ..."></textarea>
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
        <center> <button type="submit" class="btn btn-primary btn-lg" name="botones" value="Guardar">Guardar</button></center>
        
            
            
            
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

