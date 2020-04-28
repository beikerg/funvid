// Add Record
function addDental() {
    // get values
    var id_residente = $("#id_residente").val();
    var etapa_dental = $("#etapa_dental").val();
    var nom_dental = $("#nom_dental").val();
    var tratamiento_dental = $("#tratamiento_dental").val();
    var fecha_dental = $("#fecha_dental").val();
    var medica_dental = $("#medica_dental").val();
    var obser_dental = $("#obser_dental").val();
    // Add record
    $.post("ajax/API/dental/addDental.php", {
        id_residente: id_residente,
        etapa_dental: etapa_dental,
        nom_dental: nom_dental,
        tratamiento_dental: tratamiento_dental,
        fecha_dental: fecha_dental,
        medica_dental: medica_dental,
        obser_dental: obser_dental
    }, function (data, status) {
        // close the popup
        /*$("#add_new_record_modal").modal("hide");*/
        $("#resultados_Dental").html(data);

        
        // read records again
        readDental();

        // clear fields from the popup
        $("#id_residente").val("");
        $("#Etapa_dental").val("");
        $("#nom_dental").val("");
        $("#tratamiento_dental").val("");
        $("#fecha_dental").val("");
        $("#medica_dental").val("");
        $("#obser_dental").val("");
        
    });


} 

// READ records
function readDental() {
    $.get("ajax/API/dental/readDental.php?id="+id_residente.value, {}, function (data, status) {
        $(".denta").html(data);
    });
}


function DeleteDental(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminarlo?");
    if (conf == true) {
        $.post("ajax/API/dental/deleteDental.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readDental();
            }
        );
    }
}

function GetDentalDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_Dental_id").val(id);
    $.post("ajax/API/dental/readDentalDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var dental = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nom_dental").val(dental.nom_dental);
            $("#update_tratamiento_dental").val(dental.tratamiento_dental);
            $("#update_fecha_dental").val(dental.fecha_dental);
            $("#update_medica_dental").val(dental.medica_dental);
            $("#update_obser_dental").val(dental.obser_dental);
            
        }
    );
    // Open modal popup
    $("#update_Dental_modal").modal("show");
}

function UpdateDentalDetails() {
    // get values
    var nom_dental = $("#update_nom_dental").val();
    var tratamiento_dental = $("#update_tratamiento_dental").val();
    var fecha_dental = $("#update_fecha_dental").val();
    var medica_dental = $("#update_medica_dental").val();
    var obser_dental = $("#update_obser_dental").val();
    

    // get hidden field value
    var id = $("#hidden_Dental_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/API/dental/updateDentalDetails.php", {
            id: id,
            nom_dental: nom_dental,
            tratamiento_dental: tratamiento_dental,
            fecha_dental: fecha_dental,
            medica_dental: medica_dental,
            obser_dental: obser_dental
            
        },
        function (data, status) {
            // hide modal popup
            $("#update_Dental").html(data);
           /* $("#update_user_modal").modal("hide");*/
            // reload Users by using readRecords();
            readDental();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readDental(); // calling function
});