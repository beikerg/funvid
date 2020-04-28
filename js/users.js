// Add Record
function addUser() {
    // get values
    var nombre = $("#nombre").val();
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    var tipo_usuario = $("#tipo_usuario").val();
    
    // Add record
    $.post("ajax/usuarios/addUser.php", {
        nombre: nombre,
        usuario: usuario,
        password: password,
        tipo_usuario: tipo_usuario
    }, function (data, status) {
        // close the popup
        /*$("#add_nuevo_User_modal").modal("hide");*/
         $("#addu").html(data);

        // read records again
        readUser();

        // clear fields from the popup
        $("#nombre").val("");
        $("#usuario").val("");
        $("#password").val("");
        $("#tipo_usuario").val("");
        
    });
}


// READ records
function readUser() {
   $.get("ajax/usuarios/readUser.php", {}, function (data, status) {
       $(".usuario").html(data);
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
                readUser();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_User_id").val(id);
    $.post("ajax/usuarios/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nombre").val(user.nombre);
            $("#update_usuario").val(user.usuario);
            $("#update_password").val(user.password);
            $("#update_tipo_usuario").val(user.tipo_usuario);
            
        }
    );
    // Open modal popup
    $("#update_User_modal").modal("show");
}



function UpdateUserDetails() {
    // get values
    var nombre = $("#update_nombre").val();
    var usuario = $("#update_usuario").val();
    var password = $("#update_password").val();
    var tipo_usuario = $("#update_tipo_usuario").val();
    

    // get hidden field value
    var id = $("#hidden_User_id").val();

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

            readUser();
        }
    );
}


$(document).ready(function () {
    // READ recods on page load
    readUser(); // calling function
});


