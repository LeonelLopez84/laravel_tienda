{{ Form::open(['url'=>$url,'method'=>$method,'files'=>true,'id'=>"form-product"]) }}	
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<div class="form-group" >
			<label class="control-label">Nombre:</label>
				{{ Form::text('title',$product->title,['class'=>'form-control','placeholdr'=>'Nombre']) }}
		</div>
		<div class="form-group">
			<label class="control-label">Precio:</label>
				{{ Form::number('pricing',$product->pricing,['class'=>'form-control','placeholder'=>'Precio del producto']) }}
		</div>


		<div class="form-group">
			<label class="control-label">Descripción:</label>
				{{ Form::textarea('description',$product->description,['class'=>'form-control','placeholder'=>'Describe del producto']) }}
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label">Categoria:</label>
						{{ Form::select('mastercategories',$categories,$selected,['class'=>'form-control','url'=>url('/categories')]) }}
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label">Sub Categoria:</label>
					<select name='categorie' id="{{$product->categorie_id}}" class="form-control">
					</select>
				</div>
			</div>
		</div>


		<div class="form-group">
			<label class=" control-label">Tags:</label>
			<input name="tags" class="form-control typeahead" type="text"  placeholder="Tags"  data-role="tagsinput"  value="{{$tags}}">
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6" id="images">

		<div class="panel panel-default">
		  	<div class="panel-body">
		    	<div class="row" >
					<div class="col-sm-10 col-md-10 container-img">
						@if($product->extension)
							<img class="img-thumbnail center-block" src="{{url("/products/images/{$product->id}.{$product->extension}")}}">				
						@endif
					</div>
					<div class="col-sm-2 col-md-2 text-right">
						<div class="btn-group" role="group" aria-label="...">
							<button type="button" class="btn btn-info open"><i class="fa fa-folder-open"></i></button>
						    <button type="button" class="btn btn-warning hidden"><i class="fa fa-close "></i></button>
						   {{ Form::file('images[]',['class'=>'hidden']) }}
						</div>
							
					</div>
				</div>
		  	</div>
		</div>

	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="form-group text-right">
 		<div class="col-sm-12">
			<a class="btn btn-default" href="{{url('/products')}}">Regresar</a>
			<input  class="btn btn-success" type="submit"  value="Guardar"></div>
		</div>
	</div>
</div>
	{{ Form::close() }}