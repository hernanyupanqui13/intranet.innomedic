<?php $query_users = $this->db->query("select *,
(select imagen from ts_datos_personales where id_usuario=a.Id) as imagen,
(select 
CASE
    WHEN id_genero = 1 THEN 'varon.png'
    WHEN id_genero = 2 THEN 'mujer.png'
    WHEN id_genero = 3 THEN 'medio.png'
    ELSE 'distinto.png'
END
 from ts_datos_personales where id_usuario=a.Id) as id_otros,
(select id_genero from ts_datos_personales where id_usuario=a.Id) as id_genero,
(select url from ts_datos_personales where id_usuario=a.Id) as url,
(select email from ts_datos_personales where id_usuario=a.Id) as email
from ts_usuario a where Id=".$this->session->userdata("session_id")."");
foreach ($query_users->result() as $xx) {
     $nombrex = $xx->nombre." ".$xx->apellido_paterno ." ". $xx->apellido_materno;
     $nombrexx = $xx->nombre ." ".$xx->apellido_paterno;
     $nombresxxx = $xx->nombre;
     $picturex = $xx->imagen;
     $urlx = $xx->url;
     $id_generox = $xx->id_genero;
     $id_otros = $xx->id_otros; 
     $emailx = $xx->email;
     $idx = $xx->Id;
 } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Evaristo Escudero Huillcamascco">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets_sistema/';?>images/favicon.png">
    <?php $bar = $nombresxxx;
        $bar = ucfirst($bar);             // HELLO WORLD!
        $bar = ucfirst(strtolower($bar)); // Hello world! 
    ?>
    <title><?php echo ucfirst(strtolower($bar)); ?>&nbsp;<?php echo $title[0]?></title>


    
    <!---->
     <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css" rel="stylesheet">

    <!-- Daterange picker plugins css -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- page css -->

 <link href="<?php echo base_url().'assets_sistema/';?>node_modules/morrisjs/morris.css" rel="stylesheet">
    <!-- Dropzone css -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->



      <!-- page CSS -->
      <!-- page css -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/inbox.css" rel="stylesheet">

    <!-- toast CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
   

    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/other-pages.css" rel="stylesheet">

    

   

    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/stylish-tooltip.css" rel="stylesheet">
    <!-- page CSS -->

    <!-- page css -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/floating-label.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/dashboard1.css?v=<?php echo rand();?>" rel="stylesheet">
    
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />

    <!--view_js-->
     <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets_sistema/';?>node_modules/html5-editor/bootstrap-wysihtml5.css" />

    <!--chat-->
      <!-- Page CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/chat-app-page.css" rel="stylesheet">

      
 <link href="<?php echo base_url().'assets_sistema/';?>dist/css/style.min.css" rel="stylesheet">



   <!--para tablas intranet view-->
    <?php if (base_url().'View_intranet/View/') {?>
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
   <?php  }else{
    echo "ok";
   } ?>




   <!-- Footable CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/footable/css/footable.bootstrap.min.css" rel="stylesheet">
    <!-- Page CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/contact-app-page.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/footable-page.css" rel="stylesheet">



    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets_sistema/';?>node_modules/dropify/dist/css/dropify.min.css">

    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/pricing-page.css" rel="stylesheet">

     <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/tab-page.css" rel="stylesheet">
     <!-- Bootstrap responsive table CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/tablesaw/dist/tablesaw.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url().'assets_sistema/';?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url().'assets_sistema/';?>node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">

 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


<![endif]-->
    <style>

        ::-webkit-scrollbar{
            width: 5px;
            background-color: #EFE9E9 ;
            border-radius: 20px;
        }
        ::-webkit-scrollbar-track{
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #EFE9E9  ;
        }
        ::-webkit-scrollbar-thumb{
            border-radius: 20px;
            background-color: #BDBDBD; 
           /* background-image: -webkit-linear-gradient(25deg,rgba(255, 255, 255, .2) 25%,transparent 25%,transparent 25%,rgba(255, 255, 255, .2) 25%,rgba(255, 255, 255, .2) 25%,transparent 25%,transparent)*/
        }
    </style>

 
  
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"><?php echo $nombrex; ?></p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url().'Intranet_view/';?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url().'assets_sistema/';?>images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url().'assets_sistema/';?>images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <span class="hidden-xs"><span class="font-bold">nomedic</span></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Buscar y Enter">
                            </form>
                        </li>-->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify" id="aplicamos">  </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notificaciones</div>
                                    </li>
                                    <li>
                                        <div class="message-center" >
                                            <span id="listar_notificacion_por_usuario"></span>
                                            <!--aqui va las notificaiones de boletas y otras cosas mas vfdgr-->
                                            <!--<img src="<?php echo base_url().'upload/';?>images/emoji.png" alt="">-->
                                           
                                             
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Verifica todas las notificaciones</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                             Message --
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="<?php echo base_url().'assets_sistema/';?>images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                             Message --
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="<?php echo base_url().'assets_sistema/';?>images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            Message --
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="<?php echo base_url().'assets_sistema/';?>images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                             Message --
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="<?php echo base_url().'assets_sistema/';?>images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>-
                        </li>-->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-layout-width-default"></i></a>
                           <div class="dropdown-menu animated bounceInDown">
                                <ul class="mega-dropdown-menu row">
                                   <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                         CAROUSEL --
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="<?php echo base_url().'assets_sistema/';?>images/big/img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="<?php echo base_url().'assets_sistema/';?>images/big/img2.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="<?php echo base_url().'assets_sistema/';?>images/big/img3.jpg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                    </li>-->
                                   <!-- <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                         Accordian --
                                        <div class="accordion" id="accordionExample">
                                            <div class="card m-b-0">
                                                <div class="card-header bg-white p-0" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Collapsible Group Item #1
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card m-b-0">
                                                <div class="card-header bg-white p-0" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                            Collapsible Group Item #2
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card m-b-0">
                                                <div class="card-header bg-white p-0" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree">
                                                            Collapsible Group Item #3
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>-
                                    <li class="col-lg-4  m-b-30">
                                        <h4 class="m-b-20">Ponte en Contacto con RRHH</h4>
                                         Contact --
                                        <form class="form-material" id="register_form_contatuc" action="">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="exampleInputname1" placeholder="Ingreses sus nombres" value="<?php echo $nombrex;?>" readonly="" name="exampleInputname1">
                                                <input type="hidden" name="id_usuario" value="<?php echo $idx; ?>"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Ingrese Email" value="<?php echo $emailx;?>" readonly="" name="email_users"> </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="asunto___________________" placeholder="Ingrese Asunto"  name="asuntoxx"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Su mensaje" name="exampleTextarea"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-outline-info btn-rounded"><i class=" ti-arrow-circle-right"></i>&nbsp;Enviar Solicitud</button>
                                        </form>

                                    </li>
                                    <li class="col-lg-8 col-xl-8 m-b-30">                                        List style --
                                       <div class="table-responsive">
                                           <table id="demo-foo-accordion2" class="table table-bordered m-b-0 toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true" data-paging-size="3">
                                               <thead>
                                                    <tr class="footable-filtering">
                                                        <th>#</th>
                                                        <th data-toggle="true">View</th>
                                                        <th data-toggle="true">Users</th>
                                                        <th data-toggle="true">Message</th>
                                                        <th data-toggle="true">Date</th>
                                                     
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                     $query = $this->db->query("select * from ts_email_enviado_users where id_usuario='".$this->session->userdata("session_id")."'");
                                                      $cont=0; foreach ($query->result() as $xx) { $cont+=1;?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $cont; ?>
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            <?php echo $xx->nombre_usuario;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $xx->mensaje; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $xx->fecha_enviado; ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                           </table>
                                       </div>
                                    </li>
                                </ul>
                            </div>
                        </li>-->
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                           <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url().'upload/';?>images/<?php if($picturex=="" or $picturex==NULL){ echo "$id_otros";}else{echo "$picturex";} ?>" alt="<?php echo $nombresxxx; ?>" class=""> <span class="hidden-md-down"><?php echo $nombrex; ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>

                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="<?php echo base_url().'Mantenimiento/Perfil/Mostrar_perfil_empleado/'.$urlx;?>/" class="dropdown-item"><i class="ti-user"></i> Mi Perfil</a>
                                <!-- text-->
                                <!--<a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                                <!-- text--
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?php echo base_url().'Mantenimiento/Configuracion/view_users/'.$urlx;?>/" class="dropdown-item"><i class="ti-settings"></i> Configuración de cuenta</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="javascript:void(0);" onclick="return salir_users();" class="dropdown-item"><i class="fa fa-power-off"></i> Salir</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img  src="<?php echo base_url().'upload/';?>images/<?php if($picturex=="" or $picturex==NULL){ echo "$id_otros";}else{echo "$picturex";} ?>" alt="<?php echo $nombresxxx; ?>" class="img-circle"><span class="hide-menu"><?php echo $nombrexx;?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url().'Mantenimiento/Perfil/Mostrar_perfil_empleado/'.$urlx;?>/"><i class="ti-user"></i> Mi Perfil</a></li>
                                <!--<li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>-->
                                <li><a href="<?php echo base_url().'Mantenimiento/Configuracion/view_users/'.$urlx;?>/"><i class="ti-settings"></i> Configuración de cuenta</a></li>
                                <li><a href="javascript:void(0);" onclick="return salir_users(event);"><i class="fa fa-power-off"></i> Salir</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">--- PERSONAL</li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url().'Intranet_view/';?>"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <?php if ($this->session->userdata("session_perfil")==36 ) {?>
                        <?php }else{?>
                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Ficha Personal</span></a>
                                <ul aria-expanded="false" class="collapse">
                                     <li><a href="<?php echo base_url().'View_intranet/Ficha_personal/';?>"><i class="far fa-address-book"></i>&nbsp;Datos Personales</a></li>

                                   <!-- <?php $query_menu = $this->db->query("select *,
                                    (select icono from ts_menu where Id=a.menu) as iconox,
                                    (select perfil from ts_perfil_users where Id=a.perfil) as perfilx,
                                    (select nombre from ts_menu where Id=a.menu) as menux,
                                    (select url from ts_menu where Id=a.menu) as urlx
                                    from ts_menu_items a where perfil=".$this->session->userdata("session_perfil")."");
                                     foreach ($query_menu->result() as $xsd) {?>
                                         <li><a href="<?php echo base_url().$xsd->urlx;?>"><i class="<?php echo $xsd->iconox;?>"></i>&nbsp;<?php echo $xsd->menux; ?></a></li>
                                    <?php } ?>-->
                                </ul>
                            </li>
                        <?php } ?>
                        

                       <?php if ($this->session->userdata("session_perfil")==7) {?>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Atenciones</span></a>
                            <ul  aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url().'Atencion/Historial/';?>">Historial</a></li>
                            </ul>
                        </li>
                       <?php } ?>

                       <?php if ($this->session->userdata("session_perfil")==36 ) {?>
                          
                       <?php }else{?>
                            <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">RRHH</span></a>
                                <ul  aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url().'Boleta/Boleta/';?>">Mis Boletas</a></li>
                                </ul>
                            </li>
                       <?php } ?>


                       <?php if ($this->session->userdata("session_perfil")==36 ) {?>
                          
                       <?php }else{?>
                             <!--pedidos realizar-->
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Logistica</span></a>
                            <ul  aria-expanded="false" class="collapse">
                                <?php $query = $this->db->query("select *,
                                    (select url from ts_menu_pedido where Id=menu) as urlx,
                                    (select nombre from ts_menu_pedido where Id=menu) as menux 
                                    from ts_menu_items_pedido where perfil = '".$this->session->userdata("session_perfil")."' ");
                                foreach ($query->result() as $xx) {?>
                                    <li><a href="<?php echo base_url().$xx->urlx;?>"><?php echo $xx->menux;?></a></li>

                                 <?php } ?>
                            </ul>
                        </li>
                       <?php } ?>
                        
                       

                        


                        <?php if ($this->session->userdata("session_perfil")==29 || $this->session->userdata("session_perfil")==5 || $this->session->userdata("session_perfil")==19 || $this->session->userdata("session_perfil")==1) {?>
                            <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Inventario</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url().'Inventario/View_Inventario/';?>">Inventario</a></li>
                                    <li><a href="<?php echo base_url().'Inventario/Almacen/';?>">Almacen</a></li>
                                </ul>
                            </li>
                       <?php  }else{
                            echo "";
                        } ?>

                        <?php if ($this->session->userdata("session_perfil")==36 || $this->session->userdata("session_perfil")==1) {?>
                            <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">RR-HH</span></a>
                                <ul  aria-expanded="false" class="collapse">
                                    <?php $query = $this->db->query("select *,
                                        (select url from ts_menu_rrhh where Id=menu) as urlx,
                                        (select nombre from ts_menu_rrhh where Id=menu) as menux,
                                        (select icono from ts_menu_rrhh where Id=menu) as icono 
                                        from ts_menu_items_rrhh where perfil = '".$this->session->userdata("session_perfil")."' "); 
                                    foreach ($query->result() as $xx) {?>
                                       <!-- <?php if ($xx->menu == 2) {
                                            $mostrar = date('m').'?='.rand();
                                        }else{
                                            $mostrar = "";
                                        } ?>-->
                                        <li><a href="<?php echo base_url().$xx->urlx?>"><i class="<?php echo $xx->icono;?>"></i>&nbsp;<?php echo $xx->menux;?></a></li>

                                     <?php } ?>
                                </ul>
                            </li>
                            
                        <?php }else{?>



                        <?php } ?>

                     

                        <!--<li class="nav-small-cap">--- SUPPORT</li>
                        <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Documentation</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-success"></i><span class="hide-menu">Log Out</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">FAQs</span></a></li>-->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

         <script>
            function salir_users(event) {
                Swal.fire({
                  title: '¿Estas seguro?',
                  text: "Estas apunto de cerrar session",
                  icon: 'warning',
                  showCancelButton: true,
                  allowOutsideClick: false,

                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, salir ahora!',
                  cancelButtonText: 'No, Cancelar!'
                }).then((result) => {
                  if (result.value) {

                    let timerInterval
                        Swal.fire({
                          title: 'Auto close alert!',
                          html: 'Se cerrará en <b> </b> segundos. te estaremos esperando',
                          timer: 2000,
                          timerProgressBar: true,
                          onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                              const content = Swal.getContent()
                              if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                  b.textContent = Swal.getTimerLeft()
                                }
                              }
                            }, 100)
                          },
                          onClose: () => {
                            clearInterval(timerInterval)
                          }
                        }).then((result) => {
                          /* Read more about handling dismissals below */
                          if (result.dismiss === Swal.DismissReason.timer) {
                             window.location="<?php echo base_url().'Intranet/salir/';?>";
                          }
                        })
                  }
                })
            }
        </script>

        <style>
            .evaristo_{
                width: 100%;
                height: auto;
            }
        </style>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->