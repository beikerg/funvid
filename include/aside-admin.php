<?php 

 $usuario = '<li class=""><a href="usuarios.php"><i class="fa fa-circle-o"></i><span>Usuarios</span></a></li>'; 

 $residentes = '<li class="treeview">
              <a href="#">
                <i class="fa fa-circle-o"></i>
                <span>Residentes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="residente.php"><i class="fa fa-circle-o"></i> Residentes</a></li>
                <li><a href="LReducado.php"><i class="fa fa-circle-o"></i> Reducados</a></li>
                <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono</a></li>
              </ul>
            </li>'; 

  // $profesionales = '<li class="treeview">
  //         <a href="#">
  //           <i class="fa fa-share"></i> <span>Profesionales</span>
  //           <span class="pull-right-container">
  //             <i class="fa fa-angle-left pull-right"></i>
  //           </span>
  //         </a>
  //         <ul class="treeview-menu">
  //           <li><a href="psicologo.php"><i class="fa fa-circle-o"></i> Psicólogo</a></li>
  //           <li><a href="terapeuta.php"><i class="fa fa-circle-o"></i> Terapeuta</a></li>
  //           <li><a href="educadores.php"><i class="fa fa-circle-o"></i> Educador</a></li>
  //         </ul>
  //       </li>';

    $listaTerapias = '<li class="treeview">
              <a href="#">
                <i class="fa fa-circle-o"></i>
                <span>Terapias</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="
                      terapiaconfrontacion.php"><i class="fa fa-circle-o"></i> Confrontación</a></li>
                <li><a href="ListaTerapiaRelatoPase.php"><i class="fa fa-circle-o"></i>Relato de pase</a></li>
                <li><a href="ListaTGrupal.php"><i class="fa fa-circle-o"></i>Grupal</a></li>
                <li><a href="ListaTInf.php"><i class="fa fa-circle-o"></i>Informativa</a></li>
                <li><a href="ListaTAvanzada.php"><i class="fa fa-circle-o"></i>Avanzada</a></li>
              </ul>
            </li>';

    $llamadaReducado = ' <li class=""><a href="reducado.php"><i class="fa fa-circle-o"></i><span>Llamada Reducados</span></a></li>';

    $consultaPsicologia = ' <li class=""><a href="consultaPsicologia.php"><i class="fa fa-circle-o"></i><span>Consulta</span></a></li>';

    $pagos = '<li class=""><a href="LisPagoU.php"><i class="fa fa-circle-o"></i><span>Pagos</span></a></li>';

    $APIS = '<li class=""><a href="#" data-toggle="modal" data-target="#selec_resi" ><i class="fa fa-circle-o"></i><span>API</span></a></li>';

    $calendario = '<li class=""><a href="calendario.php"><i class="fa fa-circle-o"></i><span>Calendario</span></a></li>';

    $caja = '<li class=""><a href="#" data-toggle="modal" data-target="#selec_resi_a"><i class="fa fa-circle-o"></i><span>Caja</span></a></li>';

    $ayudas = '<li class=""><a href="ayudas.php"><i class="fa fa-circle-o"></i><span>Ayudas</span></a></li>';

    $controlSalida = '<li class=""><a href="#" data-toggle="modal" data-target="#controlSalida"><i class="fa fa-circle-o"></i><span>Control salida</span></a></li>';

    $velamiento = '<li class=""><a href="LVelamiento.php"><i class="fa fa-circle-o"></i><span>Velamiento</span></a></li>';
?>


<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>
      <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
        
         
