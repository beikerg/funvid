    // Add Record
function addEducadores() {
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
    $.post("ajax/educador/addEducadores.php", { 
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
        $("#educador").html(data);
        /*$("#add_nuevo_educador_modal").modal("hide");*/

        // read records again
        readEducadores();

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
function readEducadores() {
    $.get("ajax/educador/readEducadores.php", {}, function (data, status) {
        $(".educadores").html(data);
    });
}


function DeleteEducadores(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminar el educador?");
    if (conf == true) {
        $.post("ajax/educador/deleteEducadores.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readEducadores();
            }
        );
    }
}

function GetEducadoresDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_Educadores_id").val(id);
    $.post("ajax/educador/readEducadoresDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var educador = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nombre").val(educador.nombre);
            $("#update_apellido").val(educador.apellido);
            $("#update_rut").val(educador.rut);
            $("#update_telefono").val(educador.telefono);
            $("#update_fecha").val(educador.fecha);
            $("#update_direccion").val(educador.direccion);
            $("#update_localidad").val(educador.localidad);
            $("#update_provincia").val(educador.provincia);
            $("#update_correo").val(educador.correo);
        }
    );
    // Open modal popup
    $("#update_Educadores_modal").modal("show");
}

function UpdateEducadoresDetails() {
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
    var id = $("#hidden_Educadores_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/educador/updateEducadoresDetails.php", {
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
            /*$("#update_Educadores_modal").modal("hide");*/
            $("#updateEducador").html(data);
            // reload Users by using readRecords();
            readEducadores();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readEducadores(); // calling function
});

// .-- Fin educadores -- //



















