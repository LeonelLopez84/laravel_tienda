@extends("layouts.app")

@section("content")
<div class="big-padding text-center blue-grey white-text">
	<h1>Tu carrito de compras</h1>
</div>

<div class="container" id="list-carrito">
	<div class="row">
		<div class="col-sm-12 col-sm-12 col-md-12 col-lg-12">
				<table class="table">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Producto</th>
							<th>Precio</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($products as $product)
						<tr>
						<td><a href="{{url('/products/'.$product->id)}}">
								<img src="{{url("/products/images/{$product->id}.{$product->extension}")}}" class="img-thumbnail">
							</a>
						</td>
						<td><a href="{{url('/products/'.$product->id)}}">
								{{$product->title}}
							</a>
						</td>
						<td>{{$product->pricing}}</td>	
						<td>@include("in_shopping_carts.delete")</td>	
						</tr>
					@endforeach
					<tr>
						<td colspan="3" align="right">
							<strong>Total</strong>
						</td>
						<td>
							<strong>{{$total}}</strong>
						</td>
					</tr>
					</tbody>
				</table>

		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-sm-12 col-md-12 col-lg-12">
			@include("shopping_cart.form")
		</div>
	</div>
</div>
@endsection