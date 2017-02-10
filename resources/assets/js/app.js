$.fn.editable.defaults.mode='inline';
$.fn.editable.defaults.ajaxOptions={type:'POST'};
$.fn.editable.defaults.send = "always";

$(document).ready(function() {


	$(".set-guide-number").editable({ajaxOptions: {
     type: 'PUT'
   }  });
	$(".select-status").editable(
		{
			source:[
				{value:"creado",text:"Creado"},
				{value:"envio",text:"Enviado"},
				{value:"recibido",text:"Recibido"}
			]
		});
});
