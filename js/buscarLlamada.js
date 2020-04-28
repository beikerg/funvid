

$(document).on('keyup','#busca', function(){
    var valor = $(this).val();
    if (valor != "") {
        buscar_datos(valor);
    }else{
        buscar_datos();
    }
});
$(buscar_datos());


function buscar_datos(consulta){
    $.ajax({
        url: 'buscarLlamada.php' ,
        type: 'POST' ,
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#bus").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    });
}


