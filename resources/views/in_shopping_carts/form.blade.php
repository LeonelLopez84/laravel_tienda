{{Form::open(["url"=>"/in_shopping_carts","method"=>"POST","class"=>"inline-block add-to-cart"])}}
<input type="hidden" name="product_id" value="{{$product->id}}">
<input type="submit" name="submit" value="Agregar" class="btn btn-info">
{{ Form::close() }}