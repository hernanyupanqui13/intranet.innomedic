							

 <!--<?php  echo $html_paquete; ?>-->
							<ul class="nav nav-tabs" role="tablist">
	                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down font-weight-bold">Laboratorio</span></a> </li>
	                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"  id="mostrar_prueba_rapida"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Prueba Rapida</span></a> </li>
	                           <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>-->
	                        </ul>
	                        <!-- Tab panes -->
	                        <div class="tab-content tabcontent-border">
	                            <div class="tab-pane active p-20" id="home" role="tabpanel">
	                                <form action="">   
					                    <div class="card-header bg-info">
						                    <h4 class="m-b-0 text-white text-center">Hemograma (Hemoglobina Hematocrito) Y Glucosa</h4>
						                </div>
						                <div class="row">
						                	<div class="col-md-12">
						                		<div class="table-responsive">
						                			<table class="table"  cellspacing="0" cellpadding="0" style="padding: 0; margin: 0;">
						                				<thead class="text-center">
						                					<tr>
						                						<th>ANALISIS</th>
						                						<th>RESULTADO DE ANALISIS</th>
						                						<th>UNIDAD</th>
						                						<th>RANGO DE REFERENCIA</th>
						                						<th>FUERA DE RANGO</th>
						                					</tr>
						                				</thead>
						                				<tbody class="text-left">
						                					<tr>
						                						<td style="width: 25%;">RECUENTO DE GLOBULOS DE ROJOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>/mm^3</td>
						                						<td>3'800,000 - 5'800,000</td>
						                						<td></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">HEMOGLOBINA</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>g/dl</td>
						                						<td>Hombres: 13.00 - 18.00 <br>Mujeres: 12.00 - 16.00</td>
						                						<td class="text-center font-weight-bold">*</td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">HEMATOCRITO</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>%</td>
						                						<td>Hombres: 40 - 54 <br>Mujeres: 35 - 47</td>
						                						<td></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">LEUCOCITOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>/mm^3</td>
						                						<td>Adulto: 4,500 - 10,000 <br>Niño: 8,000 - 11,000</td>
						                						<td></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">RECUENTO DE PLAQUETAS</td>
						                						<td style="width: 15%;">
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>/mm^3</td>
						                						<td>150,000 - 450,000</td>
						                						<td></td>
						                					</tr>
						                					<!--esto de constantes-->
						                					<tr class="bg-dark">
						                						<td class="font-weight-bold text-white">CONSTANTES CORPUSCULARES</td>
						                						<td></td>
						                						<td></td>
						                						<td></td>
						                						<td></td>
						                					</tr>
						                					<!--hasta auqi-->
						                				</tbody>

						                			</table>
						                			<table class="table" cellspacing="0" cellpadding="0">
						                				<thead class="text-center">
						                					<tr style="display: none;">
						                						<th>ANALISIS</th>
						                						<th>RESULTADO DE ANALISIS</th>
						                						<th>UNIDAD</th>
						                						<th>RANGO DE REFERENCIA</th>
						                						<th>FUERA DE RANGO</th>
						                					</tr>
						                				</thead>
						                				
						                				<tbody class="text-left">
						                					<tr>
						                						<td style="width: 25%;">VCM</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>fL</td>
						                						<td>80 - 97</td>
						                						<td class="text-center font-weight-bold">*</td>
						                						
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">HCM</td>
						                						<td style="width: 15%;">
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>pg</td>
						                						<td>27 - 32</td>
						                						<td class="text-center font-weight-bold">*</td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">CHCM</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>g/dl</td>
						                						<td>30.00 - 35.00</td>
						                						<td class="text-center font-weight-bold">*</td>
						                					</tr>
						                					<tr class="bg-dark">
						                						<td class="font-weight-bold text-white">FORMULA DIFERENCIAL PORCENTUAL</td>
						                						<td></td>
						                						<td></td>
						                						<td></td>
						                						<td></td>
						                					</tr>

						                				</tbody>
						                			</table>
						                			<table class="table" cellspacing="0" cellpadding="0">
						                				<thead class="text-center">
						                					<tr style="display: none;">
						                						<th>ANALISIS</th>
						                						<th>RESULTADO DE ANALISIS</th>
						                						<th>UNIDAD</th>
						                						<th>RANGO DE REFERENCIA</th>
						                						<th>FUERA DE RANGO</th>
						                					</tr>
						                				</thead>
						                				
						                				<tbody class="text-left">
						                					<tr>
						                						<td style="width: 25%;">LINFOCITOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>%</td>
						                						<td>25 - 40	</td>
						                						<td class="text-center font-weight-bold"></td>
						                						
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">MONOCITOS</td>
						                						<td style="width: 15%;">
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>%</td>
						                						<td>2 - 8</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">EOSINOFILOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>%</td>
						                						<td>0 - 4</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">BASOFILOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>%</td>
						                						<td>0 - 2</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">SEGMENTADOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>%</td>
						                						<td>55- 65</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">ABASTONADOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>%</td>
						                						<td>0 - 5</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td class="font-weight-bold">ANORMAL</td>
						                                        <td>
						                                        	<div class="custom-control custom-checkbox mr-sm-2">
						                                                    <input type="checkbox" class="custom-control-input" id="checkbox0">
						                                                    <label class="custom-control-label" for="checkbox0"></label>
						                                                </div>
						                                        </td>
						                					</tr>
						                					<tr>
						                						<td class="font-weight-bold">
						                							FORMULA DIFERENCIAL
						                						</td>
						                						<td>
						                							<span class="text-danger">(Total: 0 %)</span>
						                						</td>
						                						<td></td>
						                						<td></td>
						                						<td></td>
						                					</tr>
						                					<tr class="bg-dark">
						                						<td class="font-weight-bold text-white">
						                							FORMULA DIFERENCIAL ABSOLUTA
						                						</td>
						                						<td>
						                						
						                						</td>
						                						<td></td>
						                						<td></td>
						                						<td></td>
						                					</tr>

						                				</tbody>
						                			</table>

						                			<table class="table" cellspacing="0" cellpadding="0">
						                				<thead class="text-center">
						                					<tr style="display: none;">
						                						<th>ANALISIS</th>
						                						<th>RESULTADO DE ANALISIS</th>
						                						<th>UNIDAD</th>
						                						<th>RANGO DE REFERENCIA</th>
						                						<th>FUERA DE RANGO</th>
						                					</tr>
						                				</thead>
						                				
						                				<tbody class="text-left">
						                					<tr>
						                						<td style="width: 25%;">LINFOCITOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>/mm^3</td>
						                						<td>1,000 - 4,800</td>
						                						<td class="text-center font-weight-bold"></td>
						                						
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">MONOCITOS</td>
						                						<td style="width: 15%;">
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>/mm^3</td>
						                						<td>0 - 800</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">EOSINOFILOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>/mm^3</td>
						                						<td>0 - 500</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">BASOFILOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>/mm^3</td>
						                						<td>0 - 200</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">SEGMENTADOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>/mm^3</td>
						                						<td>1,600 - 7,000</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td style="width: 25%;">ABASTONADOS</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>/mm^3</td>
						                						<td>0 - 500</td>
						                						<td class="text-center font-weight-bold"></td>
						                					</tr>
						                					<tr>
						                						<td class="font-weight-bold">ANORMAL</td>
						                                        <td>
						                                        	<div class="custom-control custom-checkbox mr-sm-2">
						                                                    <input type="checkbox" class="custom-control-input" id="checkbox1">
						                                                    <label class="custom-control-label" for="checkbox1"></label>
						                                                </div>
						                                        </td>
						                					</tr>
						                					<tr class="bg-dark">
						                						<td class="font-weight-bold text-white">GLUCOSA (BIOQUIMICA)</td>
						                						<td></td>
						                						<td></td>
						                						<td></td>
						                						<td></td>
						                					</tr>
						                					
						                				</tbody>
						                			</table>
						                			<table class="table" cellspacing="0" cellpadding="0">
						                				<thead class="text-center">
						                					<tr>
						                						<th>ANALISIS</th>
						                						<th>RESULTADO DE ANALISIS</th>
						                						<th>UNIDAD</th>
						                						<th>RANGO DE REFERENCIA</th>
						                						<th>FUERA DE RANGO</th>
						                					</tr>
						                				</thead>
						                				
						                				<tbody class="text-center">
						                					<tr >
						                						<td style="width: 25%;" class="text-left">GLUCOSA BASAL</td>
						                						<td>
						                							<input type="number" class="form-control btn-rounded" placeholder="0" name="" id="">
						                						</td>
						                						<td>mg/dl</td>
						                						<td>70 - 110</td>
						                						<td class="text-center font-weight-bold"></td>
						                						
						                					</tr>
						                		

						                				</tbody>
						                			</table>
						                			<div class="form-group">
						                				<label for="">Observación</label>
						                				<textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="Ingrese Observación....."></textarea>
						                			</div>
						                		</div>
						                	</div>
						                </div>
					                    <div class="row">
				                            <div class="col-md-12">
				                              <div class="text-center">
				                                <input type="hidden" name="id_registrar_id_tipopexamen" id="id_registrar_id_tipopexamen" value="">
				                                <a href="javascript:void(0)" onclick="return cancelar_fijo_id_tipoexamen()" class="btn btn-danger btn-rounded btn-lg"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
				                                <button type="submit" class="btn btn-info btn-rounded btn-lg" id="cambio_nomre_paquete_asoaciado_escudero"><i class="fas fa-check-circle"></i>&nbsp;Actualizar Información</button>
				                              </div>
				                            </div>
				                         </div>
				                    </form>
	                            </div>
	                            <div class="tab-pane  p-20" id="profile" role="tabpanel">
	                            	<div class="card-header bg-info">
					                    <h4 class="m-b-0 text-white text-center">Prueba Rapida</h4>
					                </div>
					                <form action="#" id="registrar_prueba_covid">
					                <div class="row m-2">
					                	<div class="col-md-4">
					                		<div class="form-group text-center">
					                			<h3>ÁREA</h3>
					                			<p><strong class="font-weight-bold">DETECCIÓN DE ANTICUERPOS -</strong>&nbsp;SARS-CoV-2. <br> <strong>Metodologia</strong> Inmunocromatografia</p>

					                		</div>
					                	</div>
					                	<div class="col-md-8">
					                		<div class="form-group text-center">
					                			<h3>INMUNOLOGÍA</h3>
					                		</div>
					                	</div>
					                </div>
					                <div class="row">
					                	<div class="col-md-12">
					                		<div class="table-responsive">
				                				<table class="table">
				                					<thead class="text-center">
				                						<tr>
				                							<th>Prueba</th>
					                						<th>Resultado</th>
					                						<th>Unidades</th>
					                						<th>Valores de Referencia</th>
				                						</tr>
				                					</thead>
				                					<tbody class="text-center">
				                						<tr>
				                							<td>Anticuerpo IgM-SARS-COV-2</td>
				                							<td>
				                								<select name="igm" id="igm" class="form-control">
				                									<option value="">--Seleccione--</option>
				                									<option value="REACTIVO">REACTIVO</option>
				                									<option value="NO REACTIVO">NO REACTIVO</option>
				                								</select>
				                							</td>
				                							<td>
				                								<span>-----------</span>
				                							</td>
				                							<td>
				                								<span>-----------</span>
				                							</td>
				                						</tr>
				                						<tr>
				                							<td>Anticuerpo IgG-SARS-COV-2</td>
				                							<td>
				                								<select name="igg" id="igg" class="form-control">
				                									<option value="">--Seleccione--</option>
				                									<option value="REACTIVO">REACTIVO</option>
				                									<option value="NO REACTIVO">NO REACTIVO</option>
				                								</select>
				                							</td>
				                							<td>
				                								<span>-----------</span>
				                							</td>
				                							<td>
				                								<span>-----------</span>
				                							</td>
				                						</tr>
				                					</tbody>
				                				</table>
				                			</div>
					                	</div>
					                </div>
					                <div class="row">
			                            <div class="col-md-12">
			                              <div class="text-center">
			                              	<input type="hidden" name="id_unico" id="id_unico">
			                                <a href="javascript:void(0)" id="imprimir_prueba_rapida" class="btn btn-danger btn-rounded btn-lg"><i class=" fas fa-print"></i>&nbsp;Imprimir</a>
			                                <button type="submit" class="btn btn-info btn-rounded btn-lg" ><i class="fas fa-check-circle"></i>&nbsp;Actualizar Prueba Rápida</button>
			                              </div>
			                            </div>
			                         </div>
					               
					            </form>
	                            </div>
	                            <div class="tab-pane p-20" id="messages" role="tabpanel">3</div>
	                        </div>