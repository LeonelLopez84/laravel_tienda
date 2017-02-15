@extends('layouts.app')

@section('title','Productos')

@section('content')
<div class="container"> 
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<h1>Bienvenidos</h1>
		</div>
	</div>
	<div class="text-center products-center">
		<div class="row">
			@foreach($products as $product)		
				<div class="col-sm-12 col-md-6 col-lg-4">
					@include("products.product",["product"=>$product])
				</div>
			@endforeach
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 text-center products-center">
			{{$products->links()}}
		</div>
	</div>
</div>
@endsection
