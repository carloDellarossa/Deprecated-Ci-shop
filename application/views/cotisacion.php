<!-- Resumen del carro -->
<br><h1 align="center">Cotización</h1>
<?php if($productosC = $this->cart->contents()):?>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col col-10 col-offset-1">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Sub-Total</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($productosC as $item): ?>
						<tr>
							<td><?php echo $item['name']; ?></td>
							<td>$<?php echo number_format($item['price'],'0',',','.')?></td>
							<td><?php echo $item['qty']; ?></td>
							<td>$<?php $subTotal = $item['price'] * $item['qty'];
							echo number_format($subTotal,'0',',','.')?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfooter>
					<tr class="total">
						<td colspan="2"><strong>Total</strong></td>
						<td></td>
						<td>$<?php echo $this->cart->total(); ?></td>
					</tr>
				</tfooter>
			</table>
		</div><!-- Resumen de productos -->
	
<?php endif; ?>



		<div class="col col-3">
			<h3> Ingrese sus datos </h3>
			<?php
				echo $this->session->flashdata('email_sent');
				echo form_open('Cot/email');
			?>
				<label for="exampleInputName2">Nombre</label><br>
				<label for="exampleInputName2">Rut</label><br>
				<label for="exampleInputEmail1">Email</label><br>
				<input type = "submit" value = "Cotizar">
			<?php
				echo form_close();
			?>
		</div>
		<div class="col col-3">
			<br>
			<input type = "input" name = "nombre" required /><br>
			<input type = "input" name = "rut" required /><br>
			<input type = "email" name = "email" required /><br>
		</div>
		<div class="col col-3">
			<h3> Datos de Facturaccion </h3>
			<?php
				echo $this->session->flashdata('email_sent');
				echo form_open('Cot/email');
			?>
				<label for="exampleInputName2">Nombre</label><br>
				<label for="exampleInputName2">Rut</label><br>
				<label for="exampleInputEmail1">Email</label><br>
				<input type = "submit" value = "Cotizar">
			<?php
				echo form_close();
			?>
		</div>
		<div class="col col-3">
			<br>
			<input type = "input" name = "nombre" required /><br>
			<input type = "input" name = "rut" required /><br>
			<input type = "email" name = "email" required /><br>
		</div>		

	</div><!-- Termina row -->
</div><!-- Termina container -->
<?php
// echo form_label('Nombre : ') ,form_input('Nombre', 'nombre');
// echo form_label('Rut : ') ,form_input('Rut', '11111111-1');
// echo form_label('Teléfono : ') ,form_input('Teléfono', '+56 1 111111111');
// echo form_label('Correo : ') ,form_input('Correo', 'nombre@ejemplo.cl');
?>

<!--Tomar datos con hidden values para pasarlo al pdf de imprecion y a la base de datos-->
<br>
<br>

