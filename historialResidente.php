<?php 

date_default_timezone_set("America/Santiago");
  
  include("include/rol.php");
    

      

      $id_residente = $_GET['id'];

      if(empty($_GET['id'])){
          header("location: consultaPsicologia.php");
      } 
      include("ajax/db_connection.php");

      $mostrar = "SELECT * from residentes where id_residente = '$id_residente' ";

      $sql = $mysql->query($mostrar);
      if($result = mysqli_num_rows($sql) == 0){
        header("location: consultaPsicologia.php");
      }else{
        while ($data = mysqli_fetch_array($sql)) {
          # code...
          
          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
          $etapa_resi = $data['etapa_resi'];
          $id_etapa_resi = $data['id_etapa_resi'];
        }
      }


      ?>
    
<!DOCTYPE html>
<html lang="es">
<head>
  <title>FUNVID | Historial Residente</title>
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
        Historial Residente: <strong><?php echo $nombre." ".$apellido; ?></strong>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Historial</a></li>
        <li class="active">inicio</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

      

        


<div class="row">
  <div class=" pull-right col-md-3 col-offset-9">
    <div class="pull-right">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newConsulta"><i class="fa fa-plus"></i> Nueva Consulta</button><br>
    </div>
  </div>
</div>


<div id="newConsulta" tabindex="-1" class="modal fade" role="dialog" >
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <center><h2 class="modal-title" id="myModalLabel">Nueva Consulta</h2></center>
      </div>

      <form action="ajax/consultaPsicologo/addConsulta.php?id=<?php echo $id_residente; ?>" method="POST">
      <div class="modal-body">
        <!-- Contenido del modal -->      
      <div class="row">
      <div class="box box-solid">

        <input type="hidden" name="id_residente" value="<?php echo $id_residente; ?>">

        <div class="form-group col-md-12">
          <label>Motivo de consulta</label>
          <textarea name="motivo" id="motivo" class="form-control"></textarea>
        </div>

        <div class="form-group col-md-6">
        
          <input type="hidden" name="categoria" id="categoria" class="form-control">
  
          <input type="hidden" name="etapa_resi" value="<?php echo $etapa_resi; ?>">  


          <input type="hidden" name="fecha_c" value="<?php echo date("Y-m-d"); ?>">
        </div>
      </div>
    </div>
         
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       <input type="submit" class="btn btn-primary" value="Crear">
      </div>
    </form>
  </div>
</div>
</div>
  
   

   <br>  

       

  <div class="row">
          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Lista general de consultas</h3>
                </div>  
                <div class="box-body">
                  
                  <div classs="container"> 
     <div class="box box-solid"> 
      <div class="box-body table-responsive no-padding">
     <!--  <div class="row"> -->
        <div class="col-xs-12">
         
        <table id="reducadosTable" class=" table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th style="width: 5%">No.</th>
            <th style="width: 400px;">Motivo</th>
            <th>Fecha</th>
            <th>Etapa</th>
            <th ><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php

            $data = "";
              include('ajax/db_connection.php');
              $sql = "SELECT c.*,r.id_residente, r.etapa_resi FROM consultap c INNER JOIN residentes r ON c.id_residente = r.id_residente WHERE c.id_residente = '$id_residente' ORDER BY c.id_consulta DESC";


    
       
       if (!$result = $mysql->query($sql)) {
        echo "Error".$mysql->error;
    }

          // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        { 
          $id = $row['id_consulta'];
          $consulta = $mysql->query("SELECT * FROM area WHERE id_consulta = '$id' ");
          $c = mysqli_num_rows($consulta);
            $data .= '
            
            <tr>
                
                <th>'.$row['id_consulta'].'</th>
                <th>'.$row['motivo'].'</th>
                <th>'.date('d-m-Y', strtotime($row['fecha_c'])).'</th>
                <th>'.$row['etapa'].'</th>
                ';

              if($c > 0 ){


            $data .= "<td style='width: 15%'><center><a title='Editar' href='editarConsultaPresi.php?id=".$row['id_residente']."&con=".$row['id_consulta']."' class='btn btn-warning'><i class='glyphicon glyphicon-pencil'></i></a>

                        
                        
              <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$row['id_residente'].",".$row['id_consulta'].")'><i class='glyphicon glyphicon-trash'></i></a>

              <a href='genera_pdf/consultaPsicologia.php?id=".$row['id_residente']."&consul=".$row['id_consulta']."' class='btn btn-info'><i class='fa fa-file-pdf-o'></i> <strong>PDF <strong></a>
    
              </center> </td>";

        }else{

          $data .=  "<td style='width: 15%'><center> <a title='Gestionar' href='consultaPresi.php?id=".$row['id_residente']."&con=".$row['id_consulta']."' class='btn btn-success'><i class='fa fa-stethoscope'></i>Gestionar</a>
                        </center></td>";
        }

            $data .= '
               </th>
            </tr>
            ';
            $number++;
        }
        $data.="</tbody></table>"; 
    }
    

    

    echo $data;
            ?>
          </tbody>
        </table>
      </div>
      <!--</div> -->
    </div>
    </div>
    </div>
                  
                </div>
              </div>
           </div>
          </div>  
 
<script type="text/javascript" src="js/jquery.min.js"></script>


<script type="text/javascript">
    function preguntar (id, con){
      if(confirm('¿Esta seguro que desa eliminar esta terapia?')){
        window.location.href = "ajax/consultaPsicologo/eliminarConsultaP.php?id=" + id+ "&con=" + con;

      }
   }
</script>

        
    
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

     
</body>
</html>


