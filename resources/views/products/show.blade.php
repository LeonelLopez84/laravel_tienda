@extends('layouts.app')

@section('content')

		<div class="container text-center">
			<div class="card product text-left">
				<h1>{{$product->title}}</h1>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						@if($product->extension)
						<img src="{{url("/products/images/{$product->id}.{$product->extension}")}}" class="img-thumbnail">
						@endif
					</div>
					<div class="col-xs-12 col-sm-6">
						<p><strong>Descripción</strong></p>
						<p>{{$product->description}}</p>
						<p>@include("in_shopping_carts.form",["product"=>$product])</p>
					</div>
					
				</div>
			</div>
		</div>

@endsection