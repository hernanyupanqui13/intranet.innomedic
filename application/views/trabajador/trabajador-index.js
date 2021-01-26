console.log("externos bien");

$(document).on('submit', '#user_form_insert', function(event){  
    event.preventDefault();  

    var usuario = $('#usuario').val();  
    var clavexx = $("#clave").val();
    var clavexx1 = $("#repeat_clave").val();
    var perfil = $("#id_perfil").val();
    var puesto_txt_busqueda = $("#puesto_txt_busqueda").val();
   // var area_txt_busqueda=$("#area_txt_busqueda").val();
    var fecha_ingreso = $("#mdate").val();
    var dnix = $("#dni").val();
    var nombres_completos = $("#nombres_completos").val();
    var apellido_paterno = $("#apellido_paterno_x").val();
    var apellido_materno = $("#apellido_materno").val();
    var emailxx = $("#email").val();
    var sexo = $("#id_genero").val();
    var telefono_movil=$("#celular").val();
    var imagen = $('#input_file').val();  
   


   //Campo Usuario
   if (usuario=='' || usuario.length == 0 || /^\s+$/.test(usuario)) {
         const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
           })

           Toast.fire({
             icon: 'error',
             title: 'El campo usuario esta vacio'
           })
           $(".register_data").text('Registrar');
         return false;
     }else if(usuario.length<6 || usuario.length>20){
       const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
           })

           Toast.fire({
             icon: 'error',
             title: 'usuario no puede ser menor a 6 caracteres ni mayor a  20'
           })
           $(".register_data").text('Registrar');
         return false;

     }

     //VALIDACION DE DOS CLAVES IGUALES

     if (clavexx=="" || clavexx==0) {
         const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           onOpen: (toast) => {
             toast.addEventListener('mouseenter', Swal.stopTimer)
             toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
         })

         Toast.fire({
           icon: 'error',
           title: 'Ingrese clave'
         })
         $(".register_data").text('Registrar');
        return false;

      }

      //clave2 

      if (clavexx1=="" || clavexx1==0) {
         const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           onOpen: (toast) => {
             toast.addEventListener('mouseenter', Swal.stopTimer)
             toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
         })

         Toast.fire({
           icon: 'error',
           title: 'Repetir la nueva contraseña'
         })
         $(".register_data").text('Registrar');
        return false;

      }

     if (clavexx != clavexx1) {
       const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           onOpen: (toast) => {
             toast.addEventListener('mouseenter', Swal.stopTimer)
             toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
         })

         Toast.fire({
           icon: 'error',
           title: 'Las contraseñas no son iguales'
         })
         $(".register_data").text('Registrar');
        return false;
      }

      //Validar para que ingrese  perfil

       if( perfil == null || perfil == 0 ) {
           const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
           })

           Toast.fire({
             icon: 'error',
             title: 'Seleccione Perfil'
           })
           $(".register_data").text('Registrar');
         return false;
       }

   //validacion de puesto

   if (puesto_txt_busqueda=='' || puesto_txt_busqueda.length == 0 || /^\s+$/.test(puesto_txt_busqueda)) {
       const Toast = Swal.mixin({
               toast: true,
               position: 'top-end',
               showConfirmButton: false,
               timer: 3000,
               timerProgressBar: true,
               onOpen: (toast) => {
                 toast.addEventListener('mouseenter', Swal.stopTimer)
                 toast.addEventListener('mouseleave', Swal.resumeTimer)
               }
             })

             Toast.fire({
               icon: 'error',
               title: 'Buscar puesto (Presiona "ENTER")'
             })
             $(".register_data").text('Registrar');
         return false;

   }
   //VALIDACION DE AREA

   /*if (area_txt_busqueda=='' || area_txt_busqueda.length == 0 || /^\s+$/.test(area_txt_busqueda)) {
       const Toast = Swal.mixin({
               toast: true,
               position: 'top-end',
               showConfirmButton: false,
               timer: 3000,
               timerProgressBar: true,
               onOpen: (toast) => {
                 toast.addEventListener('mouseenter', Swal.stopTimer)
                 toast.addEventListener('mouseleave', Swal.resumeTimer)
               }
             })

             Toast.fire({
               icon: 'error',
               title: 'Buscar Area (Presiona "ENTER")'
             })
         return false;

   }*/

   // validar fecha ingreso
    
   if (fecha_ingreso == null || fecha_ingreso.length == 0 || /^\s+$/.test(fecha_ingreso) ) {
     const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
           })

           Toast.fire({
             icon: 'error',
             title: 'Ingrese fecha Ingreso'
           })
           $(".register_data").text('Registrar');
     return false;
    
   }
  // varables =  /^(0[1-9]|[12]\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/.test(fecha);
  
     //validacion de dni 


     if (dnix == null || dnix.length == 0 || /^\s+$/.test(dnix) ) {
          const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
           })

           Toast.fire({
             icon: 'error',
             title: 'Ingrese DNI y precione Enter'
           })
           $(".register_data").text('Registrar');
     return false;
    }

     /*if( !(/^\d{9}$/.test(dnix)) ) {
         const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 3000,
         timerProgressBar: true,
         onOpen: (toast) => {
           toast.addEventListener('mouseenter', Swal.stopTimer)
           toast.addEventListener('mouseleave', Swal.resumeTimer)
         }
       })

       Toast.fire({
         icon: 'error',
         title: 'Ingrese DNI valido'
       })
       return false;
     }*/

     //validar campos que estan en reonly


     if (nombres_completos.length =="" ) {
           const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
           })

           Toast.fire({
             icon: 'error',
             title: 'Ingrese campos vacios, Realiza una busqueda  por DNI'
           })
           $(".register_data").text('Registrar');
           return false;
     }

     //email

     expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

       if ( !expr.test(emailxx) ){
             Swal.fire({
               title: 'E-mail',
               text: "La dirección de correo " + emailxx + " es incorrecta.",
               icon: 'error',
               showCancelButton: false,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'ok'
             }).then((result) => {
               if (result.value) {
                 
               }
             })
      $(".register_data").text('Registrar');
         return false;
       }

     //validar sexo

     //Validar para que ingrese  perfil

     if( sexo == null || sexo == 0 ) {
           const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
           })

           Toast.fire({
             icon: 'error',
             title: 'Seleccione Sexo'
           })
         return false;
       }
   $(".register_data").text('Registrar');
     //celular

     if( !(/^\d{9}$/.test(telefono_movil)) ) {
         const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             onOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
           })

           Toast.fire({
             icon: 'error',
             title: 'Ingrese celular valido'
           })
           $(".register_data").text('Registrar');
       return false;
     }

    $(".register_data").text('Registrando.....');
  
     $.ajax({  
       url:window.location.origin + "/intranet.innomedic.pe/"+ 'Mantenimiento/Usuario/Agregar_nuevo/',  
       method:'POST',  
       data:new FormData(this),  
       contentType:false,  
       processData:false,  
       success:function(data) {  
         console.log("sucess in email");

         Swal.fire({
           title: 'Muy Bien',
           text: 'El usuario ha sido creado, y le hemos enviado sus accesos por correo',
           icon: 'success',
           showCancelButton: false,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'OK'
         }).then((result) => {
           if (result.value) {  
             location.href= window.location.origin + "/intranet.innomedic.pe/" + 'Mantenimiento/Trabajador/';
           }
         })

         $(".bd-example-modal-xl").modal('hide');


         //clear on focus
         $('#usuario').val("");
         $('#picture').val("");
         $(".register_data").text('Registrar');

       },statusCode:{
           400: function(xhr){

             var json = JSON.parse(xhr.responseText);
             if (json.error) {
               Swal.fire({
                 title: 'Lo siento mucho',
                 text: ""+json.error+"",
                 icon: 'warning',
                 showCancelButton: false,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'OK'
               }).then((result) => {
                 if (result.value) {
                     
                 }
               })
               $('#btnSave_x').html('<i class="fas fa-circle-notch"></i> Reintentar'); //change button text
               $('#btnSave_x').attr('disabled',false);
                 $(".register_data").text('Registrar');
              /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
             }
             
           },
           401: function(xhr){
               var json = JSON.parse(xhr.responseText);
                 Swal.fire(
                   'No se puedo enviar el correo!',
                   ''+json.corereo_error+'',
                   'error'
                 )
                  $(".register_data").text('Registrar');
             
             },
             
           402: function(xhr){
               var json = JSON.parse(xhr.responseText);
                 Swal.fire(
                   'Ingrese Email nuevo!',
                   ''+json.error_email+'',
                   'error'
                 )
                 $(".register_data").text('Registrar');
             
             },
             
           403: function(xhr){
               var json = JSON.parse(xhr.responseText);
                 Swal.fire(
                   'Ingrese Usuario nuevo!',
                   ''+json.error_users+'',
                   'error'
                 )
                 $(".register_data").text('Registrar');
             
             },
             
           404: function(xhr){
               var json = JSON.parse(xhr.responseText);
                 Swal.fire(
                   'Ingrese DNI nuevo!',
                   ''+json.error_dni+'',
                   'error'
                 )
                 $(".register_data").text('Registrar');
             
             },
       error: function(jqXHR, textStatus, errorThrown)
                            {
                  Swal.fire({
                   title: 'Lo siento mucho',
                   text: "Algo paso con el sistema Vuelva a intentar una vez mas",
                   icon: 'warning',
                   showCancelButton: false,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Ok!(︶︿︶)!'
                 }).then((result) => {
                   if (result.value) {
                    
                   }
                 })
             }
         }  


   });  
    
    

});  