//  Inicio de Psicologos 
    // Add Record
function addResidentes() {
    // get values
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var rut = $("#rut").val();
    var sexo = $("#sexo").val();
    var telefono = $("#telefono").val();
    var fecha = $("#fecha").val();
    var nivel = $("#nivel").val();
    var profesion = $("#profesion").val();
    var direccion = $("#direccion").val();
    var localidad = $("#localidad").val();
    var provincia = $("#provincia").val();
    var correo = $("#correo").val();

    // Add record
    $.post("ajax/residentes/addResidentes.php", {
        nombre: nombre,
        apellido: apellido,
        rut: rut,
        sexo:sexo,
        telefono: telefono,
        fecha: fecha,
        nivel: nivel,
        profesion: profesion,
        direccion: direccion,
        localidad: localidad,
        provincia: provincia,
        correo: correo
    }, function (data, status) {
        // close the popup
        /*$("#add_nuevo_Psicologos_modal").modal("hide");*/
        $("#addR").html(data);

        // read records again
        readResindetes();

        // clear fields from the popup
        $("#nombre").val("");
        $("#apellido").val("");
        $("#rut").val("");
        $("#sexo").val("");
        $("#telefono").val("");
        $("#fecha").val("");
        $("#nivel").val("");
        $("#profesion").val("");
        $("#direccion").val("");
        $("#localidad").val("");
        $("#provincia").val("");
        $("#correo").val("");
    });
}

// READ records
function readResidentes() {
    $.get("ajax/residentes/readResidentes.php", {}, function (data, status) {
        $(".residente").html(data);
    });
}


function DeleteResidentes(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminar el Residente?");
    if (conf == true) {
        $.post("ajax/residentes/deleteResidentes.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readResidentes();
            }
        );
    }
}

function GetResidentesDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_residentes_id").val(id);
    $.post("ajax/residentes/readResidentesDetails.php", {
            id: id
        },
        function (data, status) { 
            // PARSE json data
            var residente = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nombre").val(residente.nombre);
            $("#update_apellido").val(residente.apellido);
            $("#update_rut").val(residente.rut);
            $("#update_sexo").val(residente.sexo);
            $("#update_telefono").val(residente.telefono);
            $("#update_fecha").val(residente.fecha);
            $("#update_nivel").val(residente.nivel);
            $("#update_profesion").val(residente.profesion);
            $("#update_direccion").val(residente.direccion);
            $("#update_localidad").val(residente.localidad);
            $("#update_provincia").val(residente.provincia);
            $("#update_correo").val(residente.correo);
        }
    );
    // Open modal popup
    $("#update_Residentes_modal").modal("show");
}

function UpdateResidentesDetails() {
    // get values
    var nombre = $("#update_nombre").val();
    var apellido = $("#update_apellido").val();
    var rut = $("#update_rut").val();
    var sexo = $("#update_sexo").val();
    var telefono = $("#update_telefono").val();
    var fecha = $("#update_fecha").val();
    var nivel = $("#update_nivel").val();
    var profesion = $("#update_profesion").val();
    var direccion = $("#update_direccion").val();
    var localidad = $("#update_localidad").val();
    var provincia = $("#update_provincia").val();
    var correo = $("#update_correo").val();

    // get hidden field value
    var id = $("#hidden_Residentes_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/residentes/updateResidentesDetails.php", {
            id: id,
            nombre: nombre,
            apellido: apellido,
            rut: rut,
            sexo: sexo,
            telefono: telefono,
            fecha: fecha,
            nivel: nivel,
            profesion: profesion,
            direccion: direccion,
            localidad: localidad,
            provincia: provincia,
            correo: correo
        },
        function (data, status) {
            // hide modal popup
            /*$("#update_Psicologos_modal").modal("hide");*/
            $("#updateR").html(data);
            // reload Users by using readRecords();
            readResidentes();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readResidentes(); // calling function
});

//  .-- Fin Psicologos --//
