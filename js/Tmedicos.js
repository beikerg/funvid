// Add Record
function addTmedicos() {
    // get values
    var id_residente = $("#id_residente").val();
    var etapa_tm = $("#etapa_tm").val();
    var fecha_tm = $("#fecha_tm").val();
    var motivo_tm = $("#motivo_tm").val();
    var diagnostico_tm = $("#diagnostico_tm").val();
    var medicamentos_tm = $('#medicamentos_tm').val();
    var observ_tm = $("#observ_tm").val();
    
    // Add record
    $.post("ajax/API/t-medicos/addTmedicos.php", {
        id_residente: id_residente,
        etapa_tm: etapa_tm,
        fecha_tm: fecha_tm,
        motivo_tm: motivo_tm,
        diagnostico_tm: diagnostico_tm,
        medicamentos_tm: medicamentos_tm,
        observ_tm: observ_tm
        }, function (data, status) {
        // close the popup
        /*$("#add_new_record_modal").modal("hide");*/
        $("#resultados_Tmedicos").html(data);

        
        // read records again
        readTmedicos();

        // clear fields from the popup
        $("#id_residente").val("");
        $("#etapa_tm").val("");
        $("#fecha_tm").val("");
        $("#motivo_tm").val("");
        $("#diagnostico_tm").val("");
        $("#medicamentos_tm").val("");
        $("#observ_tm").val("");
        
    });


} 

// READ records
function readTmedicos() {
    $.get("ajax/API/t-medicos/readTmedicos.php?id="+id_residente.value, {}, function (data, status) {
        $(".Tmedicos").html(data);
    });
}


function DeleteTmedicos(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminarlo?");
    if (conf == true) {
        $.post("ajax/API/t-medicos/deleteTmedicos.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readTmedicos();
            }
        );
    }
}

function GetTmedicosDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_tm_id").val(id);
    $.post("ajax/API/t-medicos/readTmedicosDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var Tmedicos = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_etapa_tm").val(Tmedicos.etapa_tm);
            $("#update_fecha_tm").val(Tmedicos.fecha_tm);
            $("#update_motivo_tm").val(Tmedicos.motivo_tm);
            $("#update_diagnostico_tm").val(Tmedicos.diagnostico_tm);
            $("#update_medicamentos_tm").val(Tmedicos.medicamentos_tm);
            $("#update_observ_tm").val(Tmedicos.observ_tm);
            
        }
    );
    // Open modal popup
    $("#update_Tmedicos_modal").modal("show");
}

function UpdateTmedicosDetails() {
    // get values
    var etapa_tm = $("#update_etapa_tm").val();
    var fecha_tm = $("#update_fecha_tm").val();
    var motivo_tm = $('#update_motivo_tm').val();
    var diagnostico_tm = $("#update_diagnostico_tm").val();
    var medicamentos_tm = $("#update_medicamentos_tm").val();
    var observ_tm = $("#update_observ_tm").val();
    
    

    // get hidden field value
    var id = $("#hidden_tm_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/API/t-medicos/updateTmedicosDetails.php", {
            id: id,
            etapa_tm: etapa_tm,
            fecha_tm: fecha_tm,
            motivo_tm: motivo_tm,
            diagnostico_tm: diagnostico_tm,
            medicamentos_tm: medicamentos_tm,
            observ_tm: observ_tm
            
            
        },
        function (data, status) {
            // hide modal popup
            $("#update_Tmedicos").html(data);
           /* $("#update_user_modal").modal("hide");*/
            // reload Users by using readRecords();
            readTmedicos();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readTmedicos(); // calling function
});