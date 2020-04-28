    // Add Record
function addEtapas() {
    // get values
    var status_etapa = $("#status_etapa").val();
    var desc_etapa = $("#desc_etapa").val();
    var fecha_inicio_etapa = $("#fecha_inicio_etapa").val();
    var obser_etapa = $("#obser_etapa").val();
    
    // Add record
    $.post("ajax/etapas/addEtapa.php?id="+, {
        status_etapa: status_etapa,
        desc_etapa: desc_etapa,
        fecha_inicio_etapa: fecha_inicio_etapa,
        obser_etapa: obser_etapa
    }, function (data, status) {
        // close the popup
        $("#add_nuevo_Etapa_modal").modal("hide");
         /*$("#addu").html(data);*/
         console.log(status_etapa.value);
         console.log(desc_etapa.value);
         console.log(fecha_inicio_etapa.value);
         console.log(obser_etapa.value);
        // read records again
        readUser();

        // clear fields from the popup
        $("#status").val("");
        $("#desc_etapa").val("");
        $("#fecha_inicio_etapa").val("");
        $("#obser_etapa").val("");
        
    });
}


// READ records
function readEtapa() {
   $.get("ajax/etapas/readEtapa.php?id="+parseInt(id_residente.value), {}, function (data, status) {
       $(".rea").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("¿Esta seguro, realmente desea eliminar el usuario?");
    if (conf == true) {
        $.post("ajax/usuarios/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readEtapa();
            }
        );
    }
}

function GetEtapaDetails(id) {
    // Add User ID to the hidden field for furture usage
   $("#et_id").val(id);
   $("#hidden_Etapa_id").val(id);
   

    $.post("ajax/etapas/readEtapaDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var etapa = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_id_residente").val(etapa.id_residente);
            $("#update_status_etapa").val(etapa.status_etapa);
            $("#update_desc_etapa").val(etapa.desc_etapa);
            $("#update_fecha_inicio_etapa").val(etapa.fecha_inicio_etapa);
            $("#update_fecha_fin_etapa").val(etapa.fecha_fin_etapa);
            $("#update_obser_etapa").val(etapa.obser_etapa);
        }
    );
    // Open modal popup

    $("#update_Etapa_modal").modal("hide");

}



function UpdateUserDetails() {
    // get values
    var nombre = $("#update_nombre").val();
    var usuario = $("#update_usuario").val();
    var password = $("#update_password").val();
    var tipo_usuario = $("#update_tipo_usuario").val();
    

    // get hidden field value
    var id = $("#hidden_Etapa_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/usuarios/updateUserDetails.php", {
            id: id,
            nombre: nombre,
            usuario: usuario,
            password: password,
            tipo_usuario: tipo_usuario
            
        },
        function (data, status) {
            // hide modal popup
            //$("#update_User_modal").modal("hide");
            $("#up").html(data);
            // reload Users by using readRecords();

            readEtapa();
        }
    );
}




$(document).ready(function () {
    // READ recods on page load


    readEtapa(); // calling function
});


