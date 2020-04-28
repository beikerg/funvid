// Add Record
function addAnte() {
    // get values
    var id_residente = $("#id_residente").val();
    var etapa_ante = $("#etapa_ante").val();
    var informacion_ante = $("#informacion_ante").val();
    var fecha_ante = $("#fecha_ante").val();
    
    // Add record
    $.post("ajax/API/antecedentes/addAnte.php", {
        id_residente: id_residente,
        etapa_ante: etapa_ante,
        informacion_ante: informacion_ante,
        fecha_ante: fecha_ante
    }, function (data, status) {
        // close the popup
        /*$("#add_new_record_modal").modal("hide");*/
        $("#resultados_Ante").html(data);

        
        // read records again
        readAnte();

        // clear fields from the popup
        $("#id_residente").val("");
        $("#etapa_ante").val("");
        $("#informacion_ante").val("");
        $("#fecha_ante").val("");
        
        
    });


} 

// READ records
function readAnte() {
    $.get("ajax/API/antecedentes/readAnte.php?id="+id_residente.value, {}, function (data, status) {
        $(".antece").html(data);
    });
}


function DeleteAnte(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminarlo?");
    if (conf == true) {
        $.post("ajax/API/antecedentes/deleteAnte.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readAnte();
            }
        );
    }
}

function GetAnteDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_Ante_id").val(id);
    $.post("ajax/API/antecedentes/readAnteDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var ante = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_etapa_ante").val(ante.etapa_ante);
            $("#update_informacion_ante").val(ante.informacion_ante);
            $("#update_fecha_ante").val(ante.fecha_ante);
            
            
        }
    );
    // Open modal popup
    $("#update_Ante_modal").modal("show");
}

function UpdateAnteDetails() {
    // get values
    var etapa_ante = $("#update_etapa_ante").val();
    var informacion_ante = $("#update_informacion_ante").val();
    var fecha_ante = $("#update_fecha_ante").val();
    
    

    // get hidden field value
    var id = $("#hidden_Ante_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/API/antecedentes/updateAnteDetails.php", {
            id: id,
            etapa_ante: etapa_ante,
            informacion_ante: informacion_ante,
            fecha_ante: fecha_ante
            
            
        },
        function (data, status) {
            // hide modal popup
            $("#update_Ante").html(data);
           /* $("#update_user_modal").modal("hide");*/
            // reload Users by using readRecords();
            readAnte();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readAnte(); // calling function
});