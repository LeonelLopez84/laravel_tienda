{!! Form::open(["url"=>"/in_shopping_carts","method"=>"POST","class"=>"inline-block"])!!}
<input type="hidden" name="product_id" value="{{$product->id}}">
<input type="submit" name="submit" value="Agregar el carrito" class="btn btn-success">
{!! Form::close() !!}