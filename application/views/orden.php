<style>
.tablas {
	padding-left: 50px;
	padding-right: 50px
}

.container {
		 clear: both;
 }

 .container input {
		 width: 100%;
		 clear: both;
 }
</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<br><h1 align="center">Carro de compras</h1>
		<?php if($productosC = $this->cart->contents()) { ?>
		 <div class="tablas">
				<table class="table table-hover">
				<caption>Carro de compras</caption>
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th></th>
					</tr>
				</thead>
				<?php foreach ($productosC as $item): ?>
					<?php echo form_open('Carro/mod/'.$item['rowid']); ?>

					<tr>
						<td><?php echo $item['id']; ?></td>
						<td><?php echo $item['name']; ?></td>
						<td>$ <?php echo number_format($item['price'],'0',',','.')?></td>
						<td><?php echo $item['qty'];?></td>
						<?php echo form_close(); ?>
					</tr>
				<?php endforeach; ?>
				<tr class="total">
					<td colspan="2"><strong>Total</strong></td>
					<td>$ <?php echo number_format($this->cart->total(),'0',',','.');?></td>
					<td></td>
				</tr>
				</table>
			</div>
			<?php }else{
			echo "no hay productos";
			} ?>
		</div>

		<div class="col-md-12">
			<?php echo form_open('Createpdf');?>

			<!-- Datos del carro -->
			<!-- Datos del cliente -->
			<div class="col-md-4">
			<h3> Ingrese sus datos </h3>
			<p><?php echo form_label('Nombre : ') ,form_input('Nombre', 'nombre');?></p>
			<p><?php echo form_label('Rut : ') ,form_input('Rut', '11111111-1');?></p>
			<p><?php echo form_label('Teléfono : ') ,form_input('Teléfono', '+56 1 111111111');?></p>
			<p><?php echo form_label('Correo : ') ,form_input('Correo', 'nombre@ejemplo.cl'); ?></p>
		  </div>

			<div class="col-md-4">
			<!-- Datos de envio -->
			<h3> Ingrese datos de envio </h3>
			<p><?php echo form_label('Dirección : ') ,form_input('Dirección', 'calle numero');?></p>
			<p><?php echo form_label('Departamento : ') ,form_input('Departamento', 'dpto');?></p>
			<p><?php echo form_label('Ciudad : ') ,form_input('Ciudad', 'Ciudad');?></p>
			</div>

			<div class="col-md-4">
			<!-- Datos de pago -->
			<h3> Metodo de pago</h3>
			<p><?php echo form_label('Metodos de pago : ') ,form_dropdown('pago',array('Efectivo','Tarjeta','Deposito'));?></p>
			<!-- Finalizar compra -->
			<p><?php echo form_submit('action','Finalizar compra');?></p>
			<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
