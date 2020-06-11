// Add Record
function addDoping() {
    // get values
    var id_residente = $("#id_residente").val();
    var etapa_doping = $("#etapa_doping").val();
    var nombre_doping = $("#nombre_doping").val();
    var fecha_doping = $("#fecha_doping").val();
    var observ_doping = $("#observ_doping").val();
    
    // Add record
    $.post("ajax/API/doping/addDoping.php", {
        id_residente: id_residente,
        etapa_doping: etapa_doping,
        nombre_doping: nombre_doping,
        fecha_doping: fecha_doping,
        observ_doping: observ_doping
        }, function (data, status) {
        // close the popup
        /*$("#add_new_record_modal").modal("hide");*/
        $("#resultados_doping").html(data);

        
        // read records again
        readDoping();

        // clear fields from the popup
        $("#id_residente").val("");
        $("#etapa_doping").val("");
        $("#nombre_doping").val("");
        $("#fecha_doping").val("");
        $("#observ_doping").val("");
        
    });


} 

// READ records
function readDoping() {
    $.get("ajax/API/doping/readDoping.php?id="+id_residente.value, {}, function (data, status) {
        $(".doping").html(data);
    });
}


function DeleteDoping(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminarlo?");
    if (conf == true) {
        $.post("ajax/API/doping/deleteDoping.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readDoping();
            }
        );
    }
}

function GetDopingDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_doping_id").val(id);
    $.post("ajax/API/doping/readDopingDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var doping = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_etapa_doping").val(doping.etapa_doping);
            $("#update_fecha_doping").val(doping.fecha_doping);
            $("#update_nombre_doping").val(doping.nombre_doping);
            $("#update_observ_doping").val(doping.observ_doping);
            
        }
    );
    // Open modal popup
    $("#update_doping_modal").modal("show");
}

function UpdateDopingDetails() {
    // get values
    var etapa_doping = $("#update_etapa_doping").val();
    var fecha_doping = $("#update_fecha_doping").val();
    var nombre_doping = $("#update_nombre_doping").val();
    var observ_doping = $("#update_observ_doping").val();
    
    

    // get hidden field value
    var id = $("#hidden_doping_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/API/doping/updateDopingDetails.php", {
            id: id,
            etapa_doping: etapa_doping,
            nombre_doping: nombre_doping,
            fecha_doping: fecha_doping,
            observ_doping: observ_doping
            
            
        },
        function (data, status) {
            // hide modal popup
            $("#update_doping").html(data);
           /* $("#update_user_modal").modal("hide");*/
            // reload Users by using readRecords();
            readDoping();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readDoping(); // calling function
});