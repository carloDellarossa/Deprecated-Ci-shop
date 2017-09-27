
https://tympanus.net/Blueprints/HorizontalDropDownMenu/#
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
    <link href="<?php echo site_url('index.php/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('index.php/css/animate.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('index.php/css/principal.css?ts=<?=time()?>&quot;');?>" rel="stylesheet">
    <link href="<?php echo site_url('index.php/css/font-awesome.min.css');?>" rel="stylesheet">


      <!-- Iconos de inicio -->
    <link rel="icon" href="<?php echo site_url('img/dur.png');?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo site_url('img/dur.png');?>" type="image/x-icon" />
    <link rel="canonical" href=""/>


    <title>Importadora Durban</title>

  </head>

  <body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script  src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
  <script src="<?php echo site_url('index.php/js/bootstrap.min.js');?>"></script>

  <!-- Header -->
  <header>
    <div class="container-fluid">
      <div class="top row">
        <!-- menu top telefonos  -->
        <div class="info col col-12">
          <div class="row">
            <div class="adm col">
            <h1>Administración: <span class="glyphicon glyphicon-earphone"> </span> 412 628 400 / <span class="glyphicon glyphicon-envelope"> </span> durban@durban.cl </h1>
            </div>
            <div class="ventas col">
            <h1>Ventas:
            <span class="glyphicon glyphicon-earphone"> </span> 412 628 402 / <span class="glyphicon glyphicon-envelope"> </span> ventas2@durban.cl |
            <span class="glyphicon glyphicon-earphone"> </span> 412 628 403 / <span class="glyphicon glyphicon-envelope"> </span> ventas3@durban.cl </h1>
            </div>
          </div>
        </div>

        <!-- imagen logo -->
        <div class="logo col-md-4 offset-md-1">
          <img class="img-fluid" src="<?php echo site_url('img/logoDurban.png');?>" />
        </div>

        <!-- menu secion somos -->
        <div class="navs col-md-7 ">
          <div class="  row justify-content-md-center">
            <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#containerNavbarCenter" aria-controls="containerNavbarCenter" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="top2 collapse navbar-collapse" id="containerNavbarCenter">
                <ul class="navbar-nav">

                  <li class="nav-item active">
                    <a class="nav-link" href="">Quienes Somos</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="">Trabaje con nosotros</a>
                  </li>
                  <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contacto</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                      <form id="ajax-login-form" action="" method="post" role="form" autocomplete="off">
                          <div class="form-group">
                              <label for="username">Nombre</label>
                              <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="E-mail" value="" autocomplete="off">
                          </div>

                          <div class="form-group">
                              <label for="email">E-mail</label>
                              <input type="text" name="password" id="password" tabindex="2" class="form-control" placeholder="Clave" autocomplete="off">
                          </div>

                          <div class="form-group">
                              <label for="text">Consulta</label>
                              <textarea rows="3" cols="31">

                              </textarea>
                          </div>

                          <div class="form-group">
                                      <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Ingresar">
                          </div>
                          <input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">
                      </form>
                    </div>
                  </li>
                  <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inisiar sección</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                      <div class="text-center"><h3><b>Inicio de sección</b></h3></div>
                      <form id="ajax-login-form" action="" method="post" role="form" autocomplete="off">
                          <div class="form-group">
                              <label for="username">E-mail</label>
                              <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="E-mail" value="" autocomplete="off">
                          </div>

                          <div class="form-group">
                              <label for="password">Clave</label>
                              <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Clave" autocomplete="off">
                          </div>

                          <div class="form-group">
                              <div class="row">
                                  <div class="col-xs-7">
                                      <input type="checkbox" tabindex="3" name="remember" id="remember">
                                      <label for="remember">Recordarme</label>
                                  </div>
                                  <div class="col-xs-5 pull-right">
                                      <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Ingresar">
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <div class="text-center">
                                          <a href="" tabindex="5" class="forgot-password">Olvido su clave?</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">
                      </form>
                    </div>
                  </li>
                </ul>
              </div>
            </nav> <!--fin menu seccion y contato -->

            <!-- buscar -->
            <div class="buscar col col-12 ">
              <nav class="navbar navbar-light bg-faded ">
                  <form class="form-inline justify-content-md-center">
                    <input class="buscar form-control mr-sm-4" type="text" placeholder="Descripción o código producto">
                    <button class="btn btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
                  </form>
              </nav>
            </div>

          </div>
        </div>

        <div class="categorias col col-12">
        <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md" id="cat">
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#containerNavbarCenter" aria-controls="containerNavbarCenter" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->

          <ul class="nav navbar-nav navbar-left">
			        <!--Menu Categorias -->
              <?php
              $keys = array_keys($categorias);
              for($i = 0; $i < count($categorias); $i++) {
                 ?>
                <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $keys[$i] ;?><span class="caret"></span></a>
                <ul class="dropdown-menu multi-level" >
                  <?php
                  foreach($categorias[$keys[$i]] as $key => $value) {
                    ?>
                            <li class="dropdown-item dropdown-submenu" >

                              <?php echo anchor('Categoria/verPorCat?cat='.urlencode($key).'&per_page=1',''.$key.'','class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"'); ?>
                                <ul class="dropdown-menu scrollable-menu" >
                                <?php
                                foreach ($value as $s => $p) { ?>

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



          <!-- Carro -->
          <ul class="navbar navbar-nav navbar-right">
                  <li class="nav-item active dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;<span class="badge"><?php echo $this->cart->total_items(); ?></span>
                  </a>
                    <ul class="dropdown-menu animated slideInRight scroll" style="margin-top : 5px" >
                      <div class="lista-carro">
                        <div class="contenedor-producto-carro container">
                        <?php
                          $carro = $this->cart->contents();
                          if($this->cart->total_items() != 0){
                            foreach ($carro as $p) {
                        ?>
                              <li class="col-lg-12 col-md-12 col-sm-12">
                                <div class="producto-carro">
                                  <div class="imagen-carro">
                                    <?php
                                    $file = 'http://www.libreriagiorgio.cl/lg/imagenes/codigos/' .$p['id']. '.jpg';
                                    $file_headers = @get_headers($file);

                    	              if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    	              ?>
                    	                <img  src="<?php echo site_url('img/nodisponible.jpg');?>"/><!--Img -->
                    	              <?php
                    	              }else{
                    	              ?>
                    	                <img  src="http://www.libreriagiorgio.cl/lg/imagenes/codigos/<?php echo $p['id'] ?>.jpg"/><!--Img -->
                    	              <?php } ?>
                                  </div>
                                  <div class="producto-carro-info">
                                    <div class="row">
                                      <div class="tamaño">
                                        <?php if ($this->config->item('precio')) { ?>
                                          <div class="precio col-lg-6 col-md-6 col-sm-2">
                                            <span>Precio<br>$ <?php echo number_format($p['price'],'0',',','.')?></span>
                                          </div>
                                        <?php } ?>

                                        <div class="nombre col-lg-6 col-md-6 col-sm-2">
                                          <span><?php echo $p['name']; ?></span>
                                        </div>

                                        <div class="cantidad col-lg-6 col-md-6 col-sm-2">
                                          <span>Cantidad : <?php echo $p['qty']; ?></span>
                                          <?php echo anchor('Inicio/remove/'.$p['rowid'],'<i class="glyphicon glyphicon-trash"></i>
          <span class="hidden-tablet"></span>'); ?>
                                        </div>
                                        <div class="col-lg-6 col-md-2 col-sm-2">
                                          <h1></h1>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>


                              <?php
                            } ?>


                            <li class="col-lg-12 col-md-12 col-sm-12" style="text-align : center">
                              <div class="info-carro text-right">
                                <div class="info-carro-total">
                                    <br>
                                    <span>Total:</span>
                                    <span>$ <?php echo number_format($this->cart->total(),'0',',','.'); ?></span>
                                </div>
                              </div>
                            </li>
                            <li class="col-lg-12 col-md-12 col-sm-12" style="text-align : center">
                              <div>
                                <h4><i class="glyphicon glyphicon-shopping-cart"></i><?php echo anchor('Carro', 'Ir al carro de compra') ?></h4>
                              </div>
                            </li>
                            <li class="col-lg-12 col-md-12 col-sm-12" style="text-align : center">
                              <div>
                                <h4><i class="glyphicon glyphicon-ok"></i><?php echo anchor('Orden', 'Finalizar la compra') ?></h4>
                              </div>
                            </li>
                             <?php }else{ ?>
                                <li>
                                  <h2>No hay productos en el carro<h2>
                                </li>
                              <?php } ?>
                        </div>
                      </div>
                    </ul>
                  </li>
                </ul><!-- termina carro-->
                </nav>
      		    </div> <!-- termina menu-->
        </div><!-- termina row -->
    </div> <!-- termina contenedor-->
  </header>
wjadawjdjawdjawdjawdjawdjawdjw</br>
wjadawjdjawdjawdjawdjawdjawdjw</br>
wjadawjdjawdjawdjawdjawdjawdjw</br>
wjadawjdjawdjawdjawdjawdjawdjw</br>



<nav class="navbar bg-faded" role="navigation" style="padding: 0px;">
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapsing-navbar">
    &#9776;
 </button>
  <div class="collapse navbar-toggleable-sm" id="collapsing-navbar">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item dropdown menu-large">
        <a class="nav-link" data-toggle="dropdown" href="#">Services</a>

        <ul class="dropdown-menu megamenu row">
          <li class="col-sm-3">
            <ul>
              <li><i class="fa fa-check" aria-hidden="true"></i> Orthodontics</li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Invisalign</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Incognito Lingual Services</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Damon System</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Six Month Smiles</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Ceramic & Metal Braces</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>SureSmile Technology</a></li>
            </ul>
          </li>
          <li class="col-sm-3">
            <ul>
              <li><i class="fa fa-check" aria-hidden="true"></i> Cosmetic/Aestheric Dentistry</li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Zoom Teeth Whitening</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Veneers/Non Prep Veneers</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Fillings</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Crowns/Bridges</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Aesthetic Inlays/Onlays</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Dentures</a></li>
            </ul>
          </li>
          <li class="col-sm-3">
            <ul>
              <li><i class="fa fa-check" aria-hidden="true"></i> Pediatric Dentistry</li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Painless</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Restorative</a></li>
              <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i>Preventative</a></li>
              <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Dental Implants</a></li>
              <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Endodontics</a></li>
              <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Dental Surgery</a></li>
            </ul>
          </li>
          <li class="col-sm-3">
            <ul>
              <li><i class="fa fa-check" aria-hidden="true"></i> Periodontics</li>
              <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Root Canal Treatment</a></li>
              <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Tooth Extraction</a></li>
              <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Root Canal Treatment</a></li>
              <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Gum Disease Treatment</a></li>
              <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Dental Emergency</a></li>
              <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i>Oral and Maxillofacial</a></li>
            </ul>
          </li>
        </ul>

      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Our Team</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Gallery</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">About Silesia Dental</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>




</body>
</html>
<script>
// Dropdown Menu Fade
jQuery(document).ready(function(){
    $(".dropdown").hover(
        function() { $('.dropdown-menu', this).stop().fadeIn("fast");
        },
        function() { $('.dropdown-menu', this).stop().fadeOut("fast");
    });
});
</script>
