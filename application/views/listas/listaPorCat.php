
<section class="height : auto">

<?php
if (count($pXcat) == 0) {
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
		    <ul class="pro">
					<?php //echo '<pre>'; print_r($pXcat); echo '</pre>';?>
		      <?php foreach ($pXcat as $n){
		        $file = 'http://www.libreriagiorgio.cl/lg/imagenes/codigos/' .$n['pro_codprod']. '.jpg';
						$file_headers = @get_headers($file); 
						$img = site_url('img/productos/'.$n['pro_codprod']) . '.jpg';
						?>
		      <li class="lista-productos col col-xl-2 col-lg-3 col-md-3 col-sm-12">
						<?php echo form_open('Carro/agregar'); ?>
			    <div class="productos col col-12">
			      <a href="<?php echo site_url('index.php/Producto?codigo='.urlencode($n['pro_codprod']).'')?>">
			      <div class="row justify-content-center">
			        <div class="codigo col col-12">
			          <h6><?php echo $n['pro_codprod']?></h6>
			        </div>
			        <div class="proImg col col-12 text-center">
								<?php 
								if (file_exists('img/productos/'.$n['pro_codprod'] .'.jpg')) { ?>
									<img class="img-fluid" src="<?php echo site_url('img/productos/'.$n['pro_codprod'])?>.jpg" class="rounded img-fluid" alt="...">
								<?php }elseif(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found'){ ?>
									<img class="img-fluid" src="http://via.placeholder.com/350" class="rounded img-fluid" alt="...">
								<?php }else{ ?>
									<img class="img-fluid" src="http://www.libreriagiorgio.cl/lg/imagenes/codigos/<?php echo $n['pro_codprod'] ?>.jpg" class="img-responsive" alt="Responsive image"/>
								<?php } ?>
			        </div>
			        <div class="proInfo col col-12">
			          <div class="row">
			            <div class="proDes col col-12 align-self-center text-center">
			              <h6><?php echo ucfirst(strtolower($n['pro_desc']))?></h6><br>
			            </div>
			            <?php if ($this->config->item('precio')) { ?>
			            <div class="proPrecio col col-12 align-self-center text-center">
			              $<?php echo number_format($n['precio_bajo'],'0',',','.')?><h6 class="infoPrecio">Precio mayorista - comerciante</h6> <br>
			            </div>
			              <?php } ?>
			            <!-- <div class="proStock col col-12">
			              stcok de X
			            </div> -->
			          </div>
							</div>
							</a>
							<div class="col btnAgregar text-center ">
								<?php
								$clase = array('class' => 'btn btn-outline-primary');
								echo form_submit('action','Agregar al carro',$clase); ?>
							</div>
			      </div>
					
			    </div>
					<?php echo form_hidden('id', $n['pro_codprod']); ?>
					<?php echo form_hidden('name', $n['pro_desc']); ?>
					<?php echo form_hidden('price',$n['precio_bajo']); ?>
					<?php echo form_hidden('qty', '1'); ?>					
					<?php echo form_close(); ?>
			 <?php }?>
					 </li>

		    </ul>
			</div>


<?php
}
?>
		</div>
	</div>
</section>
