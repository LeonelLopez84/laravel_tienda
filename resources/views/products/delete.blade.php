{{Form::open(['url'=>'/products/'.$product->id,'method'=>'DELETE','class'=>'inline-block'])}}
<input class="btn btn-warning" type="submit" class="btn btn-link red-text no-padding no-margin" value="Eliminar">
{{Form::close()}}