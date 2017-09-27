<section>
  <ul class="pro">
  <?php foreach ($producto as $p) { ?>
  <li>
  <div class="detalleProducto container" style="margin-top : 5%; margin-bottom : 5%;">
    <div class="row ">
      <div class="datelleImagenes col col-xl-4 col-lg-4 col-md-6 col-sm-12 text-center">
        <div class="imgGrande">
          <?php
          $file = 'http://www.libreriagiorgio.cl/lg/imagenes/codigos/' .$p['pro_codprod']. '.jpg';
          $file_headers = @get_headers($file);
          if (file_exists('img/productos/'.$p['pro_codprod'] .'.jpg')) { ?>
            <img class="img-fluid" src="<?php echo site_url('img/productos/'.$p['pro_codprod'])?>.jpg" class="rounded img-fluid" alt="...">
          <?php }elseif(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found'){ ?>
            <img class="img-fluid" src="http://via.placeholder.com/350" class="rounded img-fluid" alt="...">
          <?php }else{ ?>
            <img class="img-fluid" src="http://www.libreriagiorgio.cl/lg/imagenes/codigos/<?php echo $p['pro_codprod'] ?>.jpg" class="img-responsive" alt="Responsive image"/>
          <?php } ?>
        </div>
        <div class="imgPequeñas" style="margin-top : 5%;">
          <?php if(false){
          ?>
            <img src="https://unsplash.it/100" alt="..." class="img-thumbnail">
            <img src="https://unsplash.it/100" alt="..." class="img-thumbnail">
            <img src="https://unsplash.it/100" alt="..." class="img-thumbnail">
          <?php } ?>
        </div>
      </div>
      <div class="detalleInfo col col-xl-8 col-lg-8 col-md-6 col-sm-12 text-center">
        <div class="row">
          <div class="info1 col col-12">
            <!-- <h6>Opcion</h6> </br> -->
            <h1><?php echo ucfirst(strtolower($p['pro_desc']))?></h1></br>
            <h3>Codigo:<span id="codigo"><?php echo $p['pro_codprod'] ?></span> </h3></br>
          </div>
          <div class="info2 col col-12">
            <div class="row">
              <!-- Rango Precios -->
              <div class="detallePrecio col col-sm-12 col-md-12 col-lg-6 ">
                <?php if ($this->config->item('precio')) { ?>
                  <div>
                    <h3>Precios con IVA incluido</h3>
                  </div>
  			          <div class="rangos col-md-12 text-center align-self-center">
  									<table style="margin : auto;">
                      <?php foreach ($rango as $r) {?>
                        <tr>
                          <th data-field="cant">De :</th>
                          <td id='1'><?php echo $r['ri']?></td>
                          <?php if (!isset($r['rf'])) { ?>
                            <th data-field="cant">O :</th>
                            <td id='2'><?php echo $r['rf']?></td>
                            <th data-field="cant">Precio :</th>
                            <td id='3'> $ <?php echo number_format($r['precio'],'0',',','.')?></td>
                          <?php }else{?>
                          <?php if ($r['rf']=='999999'){?>
                            <th data-field="cant">O :</th>
                            <td id='4'><?php echo 'mas'?></td>
                          <?php }else{ ?>
                            <th data-field="cant">A :</th>
                            <td id='5'><?php echo $r['rf']?></td>
                          <?php } ?>
                            <th data-field="cant">Precio :</th>
                            <td id='6'> $<?php echo number_format($r['precio'],'0',',','.')?></td>
                          <?php } ?>
                        </tr>
                      <?php
                      }
                      ?>

  									</table>
  			          </div>
  							<?php } ?>
              </div>
              <!-- form para agegar al carro -->
                   
              <div class="col col-sm-12 col-md-12 col-lg-6 text-center  align-self-center">
              <?php echo form_open(site_url('index.php/Carro/agregar'));?>   
               <div class="row justify-content-center">
                  <div class="cantidad-div col col-4">
                    <?php
                    $cantidad = array('class' => 'cantidad','id' => 'cantidad');
                    echo form_label('Cantidad ', 'username'); ?><br>
                    <?php echo form_input('qty', "1" ,$cantidad);?>
                  </div>
                  <div class="cantidad-div col col-4">
                   <?php 
                   echo form_label('Precio unitario ', 'pUnitario'); ?>
                   <h3>$<span id="pU"><?php echo $p['precio'] ?></span></h3>
                  </div>
                  <div class="cantidad-div col col-4">
                   <?php 
                   echo form_label('Subtotal', 'pSub'); ?>
                   <h3>$<span id="pS"><?php echo $p['precio'] ?></span></h3>
                  </div>
                  <div class="detalleBtn col col-12">
                    <?php
                    $clase = array('class' => 'btn btn-outline-primary');
                    echo form_submit('action','Agregar al carro',$clase); 
                    ?>
                  </div>
                </div>
              <!-- Ocultos -->
			        <?php echo form_hidden('id', $p['pro_codprod']); ?>
			        <?php echo form_hidden('name', $p['pro_desc']); ?>
              <?php echo form_hidden('price',$p['precio']); ?>
              <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="detalleTab col col-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Detalles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Seguridad</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Información</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Fabricante</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="home" role="tabpanel">Información detallada</br></div>
          <div class="tab-pane" id="profile" role="tabpanel">Informe de seguridad </br></div>
          <div class="tab-pane" id="messages" role="tabpanel">Información </br></div>
          <div class="tab-pane" id="settings" role="tabpanel">Ir al sitio del fabricante</br></div>
      </div>
    </div>
  </div>
  </li>
  <?php } ?>
  </ul>
  
</section>

