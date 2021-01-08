$(document).on('submit', '#registrar_prueba_molecular', function(event) {
    event.preventDefault();
    /* Act on the event */

    $.ajax({
        url: window.location.pathname+"../../do_upload/",
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
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
        location.reload();
    });    
});


$(document).on('click', '#imprimir_prueba_molecular', function(event) {
    event.preventDefault();
    $("#exampleModal").modal("show");

});
