{{Form::open(["url"=>"/in_shopping_carts/".$product->pivot->id,"method"=>"DELETE"])}}
<input type="hidden" name="product_id" value="">
	<button type="submit" name="submit" value="Eliminar" class="btn btn-warning" title="quit from shopping cart"><i class="fa fa-times"></i></button>
{{ Form::close() }}