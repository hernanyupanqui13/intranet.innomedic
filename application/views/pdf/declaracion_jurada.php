
<?php $lista_usuario = $this->db->query("select *,
(select departamento from ts_departamento where Id=a.id_departamento) as departamento, 
(select provincia from ts_provincia where Id=a.id_provincia) as provincia, 
(select distrito from ts_distrito where Id=a.id_distrito) as distrito, 
TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad, (select genero from ts_genero where Id=id_genero) as txtgenero, 
(select civil from ts_estado_civil where Id=id_estado) as txt_civil, 
(select departamento from ts_departamento where Id=id_lugar_nacimiento_dep) as lugar_nacimiento, 
(select cantidad_hijos from ts_datos_familiares where id_datos_personales=a.Id) as cantidad_hijos, 
(select hijos_estudian from ts_datos_familiares where id_datos_personales=a.Id) as hijos_estudian, 
(select hijos_menores_18 from ts_datos_familiares where id_datos_personales=a.Id) as hijos_menores_18, 
(select hijos_menores_3 from ts_datos_familiares where id_datos_personales=a.Id) as hijos_menores_3, 
(select id_tipo_emfermedad from ts_datos_salud where id_datos_personales=a.Id) as salud, 
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
            $firma_xx = $emp->firma;
            $huella_xx = $emp->huella;
} ?>

<?php //Se define el timezone que sea necesario
      function fechaES($fecha){
            $mes = array(
                'January' => 'Enero',
                'February' => 'Febrero',
                'March' => 'Marzo',
                'April' => 'Abril',
                'May' => 'Mayo',
                'June' => 'Junio',
                'July' => 'Julio',
                'August' => 'Agosto',
                'September' => 'Septiembre',
                'October' => 'Octubre',
                'November' => 'Noviembre',
                'December' => 'Diciembre'
            );

            return strtr($fecha, $mes);
        }

        

        ini_set('date.timezone', 'America/LIma'); 

        //Dia-Mes-Año Hora:Minutos:Segundos
        $fecha = date('d-m-Y H:i:s'); 
      ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets_sistema/';?>images/favicon.png">
    <title><?php echo $nombrex; ?> - Declaración-Jurada</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/style.min.css" rel="stylesheet">
     <link href="<?php echo base_url().'pdf/';?>normalize.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
  .cetury-golf { 
  font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif; 
  }

</style>

</head>


<body class="skin-blue fixed-layout bg-white cetury-golf">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"><?php echo $nombrex; ?></p>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
                <div class="row border border-dark rounded-pill ">
                  <div class="col-md-4">
                    <img src="<?php echo base_url().'assets/';?>images/logo.png" alt="">
                  </div>
                  <div class="col-md-4 mt-2">
                    <h4 class="text-center font-weight-bold">DECLARACIÓN JURADA DE ESTUDIO</h4>
                  </div>
                  <div class="col-md-4 mt-2 text-center">
                    <span>Codigo: FT-RRHH-00<?php echo $idx; ?> <?php echo fechaES(strftime('%Y')); ?></span>
                  </div>
                </div>
                <br>
                <br>
                    <br>
                <div class="row">
                  <div class="col-md-12 ">
                    <h3 class="text-center font-weight-bold">DECLARACIÓN JURADA</h3>
                    <br>

                    <p class="text-justify">Yo <b><?php echo $nombrex ?></b>, identificado con documento de identidad N°: <b><?php echo $dnix; ?></b>, por medio del presente documento declaro bajo juramento y sin ningún tipo de omisión, no falsear los datos de mi grado de estudio, los cuales son:</p>
                  </div>
                  <div class="col-md-12 ">
                      <div class="table-responsive">
                        <table width="100%"  border="1">
                          <thead >
                            <tr class="text-center ">
                              <td class="p-2">Institucion Educativa</td>
                              <td class="p-2">Grado de Instrucción alcanzado</td>
                              <td class="p-2">Ultimo año lectivo <small>(ultimo año que estudio)</small></td>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $query = $this->db->query("select *,YEAR(hasta) as ano,(select especialidad from ts_datos_especialidad where Id=e.especialidad) as especialidadtxt,
                        (select nombre from ts_datos_uni_tec where Id=e.centro_estudios) as centro_estudiostxt,
                        (select nombre from ts_grado_academico where Id=e.grado_academica) as grado_academicatxt
                       from ts_datos_educacion_superior e where  url='".$this->uri->segment(4,0)."' limit 4");
                            foreach ($query->result() as $xx) {?>
                              <tr class="text-center">
                                <td class="p-2"><?php echo $xx->centro_estudiostxt;?></td>
                                <td class="p-2"><?php echo $xx->grado_academicatxt; ?></td>
                                <td class="p-2"><?php echo $xx->ano; ?></td>
                              </tr>
                             <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <br>
                      <br>
                       <p class="text-justify">Los datos brindados son los que constan en los documentos ya presentados a La Empresa.</p>
                       <br>
                       <div class="text-left">
                         <p class="">Lima <?php echo fechaES(strftime('%d de %B de %Y')); ?></p>
                      </div>

                  </div>
                </div>
                <br>
               
                <div class="row">
                  <div class="table-responsive">
                      <table border="0" width="100%">
                          <thead >
                              <tr class="text-center p-5 m-5">
                                  <th> <div class="col-md-6 text-center m-5 p-5">
                          <p ><span><img class="img-fluid " style="width: 313px; height: 135px;" src="<?php echo base_url().'upload/';?>archivos/<?php echo $firma_xx; ?>" alt=""></span><br><span style="text-decoration: overline;">FIRMA DEL TRABAJADOR</span><br><span>DNI: <?php echo $dnix; ?></span></p>
                      </div></th>
                                  <th><div class="col-md-6 text-center ">
                          <p ><span><img class="img-fluid " style="width: 250px; height: 180px;" src="<?php echo base_url().'upload/';?>archivos/<?php echo $huella_xx;?>" alt=""></span><br><span>HUELLA DIGITAL</span></p>
                      </div></th>

                              </tr>
                          </thead>
                      </table>
                  </div>
                </div>
                <div class="row">
                  <div class="text-left">
                         <p class="">Lima <?php echo fechaES(strftime('%d de %B de %Y')); ?></p>
                      </div>
                </div>
            </div>
            
          </div>
        </div>
      </div>
    

            <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/custom.min.js"></script>
</body>

</html>



