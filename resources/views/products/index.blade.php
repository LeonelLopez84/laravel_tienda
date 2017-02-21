@extends("layouts.app")

@section("content")
	<div class="container-fluid" id="list-products">
		<div class="big-padding text-center blue-grey white-text">
			<h1>Productos</h1>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<table class="table table-bordered">
				<thead>
					<tr>

						<th>ID</th>
						<th>Titulo</th>
						<th>Imagen</th>
						<th>Descripción</th>
						<th>Precio</th>
						<th>Categoría</th>
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
						<td>{{$product->Categorie->upCategorie->name}}
							<br>{{$product->Categorie->name}}</td>
						<td><a class="btn btn-info" href="{{url("products/{$product->id}/edit")}}">
							<i class="fa fa-pencil"></i></a>
						
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
		</div>
	</div>

@endsection