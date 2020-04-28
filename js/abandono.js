// Add Record
function addAban() {
    // get values
    var id_residente = $("#id_residente").val();
    var etapa_aban = $("#etapa_aban").val();
    var motivo_aban = $("#motivo_aban").val();
    var actitud_aban = $("#actitud_aban").val();
    var fecha_aban = $("#fecha_aban").val();
    // Add record
    $.post("ajax/API/abandono/addAban.php", {
        id_residente: id_residente,
        etapa_aban: etapa_aban,
        motivo_aban: motivo_aban,
        actitud_aban: actitud_aban,
        fecha_aban: fecha_aban
    }, function (data, status) {
        // close the popup
        /*$("#add_new_record_modal").modal("hide");*/
        $("#resultados_Aban").html(data);

        
        // read records again
        readAban();

        // clear fields from the popup
        $("#id_residente").val("");
        $("#etapa_aban").val("");
        $("#motivo_aban").val("");
        $("#actitud_aban").val("");
        $("#fecha_aban").val("");
        
    });


} 

// READ records
function readAban() {
    $.get("ajax/API/abandono/readAban.php?id="+id_residente.value, {}, function (data, status) {
        $(".aband").html(data);
    });
}


function DeleteAban(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminarlo?");
    if (conf == true) {
        $.post("ajax/API/abandono/deleteAban.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readAban();
            }
        );
    }
}

function GetAbanDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_Aban_id").val(id);
    $.post("ajax/API/abandono/readAbanDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var aban = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_etapa_aban").val(aban.etapa_aban);
            $("#update_motivo_aban").val(aban.motivo_aban);
            $("#update_actitud_aban").val(aban.actitud_aban);
            $("#update_fecha_aban").val(aban.fecha_aban);
            
        }
    );
    // Open modal popup
    $("#update_Aban_modal").modal("show");
}

function UpdateAbanDetails() {
    // get values
    var etapa_aban = $("#update_etapa_aban").val();
    var motivo_aban = $("#update_motivo_aban").val();
    var actitud_aban = $("#update_actitud_aban").val();
    var fecha_aban = $("#update_fecha_aban").val();
    

    // get hidden field value
    var id = $("#hidden_Aban_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/API/abandono/updateAbanDetails.php", {
            id: id,
            etapa_aban: etapa_aban,
            motivo_aban: motivo_aban,
            actitud_aban: actitud_aban,
            fecha_aban: fecha_aban
            
        },
        function (data, status) {
            // hide modal popup
            $("#update_Aban").html(data);
           /* $("#update_user_modal").modal("hide");*/
            // reload Users by using readRecords();
            readAban();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readAban(); // calling function
});