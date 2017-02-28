<div class="row" id="form-product">
	<div class="col-xs-12 col-sm-6 col-md-6">
	{{ Form::open(['url'=>$url,'method'=>$method]) }}	
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

		<div class="form-group text-right">
			<a class="btn btn-default" href="{{url('/products')}}">Productos</a>
			<input  class="btn btn-success" type="submit"  value="Guardar">
		</div>
		{{ Form::close() }}
	</div>


	<div class="col-xs-12 col-sm-6 col-md-6" id="images">
	@include("products.images",['images'=>$product->Images])
		<div class="panel panel-default">
		  	<div class="panel-body">
		    	<div class="row" >
					<div class="col-sm-8 col-md-8 container-img">
						
					</div>
					<div class="col-sm-4 col-md-4	 text-right">
						{{ Form::open(['url'=>'/images','files'=>true,'method'=>'POST','id'=>'new-image']) }}
							<div class="btn-group" role="group" aria-label="...">				
								<button type="button" class="btn btn-info <?php echo (empty($product->title))?'disabled':''; ?>" ><i class="fa fa-folder-open"></i></button>
								<button type="button" class="btn btn-warning hidden" value="0"><i class="fa fa-close "></i></button>
								<button type="submit" class="btn btn-success"><i class="fa fa-upload "></i></button>
							 
							   {{ Form::file('image',['class'=>'hidden']) }}
							   {{ Form::hidden('product_id',$product->id) }}
							</div>	
						{{ Form::close() }}
					</div>
				</div>
		  	</div>
		</div>		
			
	</div>
</div>
	