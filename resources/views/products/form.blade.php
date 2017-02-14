{{ Form::open(['url'=>$url,'method'=>$method,'files'=>true]) }}
			
<div class="form-group">
	{{ Form::text('title',$product->title,['class'=>'form-control','placeholdr'=>'Titulo']) }}
</div>
<div class="form-group">
	{{ Form::number('pricing',$product->pricing,['class'=>'form-control','placeholder'=>'Precio del producto']) }}
</div>

<div class="">
{{Form::file('cover')}}		
</div>

<div class="form-group">
	{{ Form::textarea('description',$product->description,['class'=>'form-control','placeholder'=>'Describe del producto']) }}
</div>

<div class="form-group text-right">
	<a class="btn btn-default" href="{{url('/products')}}">Regresar</a>
	<input  class="btn btn-success" type="submit"  value="Guardar"></div>
	{{ Form::close() }}