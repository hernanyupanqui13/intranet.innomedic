function getExamId() {
    
    let id = window.location.pathname;
    id = id.split("/");
    id = id[id.length-1];
    return id;

}

function actualizarProgreso(nuevo_estado) {
    let id = getExamId();

    $.ajax({
        url: window.location.origin + "/intranet.innomedic.pe" + "/Laboratorio/Laboratorio/actualizarEstadoProgreso/",
        type: 'POST',
        data: {            
            status: nuevo_estado,
            the_id:id
        }
    })
}