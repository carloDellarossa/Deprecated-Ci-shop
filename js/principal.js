function updateCarro(i){

	var qty = $('#cantidad' + i).val();

	var rowid = $('#rowid' + i).val();

	$.ajax({
	url: base_url + 'index.php/Carro/mod/',

	type: 'POST',
	dataType: 'text',
	data: {
		qty: qty,
		rowid: rowid
	}
	}).done(function (data) {
		$.get(base_url + "index.php/Carro/mostrarCarro", function (cart) {

			$("#contenidoCarro").html(cart);
			//alert('carro atualisado');
		});
	})
}

function aMoneda(nStr) {
    nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + '.' + '$2');
	}
	return x1 + x2;
}

function updatePC(i) {
	var qty = $('#cantidad' + i).val();
	var cod = $('#cod'+i).val();
	var total = $('#total').text().replace(".", "").replace("$", "");
	var price = '';
	var tt = 0;
	console.log('q ' + qty +' c ' + cod + ' i '+ i);
	$.ajax({
			url: base_url + 'index.php/Carro/getRPpP/',

			type: 'POST',
			dataType: 'text',
			data: {
				qty: qty,
				cod: cod
			}
		})
		.done(function (data) {
			price = data;
			subtotal = qty * parseInt(price);
			price = parseFloat(price).toFixed(0);
			subtotal = parseFloat(subtotal).toFixed(0);
			
			$('#pU' + i).text(aMoneda(price));
			$('#pS' + i).text(aMoneda(subtotal));
			updateCarro(i);
		})
		.always(function () {
			//actualisat sub precio total
			total = 0;
			$('.ps').each(function (e) {
				ps = $('#pS' + e).text().replace(/\./g, "").replace("$", "");
				total = total + parseInt(ps);
			})
			$('#total').text('$' + aMoneda(total));
		})

		.fail(function () {
			console.log('Error');
		});
}

function updatePD() {
	var qty = $('#cantidad').val();
	var cod = $('#codigo').text();
	var price = '';
	$.ajax({
			url: base_url + 'index.php/Carro/getRPpP/',

			type: 'POST',
			dataType: 'text',
			data: {
				qty: qty,
				cod: cod
			}
		})
		.done(function (data) {
			price = data;
			subtotal = qty * parseInt(price);
			price = parseFloat(price).toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, '$1.');
			subtotal = parseFloat(subtotal).toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, '$1.');
			$('#pU').text(price);
			$('#pS').text(subtotal);
			//ajax modCarro.php
		})
		.fail(function () {
			console.log('Error');
		}).always(function () {

		});
}

function getRango(i){
	var cod = $('#cod' + i).val();
	$.ajax({
		url: base_url + 'index.php/Carro/getRango/',
		type: "POST",
		dataType: "json",
		data : {cod : cod}
	})
		.done(function (data) {
			var tr;
			for (var i = 0; i < data.length; i++) {
				tr = $('<tr/>');
				tr.append("<td> Desde : " + data[i].ri + "</td>");
				tr.append("<td> A : " + data[i].rf + "</td>");
				tr.append("<td> $" + aMoneda(data[i].precio) + "</td>");
				$('.rangos').append(tr);
			}
		});
}

function addCarro(data) {
	$.ajax({
		url: base_url + 'index.php/Carro/agregar',
		type: "POST",
		dataType: "text",
		data: data
	})
	.done(function (data) {
		$.get(base_url + "index.php/Carro/mostrarCarro", function (cart) {
			$("#contenidoCarro").html(cart);
			alert("Producto agregado al carro");
		});
	});
}

$(document).ready(function () {

	$('.btnModal').click(function(){
		$(".rangos").empty();
		var index = this.id.replace(/^\D+/g, '');
		getRango(index);
	});

	updatePD();
	
	//Actualisar precio 
	$('.cantidad').keyup(function () {
		var index = parseInt(this.id.replace(/^\D+/g, ''));
		if (Number.isInteger(index)) {
			updatePC(index);	
		}else{
			updatePD();
		}
    });

    //Agrega al carro Un producto
    $("ul.pro form").submit(function () {
		data = {
			id: $('.cod').val(),
			qty: $('.qty').val(),
			price: $('.price').val(),
			name: $('.name').val()
		}
		addCarro(data);
    });


    //Actualisar carro desde vista Carro
    $("#fCarro").submit(function(){
        event.preventDefault();
        $("input").each(function () {
            var val = $(this).attr('id');
            console.log(val);
        });

	});
	
	//carrusel de promociones
	$('.promos').slick({
		autoplay: true,
		dots: true,
		speed: 500,
	});

	$('.modal').on('show.bs.modal', function () {
		$(this).find('.modal-body').css({
			width: 'auto', //probably not needed
			height: 'auto', //probably not needed 
			'max-height': '100%'
		});
	});
});




