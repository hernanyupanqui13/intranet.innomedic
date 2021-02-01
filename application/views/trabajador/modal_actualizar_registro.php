<div class="modal-dialog modal-lg">
    <div class="modal-content " >
        <div class="modal-body">
            <div class="modal-header">
                <h5 class="text-dark">Registrar Nuevo Colaborador</h5>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="" role="form" class="form-horizontal form-material" id="user_form_insert" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label ">Usuario:</label>
                            <input type="text" name="usuario" class="form-control redondeado " id="usuario" placeholder="Usuario" onkeypress="return sololetrasnumeros(event);">
                        </div>
                        </div>
                        
                        <div class="col-md-3">
                        <div class="form-group">
                            <label for="clave"  class="control-label">Nueva Clave:</label>
                            <input type="password" name="clave" class="form-control redondeado" id="clave" placeholder="password">
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Repetir Clave:</label>
                            <input type="password" name="clave_repeat" class="form-control redondeado" id="repeat_clave" placeholder="repeat password">
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Perfil:</label>
                            <select name="id_perfil" id="id_perfil" class="form-control fondo">
                            <option value="">--seleccionar--</option>
                            <?php foreach ($id_perfil as $perfil_id) {?>
                                <option value="<?php echo $perfil_id->Id;?>"><?php echo $perfil_id->perfil; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Puesto&nbsp; <i class="fa fa-search"></i></label>
                            <input type="text" name="puesto" id="puesto_txt_busqueda" class="form-control" placeholder="Buscar puesto" onkeypress="return sololetras(event);">
                        </div>
                        </div> 
                        <!-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Área&nbsp; <i class="fa fa-search"></i></label>
                            <input type="text" name="area" id="area_txt_busqueda" class="form-control" placeholder="Buscar área" onkeypress="return sololetras(event);">
                        </div>
                        </div>-->
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fecha de Ingreso</label>
                            <input type="text" name="fecha_ingreso"  class="form-control" placeholder="2017-06-04" id="mdate" >
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                        <div class="form-group">
                            <div class="form-group  custom-control custom-checkbox pt-2">
                            <input type="checkbox" name="cbmostrar"  class="fantasmaxxxxxx custom-control-input mr-sm-2" id="checkbox2">
                            <label class="custom-control-label" for="checkbox2">Registro Manual </label>
                        </div>

                            <label class="control-label ">Buscar - Ingrese DNI presione enter  <i class="fa fa-search"></i></label>
                            <input type="text" class="dni form-control " id="dni" name="dni" placeholder="Ingrese DNI presione enter">
                            <button style="display: none;" id="botoncito" class="botoncito btn btn-outline-success">Buscar</button>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label ">Nombre</label>
                            <input type="text" name="nombre" id="nombres_completos" class="form-control redondeado" placeholder=""  readonly="">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label  class="control-label ">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control redondeado" id="apellido_paterno_x" placeholder="" readonly="">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label ">Apellido Materno</label>
                            <input type="text" name="apellido_materno" class="form-control redondeado" id="apellido_materno" placeholder=""  readonly="">
                        </div>
                        </div>
                        <!--<div class="col-md-4">
                        <div class="form-group">
                            <label  class="control-label ">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control redondeado" id="apellido_paterno_x" placeholder="" readonly="">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label ">Apellido Materno</label>
                            <input type="text" name="apellido_materno" class="form-control redondeado" id="apellido_materno" placeholder="" readonly="">
                        </div>
                        </div>-->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label  class="control-label ">Email:</label>
                            <input type="text" name="email" id="email" class="form-control redondeado" placeholder="Ingrese Email Valido">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group text-center">
                            <label  class="control-label">Adjuntar imagen</label>
                            <input type="file" id="input_file" class="dropify" name="picture" onchange="fileValidatiosn(this);"/>
                            <span class="text-center"><small class="label label-danger">tamaño permitido 128px x 128px</small></span>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label  class="control-label">Sexo:</label>
                            <select name="id_genero" id="id_genero" class="form-control fondo">
                            <option value="">--seleccionar--</option>
                            <?php foreach ($id_sexo as $sexo_id) {?>
                                <option value="<?php echo $sexo_id->Id;?>"><?php echo $sexo_id->genero; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label  class="form-label">Nº Celular:</label>
                            <input type="text" name="celular" id="celular" class="form-control redondeado" placeholder="924543121" onkeypress="return soloNumeros(event);">
                        </div>
                        </div>
                    </div>
                    
                    <div class="row ">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <a href="javascript:void(0)" class="btn btn-outline-danger btn-rounded  btn-lg " data-dismiss="modal"> <i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
                        <button type="submit" class="btn btn-outline-success btn-rounded btn-lg register_data"><i class=" fas fa-check-circle"></i>&nbsp;Registrar</button>
                        </div>
                        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
