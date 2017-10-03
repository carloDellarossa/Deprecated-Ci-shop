
<section class="lista">

<?php
if (count($productos) == 0) {
	echo '<br><div class="text-center" ><h1>No hay productos disponibles en esta categoría</h1></div>';
}else{ ?>



	<div class="container-fluid">
		<div class="row row-eq-height">
			<div class="lista-filtros col col-xl-2 col-lg-2 col-md-2 col-sm-2"> <!-- TODO pasar esto a style principal -->
			
					 <ul>
							 <?php foreach ($filtros as $filtro => $v){?>
								<?php if(sizeof($v)!= 0){?>	
									 	<div role="tab" id="heading<?= str_replace(' ','',$filtro) ?>">
										 <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= str_replace(' ','',$filtro) ?>" aria-expanded="true" aria-controls="collapse<?= str_replace(' ','',$filtro) ?>">
											 <h3><?php	echo ucwords($filtro); ?></h3>
											</a>
										</div>
								
							 <ul style="max-height: 933px; overflow: auto">
								 <div id="collapse<?= str_replace(' ','',$filtro) ?>" class="collapse show" role="tabpanel" aria-labelledby="heading<?= str_replace(' ','',$filtro) ?>">
								 <?php for($i = 0; $i < count($v); $i++) {?>
									 <?php foreach ($v[$i] as $key => $value){
										 if ($value != '') { ?>
										 	<li><a href="<?php echo site_url('index.php/Categoria/filtrar?f='.$value.'') ?>"><?php echo $value;?></a></li>
									<?php }
									 	}
								 	}?>
								 </div>
							 </ul>
							 <?php } 
							} ?>
					 </ul>
			</div>
			<div class="lista-pro col col-xl-10 col-lg-10 col-md-10 col-sm-10">
<ul class="pro col col-12 ">
      <?php
      $i =0;
      foreach ($productos as $p){
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
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLabel">Agrege Cantidad</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container-fluid">                
        <div class="modal-body row justify-content-center">
          <div class="col col-12 tabla text-center">
            <table class=" rangos table table-hover">
              <thead>
                <tr>
                  <th>Rango minimo</th>
                  <th>Rango maximo</th>
                  <th>Precio</th>
                </tr>
              </thead>
            </table>
            <?php 
              echo form_open('Carro/agregar');
              
              
              $id= array(
                        'type'  => 'hidden',
                        'name'  => 'cod',
                        'id'    => 'cod'.$i,
                        'value' => $p['pro_codprod'],
                        'class' => 'id'
              );
              echo form_input($id);
              echo form_hidden('name', $p['pro_desc']); 
              echo form_hidden('price', $p['precio_bajo']);
              ?>
          </div>
          <div class="col col-2">
            <?php
            echo form_label('Cantidad ', 'username');
            ?>
          </div>
          <div class="col col-2">
            <?php 
            $cantidad = array('class' => 'cantidad','id' => 'cantidad'.$i); 
            echo form_input('qty', "1" ,$cantidad);
            ?>
          </div>
          <div class="col col-2">
            <h3>$<span <?php echo"id='pU$i'" ?>></span></h3>
          </div>  
          <div class="col col-2">
            <h3>$<span <?php echo"id='pS$i'" ?>></span></h3>
          </div>  
          <div class="col col-4">
            <?php
            $btnAdd = array(
              'name' => 'button',
              'id' => 'button',
              'value' => 'true',
              'type' => 'submit',
              'class'=>'btn btn-outline-primary',
              'content' => '<i class="fa fa-cart-plus" aria-hidden="true"> Agregar al carro</i>'
            );
            echo form_button($btnAdd);
            echo form_close(); 
            ?>
          </div>        
        </div>
        <div class="row justify-content-center modal-footer">
          <div class="col col-5">
            <a href="<?php echo site_url('index.php/Producto?codigo='.urlencode($p['pro_codprod']).'')?>" class="btn btn-outline-info" role="button" aria-pressed="true"><i class="fa fa-chevron-left" aria-hidden="true">Ir al Producto</i></a>
          </div>
          <div class="col col-3">
            <a href="<?php echo site_url('index.php/Carro')?>" class="btn btn-outline-success" role="button" aria-pressed="true"><i class="fa fa-shopping-cart" aria-hidden="true"> Ir al carro</i></a>
          </div>
          <div class="col col-3">
            <button type="button" class="btn btn-outline-danger" ><i class="fa fa-times" aria-hidden="true"> Cerrar</i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>          
      <?php $i++;
       }?>
    </ul>
			</div>


<?php
}
?>
		</div>
	</div>
</section>
