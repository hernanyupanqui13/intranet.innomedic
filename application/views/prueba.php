
<?php $lista_usuario = $this->db->query("select *,(select departamento from ts_departamento where Id=id_departamento) as departamento,
		(select provincia from ts_provincia where Id=id_departamento) as provincia,
		(select distrito from ts_distrito where Id=id_departamento) as distrito,
		TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
		(select genero from ts_genero where Id=id_genero) as txtgenero,
		(select civil from ts_estado_civil where Id=id_estado) as txt_civil,
		(select departamento from ts_departamento where Id=id_lugar_nacimiento_dep) as lugar_nacimiento,
		(select cantidad_hijos from ts_datos_familiares where id_datos_personales=Id) as cantidad_hijos,
		(select hijos_estudian from ts_datos_familiares where id_datos_personales=Id) as hijos_estudian,
		(select hijos_menores_18 from ts_datos_familiares where id_datos_personales=Id) as hijos_menores_18,
		(select hijos_menores_3 from ts_datos_familiares where id_datos_personales=Id) as hijos_menores_3,
		(select id_tipo_emfermedad from ts_datos_salud where Id=id_datos_personales) as salud,
		(select regimen from ts_datos_regimen_pensionario where id_datos_personales=a.Id) as pension
		  from ts_datos_personales a where url='".$this->uri->segment(4,0)."'");

	 foreach ($lista_usuario->result() as $emp) {
			$nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
            $nombresxx = $emp->nombres;
            $apellido_maternox = $emp->apellido_materno;
            $apellido_paternox = $emp->apellido_paterno;
            $dnix = $emp->nro_documento;
            $direccionx = $emp->direccion;
            $departamento = $emp->departamento;
            $provincia = $emp->provincia;
            $distrito = $emp->distrito;
            $numerox = $emp->numero;
            $interiorx = $emp->interior;
            $mzlotex = $emp->mzlote;
            $referenciax = $emp->referencia;
            $urbanizacionx = $emp->urbanizacion;
            $idx = $emp->Id;
            $imagenx = $emp->imagen;
            $fecha_nacimiento = $emp->fecha_nacimiento;
            $edad = $emp->edad;
            $txtgenero = $emp->txtgenero;
            $txt_civil = $emp->txt_civil;
            $lugar_nacimiento = $emp->lugar_nacimiento;
            $telefono_domicilio = $emp->telefono_domicilio;
            $telefono_movil = $emp->telefono_movil;
            $email = $emp->email;
            $talla = $emp->talla;
            $talla_pantalon = $emp->talla_pantalon;
            $comunicarse_con = $emp->comunicarse_con;
            $nro_emergencia = $emp->nro_emergencia;
            $cantidad_hijos =$emp->cantidad_hijos;
			$hijos_estudian=$emp->hijos_estudian;
			$hijos_menores_18=$emp->hijos_menores_18;
			$hijos_menores_3=$emp->hijos_menores_3;
			$pensionx = $emp->pension;
			$puesto = $emp->puesto;
			$area =  $emp->area;
			$fecha_ingreso = $emp->fecha_ingreso;
} ?>



  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
     
      <link href="<?php echo base_url().'pdf/';?>bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url().'pdf/';?>normalize.css" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
      	@page { margin: 180px 50px; }
		    #header { position: fixed; left: 0px; top: -150px; right: 0px;  text-align: center; }
		   #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; text-align: center;  }
		   /* #footer .page:after { counter-increment: section; content: " " counter(section) ": ";}*/
		    #footer .page:after { content: counter(page, decimal ); }
		    #footerx .pagex:after { content: counter(page, decimal ); }
      </style>
    </head>

    <body>
    	<div id="header">
    		<h1>Head</h1>
    	</div>
    	<div id="footer">
    			<h1 class="centered">footer</h1>
    	</div>

    	<div id="content">
    		<div class="container">
    			<h5 class="text-center"> DECLARACIÓN  JURADA</h5>
      <p class="text-justify"> Yo &nbsp;&nbsp;<?php echo $nombrex; ?>&nbsp;&nbsp;, identificado con documento de identidad Nº <?php echo $dnix; ?>, por medio del presente documento declaro bajo juramento y sin ningun tipo de omisión, no falsear los datos de mi grado de estudios, los cuales son:</p>

      



      <p>Los datos brindados son los que constan en los documentos ya presentados a la empresa.</p>


    


    	</div>
    	

    	

    	
    	</div>
      <div class="row">
        <table style="border-collapse:collapse; border: none; padding: 0;margin: 0; max-width: 100%; width: 100%;"  cellpadding="0" cellspacing="0" border="1">
        <tbody>
          <tr>
            <td>Institucion Educativa</td>
            <td>Institulo tecnologico cibertec S.A.C</td>
            <td>Grado de Instrucción alcanzado</td>
            <td>Tecnico superior</td>
          </tr>
        </tbody>
      </table>
      </div>
    	<div id="footer">
    		<h1>footer</h1>
    	</div>

    	

      <!--JavaScript at end of body for optimized loading-->
      <script src="<?php echo base_url().'pdf/';?>jquery-3.4.1.slim.min.js"></script>
      <script src="<?php echo base_url().'pdf/';?>popper.min.js"></script>
      <script src="<?php echo base_url().'pdf/';?>bootstrap.min.js"></script>
    </body>
  </html>
