const vista_previa_modal = "#exampleModal";


/*
Esto solo obtiene la plantilla. Hya optra funciona que obtiene los datos y los llena
Revisar que funcione bien con Molecular. El id es opcional para obtener plantillas con datos precargados 
desde el servidor
*/
function getPlantilla(plantilla, id=null) {
	
    let xhttp = new XMLHttpRequest();
    let response;

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			response = this.responseText;
		}
	};

    xhttp.open("GET", window.location.origin + "/intranet.innomedic.pe" + "/Impresion/Impresion/getPlantilla/" + plantilla + "/" + id, false);
    xhttp.send();
    return response;
}


function getData(id) {
    let xhttp = new XMLHttpRequest();
    let response;

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(JSON.parse(this.responseText));
			response = JSON.parse(this.responseText);
		}
	};

	xhttp.open("GET", window.location.origin + "/intranet.innomedic.pe" + "/Impresion/Impresion/getData/" + id, false);
    xhttp.send();
    return response;
}


function fillData(data) {
    $("#nombres_completos_paciente").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
    $("#nombres_completos_pacientex").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
    $("#dni_paciente").text(data.dni);

    if (data.empresa=="") {
        aplicate = ``;
        
    } else {
        aplicate = `<div class=" text-center p-2 border ">
                <div class="font-weight-bold text-dark">
                    EMPRESA:<span class="font-weight-normal" > `+data.empresa+`&nbsp;&nbsp;&nbsp;&nbsp;`+data.ruc+`</span>
                </div>
            </div>`;
        
    }
    $("#aplicamos_cambios").html(aplicate);
    $("#sexo_id").text(data.sexo);
    

    $("#igmx").text(data.igm);
    $("#iggx").text(data.igg);
    $("#edad_xx").text(data.edad);
    $("#fecha_nacimientoxx").text(data.fecha_nacimiento);
    $("#update_covid").text(data.update_covid);
    $("#concentracion_igm_imprimir").text(data.la_concentracion_igm);
    $("#concentracion_igg_imprimir").text(data.la_concentracion_igg);  
    $("#antigeno_resultado_imprimir").text(data.los_resultados_antigeno);
    $("#concentra_atig_imprimir").text(data.la_concentra_atig); 
    
    
    if(data.molecular_url!= null) {
        document.getElementById("imprimir_molecular_container").src=window.location.origin + "intranet.innomedic" + "/upload/resultados_molecular/" + data;
    }
}

function vistaPreviaImprimir(plantilla, container_id, id=null) {
    
    $(vista_previa_modal).modal({show: true});	

    document.getElementById(container_id).innerHTML = getPlantilla(plantilla, id);
    let data = getData(id);
    fillData(data);
}

function imprimir(element_to_print=null) {
    // Not my code, not sure what it does
    let mode = 'iframe';
    let close = mode == "popup";
    let options = {
        mode: mode,
        popClose: close
    };


    // Para que la funcion sea mutipropositos y se use mas a futuro
    if (element_to_print!=null) {
        document.getElementById(element_to_print).print();
    }

    // Imprimir elementos en un div container
    let divArea = document.querySelector("div.printableAreaprueba");
    if (divArea != null) {
        $("div.printableAreaprueba").printArea(options);
    }
    
    // Imprimir elementos en un iframe container 
    let pdfObject = document.querySelector("iframe.printableAreaprueba");
    if (pdfObject != null) {
        pdfObject.contentWindow.print();
    }
}


/*
Esta funcion reune varias plantillas o una sola para mostra un documento final
con el resultado de todos los examenes y la firma de todos los doctores
*/
function getImpresionFinal(id_del_examen) {
    let xhttp = new XMLHttpRequest();
    let response;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
        }
    };
    xhttp.open("GET", window.location.origin + "/intranet.innomedic.pe" + '/Impresion/Impresion/getPlantillaFinal/' + id_del_examen, false);
    xhttp.send();
    return response;
}

/*
Funcion llamada al imprimir el resultado final de una orden clinica
Muestra una vista previa en modal de la impresion
*/
function impresion_final($id) {
			
    $(vista_previa_modal).modal({show: true});	

    document.getElementById("pdfdoc").innerHTML = getImpresionFinal($id);
                    
    // Fill the data with getData response
    fillData(getData($id));
}