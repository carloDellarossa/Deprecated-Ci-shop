
<div class="conteiner">
<div class="titulo col col-12">
      <h6>Productos en Oferta </h6>
    </div>
  <div class="row justify-content-center text-center">
   
		<ul class="pro col col-12 ">
      <?php
      $i =0;
      foreach ($productosL as $p){
        echo form_open('Carro/agregar');
        $file = 'http://www.libreriagiorgio.cl/lg/imagenes/codigos/' .$p['pro_codprod']. '.jpg';
        $file_headers = @get_headers($file); ?>
      <li class="lista-productos col col-xl-3 col-lg-3 col-md-6 col-sm-12">
      <div class="productos col col-12">
        <a href="<?php echo site_url('index.php/Producto?codigo='.urlencode($p['pro_codprod']).'')?>">
          <div class="row justify-content-center">
              <div class="codigo col col-12">
                <h6><?php echo $p['pro_codprod']?></h6>
              </div>
              <div class="proImg col col-12 text-center">
              <?php 
								if (file_exists('img/productos/'.$p['pro_codprod'] .'.jpg')) { ?>
									<img class="img-fluid" src="<?php echo site_url('img/productos/'.$p['pro_codprod'])?>.jpg" class="rounded img-fluid" alt="...">
								<?php }elseif(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found'){ ?>
									<img class="img-fluid" src="http://via.placeholder.com/350" class="rounded img-fluid" alt="...">
								<?php }else{ ?>
									<img class="img-fluid" src="http://www.libreriagiorgio.cl/lg/imagenes/codigos/<?php echo $p['pro_codprod'] ?>.jpg" class="img-responsive" alt="Responsive image"/>
								<?php } ?>
              </div>
              <div class="proInfo col col-12">
                <div class="row">
                  <div class="proDes col col-12 align-self-center text-center">
                    <h6><?php echo ucfirst(strtolower($p['pro_desc']))?></h6><br>
                  </div>
                  <?php if ($this->config->item('precio')) { ?>
                    <div class="proPrecio col col-12 align-self-center text-center">
                      $<?php echo number_format($p['precio_bajo'],'0',',','.')?> <h6 class="infoPrecio">Precio mayorista - comerciante</h6><br>
                    </div>
                  <?php } ?>
                </div>
              </div>
              </a>
              <div class="col col-12 btnAgregar text-center">
                <?php
                  $clase = array('class' => 'btn btn-outline-primary');
                  echo form_submit('action','Agregar al carro',$clase); 
                ?>
              </div>
          </div>
     
      </div>
      </li>
      <?php echo form_hidden('id', $p['pro_codprod']); ?>
      <?php echo form_hidden('name', $p['pro_desc']); ?>
      <?php  echo form_hidden('qty', '1'); ?>
      <?php echo form_hidden('price', $p['precio_bajo']);?>
      <?php echo form_close(); ?>
      <?php }?>
    </ul>
  </div>
</div>
