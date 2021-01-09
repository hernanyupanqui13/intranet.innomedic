<!-- Table Markup -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">

				<!--<table id="showcase-example-1" class="table" data-paging="true" data-filtering="true" data-sorting="true" data-editing="true" data-state="true" data-paging-size="25"></table>-->
				<p>Mostrar registros según filtro</p>
				<button type="button" class="btn btn-primary" data-page-size="10">10</button>
				<button type="button" class="btn btn-primary" data-page-size="20">20</button>
				<button type="button" class="btn btn-primary" data-page-size="50">50</button>
				<button type="button" class="btn btn-primary" data-page-size="100">100</button>
				<button type="button" class="btn btn-primary" data-page-size="200">200</button>
				<button type="button" class="btn btn-primary" data-page-size="500">500</button>
				<br>
				<br>
				<div class="row">
                  <div class="col-md-12">
                    <h4 class="card-title text-center" >Criterios de Busqueda avanzada</h4>
                    <div class="row">
                      <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                          <div class="example">
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control " name="fecha_inicio" id="fecha_inicio" placeholder="<?php echo date("Y-m-d");?>" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info b-0 text-white">A</span>
                                    </div>
                                    <input type="text" class="form-control " name="fecha_fin" id="fecha_fin" placeholder="<?php echo date("Y-m-d");?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-3">
                        <div class="form-group">
                          <input type="text" class="form-control btn-rounded" name="nombre" id="nombre_busqueda" placeholder="Ingrese Nombre a Buscar" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-3">
                        <div class="form-group">
                          <input type="number" class="form-control btn-rounded" name="dni" id="dni_busqueda" placeholder="Ingrese dni a Buscar" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-2">
                        <div class="form-group">
                          <a href="javascript:void(0)" class="btn btn-danger btn-rounded" onclick="limpiar_campos()" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Limpiar ...</a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12 text-left">
                  <div class="row">
                      <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 ">
                        <div class="form-group">
                           <button class="btn btn-dark btn-rounded btn-block btn-md" id="buscar_registro_por_ajax"  type="button"><i class="fas fa-search"></i>&nbsp;Busqueda Avanzada</button>
                        </div>
                         <!--<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->
                        </div>
                     
                    </div>
                </div>
				<table id="showcase-example-1" class="table "  data-filtering="true"  data-sorting="true" data-state="true" data-paging="true" data-paging-size="15"  ></table>


				<div class="text-center">
		          <h4 class="mt-4"><span class="font-weight-bold">Leyenda:</span>  <small>&nbsp;Observación - Anulado - Pendiente</small>&nbsp;<span class="bg-danger btn">&nbsp;&nbsp;</span>&nbsp;<small>&nbsp;Entregado</small>&nbsp;<span class="bg-info btn">&nbsp;&nbsp;</span><small>&nbsp;Nuevo</small>&nbsp;<span class=" btn btn-outline-dark bg-white">&nbsp;&nbsp;</span></h4>
		        </div>
				
			</div>
		</div> 
	</div>
</div>

<!-- Editing Modal Markup -->
<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">
	<style scoped>
		/* provides a red astrix to denote required fields - this should be included in common stylesheet */
		.form-group.required .control-label:after {
			content:"*";
			color:red;
			margin-left: 4px;
		}
	</style> 
	
</div>

<!-- Imprimir Modal  -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xl ">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title font-weight-bold" id="exampleModalLabel">Resultado del paciente: <span class="font-weight-normal" id="nombres_completos_pacientex"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="border: 2px solid #210202;border-radius: 50%;">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
				</button>
			</div>
			<div class="modal-body printableAreaprueba bg-white" id="pdfdocx">
				<span id="pdfdoc"></span>			
			</div>			
		</div>
	</div>
