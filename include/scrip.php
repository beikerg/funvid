<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- Datatable.net -->
<script type="text/javascript" src="bower_components/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="bower_components/datatable/dataTable.bootstrap.min.js"></script>
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="bower_components/fullcalendar/dist/locale/es.js"></script>
<script src="bower_components/ClockPicker/bootstrap-clockpicker.js"></script>
<script>
$(document).ready(function(){
  //inialize datatable
    $('table.display').DataTable({
      "language": 
            {
              "emptyTable": "<h4>¡Aún no hay ningun registro!.</h4>",  
              "searchPlaceholder":  "Buscar",   
              "zeroRecords": "<h4>¡No se han encontrado coincidencias!.</h4>", 
            }
    });

    //hide alert
    $(document).on('click', '.close', function(){
      $('.alert').hide();
    })
});
</script>

<script>
$(document).ready(function(){
  //inialize datatable
    $('#myTable').DataTable({
      "language": 
            {
              "emptyTable": "<h4>¡Aún no hay ningun registro!.</h4>",  
              "searchPlaceholder":  "Buscar",   
              "zeroRecords": "<h4>¡No se han encontrado coincidencias!.</h4>", 
            }

    });
     
    
});
</script>

<script>
$(document).ready(function(){
  //inialize datatable
    $('#introvisacion').DataTable({
      "language": 
            {
              "emptyTable": "<h4>¡Aún no hay ningun registro!.</h4>",  
              "searchPlaceholder":  "Buscar",   
              "zeroRecords": "<h4>¡No se han encontrado coincidencias!.</h4>", 
            }

    });
     
    
});
</script>

<script>
$(document).ready(function(){
  //inialize datatable
    $('#myTable3').DataTable({
      "language": 
            {
              "emptyTable": "<h4>¡Aún no hay ningun registro!.</h4>",  
              "searchPlaceholder":  "Buscar",   
              "zeroRecords": "<h4>¡No se han encontrado coincidencias!.</h4>", 
            }

    });
     
    
});
</script>

<script>
$(document).ready(function(){
  //inialize datatable
    $('#myTable2').DataTable({
      "language": 
            {
              "emptyTable": "<h4>¡Aún no hay ningun registro!.</h4>",  
              "searchPlaceholder":  "Buscar",   
              "zeroRecords": "<h4>¡No se han encontrado coincidencias!.</h4>", 
            }

    });
     
    
});
</script>

<script>
$(document).ready(function(){
  //inialize datatable
    $('#cSalida').DataTable({
      "language": 
            {
              "emptyTable": "<h4>¡Aún no hay ningun registro!.</h4>",  
              "searchPlaceholder":  "Buscar",   
              "zeroRecords": "<h4>¡No se han encontrado coincidencias!.</h4>", 
            }

    });
     
    
});
</script>

<script>
$(document).ready(function(){
  //inialize datatable
    $('#reducadosTable').DataTable({
      "ordering": false,
      "language": 
            {
              "emptyTable": "<h4>¡Aún no hay ningun registro!.</h4>",  
              "searchPlaceholder":  "Buscar",   
              "zeroRecords": "<h4>¡No se han encontrado coincidencias!.</h4>", 
            },
            "lengthMenu": [[5, 10, 20, 25, 50, -1],[5, 10, 20, 25, 50, "Todos"]],

    });
    
    
});
</script>



<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {

   
    //Initialize Select2 Elements
    $('.select2').select2()


    $('[data-mask]').inputmask()
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

   

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Date range picker
    //$('#reservation').daterangepicker()

    $('#reservation').daterangepicker({
   autoUpdateInput: true,
   format: "DD/MM/YYYY",
"locale": {

    "separator": " - ",
    "applyLabel": "Aplicar",
    "cancelLabel": "Cancelar",
    "fromLabel": "DE",
    "toLabel": "HASTA",
    "customRangeLabel": "Custom",
    "daysOfWeek": [
        "Dom",
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sáb"
    ],
    "monthNames": [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
    ],
    "firstDay": 1
}})
    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })

    </script>   
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

  <script type="text/javascript">
    $(document).ready(function(){
      $('#CalendarioWeb').fullCalendar({
        header:{
              left:'today,prev,next',
              center:'title',
              right:'month,agendaWeek,agendaDay'
            },
            dayClick:function(date,jsEvent,view){

              $('#btnAgregar').prop("disabled",false).show();
              $('#btnEliminar').prop("disabled",true).hide();
              $('#btnModificar').prop("disabled",true).hide();

              limpiarFormulario();
              $('#textFecha').val(date.format());
              $('#ModalEventos').modal();
            },
            events:'ajax/calendario/eventos.php',
             
            eventClick:function(calEvent,jsEvent,view){

               $('#btnAgregar').prop("disabled",true).hide();
              $('#btnEliminar').prop("disabled",false).show();
              $('#btnModificar').prop("disabled",false).show();
              // H2
              $('#tituloEvento').html(calEvent.title);

              // Información
              $('#textDescripcion').val(calEvent.descripcion);
              $('#textId').val(calEvent.id);
              $('#textTitulo').val(calEvent.title);
              $('#textColor').val(calEvent.color);

              FechaHora= calEvent.start._i.split(" ");
              $('#textFecha').val(FechaHora[0]);
              $('#textHora').val(FechaHora[1]);

              $('#ModalEventos').modal();
            },
            editable:true,
            eventDrop:function(calEvent){
                
              $('#textId').val(calEvent.id);
              $('#textTitulo').val(calEvent.title);
              $('#textColor').val(calEvent.color);
              $('#textDescripcion').val(calEvent.descripcion);

            var fechaHora= calEvent.start.format().split("T");
              $('#textFecha').val(fechaHora[0]);
              $('#textHora').val(fechaHora[1]);

              RecolectarDatosGUI()
              EnviarInformacion('modificar',NuevoEvento,true);
            }
            

      });
    });
  </script>

<script>
$(document).ready(function(){
  //inialize datatable
    $('#asis').DataTable({
      "lengthMenu": [[-1], ["Todos"]],
      "language": 
            {
              "emptyTable": "<h4>¡Aún no hay ningun registro!.</h4>",  
              "searchPlaceholder":  "Buscar",   
              "zeroRecords": "<h4>¡No se han encontrado coincidencias!.</h4>", 
            }

    });
     
    
});
</script>
   <!-- // SECCIÓN DE SELECCIONAR TODAS LAS CASILLAS DE CHECKED FALLAS // -->

<!-- <script type="text/javascript">
 $('#checkall').change(function(){
   $('.flat-red').prop("checked", $(this).prop("checked"))
 })
 
 
</script> -->

<script type="text/javascript">
 $('#checkall-asis').change(function(){
   $('.all-asis').prop("checked", $(this).prop("checked"))
 })
</script>

