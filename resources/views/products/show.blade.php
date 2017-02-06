@extends('layouts.app')

@section('content')

		<div class="container text-center">
			<div class="card product text-left">
				<h1>{{$product->title}}</h1>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						
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