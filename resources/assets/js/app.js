$.fn.editable.defaults.mode='inline';
$.fn.editable.defaults.ajaxOptions = {type: "POST"}
$.fn.editable.defaults.send = "always";

$(document).ready(function() {


	$(".set-guide-number").editable({ajaxOptions:{type: "PUT"}});
	$(".select-status").editable(
	{
		source:[
				{value:"Creado",text:"Creado"},
				{value:"Enviado",text:"Enviado"},
				{value:"Recibido",text:"Recibido"}
			],
		 ajaxOptions:{type: "PUT"}
   	});

$(document).on('submit','.add-to-cart',function(event) {
	event.preventDefault();
	
	var form = $(this);
	var button = form.find("[type='submit']");

	$.ajax({
		url: form.attr("action"),
		type: form.attr('method'),
		dataType: 'json',
		data: form.serialize(),
		beforeSend:function(){
		button.val("Cargando...");
		}	
	})
	.done(function(data) {
		console.log("success");
		button.val("Agregado").removeClass('btn-info').addClass('btn-success');
		setTimeout(function(){
			restartButton(button);
		},2000);
		console.log(data);
		$(".circle-shopping-cart").html(data.products_count).addClass('highlight');
	
	})
	.fail(function(error) {
		console.log("error");
		console.log(error.responseText);
		button.val("Hubo un error").removeClass('btn-info').addClass('btn-danger');
	})
	.always(function() {
		console.log("complete");
	});

	function restartButton(button)
	{
		button.removeClass('btn-success').removeClass('btn-danger').addClass('btn-info').val("Agregar");
		$(".circle-shopping-cart").removeClass('highlight')
	}
	

	return false;
});

});
