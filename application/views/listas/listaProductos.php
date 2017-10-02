<section class="lista">
<div class="conteiner">
<div class="titulo col col-12">
      <h6>Productos en Oferta </h6>
    </div>
  <div class="row justify-content-center text-center">
   
		<ul class="pro col col-12 ">
      <?php
      $i =0;
      foreach ($productosL as $p){
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
                <button <?php echo"id='$i'" ?> type="button" class="btnModal btn btn-primary" <?php echo"data-target='#modal$i'" ?> data-toggle="modal">
                    Agregar al carro
                </button>
              </div>
          </div>
     
      </div>
      </li>
      <!-- Modal -->
<div class="modal fade" data-backdrop="false" <?php echo"id='modal$i'" ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrege Cantidad</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="rangos table table-hover">
      <thead>
			<tr>
				<th>Rango minimo</th>
				<th>Rango maximo</th>
				<th>Precio</th>
			</tr>
		</thead>
        </table>

        <?php 
        echo form_open('Carro/agregar'); ?>
        <?php
        $cantidad = array('class' => 'cantidad','id' => 'cantidad'.$i);
        echo form_label('Cantidad ', 'username'); ?><br>
        <?php echo form_input('qty', "1" ,$cantidad);?>
       			<?php $id= array(
        			'type'  => 'hidden',
        			'name'  => 'cod',
        			'id'    => 'cod'.$i,
        			'value' => $p['pro_codprod'],
        			'class' => 'id'.$i
				);?>
        <h3>$<span <?php echo"id='pU$i'" ?>></span></h3>
        <h3>$<span <?php echo"id='pS$i'" ?>></span></h3>
				<?php echo form_input($id); ?>
        <?php echo form_hidden('name', $p['pro_desc']); ?>
        <?php echo form_hidden('price', $p['precio_bajo']);?>
        <?php
          $clase = array('class' => 'btn btn-outline-primary');
          echo form_submit('action','Agregar al carro',$clase); 
        ?>
        <?php echo form_close(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>              
      <?php $i++;
       }?>
    </ul>
  </div>
</div>

<!-- Button trigger modal -->


</section>

