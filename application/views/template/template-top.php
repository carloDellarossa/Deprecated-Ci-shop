<!DOCTYPE html>
<html lang="en">
  <head>

<META http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-touch-fullscreen" content="yes"/>
    <meta name="MobileOptimized" content="320">
    <meta name="description" content="Importadora Durban."/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta name="author" content="Durban" />
    <meta name="copyright" content="2016" />
    <meta name="application-name" content="Importadora Durban"/>


    <!-- includes -->
    <link href="<?php echo site_url('css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('css/animate.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('css/principal.css?ts=<?=time()?>&quot;');?>" rel="stylesheet">
    <link href="<?php echo site_url('css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('css/slick.css'); ?>" rel="stylesheet" type="text/css" />
   <!--  // Add the new slick-theme.css if you want the default styling -->
    <link href="<?php echo site_url('css/slick-theme.css'); ?>" rel="stylesheet" type="text/css"/>

      <!-- Iconos de inicio -->
    <link rel="icon" href="<?php echo site_url('img/dur.png');?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo site_url('img/dur.png');?>" type="image/x-icon" />
    <link rel="canonical" href=""/>
    <script>var base_url = '<?php echo site_url(); ?>';</script>

    <title>Importadora Durban</title>

  </head>

  <body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

  <!-- Header -->
  <header>
    <div class="container-fluid">
      <div class="top row">
        <!-- menu top telefonos  -->
        <div class="info col col-12">
          <div class="row">
            <div class="adm col col-4">
            <h1>Administración: <span class="glyphicon glyphicon-earphone"> </span> 412 628 400 / <span class="glyphicon glyphicon-envelope"> </span> durban@durban.cl </h1>
            </div>
            <div class="ventas col-8">
              <h1>Ventas:
              <span class="glyphicon glyphicon-earphone"> </span> +56 412 628 402 / <span class="glyphicon glyphicon-envelope"> </span> ventas2@durban.cl |
              <span class="glyphicon glyphicon-earphone"> </span> +56 412 628 403 / <span class="glyphicon glyphicon-envelope"> </span> ventas3@durban.cl |
              <span class="glyphicon glyphicon-earphone"> </span> +56 412 628 404 / <span class="glyphicon glyphicon-envelope"> </span> ventas4@durban.cl </h1>
            </div>
          </div>
        </div>

        <!-- imagen logo -->
        <div class="logo col-md-4 offset-md-1">
          <a href="<?php echo site_url();?>"> <img class="img-fluid" src="<?php echo site_url('img/logoDurban.png');?>" />  </a>
        </div>

        <!-- menu secion somos -->
        <div class="navs col-md-7 ">
          <div class="  row justify-content-md-center">
            <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
              <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#containerNavbarCenter" aria-controls="containerNavbarCenter" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button> -->

              <div class="top2 text-center" id="containerNavbarCenter">
                <ul class="navbar-nav" style="padding-top : 2%;">
                  <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('');?>">Inicio</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('index.php/Somos');?>">Quienes Somos</a>
                  </li>
                </ul>
              </div>
            </nav> <!--fin menu seccion y contato -->

            <!-- buscar -->
            <div class="buscar col col-12 text-center " style="padding-top: 1.5%;">
              <nav class="navbar navbar-light bg-faded ">
                  <form class="form-inline justify-content-md-center" action="<?php echo site_url('index.php/Busqueda/buscar');?>" method="post">
                    <input class="buscar form-control mr-sm-4" type="text" placeholder="Descripción o código producto" name="aBuscar">
                    <button class="btn btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
                  </form>
              </nav>
            </div>

          </div>
        </div>

        <div class="categorias col col-9">

        <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md" id="cat">
            <button class="navbar-toggler hidden-lg-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar2" aria-controls="collapsingNavbar2" aria-expanded="true"> ☰ </button>
            <div class="divCat collapse navbar-toggleable-md show" id="collapsingNavbar2">
          <ul class="nav navbar-nav navbar-left">
			        <!--Menu Categorias -->
              <?php
              $keys = array_keys($categorias);
              for($i = 0; $i < count($categorias); $i++) {
                 ?>
                <li class="dropdown listaCat">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $keys[$i] ;?><span class="caret"></span></a>
                <ul class="dropdown-menu multi-level">
                  <?php
                  foreach($categorias[$keys[$i]] as $key => $value) {
                    ?>
                    <li class="dropdown-item dropdown-submenu">

                      <?php echo anchor('index.php/Categoria/verPorCat?cat='.urlencode($key).'&per_page=1',''.$key.''); ?>
                        <ul class="dropdown-menu scrollable-menu">
                        <?php
                        foreach ($value as $s => $p){ ?>

                            <li><a href="<?php echo site_url('index.php/Categoria/verPorCat?cat='.urlencode($key).'&subcat='.urlencode($p).'&per_page=1') ?>"><?php echo $p;?></a></li>

                        <?php
                        }
                        ?>
                        </ul>

                    </li>
                          <!-- <a href="#"><h5><?php echo $key; ?></h5></a> -->

                  <?php }
                  ?>
              </ul>
            </li>
              <?php }
              ?>
          </ul><!-- termina menu categorias -->
        </div>
                </nav>
      		    </div> <!-- termina menu-->
              <div id="contenidoCarro" class=" carro col col-3" >
                <!-- Carro -->
                <?php $this->load->view('listas/listaCarro'); ?>  
              </div>
        </div><!-- termina row -->
    </div> <!-- termina contenedor-->
  </header>

  <div class="banner text-center">
    <h6 style="color : red"> SITIO ACTUALMENTE EN PROCESO DE MEJORA </h6>
    <img src="<?php echo site_url('img/bannerTrasporte.jpg');?>" class="img-fluid" alt="...">
  </div>

</div>
