    // Add Record
function addTerapeutas() {
    // get values
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var rut = $("#rut").val();
    var telefono = $("#telefono").val();
    var fecha = $("#fecha").val();
    var direccion = $("#direccion").val();
    var localidad = $("#localidad").val();
    var provincia = $("#provincia").val();
    var correo = $("#correo").val();

    // Add record
    $.post("ajax/terapeutas/addTerapeutas.php", {
        nombre: nombre,
        apellido: apellido,
        rut: rut,
        telefono: telefono,
        fecha: fecha,
        direccion: direccion,
        localidad: localidad,
        provincia: provincia,
        correo: correo
    }, function (data, status) {
        // close the popup
        /*$("#add_nuevo_Terapeutas_modal").modal("hide");*/
         $("#addt").html(data);

        // read records again
        readTerapeutas();

        // clear fields from the popup
        $("#nombre").val("");
        $("#apellido").val("");
        $("#rut").val("");
        $("#telefono").val("");
        $("#fecha").val("");
        $("#direccion").val("");
        $("#localidad").val("");
        $("#provincia").val("");
        $("#correo").val("");
    });
}

// READ records
function readTerapeutas() {
    $.get("ajax/terapeutas/readTerapeutas.php", {}, function (data, status) {
        $(".terapeutas").html(data);
    });
}


function DeleteTerapeutas(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminar el Terapeuta?");
    if (conf == true) {
        $.post("ajax/terapeutas/deleteTerapeutas.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readTerapeutas();
            }
        );
    }
}

function GetTerapeutasDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_Terapeutas_id").val(id);
    $.post("ajax/terapeutas/readTerapeutasDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var terapeuta = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nombre").val(terapeuta.nombre);
            $("#update_apellido").val(terapeuta.apellido);
            $("#update_rut").val(terapeuta.rut);
            $("#update_telefono").val(terapeuta.telefono);
            $("#update_fecha").val(terapeuta.fecha);
            $("#update_direccion").val(terapeuta.direccion);
            $("#update_localidad").val(terapeuta.localidad);
            $("#update_provincia").val(terapeuta.provincia);
            $("#update_correo").val(terapeuta.correo);
        }
    );
    // Open modal popup
    $("#update_Terapeutas_modal").modal("show");
}

function UpdateTerapeutasDetails() {
    // get values
    var nombre = $("#update_nombre").val();
    var apellido = $("#update_apellido").val();
    var rut = $("#update_rut").val();
    var telefono = $("#update_telefono").val();
    var fecha = $("#update_fecha").val();
    var direccion = $("#update_direccion").val();
    var localidad = $("#update_localidad").val();
    var provincia = $("#update_provincia").val();
    var correo = $("#update_correo").val();

    // get hidden field value
    var id = $("#hidden_Terapeutas_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/terapeutas/updateTerapeutasDetails.php", {
            id: id,
            nombre: nombre,
            apellido: apellido,
            rut: rut,
            telefono: telefono,
            fecha: fecha,
            direccion: direccion,
            localidad: localidad,
            provincia: provincia,
            correo: correo
        },
        function (data, status) {
            // hide modal popup
            /*$("#update_Terapeutas_modal").modal("hide");*/
            $("#updatet").html(data);
            // reload Users by using readRecords();
            readTerapeutas();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readTerapeutas(); // calling function
});

// .-- Fin terapeutas -- //

//  Inicio de busqueda //



// .-- Fin de Buscador //



















