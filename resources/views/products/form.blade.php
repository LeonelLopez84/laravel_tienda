{{ Form::open(['url'=>$url,'method'=>$method,'files'=>true,'class'=>"form-horizontal",'id'=>"form-product"]) }}		
<div class="form-group" >
	<label class="col-sm-2 control-label">Nombre:</label>
    <div class="col-sm-10">
		{{ Form::text('title',$product->title,['class'=>'form-control','placeholdr'=>'Nombre']) }}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Precio:</label>
    <div class="col-sm-10">
		{{ Form::number('pricing',$product->pricing,['class'=>'form-control','placeholder'=>'Precio del producto']) }}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Portada:</label>
    <div class="col-sm-5">
		{{Form::file('cover')}}
	</div>
	<div class="col-sm-5">
	@if($product->extension)
		<img class="img-thumbnail" src="{{url("/products/images/{$product->id}.{$product->extension}")}}">
	@endif
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Descripción:</label>
    <div class="col-sm-10">
		{{ Form::textarea('description',$product->description,['class'=>'form-control','placeholder'=>'Describe del producto']) }}
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label class="col-sm-4 control-label">Categoria:</label>
		    <div class="col-sm-8">
				{{ Form::select('mastercategories',$categories,$selected,['class'=>'form-control','url'=>url('/categories')]) }}
		   
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label class="col-sm-4 control-label">Sub Categoria:</label>
		    <div class="col-sm-8">
				<select name='categorie' id="{{$product->categorie_id}}" class="form-control">

				</select>
			</div>
		</div>
	</div>
</div>

<div class="form-group text-right">
 <div class="col-sm-12">
	<a class="btn btn-default" href="{{url('/products')}}">Regresar</a>
	<input  class="btn btn-success" type="submit"  value="Guardar"></div>
</div>
	{{ Form::close() }}