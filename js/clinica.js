// Add Record
function addClinica() {
    // get values
    var id_residente = $("#id_residente").val();
    var etapa_clinica = $("#etapa_clinica").val();
    var psiquiatra_clinica = $("#psiquiatra_clinica").val();
    var fecha_clinica = $("#fecha_clinica").val();
    var evaluacion_clinica = $("#evaluacion_clinica").val();
    var medicamentos_clinica = $("#medicamentos_clinica").val();
    // Add record
    $.post("ajax/API/clinica/addClinica.php", {
        id_residente: id_residente,
        etapa_clinica: etapa_clinica,
        psiquiatra_clinica: psiquiatra_clinica,
        fecha_clinica: fecha_clinica,
        evaluacion_clinica: evaluacion_clinica,
        medicamentos_clinica: medicamentos_clinica
    }, function (data, status) {
        // close the popup
        /*$("#add_new_record_modal").modal("hide");*/
        $("#resultados_Clinica").html(data);

        
        // read records again
        readClinica();

        // clear fields from the popup
        $("#id_residente").val("");
        $("#etapa_clinica").val("");
        $("#psiquiatra_clinica").val("");
        $("#fecha_clinica").val("");
        $("#evaluacion_clinica").val("");
        $("#medicamentos_clinica").val("");
        
    });


} 

// READ records
function readClinica() {
    $.get("ajax/API/clinica/readClinica.php?id="+id_residente.value, {}, function (data, status) {
        $(".clinic").html(data);
    });
}


function DeleteClinica(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminarlo?");
    if (conf == true) {
        $.post("ajax/API/clinica/deleteClinica.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readClinica();
            }
        );
    }
}

function GetClinicaDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_Clinica_id").val(id);
    $.post("ajax/API/clinica/readClinicaDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var clinica = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_etapa_clinica").val(clinica.etapa_clinica);
            $("#update_fecha_clinica").val(clinica.fecha_clinica);
            $("#update_psiquiatra_clinica").val(clinica.psiquiatra_clinica);
            $("#update_evaluacion_clinica").val(clinica.evaluacion_clinica);
            $("#update_medicamentos_clinica").val(clinica.medicamentos_clinica);
            
        }
    );
    // Open modal popup
    $("#update_Clinica_modal").modal("show");
}

function UpdateClinicaDetails() {
    // get values
    var etapa_clinica = $("#update_etapa_clinica").val();
    var fecha_clinica = $("#update_fecha_clinica").val();
    var psiquiatra_clinica = $("#update_psiquiatra_clinica").val();
    var evaluacion_clinica = $("#update_evaluacion_clinica").val();
    var medicamentos_clinica = $("#update_medicamentos_clinica").val();
    

    // get hidden field value
    var id = $("#hidden_Clinica_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/API/clinica/updateClinicaDetails.php", {
            id: id,
            etapa_clinica: etapa_clinica,
            psiquiatra_clinica: psiquiatra_clinica,
            fecha_clinica: fecha_clinica,
            evaluacion_clinica: evaluacion_clinica,
            medicamentos_clinica: medicamentos_clinica
            
        },
        function (data, status) {
            // hide modal popup
            $("#update_Clinica").html(data);
           /* $("#update_user_modal").modal("hide");*/
            // reload Users by using readRecords();
            readClinica();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readClinica(); // calling function
});