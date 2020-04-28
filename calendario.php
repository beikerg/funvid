<?php
 include("include/rol.php");

    include("ajax/db_connection.php");

$resi_caja = $mysql->query("SELECT * FROM residentes");
  while($rCja = mysqli_fetch_assoc($resi_caja)){
    $nombre = $rCja['nombre'];
    $apellido = $rCja['apellido'];
  }


  if(!empty($_GET['id'])){
      $residente_id = $_GET['id']; 
    }else{
      //header("Location: residente.php");
    }
    ?>


<!DOCTYPE html>
<html lang="es">
<head>
   <title>FUNVID | Calendario</title>
  <?php  include("include/head.php"); ?>


</head>

<body class="hold-transition skin-blue sidebar-mini">
  <?php include("include/scrip.php"); ?>
<script>
  function preguntar (id,r){
        console.log(id);
    if(confirm('¿Esta seguro que desa eliminarlo?'))
      {
        console.log(id);
        window.location.href = "ajax/caja/deleteCaja.php?id=" + id + "&r=" + r;
      }
  }
</script>
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
        Calendario 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Psicologos</a></li>
        <li>Tipos de terapias</li>
        <li class="active">Lista de Terapia Informativa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
<div class="container">
  <div class="row">
    <div class="col-md-7">
      <div id="">
    </div>
  </div>
</div>
   <!-- /.col -->
      <div class="row">
        <div class="col-md-11">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div class="box box-solid">
                <div class="box-body">
                  <div class="col-md-12">
                    <div id="CalendarioWeb"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
      </div>
        <!-- /.col -->
    <!-- Modal -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="tituloEvento"></h4>
       
      </div>
      <div class="modal-body">
        <div class="container-fluid">
        <div id="descripcionEvento"></div>

        
        <input type="hidden" id="textId" name="textId" >      
        <input type="hidden" id="textFecha" name="textFecha"  class="form-control">

        <div class="form-row">
          <div class="form-group col-md-8">
            <label>Título:</label>
            <input type="text" id="textTitulo" name="textTitulo" class="form-control" placeholder="Título del evento">
          </div>

          <div class="form-group col-md-4">
            <label>Hora:</label>
            <div class="input-group clockpicker" data-autoclose="true">
              <input type="text" id="textHora" name="textHora" class="form-control">
            </div>
          </div>
          
          <div class="form-group col-md-12">
            <label>Descripción:</label>
            <textarea id="textDescripcion" rows="3" class="form-control"></textarea>
          </div>

          <div class="form-group col-md-3">
            <label>Color:</label>
            <input type="color" id="textColor" name="textColor" value="#ff0000" class="form-control" style="height: 36px;"></br>
          </div>
        </div>
        
        
       
        
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" id="btnAgregar" class="btn btn-success">Añadir</button>
        <button type="button" id="btnModificar" class="btn btn-warning">Actualizar</button>
        <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>      

 <script>

var NuevoEvento;

  $('#btnAgregar').click(function(){
    RecolectarDatosGUI()
    EnviarInformacion('agregar',NuevoEvento);     
  });
    $('#btnEliminar').click(function(){
    RecolectarDatosGUI()
    EnviarInformacion('eliminar',NuevoEvento);
   });
   $('#btnModificar').click(function(){
    RecolectarDatosGUI()
    EnviarInformacion('modificar',NuevoEvento);
   }); 

  function RecolectarDatosGUI(){
    NuevoEvento={
      id:$('#textId').val(),
      title:$('#textTitulo').val(),
      start:$('#textFecha').val()+" "+$('#textHora').val(),
      color:$('#textColor').val(),
      descripcion:$('#textDescripcion').val(),
      textColor:"#FFFFFF",
      end:$('#textFecha').val()+" "+$('#textHora').val()
    };
  }

  function EnviarInformacion(accion,objEvento,modal){
    $.ajax({
      type:'POST',
      url:'ajax/calendario/eventos.php?accion='+accion,
      data:objEvento,
      success:function(msg){
        if(msg){
          $('#CalendarioWeb').fullCalendar('refetchEvents');
          if(!modal){
            $('#ModalEventos').modal('toggle');
          }
          
        }
      },
      error:function(){
        alert("Hay un error ...");
      }

    });
  }

  $('.clockpicker').clockpicker();

  function limpiarFormulario(){
    $('#textId').val('');
    $('#textTitulo').val('');
    $('#textColor').val('');
    $('#textDescripcion').val('');
    
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



</body>
</html>
