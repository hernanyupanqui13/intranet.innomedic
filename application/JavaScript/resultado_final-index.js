function fillEstadoProgreso() {
    const estado_progreso_array = document.getElementsByClassName("estado_progress_container");
    
    console.log("in the loop");
    for(let i=1; i<estado_progreso_array.length; i++) {
        let value = estado_progreso_array[i].innerText;

        estado_progreso_array[i].innerText = "";
        estado_progreso_array[i].innerHTML = "";

        const container = document.createElement("div");
        const container2 = document.createElement("div");




        console.log(i);

        let bar = new ldBar(container2);        
        let progress_value;
        if(value== "1") {           // Orden Creada
            progress_value = 0;
        } else if(value== "2") {    // Laboratorio llenado
            progress_value = 33;
        } else if (value == "3") {  // Boleta cargada
            progress_value = 67;
        } else if (value == "4") {  // Resultados enviados
            progress_value = 100;
        }

        bar.set(progress_value);


        container2.setAttribute("id", "bar-" + i);
        let ident = "#" + container2.id + " svg";
        let the_svg = container2.querySelector(ident);
        the_svg.setAttribute("viewBox", "-4.5 -4.5 109 25");

    

        container.appendChild(container2);
        container.setAttribute("style", "display: flex; flex-direction: column;");
        container2.setAttribute("style", "");


        estado_progreso_array[i].appendChild(container);

    }
    
}


