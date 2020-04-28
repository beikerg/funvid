// Add Record
function addEtapas() {
    // get values
    var id_residente = $("#id_residente").val();
    var status_etapa = $("#status_etapa").val();
    var desc_etapa = $("#desc_etapa").val();
    var fecha_inicio_etapa = $("#fecha_inicio_etapa").val();
    var obser_etapa = $("#obser_etapa").val();
    // Add record
    $.post("ajax/etapas/addEtapas.php", {
        id_residente: id_residente,
        status_etapa: status_etapa,
        desc_etapa: desc_etapa,
        fecha_inicio_etapa: fecha_inicio_etapa,
        obser_etapa: obser_etapa
    }, function (data, status) {
        // close the popup
        /*$("#add_new_record_modal").modal("hide");*/
        $("#resultados").html(data);

        
        // read records again
        readEtapas();

        // clear fields from the popup
        $("#id_residente").val("");
        $("#status_etapa").val("");
        $("#des_etapa").val("");
        $("#fecha_inicio_etapa").val("");
        $("#obser_etapa").val("");
        
    });


} 

// READ records
function readEtapas() {
    $.get("ajax/etapas/readEtapas.php?id="+id_residente.value, {}, function (data, status) {
        $(".archivo").html(data);
    });
}


function DeleteEtapas(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminar el archivo?");
    if (conf == true) {
        $.post("ajax/etapas/deleteEtapas.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readEtapas();
            }
        );
    }
}

function GetEtapasDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_Etapas_id").val(id);
    $.post("ajax/etapas/readEtapasDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var etapa = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_status_etapa").val(etapa.status_etapa);
            $("#update_desc_etapa").val(etapa.desc_etapa);
            $("#update_fecha_inicio_etapa").val(etapa.fecha_inicio_etapa);
            $("#update_fecha_fin_etapa").val(etapa.fecha_fin_etapa);
            $("#update_obser_etapa").val(etapa.obser_etapa);
        }
    );
    // Open modal popup
    $("#update_Etapas_modal").modal("show");
}

function UpdateEtapasDetails() {
    // get values
    var status_etapa = $("#update_status_etapa").val();
    var desc_etapa = $("#update_desc_etapa").val();
    var fecha_inicio_etapa = $("#update_fecha_inicio_etapa").val();
    var fecha_fin_etapa = $("#update_fecha_fin_etapa").val();
    var obser_etapa = $("#update_obser_etapa").val();

    // get hidden field value
    var id = $("#hidden_Etapas_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/etapas/updateEtapasDetails.php", {
            id: id,
            status_etapa: status_etapa,
            desc_etapa: desc_etapa,
            fecha_inicio_etapa: fecha_inicio_etapa,
            fecha_fin_etapa: fecha_fin_etapa,
            obser_etapa: obser_etapa
        },
        function (data, status) {
            // hide modal popup
            $("#update").html(data);
           /* $("#update_user_modal").modal("hide");*/
            // reload Users by using readRecords();
            readEtapas();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readEtapas(); // calling function
});