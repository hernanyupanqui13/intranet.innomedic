async function changeLink(event) {

    event.preventDefault();
    const { value: formValues } = await Swal.fire({
        title: 'Multiple inputs',
        html:
            '<span>URL:</span><input id="swal-url" class="swal2-input">' +
            '<span>Texto:</span><input id="swal-label" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
            return [
            document.getElementById('swal-url').value,
            document.getElementById('swal-label').value
            ]
        }
    })
    
    if (formValues) {
        document.getElementById("final_link_container").href = formValues[0];
        document.getElementById("final_link").innerHTML = formValues[1];
    }


}

async function setEmailConfig() {

    const { value: formValues } = await Swal.fire({
        title: 'Multiple inputs',
        html:
            '<span>Mi direccion de correo:</span><input id="swal-mi_correo" class="swal2-input">' +
            '<span>Mi contraseña:</span><input type="password" id="swal-mi_contrasena" class="swal2-input">' + 
            '<span>Para: </span><input type="text" id="swal-destination_list" class="swal2-input">' + 
            '<span>Asunto: </span><input type="text" id="swal-asunto" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
            return {
            mi_correo: document.getElementById('swal-mi_correo').value,
            mi_contrasena: document.getElementById('swal-mi_contrasena').value,
            destination_list: document.getElementById('swal-destination_list').value,
            asunto: document.getElementById('swal-asunto').value

            }
        }
    })
    
    if (formValues) {
        return formValues;
    }


}

// Cuando se termine de editar la plantilla
document.getElementById("final_link_container").addEventListener("click", (event) => changeLink(event));


function continueEmail() {
    email_content = document.getElementById("html_page").innerHTML
    setEmailConfig().then((value)=>sendEmail(JSON.stringify(value), email_content));
}

function sendEmail(config, content) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("success");
            console.log(this.responseText);

        }
    };
    xhttp.open("POST", window.location.origin + "/intranet.innomedic.pe/" + "Correo_generator/enviarCorreo", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("config=" + config + "&content=" + content);

}
