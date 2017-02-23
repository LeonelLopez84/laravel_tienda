$.fn.editable.defaults.mode='inline';
$.fn.editable.defaults.ajaxOptions = {type: "POST"}
$.fn.editable.defaults.send = "always";

$(document).ready(function() {


	$(".set-guide-number").editable({ajaxOptions:{type: "PUT"}});
	$(".select-status").editable({
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
		$(".circle-shopping-cart").removeClass('highlight');
	}
	

	return false;
});


function subCategories(Othis){

	var id=$(Othis).children('option:selected').val();
	var url=$(Othis).attr('url');
	var categorie_id=$("select[name='categorie']").attr('id');

    $.ajax({
		url: url+'/'+id,
		type: 'GET',
		dataType: 'json',
	})
	.done(function(data) {
		$.each(data, function(index, val) {
			selected=(index==categorie_id)?'selected':'';
			$("select[name='categorie']").append("<option value='"+index+"' "+selected+">"+val+"</option>");
		});
	})
	.fail(function(error) {
		console.log("error");
		console.log(error.responseText);
	})
	.always(function() {
		console.log("complete");
	});
}
//---------------------------------------------------------
$("#form-product").keypress(function(event){

    if (event.keyCode === 10 || event.keyCode === 13) 
        event.preventDefault();

  });

//-----------------------------------------------------------------------------------------------
if($("#form-product").length){
	subCategories($("select[name='mastercategories']")); 

	var citynames = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  prefetch: {
	    url: 'http://'+window.location.hostname+'/tags',
	    filter: function(list) {
	      return $.map(list, function(cityname) {
	        return { name: cityname }; });
	    }
	  }
	});


	citynames.initialize();

	$("input[name='tags']").tagsinput({
	  typeaheadjs: {
	    name: 'tags',
	    displayKey: 'name',
	    valueKey: 'name',
	    source: citynames.ttAdapter()
	  }
	});

}


$("#form-product").on('change', "select[name='mastercategories']", function(event) {
	event.preventDefault();
	subCategories(this); 	
	return false;
});

$("#form-product").on('click', '.open', function(event) {
	event.preventDefault();
	$(this).siblings("input[name='images[]']").trigger('click');
});

$("#form-product").on('click', '.close', function(event) {
	event.preventDefault();
	$(this).parents(".panel").remove();
});

$("#form-product").on('change', "input[name='images[]']", function(event) {
	event.preventDefault();

	var ele=this;
	var child="<div class='panel panel-default'>"+$(this).parents(".panel").html()+"</div>";
		$(this).parents(".panel").parent().prepend(child);	
		
		var reader= new FileReader();
		reader.onload=function(e)
		{
			$(ele).siblings('.btn-warning').removeClass('hidden');
			$(ele).parent().parent().prev().append("<img class='img-thumbnail center-block' src='"+e.target.result+"'>");
		}
		reader.readAsDataURL(this.files[0]);

	$(this).siblings('.btn-info').addClass('hidden');
	
});

//$('.carousel').carousel();

});



