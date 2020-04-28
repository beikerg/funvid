// Add Record
function addAbs() {
    // get values
    var id_residente = $("#id_residente").val();
    var etapa_abst = $("#etapa_abst").val();
    var fecha_abst = $("#fecha_abst").val();
    var sintomas_abst = $("#sintomas_abst").val();
    var obser_abst = $("#obser_abst").val();
    // Add record
    $.post("ajax/API/abstinencia/addAbs.php", {
        id_residente: id_residente,
        etapa_abst: etapa_abst,
        fecha_abst: fecha_abst,
        sintomas_abst: sintomas_abst,
        obser_abst: obser_abst
    }, function (data, status) {
        // close the popup
        /*$("#add_new_record_modal").modal("hide");*/
        $("#resultados_Abs").html(data);

        
        // read records again
        readAbs();

        // clear fields from the popup
        $("#id_residente").val("");
        $("#etapa_abst").val("");
        $("#fecha_abst").val("");
        $("#sintomas_abst").val("");
        $("#obser_abst").val("");
        
    });


} 

// READ records
function readAbs() {
    $.get("ajax/API/abstinencia/readAbs.php?id="+id_residente.value, {}, function (data, status) {
        $(".absti").html(data);
    });
}


function DeleteAbs(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminar el archivo?");
    if (conf == true) {
        $.post("ajax/API/abstinencia/deleteAbs.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readAbs();
            }
        );
    }
}

function GetAbsDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_Abs_id").val(id);
    $.post("ajax/API/abstinencia/readAbsDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var abs = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_fecha_abst").val(abs.fecha_abst);
            $("#update_etapa_abst").val(abs.etapa_abst);
            $("#update_sintomas_abst").val(abs.sintomas_abst);
            $("#update_obser_abst").val(abs.obser_abst);
            
        }
    );
    // Open modal popup
    $("#update_Abs_modal").modal("show");
}

function UpdateAbsDetails() {
    // get values
    var fecha_abst = $("#update_fecha_abst").val();
    var etapa_abst = $("#update_etapa_abst").val();
    var sintomas_abst = $("#update_sintomas_abst").val();
    var obser_abst = $("#update_obser_abst").val();
    

    // get hidden field value
    var id = $("#hidden_Abs_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/API/abstinencia/updateAbsDetails.php", {
            id: id,
            fecha_abst: fecha_abst,
            etapa_abst: etapa_abst,
            sintomas_abst: sintomas_abst,
            obser_abst: obser_abst
            
        },
        function (data, status) {
            // hide modal popup
            $("#update_Abs").html(data);
           /* $("#update_user_modal").modal("hide");*/
            // reload Users by using readRecords();
            readAbs();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readAbs(); // calling function
});