<?php

  $rol = $_SESSION['rol'];

  switch ($rol) {
    case 'Admin':
         //usuario       
         echo $usuario;

        //Menú residentes
         echo $residentes;

        // //MENÚ DE PROFESIONALES
        // echo $profesionales;

       //Lista de terapias 
        echo $listaTerapias; 

        //Llamada Reducados 
        echo $llamadaReducado; 

        //Consulta Psicologia
        echo $consultaPsicologia;
        
        //Pagos 
        echo $pagos; 
         
        //APIS 
        echo $APIS;

        //Calendarios 
        echo $calendario;

        //Caja 
        echo $caja;
         
        //Ayudas -->
        echo $ayudas;
         
        //Control de Salida -->
        echo $controlSalida;

        // Velamiento -->
        echo $velamiento;
      break;
      case 'Super_Administrador':
         //usuario       
         echo $usuario;

        //Menú residentes
         echo $residentes;

        // //MENÚ DE PROFESIONALES
        // echo $profesionales;

       //Lista de terapias 
        echo $listaTerapias; 

        //Llamada Reducados 
        echo $llamadaReducado; 
        
        //Pagos 
        //echo $pagos; 
         
        //APIS 
        echo $APIS;

        //Velamientos
        echo $velamiento;

        //Calendarios 
        echo $calendario;

        //Caja 
        echo $caja;
         
        //Ayudas -->
        echo $ayudas;
         
        //Control de Salida -->
        echo $controlSalida;
      break;

      case 'Administracion':

        //Menú residentes
         echo $residentes;

        // //MENÚ DE PROFESIONALES
        // echo $profesionales;

        //APIS 
        echo $APIS;

        //Calendarios 
        echo $calendario;

        //Caja 
        echo $caja;
         
        //Control de Salida -->
        echo $controlSalida;
        
        // ayudas
        echo $ayudas;
        
        //Lista de terapias 
        echo $listaTerapias; 
        
        
      break;
    
      case 'Psicologo':

       //Lista de terapias 
        echo $listaTerapias; 

        //Consulta Psicologia
        echo $consultaPsicologia;

        //Calendarios 
        echo $calendario;

        //Ayudas -->
        echo $ayudas;

      break;

      case 'Educadores':

        //Calendarios 
        echo $calendario;

        //Ayudas -->
        echo $ayudas;

      break;
      case 'Terapeutas':
          
        //Menú residentes
         echo $residentes;

       //Lista de terapias 
        echo $listaTerapias; 

        //Calendarios 
        echo $calendario;

        //Ayudas -->
        echo $ayudas;
         
        //Control de Salida -->
        echo $controlSalida;
        break;

        case 'Reducados':
        //Llamada Reducados 
        echo $llamadaReducado; 

        //Calendarios 
        echo $calendario;

          break;

    default:
               //usuario       
         echo $usuario;

        //Menú residentes
         echo $residentes;

        // //MENÚ DE PROFESIONALES
        // echo $profesionales;

       //Lista de terapias 
        echo $listaTerapias; 

        //Llamada Reducados 
        echo $llamadaReducado; 

        //Consulta Psicologia
        echo $consultaPsicologia;
        
        //Pagos 
        //echo $pagos; 
         
        //APIS 
        echo $APIS;

        //Calendarios 
        echo $calendario;

        //Caja 
        echo $caja;
         
        //Ayudas -->
        echo $ayudas;
         
        //Control de Salida -->
        echo $controlSalida;
      break;
  }

 ?>


      </ul>
      <!-- /.sidebar-menu -->
    </section>

    
<!-- // Modal -->
    <!-- /.sidebar -->
  </aside>




<div class="modal fade" id="selec_resi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Seleccionar un residente</h4></center>
            </div>
            <div class="modal-body">
                    
              <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="myTable2" class=" table table-bordered table-striped">
          <thead>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Etapa</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM residentes ";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);

              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_residente']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['etapa_resi']."</td>
                  
                  
                  <td align='center'>

                    <a href='APIS.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
                  </td>
                </tr>";
                
              }

              
            ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
    </div>  
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal caja -->
<div class="modal fade" id="selec_resi_a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Seleccionar un residente</h4></center>
            </div>
            <div class="modal-body">
                    
              <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="myTable3" class=" table table-bordered table-striped">
          <thead>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Etapa</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM residentes ";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);

              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_residente']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['etapa_resi']."</td>
                  
                  
                  <td align='center'>

                    <a href='caja.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
                  </td>
                </tr>";
                
              }

             
            ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
    </div>  
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>
<!-- ./ Fin modal Caja -->


<div class="modal fade" id="controlSalida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Seleccionar un residente</h4></center>
            </div>
            <div class="modal-body">
                    
              <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="cSalida" class=" table table-bordered table-striped">
          <thead>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Etapa</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM residentes ";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);

              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_residente']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['etapa_resi']."</td>
                  
                  
                  <td align='center'>

                    <a href='controlSalida.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
                  </td>
                </tr>";
                
              }

             
            ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
    </div>  
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>
<!-- ./ Fin modal Caja -->