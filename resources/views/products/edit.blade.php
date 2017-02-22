@extends("layouts.app")

@section("content")
	<div class="container-fluid white">

		<h1>Editar Producto</h1>
		<div class="row">
			<div class="col-sm-12 col-md-12">
				@include('products.form',['product'=>$product,'categories'=>$categories,'tags'=>$tags,'selected'=>$product->Categorie->upCategorie->id,'url'=>'/products/'.$product->id,'method'=>'PUT'])
			</div>
		</div>
	</div>

@endsection