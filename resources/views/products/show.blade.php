@extends('layouts.app')

@section('content') 

	<div class="container text-center">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				@include("products.product",["products"=>$product])
			</div>
		</div>
	</div>

@endsection