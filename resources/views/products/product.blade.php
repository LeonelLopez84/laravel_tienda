<div class="panel panel-default">
	<div class="panel-heading">
		<a class="panel-title" href="{{url('/products/'.$product->id)}}">{{$product->title}}</a>
	</div>
	<div class="panel-body">

		@foreach($product->Images as $k=>$img)
		    <img class="img-thumbnail" src="{{url('products/images/'.$img->name)}}" alt="">
		@break
		@endforeach
		<strong>$ {{number_format($product->pricing)}}</strong>
	</div>
	<div class="panel-footer">
		@include("in_shopping_carts.form",["product"=>$product])
	</div>
</div>
