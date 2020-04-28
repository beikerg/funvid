//  Inicio de Psicologos 
    // Add Record
function addPsicologos() {
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
    $.post("ajax/psicologos/addPsicologos.php", {
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
        /*$("#add_nuevo_Psicologos_modal").modal("hide");*/
        $("#addpsico").html(data);

        // read records again
        readPsicologos();

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
function readPsicologos() {
    $.get("ajax/psicologos/readPsicologos.php", {}, function (data, status) {
        $(".calsas").html(data);
    });
}


function DeletePsicologos(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminar el Psicologo?");
    if (conf == true) {
        $.post("ajax/psicologos/deletePsicologos.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readPsicologos();
            }
        );
    }
}

function GetPsicologosDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_Psicologos_id").val(id);
    $.post("ajax/psicologos/readPsicologosDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var psicologo = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nombre").val(psicologo.nombre);
            $("#update_apellido").val(psicologo.apellido);
            $("#update_rut").val(psicologo.rut);
            $("#update_telefono").val(psicologo.telefono);
            $("#update_fecha").val(psicologo.fecha);
            $("#update_direccion").val(psicologo.direccion);
            $("#update_localidad").val(psicologo.localidad);
            $("#update_provincia").val(psicologo.provincia);
            $("#update_correo").val(psicologo.correo);
        }
    );
    // Open modal popup
    $("#update_Psicologos_modal").modal("show");
}

function UpdatePsicologosDetails() {
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
    var id = $("#hidden_Psicologos_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/psicologos/updatePsicologosDetails.php", {
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
            /*$("#update_Psicologos_modal").modal("hide");*/
            $("#updatePsico").html(data);
            // reload Users by using readRecords();
            readPsicologos();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readPsicologos(); // calling function
});

//  .-- Fin Psicologos --//
