

<br><h1 align="center">Carro de compras</h1>
<?php if($carro = $this->cart->contents()) { 
 $i = 0;?>

 <div class="tablaCarro">
		<?php echo form_open(site_url('index.php/Carro/modTodo'),"id='fCarro'"); ?>
 
		<table id="tCarro" class="tCarro table table-hover">
		<caption>Carro de compras</caption>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Sub-Total</th>
				<th>Eliminar del carro</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($carro as $item): ?>
			<tr>
				<td <?php echo"id='codigo$i'" ?> class="codigo"><?php echo $item['id']; ?></td>
				<td><?php echo $item['name']; ?></td>
				<td>$<span <?php echo"id='pU$i'" ?> class="pu"><?php echo $item['price'] ?></span></td>
				<?php
				$cantidad = array('class' => 'cantidad','id' => 'cantidad'.$i.''); ?>
				<td><?php echo form_input('qty', $item['qty'],$cantidad);?></td>
				<td>$<span <?php echo"id='pS$i'" ?> class="ps"><?php echo $item['price'] ?></span></td>
				<td class="remove">

				<?php $codigo= array(
        			'type'  => 'hidden',
        			'name'  => 'cod',
        			'id'    => 'cod'.$i,
        			'value' => $item['id'],
        			'class' => 'cod'
				);?>

				<?php echo form_input($codigo); ?>

				<?php $rowid = array(
        			'type'  => 'hidden',
        			'name'  => 'rowid',
        			'id'    => 'rowid'.$i,
        			'value' => $item['rowid'],
        			'class' => 'rowid'.$i
				);?>

				<?php echo form_input($rowid); ?>

				<?php $index = array(
        			'type'  => 'hidden',
        			'name'  => 'index',
        			'id'    => 'index'.$i,
        			'value' => $i,
        			'class' => 'index'.$i
				);?>

				<?php echo form_input($index); ?>

				<a class="btn btn-outline-primary" href="<?php echo site_url('Carro/remove/'.$item['rowid']);?>" role="button">
				ELIMINAR
				</a>
				</td>
			</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		</tbody>
		<tfoot>
		<tr class="total">
			<td></td>
			<td></td>
			<td colspan="2"><strong>Total en carro</strong></td>
			<td id='total'><?php echo number_format($this->cart->total(),'0',',','.');?></td>
			<td>
				
				<?php
				/* 	$btn = array('class' => 'btn btn-outline-primary');
					echo form_submit('action','Guardar',$btn);  */
				?>
			</td>
		</tr>
		</tfoot>
		</table>
		<?php echo form_close(); ?>
	</div>
<?php }else{
echo "no hay productos";
} ?>
<div>
	<table class="table table-hover">
		<tr>
			<td><h3> <?php echo anchor('/', '<i class="fa fa-chevron-left" aria-hidden="true"></i>
			<span class="hidden-tablet">Seguir comprando</span>') ?> </h3></td>
			<!-- <td><h3> <?php echo anchor('Orden', '<i class="glyphicon glyphicon-ok"></i>
			<span class="hidden-tablet">Finalizar la compra</span>') ?> </h3></td> -->
			<td><h3> <?php echo anchor('Cot', '<i class="fa fa-print" aria-hidden="true"></i>
			<span class="hidden-tablet">Crear cotización </span>') ?> </h6></td>
		</tr>
	</table>
</div>
