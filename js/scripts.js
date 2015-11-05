var inicio=function () {
	$(".cantidad").keyup(function(e){
		if($(this).val()!=''){
			if(e.keyCode==13){
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				$(this).parentsUntil('.product').find('.subtotal').text('Subtotal: '+(precio*cantidad));
				$.post('./js/modificardatos.php',{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
				$("#total").text('Total: '+e);
				location.href="./compras.php";});
			}
		}
	});
$(".eliminar").click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		$(this).parentsUntil('.product').remove();
		$.post('./js/eliminar.php',{
			Id:id
		},function(a){
			if(a=='0'){
				location.href="./compras.php";
			}
		location.href="./compras.php";
		});

	});
	$("#formulario").submit(function(evento){
		$.get('./compras/comprar.php',function(evento){
			alert("Gracias por realizar esta compra");
		}).fail(function (){
			evento.preventDefault();	
		});
	});
}	
$(document).on('ready',inicio);

