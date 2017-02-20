@extends("layouts.app")

@section("content")
	<div class="big-padding text-center blue-grey white-text">
		<h1>Productos</h1>
	</div>
	<div class="container" id="list-products">
		<table class="table table-bordered">
		<thead>
			<tr>

				<th>ID</th>
				<th>Titulo</th>
				<th>Imagen</th>
				<th>Descripción</th>

				<th>Precio</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		@foreach($productos as $product)
			<tr>
				
				<td>{{$product->id}}</td>
				<td><a href="{{url('/products/'.$product->id)}}">{{$product->title}}</a></td>
				<td>
					@if($product->extension)
						<img src="{{url("/products/images/{$product->id}.{$product->extension}")}}" class="img-thumbnail">
					@endif
				</td>
				<td>{{$product->description}}</td>
				<td>{{$product->pricing}}</td>
				<td><a class="btn btn-primary" href="{{url("products/{$product->id}/edit")}}">Edit</a>
					@include('products.delete')
				</td>
			</tr>
		@endforeach			
		</tbody>
		</table>
		<div class="floating">		
			<a class="btn btn-primary" href="{{url('/products/create')}}">
				<i class="material-icons"></i>Add
			</a>
		</div>
	</div>

@endsection