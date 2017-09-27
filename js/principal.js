function updateCarro(i){

	var qty = $('#cantidad' + i).val();

	var rowid = $('#rowid' + i).val();

	$.ajax({
	url: 'Carro/mod/',
	type: 'POST',
	dataType: 'text',
	data: {
		qty: qty,
		rowid: rowid
	}
	}).done(function (data) {
		$.get("/Durban2/index.php/Carro/mostrarCarro", function (cart) {
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
		x1 = x1.replace(rgx, '$1' + '.' + '$2'); // changed comma to dot here
	}
	return x1 + x2;
}

function updatePC(i) {
	var qty = $('#cantidad' + i).val();
	var cod = $('#codigo' + i).text();
	var total = $('#total').text().replace(".", "").replace("$", "");
	var price = '';
	var tt = 0;
	$.ajax({
			url: 'Carro/getRPpP/',
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
			url: 'Carro/getRPpP/',
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



$(document).ready(function () {
    var link = "/Durban2/";
    updatePD();

    //Actualisar precio por cantidad en vista Detalle
    $('#cantidad').keyup(function () {
        updatePD();
    });

    //Actualisar precio por cantidad en vista Carro
    $('#tCarro > tbody > tr').each(function(e){
        var index = e;
        updatePC(index);
        $('#cantidad'+index).keyup(function () {
            updatePC(index);    
        });
    });

    //Agrega al carro Un producto
    $("ul.pro form").submit(function () {
        var id = $(this).find('input[name=id]').val();
        var name = $(this).find('input[name=name]').val();
        var price = $(this).find('input[name=price]').val();
        var qty = $(this).find('input[name=qty]').val();

        $.post(link + "index.php/Carro/agregar", {
            id: id,
            qty: qty,
            price: price,
            name: name,
            ajax: '1'
        },

            function (data) {

                $.get(link + "index.php/Carro/mostrarCarro", function (cart) {

                    $("#contenidoCarro").html(cart);
                    alert("Producto agregado al carro");
                });
            });
        return false; 
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
/* 		infinite: true, */
		speed: 500,
	/* 	fade: true,
		cssEase: 'linear' */
	});

});




