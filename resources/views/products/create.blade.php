@extends("layouts.app")

@section("content")
	<div class="container white">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<h1>Nuevo Producto</h1>
				@include('products.form',['product'=>$product,'categories'=>$categories,'tags'=>'','selected'=>0,'url'=>'/products','method'=>'POST'])
			</div>
		</div>
	</div>

@endsection