<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg ">
    <div class="modal-content molecular_modal">
        <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Resultado del paciente: <span class="font-weight-normal" id="nombres_completos_pacientex"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="
        border: 2px solid #210202;
        border-radius: 50%;
    ">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
        </button>
        </div>
        <div class="modal-body  bg-white molecular_iframe_container" width="100%" height="60%">
            <iframe src="<?= base_url() . 'upload/resultados_molecular/' . $molecular_url?>" width="100%" class="printableAreaprueba" type="application/pdf" id="imprimir_molecular_container"></iframe>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn btn-rounded" data-dismiss="modal"><i class=" fas fa-window-close"></i>&nbsp;Cerrar</button>
        <button type="button" id="print_prueba_molecular" class="btn btn-outline-dark btn btn-rounded"><i class=" fas fa-print"></i>&nbsp;Imprimir</button>
        </div>
    </div>
    </div>
</div>