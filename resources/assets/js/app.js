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
		$("#simpleCart_quantity").html(data.products_count);
	
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
		$("#simpleCart_quantity").removeClass('highlight');
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

$("#form-product").on('click','.btn-info', function(event) {
	$(this).siblings("input[name='image']").trigger('click');
});

$("#form-product").on('change',"input[name='image']", function(event) {
        var ele=$(this);
        var reader= new FileReader();
        reader.onload=function(e)
        {
            ele.parent().parent().parent().siblings('.container-img').append("<img class='img-thumbnail center-block' src='"+e.target.result+"'>");
        }
        reader.readAsDataURL(this.files[0]);
});

//-----------------------------------------------------------------
$("#form-product").on('submit', "#new-image", function(event) {
        event.preventDefault();

        var form=$(this);

        var panel=form.parents(".panel").html();

        var formData=new FormData(this);

        $.ajax({
            cache:false,
            processData: false,
            contentType: false,
            url:form.attr('action'),
            type:form.attr('method'),
            dataType: 'json',
            data: formData
        })
        .done(function(data) {
            	console.log("success");
            console.log(data);
            	form.find(".btn-info, .btn-success").addClass('hidden');
            	form.find(".btn-warning").removeClass("hidden").val(data.id);
           	var panels = form.parents(".panel").parent();
           	    panels.append("<div class='panel panel-default'>"+panel+"</div>");
                panels.find(".panel:last").find('.img-thumbnail').remove();

        })
        .fail(function(error) {
            console.log("error");
            console.log(error.responseText);
        })
        .always(function() {
            console.log("complete");
        });
	});
//---------------------------------------------------------
$("#form-product").on('click', ".btn-warning", function(event) {
	event.preventDefault();

		var form=$("#new-image");
		var id=$(this).val();
		var panel=$(this).parents(".panel");

		$.ajax({
			url:form.attr('action')+'/'+id,
			type: 'DELETE',
			headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")},
			dataType: 'json'
		})
		.done(function(data) {
			console.log("success");
			console.log(data);
			if(data.id > 0){
				panel.remove();
			}
		})
		.fail(function(error) {
			console.log("error");
			console.log(error.responseText);
		})
		.always(function() {
			console.log("complete");
		});
		return false;
	
	});
	

});



