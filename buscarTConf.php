<?php
 
  include("include/rol.php");

    include("ajax/db_connection.php");
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Terapias Anteriores</title>
  <?php  include("include/head.php"); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php 
  //<!-- Main Header -->
    include("include/header.php");
  //-- Left side column. contains the logo and sidebar -->
    include("include/aside-admin.php");
?>    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Terapia de confrontación
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Lista de Terapia de confrontación</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <?php

      $busqueda = strtolower($_REQUEST['busqueda']);

        if(empty($busqueda))
        {
          ?><script type="text/javascript">
            location.href="ListaTConf.php";
          </script><?php
          mysqli_close($mysql);
        }

       ?>

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    <div class="row">
    <div class="col-md-12 pull-right">
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Nueva Terapia</button>
  </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Seleccione el Residente</h4>
      </div>
      <div class="modal-body">
        
        
          <div class="col-lg-6 col-md-6 col-xs-12">    
      <div class="input-group"> 
    <label for="busquedas" class="sr-only">Buscar</label>
    <input type="text" class="form-control" name="busquedas" id="busquedas" placeholder="Buscar"></input>
    <span class="input-group-btn">
      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    </span>
  </div>
    </div>

     <br><br><br> 

       <div class="box">
       <div class="box-body table-responsive no-padding">
        <div class="box-tools">
                
         
  <div id="conf"></div>
  
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/tera-conf.js"></script>

          </div>
            
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>
    
       
            
        <br> <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Listar Terapias</h3>
              <div class="box-tools">
                
              <form action="buscarTConf.php" method="GET">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="busqueda" id="busqueda" class="form-control pull-right" placeholder="Buscar" value="<?php echo $busqueda; ?>">
                  <div class="input-group-btn"> 
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
            </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Rut</th>
                  <th>Director</th>
                  <th>Fecha</th>
                  <th>Opciones</th>
                </tr>


        <?php  

        $sql = "SELECT COUNT(*) as total_registro FROM tera_confronta t inner join residentes r ON t.id_residente = r.id_residente
                WHERE ( t.id_t_conf LIKE '%$busqueda%' OR 
                       t.director_tc LIKE '%$busqueda%' OR 
                       t.fecha_tc LIKE '%$busqueda%' OR
                        r.nombre LIKE '%$busqueda%' OR
                       r.apellido LIKE '%$busqueda%' OR
                       r.rut LIKE '%$busqueda%' )";

        $sql_registe = $mysql->query($sql);
        $result_register = mysqli_fetch_array($sql_registe);
        $total_registro = $result_register['total_registro'];

  
        $por_pagina = 5;

        if(empty($_GET['pagina']))
        {
          $pagina = 1;
        }else{
          $pagina = $_GET['pagina'];
        }

        $desde = ($pagina-1) * $por_pagina;
        $total_paginas = ceil($total_registro / $por_pagina);

        $q = "SELECT r.id_residente, r.nombre, r.apellido, r.rut, t.id_t_conf, t.director_tc, t.fecha_tc FROM tera_confronta t inner join residentes r ON t.id_residente = r.id_residente
            WHERE ( t.id_t_conf LIKE '%$busqueda%' OR 
                   t.director_tc LIKE '%$busqueda%' OR 
                   t.fecha_tc LIKE '%$busqueda%' OR
                    r.nombre LIKE '%b%' OR
                   r.apellido LIKE '%$busqueda%' OR
                   r.rut LIKE '%$busqueda%' )
           ORDER BY t.id_t_conf ASC LIMIT $desde,$por_pagina";

        $query = $mysql->query($q);
        $mysql->close();

        $resultado = mysqli_num_rows($query);

        if($resultado > 0){
          while ($data = mysqli_fetch_array($query)) {
            ?>

            <tr>
              <td><?php echo $data['id_t_conf']; ?></td>
              <td><?php echo $data['nombre']; ?></td>
              <td><?php echo $data['apellido']; ?></td>
              <td><?php echo $data['rut']; ?></td>
              <td><?php echo $data['director_tc']; ?></td>
              <td><?php echo $data['fecha_tc']; ?></td>
              <td>
                  <a class="btn btn-warning" title="Editar" href="EditarTerapiaConfrontacion.php?id=<?php echo $data['id_residente']; ?>&tera=<?php echo $data['id_t_conf']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>

                  <a class="btn btn-danger" title="Eliminar" href="#" onclick="preguntar(<?php echo $data['id_t_conf']; ?>)"><i class="glyphicon glyphicon-trash"></i></a>

                  <script type="text/javascript">
                  function preguntar (id){
                    if(confirm('¿Esta seguro que desa eliminar esta terapia?')){
                       window.location.href = "ajax/terapias/confrontacion/eliminarConfrontacion.php?id=" + id;
                        
                  }
                    }
                </script>

              </td>
            </tr>

            <?php 
          
          }
        }elseif($resultado == 0 ){
          
          ?><td colspan="7"><center><h3>¡No se encontro ningun resultado!</h3></center></td><?php

        }



        ?>
               
                
                
                
              </table>
            </div>

            <?php 
             if($total_registro != 0){



            ?>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php 

                  if($pagina != 1){

                    ?>
                     <li><a href="?paginar=<?php echo 1; ?>"> >> </a></li>
                     <li><a href="?paginar=<?php echo $paginar-1; ?>"> << </a></li>
                <?php 
                  }
                  for ($i=1; $i <= $total_paginas; $i++){
                    if($i == $pagina){

                      echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                    }
                  }

                  if($pagina != $total_paginas){

                    ?>

                    <li><a href="?pagina=<?php echo $pagina + 1; ?>"> >></a></li>
                    <li><a href="?pagina=<?php echo $total_paginas; ?> "> << </a></li>
                <?php  }

                ?>
               
                
                
              </ul>
            </div>
          <?php }
           

          ?>
          </div>
          <!-- /.-->
      
            
          
      
        

           
        

    

            
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
