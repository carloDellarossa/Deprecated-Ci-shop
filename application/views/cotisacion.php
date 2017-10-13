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
						<td>$<?php echo number_format($this->cart->total(),'0',',','.'); ?></td>
					</tr>
				</tfooter>
			</table>
		</div><!-- Resumen de productos -->
	
<?php endif; ?>


<div class="container">
  <form>
	<div class="form-group row">
      <label for="rut" class="col-sm-1 col-form-label">Rut</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" value="Rut">
      </div>
    </div>
    <div class="form-group row">
      <label for="nombre" class="col-sm-1 col-form-label">Nombre</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" value="Nombre">
      </div>
    </div>
	<div class="form-group row">
      <label for="email" class="col-sm-1 col-form-label">Email</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" value="Email">
      </div>
    </div>

    <div class="form-group row">
      <div class="offset-sm-2 col-sm-5">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>

  </form>
</div>	

	</div><!-- Termina row -->
</div><!-- Termina container -->
<br>
<br>

