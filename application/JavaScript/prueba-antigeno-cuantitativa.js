$(document).on('submit', '#registrar_prueba_antigeno_cuantitativa', function(event) {
    event.preventDefault();
    /* Act on the event */

    $.ajax({
        url: window.location.origin + "/intranet.innomedic.pe"+"/Laboratorio/Laboratorio/actualizar_prueba_rapida/",
        type: 'POST',
        data: $("#registrar_prueba_antigeno_cuantitativa").serialize(),
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
