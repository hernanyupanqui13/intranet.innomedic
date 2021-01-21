$(document).on('submit', '#registrar_prueba_antigeno', function(event) {
    event.preventDefault();
    

    if(isFulFilled()){
        actualizarProgreso("2");
    } else {
        actualizarProgreso("1");
    }

    $.ajax({
        url: window.location.origin + "/intranet.innomedic.pe"+"/Laboratorio/Laboratorio/actualizar_prueba_rapida/",
        type: 'POST',
        data: $("#registrar_prueba_antigeno").serialize(),
    })

    .done(function() {
        console.log("success");
        Swal.fire(
            '!Buen Trabajo!',
            'El registro se Actualizo de Manera Correcta',
            'success'
          )
    })

    .fail(function() {
        console.log("error");
        alert("No se pudo actualizar");
    })
    
    .always(function() {
        console.log("complete");
    });    
});

function isFulFilled () {
    const antig_result_input = document.getElementById("antigeno_resultado_input");
    
    let isAntigResultFilled = antig_result_input.value == "positivo" || antig_result_input.value == "negativo";
    
    return isAntigResultFilled;
}