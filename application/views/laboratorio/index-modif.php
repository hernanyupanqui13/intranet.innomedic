							<ul class="nav nav-tabs" role="tablist">
	                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down font-weight-bold">Laboratorio</span></a> </li>
	                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"  id="mostrar_prueba_rapida"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Prueba Rapida</span></a> </li>
	                           <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>-->
	                        </ul>
	                        <!-- Tab panes -->
	                        <div class="tab-content tabcontent-border">
	                            <div class="tab-pane active p-20" id="home" role="tabpanel">
	                                <table width="100%" class="FacetFormTABLE" align="left">
							            <tbody><tr class="FacetFilaTD">
							                <td width="884" align="center" class="FacetColumnTD">
							                    
							                    HEMATOLOGIA
							                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NORMAL
							                    <input type="radio" name="conclu_hemo" value="1" checked="">
							                    ANORMAL
							                    <input type="radio" name="conclu_hemo" value="2">
							                    
							                    </td>
							            </tr>
							<tr class="FacetFilaTD">
							<td valign="top"><table width="100%" border="0" class="FacetFormTABLE">
							        <tbody><tr class="FacetFilaTD">
							            <td width="196" height="26" align="center" class="FacetDataTD"><strong>ANALISIS</strong></td>
							            <td width="110" align="center" class="FacetDataTD"><strong>RESULTADO ANALISIS</strong></td>
							            <td width="99" align="center" class="FacetDataTD"><strong>UNIDAD</strong></td>
							            <td width="169" align="center" class="FacetDataTD"><strong>RANGO DE REFERENCIA</strong></td>
							            <td width="138" align="center" class="FacetDataTD"><strong>FUERA DE RANGO</strong></td>
							        </tr>
							                                                                
								                               
							                                                                
									<tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD"> RECUENTO DE GLOBULOS ROJOS</td>
							            <td align="center">
							                <input name="eritrocisrc" type="text" class="FacetInput" id="eritrocisrc" value="5,160,000" size="10" onkeyup="ev_globrojo();calcvcm();calchcm();format(this);" onchange="format(this);"></td>
							            <td align="center" class="FacetDataTD">/mm^3</td>
							            <td align="center" class="FacetDataTD">3'800,000 - 5'800,000</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>
									                                   
							                                                                    
							                         
							                                 
							        
							        <tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">HEMOGLOBINA</td>
							            <td align="center"><input name="hemoglobinarc" type="text" class="FacetInput" id="hemoglobinarc" value="15.6" size="10" onkeyup="ValidaRangosSexo(this, '13.00', '18.00', '12.00', '16.00');calchcm();calcchcm();"></td>
							            <td align="center" class="FacetDataTD">g/dl</td>
							            <td align="center" class="FacetDataTD">Hombres: 13.00 - 18.00 <br> Mujeres: 12.00 - 16.00</td>
							            <td align="center" class="FacetDataTD">*</td>
							        </tr>
							                                                   
							<tr class="FacetFilaTD">          
							            <td height="26" class="FacetDataTD">HEMATOCRITO</td>
							            <td align="center"><input name="hematocritorc" type="text" class="FacetInput" id="hematocritorc" value="46" size="10" onkeyup="ValidaRangosSexo(this, '40', '54', '35', '47');calcvcm();calcchcm();"></td>
							            <td align="center" class="FacetDataTD">%</td>
							            <td align="center" class="FacetDataTD">Hombres: 40 - 54 <br> 
							            Mujeres: 35 - 47</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>
									<tr class="FacetFilaTD" style="display:none">
							            <td height="26" class="FacetDataTD">GLOBULOS BLANCOS</td>
							            <td align="center"><input name="leucocitosrc" type="text" class="FacetInput" id="leucocitosrc" value="" size="10" onkeyup="ValidaRangos(this, '4.00', '10.00');"></td>
							            <td align="center" class="FacetDataTD">x 10^3/ul</td>
							            <td align="center" class="FacetDataTD">4.00 - 10.00</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>
							        
								   
							         <tr class="FacetFilaTD">
							            <td align="left" class="FacetDataTD">LEUCOCITOS</td>
							            <td align="center"><input name="copro_leuco" type="text" class="FacetInput" id="copro_leuco" value="5240" size="10" onkeyup="ev_copro();"></td>
							            <td align="center" class="FacetDataTD">/mm^3</td>
							            <td width="169" align="center" class="FacetDataTD">Adulto: 4,500 - 10,000<br>
							            Niño: 8,000 - 11,000</td>
							            <td width="138" align="left" class="FacetDataTD">&nbsp;</td>
							        </tr>
							         
							         
							         <tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">RECUENTO DE PLAQUETAS</td>
							            <td align="center"><input name="plaquetas" type="text" class="FacetInput" id="plaquetas" value="270,000" size="10" onkeyup="ev_plaquetas();format(this);" onchange="format(this);"></td>
							            <td align="center" class="FacetDataTD">/mm^3</td>
							            <td align="center" class="FacetDataTD">150,000	- 450,000</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>
							 <tr class="FacetFilaTD">
							            <td height="18" colspan="5"><strong>CONSTANTES CORPUSCULARES</strong></td>
							        </tr>
							        <tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">VCM</td>
							            <td align="center"><input name="vcm" type="text" class="FacetInput" id="vcm" value="89.1" size="10" onkeyup="ValidaRangos(this, '80', '97');"></td>
							            <td align="center" class="FacetDataTD">fL</td>
							            <td align="center" class="FacetDataTD">80	- 97</td>
							            <td align="center" class="FacetDataTD">*</td>
							        </tr>
							        <tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">HCM</td>
							            <td align="center"><input name="hcm" type="text" class="FacetInput" id="hcm" value="30.2" size="10" onkeyup="ValidaRangos(this, '27.00', '32.00');"></td>
							            <td align="center" class="FacetDataTD">pg</td>
							            <td align="center" class="FacetDataTD">27	- 32</td>
							            <td align="center" class="FacetDataTD">*</td>
							        </tr>
							        <tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">CHCM</td>
							            <td align="center"><input name="ccmh" type="text" class="FacetInput" id="ccmh" value="33.9" size="10" onkeyup="ValidaRangos(this, '30.00', '35.00');"></td>
							            <td align="center" class="FacetDataTD">g/dl</td>
							            <td align="center" class="FacetDataTD">30.00	- 35.00</td>
							            <td align="center" class="FacetDataTD">*</td>
							        </tr>
							<tr class="FacetFilaTD" style="display:none">
							            <td height="26" class="FacetDataTD">RDW_SD</td>
							            <td align="center">
							                <input name="rdwsd" type="text" class="FacetInput" id="rdwsd" value="" size="10" onkeyup="ValidaRangos(this, '37.00', '54.00');"></td>
							            <td align="center" class="FacetDataTD">fL</td>
							            <td align="center" class="FacetDataTD">37.00	- 54.00</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>
							        <tr class="FacetFilaTD" style="display:none">
							            <td height="26" class="FacetDataTD">RDW_CV</td>
							            <td align="center"><input name="rdwcv" type="text" class="FacetInput" id="rdwcv" value="" size="10" onkeyup="ValidaRangos(this, '10.00', '15.00');"></td>
							            <td align="center" class="FacetDataTD">%</td>
							            <td align="center" class="FacetDataTD">10.00	- 15.00</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>
							   <!--<tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">CARBOXIHEMOGLOBINA</td>
							            <td align="center"><input name="carboxi_hemo" type="text" class="FacetInput" id="carboxi_hemo" value="" size="10"></td>
							            <td align="center" class="FacetDataTD">%</td>
							            <td class="FacetDataTD">No fumadores: 0 - 1,5 %<br>Fumadores: 4 - 9 %<br>Inconsciencia y muerte: > 50 %</td>
							            <td class="FacetDataTD">&nbsp;</td>
							        </tr>-->
							        <tr class="FacetFilaTD">
							            <td height="26" colspan="5" class="FacetDataTD"><strong>FORMULA DIFERENCIAL PORCENTUAL</strong></td>
							        </tr>                                                   
							   <tr class="FacetFilaTD">
							        <td height="26" class="FacetDataTD">LINFOCITOS</td>
							        <td align="center"><input name="linfocitosrc" type="text" class="FacetInput" id="linfocitosrc" value="29" size="10" onkeyup="ValidaRangos(this, '25.00', '40.00');calculo(this.value,'#linfocitos');"></td>
							        <td align="center" class="FacetDataTD">%</td>
							        <td align="center" class="FacetDataTD">25	- 40</td>
							        <td align="center" class="FacetDataTD">&nbsp;</td>
							    </tr>
							    <tr class="FacetFilaTD">
							        <td height="26" class="FacetDataTD">MONOCITOS</td>
							        <td align="center"><input name="monoticosrc" type="text" class="FacetInput" id="monoticosrc" value="6" size="10" onkeyup="ValidaRangos(this, '2', '8');calculo(this.value,'#monocitos');"></td>
							        <td align="center" class="FacetDataTD">%</td>
							        <td align="center" class="FacetDataTD">2 - 8</td>
							        <td align="center" class="FacetDataTD">&nbsp;</td>
							    </tr>
							    <tr class="FacetFilaTD">
							        <td height="26" class="FacetDataTD">EOSINOFILOS</td>
							        <td align="center"><input name="eosinofilosrc" type="text" class="FacetInput" id="eosinofilosrc" value="1" size="10" onkeyup="ValidaRangos(this, '0', '4');calculo(this.value,'#eosinofilos');"></td>
							        <td align="center" class="FacetDataTD">%</td>
							        <td align="center" class="FacetDataTD"> 0	- 4</td>
							        <td align="center" class="FacetDataTD">&nbsp;</td>
							    </tr>                         
							    <tr class="FacetFilaTD">
							        <td height="26" class="FacetDataTD">BASOFILOS</td>
							        <td align="center"><input name="basofilosrc" type="text" class="FacetInput" id="basofilosrc" value="0" size="10" onkeyup="ValidaRangos(this, '0', '2');calculo(this.value,'#basofilos');"></td>
							        <td align="center" class="FacetDataTD">%</td>
							        <td align="center" class="FacetDataTD">0	- 2</td>
							        <td align="center" class="FacetDataTD">&nbsp;</td>
							    </tr>                                             
							    <tr class="FacetFilaTD">
							        <td height="26" class="FacetDataTD">SEGMENTADOS</td>
							        <td align="center"><input name="segmentadossrc" type="text" class="FacetInput" id="segmentadossrc" value="64" size="10" onkeyup="ValidaRangos(this, '55', '65');calculo(this.value,'#segmentados');"></td>
							        <td align="center" class="FacetDataTD">%</td>
							        <td align="center" class="FacetDataTD">55- 65</td>
							        <td align="center" class="FacetDataTD">&nbsp;</td>
							    </tr>                     <tr class="FacetFilaTD">
							        <td height="26" class="FacetDataTD">ABASTONADOS </td>
							        <td align="center"><input name="abastonadossrc" type="text" class="FacetInput" id="abastonadossrc" value="0" size="10" onkeyup="ValidaRangos(this, '0', '5');calculo(this.value,'#abastonados');"></td>
							        <td align="center" class="FacetDataTD">%</td>
							        <td align="center" class="FacetDataTD">0	- 5	</td>
							        <td align="center" class="FacetDataTD">&nbsp;</td>
							    </tr>                                           
							                                                          
							      <tr class="FacetFilaTD">
							          <td height="26" align="center" class="FacetDataTD"><strong>ANORMAL</strong></td>
							          <td align="center"><input type="checkbox" name="anormal_lab1" id="anormal_lab1" value="on" onclick="mostrarcampos1();"></td>
							          <td align="center" class="FacetDataTD">&nbsp;</td>
							          <td align="center" class="FacetDataTD">&nbsp;</td>
							          <td align="center" class="FacetDataTD">&nbsp;</td>
							      </tr>
							      <tr class="FacetFilaTD" id="tr_anom1" style="display: none;">
							          <td height="26" class="FacetDataTD">METAMIELOCITOS</td>
							          <td align="center"><input name="nuevocampo_1" type="text" class="FacetInput" id="nuevocampo_1" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_6');"></td>
							          <td align="center" class="FacetDataTD">%</td>
							          <td align="center" class="FacetDataTD">0</td>
							          <td align="center" class="FacetDataTD">&nbsp;</td>
							      </tr>
							      <tr class="FacetFilaTD" id="tr_anom2" style="display: none;">
							          <td height="26" class="FacetDataTD">MIELOCITOS</td>
							          <td align="center"><input name="nuevocampo_2" type="text" class="FacetInput" id="nuevocampo_2" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_7');"></td>
							          <td align="center" class="FacetDataTD">%</td>
							          <td align="center" class="FacetDataTD">0</td>
							          <td align="center" class="FacetDataTD">&nbsp;</td>
							      </tr>
							      <tr class="FacetFilaTD" id="tr_anom3" style="display: none;">
							          <td height="26" class="FacetDataTD">PROMIELOCITOS</td>
							          <td align="center"><input name="nuevocampo_3" type="text" class="FacetInput" id="nuevocampo_3" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_8');"></td>
							          <td align="center" class="FacetDataTD">%</td>
							          <td align="center" class="FacetDataTD">0</td>
							          <td align="center" class="FacetDataTD">&nbsp;</td>
							      </tr>
							   	 <tr class="FacetFilaTD" id="tr_anom4" style="display: none;">
							          <td height="26" class="FacetDataTD">BLASTOS</td>
							          <td align="center"><input name="nuevocampo_4" type="text" class="FacetInput" id="nuevocampo_4" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_9');"></td>
							          <td align="center" class="FacetDataTD">%</td>
							          <td align="center" class="FacetDataTD">0</td>
							          <td align="center" class="FacetDataTD">&nbsp;</td>
							      </tr>
							      <tr class="FacetFilaTD" id="tr_anom5" style="display: none;">
							            <td height="26" class="FacetDataTD">LINFOCITOS FORMA VARIANTE</td>
							            <td align="center"><input name="nuevocampo_5" type="text" class="FacetInput" id="nuevocampo_5" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_10');"></td>
							            <td align="center" class="FacetDataTD">%</td>
							            <td align="center" class="FacetDataTD">0</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>
							                                                          
							        <tr class="FacetFilaTD">
							            <td height="26" align="center" class="FacetDataTD"><strong>FORMULA DIFERENCIAL</strong></td>
							            <td height="26" align="center"><strong>(Total: <label id="suma_formula" style="color: rgb(0, 0, 0);">100</label> %)</strong></td>
							            <td height="26" class="FacetDataTD">&nbsp;</td>
							            <td height="26" colspan="2" class="FacetDataTD">&nbsp;</td>
							        </tr>
							                                                                    
							         <tr class="FacetFilaTD">
							            <td height="26" colspan="5" class="FacetDataTD"><strong>FORMULA DIFERENCIAL ABSOLUTA</strong></td>
							        </tr>
									<tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">LINFOCITOS</td>
							            <td align="center"><input name="linfocitos" type="text" class="FacetInput valorbajo" id="linfocitos" value="1,519.60" size="10" onkeyup="ValidaRangos(this, '1000', '4800');format(this);"></td>
							            <td align="center" class="FacetDataTD">/mm^3</td>
							            <td align="center" class="FacetDataTD">1,000	- 4,800</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>
							                        
									<tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">MONOCITOS</td>
							            <td align="center"><input name="monocitos" type="text" class="FacetInput" id="monocitos" value="314.40" size="10" onkeyup="ValidaRangos(this, '0', '800');"></td>
							            <td align="center" class="FacetDataTD">/mm^3</td>
							            <td align="center" class="FacetDataTD">0	- 800</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>                        
							<tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">EOSINOFILOS</td>
							            <td align="center"><input name="eosinofilos" type="text" class="FacetInput" id="eosinofilos" value="52.40" size="10" onkeyup="ValidaRangos(this, '0', '500');"></td>
							            <td align="center" class="FacetDataTD">/mm^3</td>
							            <td align="center" class="FacetDataTD">0	- 500</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>                 <tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">BASOFILOS</td>
							            <td align="center"><input name="basofilos" type="text" class="FacetInput" id="basofilos" value="0.00" size="10" onkeyup="ValidaRangos(this, '0', '200');"></td>
							            <td align="center" class="FacetDataTD">/mm^3</td>
							            <td align="center" class="FacetDataTD">0	- 200</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>        
									<tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">SEGMENTADOS</td>
							            <td align="center"><input name="segmentados" type="text" class="FacetInput valorbajo" id="segmentados" value="3,353.60" size="10" onkeyup="ValidaRangos(this, '1600', '7000');format(this);"></td>
							            <td align="center" class="FacetDataTD">/mm^3</td>
							            <td align="center" class="FacetDataTD">1,600	- 7,000</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>                                               
									<tr class="FacetFilaTD">
							            <td height="26" class="FacetDataTD">ABASTONADOS</td>
							            <td align="center"><input name="abastonados" type="text" class="FacetInput" id="abastonados" value="0.00" size="10" onkeyup="ValidaRangos(this, '0', '500');"></td>
							            <td align="center" class="FacetDataTD">/mm^3</td>
							            <td align="center" class="FacetDataTD">0	- 500</td>
							            <td align="center" class="FacetDataTD">&nbsp;</td>
							        </tr>
							                                                                    
							                                                                    
							         <tr class="FacetFilaTD">
							              <td height="26" align="center" class="FacetDataTD"><strong>ANORMAL</strong></td>
							              <td align="center"><input type="checkbox" name="anormal_lab2" id="anormal_lab2" value="on" onclick="mostrarcampos2();"></td>
							              <td align="center" class="FacetDataTD">&nbsp;</td>
							              <td align="center" class="FacetDataTD">&nbsp;</td>
							              <td align="center" class="FacetDataTD">&nbsp;</td>
									</tr>
							         
							         
							         <tr class="FacetFilaTD" id="tr_anom6" style="display: none;">
							              <td height="26" class="FacetDataTD">METAMIELOCITOS</td>
							              <td align="center"><input name="nuevocampo_6" type="text" class="FacetInput" id="nuevocampo_6" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');"></td>
							              <td align="center" class="FacetDataTD">/mm^3</td>
							              <td align="center" class="FacetDataTD">0</td>
							              <td align="center" class="FacetDataTD">&nbsp;</td>
							          </tr>
							          <tr class="FacetFilaTD" id="tr_anom7" style="display: none;">
							              <td height="26" class="FacetDataTD">MIELOCITOS</td>
							              <td align="center"><input name="nuevocampo_7" type="text" class="FacetInput" id="nuevocampo_7" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');"></td>
							              <td align="center" class="FacetDataTD">/mm^3</td>
							              <td align="center" class="FacetDataTD">0</td>
							              <td align="center" class="FacetDataTD">&nbsp;</td>
							          </tr>
							          <tr class="FacetFilaTD" id="tr_anom8" style="display: none;">
							              <td height="26" class="FacetDataTD">PROMIELOCITOS</td>
							              <td align="center"><input name="nuevocampo_8" type="text" class="FacetInput" id="nuevocampo_8" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');"></td>
							              <td align="center" class="FacetDataTD">/mm^3</td>
							              <td align="center" class="FacetDataTD">0</td>
							              <td align="center" class="FacetDataTD">&nbsp;</td>
							          </tr>
							          <tr class="FacetFilaTD" id="tr_anom9" style="display: none;">
							              <td height="26" class="FacetDataTD">BLASTOS</td>
							              <td align="center"><input name="nuevocampo_9" type="text" class="FacetInput" id="nuevocampo_9" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');"></td>
							              <td align="center" class="FacetDataTD">/mm^3</td>
							              <td align="center" class="FacetDataTD">0</td>
							              <td align="center" class="FacetDataTD">&nbsp;</td>
							          </tr>
							          <tr class="FacetFilaTD" id="tr_anom10" style="display: none;">
							                <td height="26" class="FacetDataTD">LINFOCITOS FORMA VARIANTE</td>
							                <td align="center"><input name="nuevocampo_10" type="text" class="FacetInput" id="nuevocampo_10" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');"></td>
							                <td align="center" class="FacetDataTD">/mm^3</td>
							                <td align="center" class="FacetDataTD">0</td>
							                <td align="center" class="FacetDataTD">&nbsp;</td>
							          </tr>                   
							                    
							                       
							                                                                    
							                                                                    
							                                                                    
							                                                                    
							                                                                    
							                                                                    
								<tr class="FacetFilaTD">
							            <td height="26" colspan="5">
							                <table width="100%" class="FacetFormTABLE" align="left">
							                    <tbody><tr class="FacetFilaTD">
							                        <td align="left" class="FacetColumnTD">OBSERVACIONES</td>
							                    </tr>
							                    <tr class="FacetFilaTD">
							                        <td><textarea name="comentarios" cols="130" rows="4" class="FacetTextarea" id="comentarios"></textarea></td>
							                    </tr>
							                </tbody></table>
							                </td>
							        </tr>
										</tbody></table></td>
							        </tr>
							    </tbody></table>
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