</div>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



	<script>



		$('[data-page-size]').on('click', function(e){
			e.preventDefault();
			var newSize = $(this).data('pageSize');
			FooTable.get('#showcase-example-1').pageSize(newSize);

		});


		jQuery(function($){
			ft = FooTable.init('#showcase-example-1', {

				"columns": [
						{ "name": "nro_identificador", "title": "Codigo", "breakpoints": "xs", "sorted": "true" },
						{ "name": "fecha_registro", "title": "Fecha Atención" ,"breakpoints": "xs"},
						{ "name": "nombrex", "title": "Paciente" },
						{ "name": "empresa", "title": "Empresa", "breakpoints": "xs", "classes":"centrado"},
						{ "name": "tipo_examen", "title": "Examen", "breakpoints": "xs sm md", "classes":"centrado"},
						{ "name": "laboratorio", "title": "Laboratorio", "breakpoints": "xs sm md" , "classes":"centrado"},
						{ "name": "rayox", "title": "Rayox X", "breakpoints": "xs sm md", "classes":"centrado"},
						{ "name": "final", "title": "Impresión Final", "breakpoints": "xs sm md", "classes":"centrado"}
						//{ "name": "enviar", "title": "Resultado", "breakpoints": "xs sm md", "classes":"centrado"}
					],
				"rows": jQuery.get({
					"url": "<?php echo base_url().'Examenes/Ordenes/obtener_registro_ajax/';?>",
					"dataType": "json",
					
				}),		
			})		
		});

		$(document).ready(function() {

			$(document).on('click', '#buscar_registro_por_ajax', function(event) {
				event.preventDefault();

				/* Act on the event */
				fecha_inicio = $("#fecha_inicio").val();
	            fecha_fin = $("#fecha_fin").val();
	            nombre_busqueda = $("#nombre_busqueda").val();
	            dni_busqueda = $("#dni_busqueda").val();


	            if (fecha_inicio=="" || fecha_fin =="") {
                  Swal.fire(
                    'Ingrese Fecha de Busqueda',
                    'Campos Vacios verificar por favor!',
                    'error'
                  )
                	return false;
              	}
              		$('#showcase-example-1').footable({
              //	ft = FooTable.init('#showcase-example-1',{

              	//	"empty": "No se encontro ningun resultado",
					
					"columns": [
							{ "name": "nro_identificador", "title": "Codigo", "breakpoints": "xs", "sorted": "true" },
							{ "name": "fecha_registro", "title": "Fecha Atención" ,"breakpoints": "xs"},
							{ "name": "nombrex", "title": "Paciente" },
							{ "name": "empresa", "title": "Empresa", "breakpoints": "xs" },
							{ "name": "laboratorio", "title": "Laboratorio", "breakpoints": "xs sm md" , "classes":"centrado"},
							{ "name": "rayox", "title": "Rayox X", "breakpoints": "xs sm md", "classes":"centrado"},
							{ "name": "final", "title": "Impresión Final", "breakpoints": "xs sm md", "classes":"centrado"}
							//{ "name": "enviar", "title": "Resultado", "breakpoints": "xs sm md", "classes":"centrado"}
						],

					"rows": jQuery.post({
						"url": "<?php echo base_url().'Examenes/Ordenes/mostrar_datos_busqueda_avanzada/';?>",
						"dataType": "json",
						//"type": "POST",
						"data": {
                                    "fecha_inicio": fecha_inicio,
                                    "fecha_fin": fecha_fin,
                                    "nombre_busqueda":nombre_busqueda,
                                    "dni_busqueda":dni_busqueda,
                                },
                        success:  function (response) {                 
		                      //  $(".salida").html(response);
		                      //con esto lo eliminamos el primer tr si en caso habria un tr profesional
		                       $("#showcase-example-1 tr:last-child").remove();
		                     // $("#showcase-example-1").footable();
		                    // ft.rows.load("rows", true);
		                  },
		                 error:function(){
		                       alert("error")
		                    }
					}),

					

			 //   })
			   });

			   //$('.table').footable(); 
			   //	ft.rows.load(rows, true);


              	//$('#showcase-example-1').trigger('footable_initialized');
             
			   

			});
		});

		 function limpiar_campos() {

            $("#fecha_inicio").val("");
            $("#fecha_fin").val("");
            $("#nombre_busqueda").val("");
            $("#dni_busqueda").val("");
		  }
		  
		function impresion_final($id) {
			$("#exampleModal").modal({show: true});			
			$("#pdfdoc").html('<iframe src="<?php echo base_url().'ResultadoFinal/ResultadoFinal/Impresion_final_view/'?>'+$id+'"  width="100%" height="700px" frameBorder="0"></iframe>');			
		}
	</script>

	<script>
		function laboraorio(id) {
			window.open(

			  '<?php echo base_url().'Laboratorio/Laboratorio/Mostrar_registros/'?>'+id+'/?<?php echo rand(9999999,00000000);?>=<?php echo time(); ?><?php echo date('Y-m-d');?>?=<?php echo md5("INNOPMEDIC INTERNATIONAL E.I.R.L");?>?=service-protect==<?php echo rand();?>?=innomedic-gps-active-url?====<?php echo $this->session->userdata("nombre");?>',
			  '_blank' // <- This is what makes it open in a new window.
			);

		}

		function rayosx(url) {
			window.open(
			  '<?php echo base_url().'Rayos/Rayos/Mostrar_registros/'?>'+url+'/?<?php echo rand(9999999,00000000);?>=<?php echo time(); ?><?php echo date('Y-m-d');?>?=<?php echo md5("INNOPMEDIC INTERNATIONAL E.I.R.L");?>?=service-protect==<?php echo rand();?>?=innomedic-gps-active-url?====<?php echo $this->session->userdata("nombre");?>" "<?php echo $this->session->userdata("apellido_paterno");?>',
			  '_blank' // <- This is what makes it open in a new window.
			);
		}
	</script>

	<style>
		.centrado{ 
			text-align: center; 

		}
	</style>
