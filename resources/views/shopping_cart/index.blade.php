@extends("layouts.app")

@section("content")
<div class="big-padding text-center blue-grey white-text">
	<h1>Tu carrito de compras</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-sm-12 col-md-12 col-lg-12">
				<table class="table">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Precio</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
							<tr>
								<td>{{$product->title}}</td>
								<td>{{$product->pricing}}</td>
							</tr>
						@endforeach
						<tr>
							<td>Total</td>
							<td>{{$total}}</td>
						</tr>
					</tbody>
				</table>
		</div>
	</div>
</div>
@endsection