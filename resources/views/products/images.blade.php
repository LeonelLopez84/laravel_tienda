@foreach($images as $img)
		<div class="panel panel-default">
		  	<div class="panel-body">
		    	<div class="row" >
					<div class="col-sm-8 col-md-8 container-img ">
							<img class="img-thumbnail center-block" src="{{url("/products/images/$img->name")}}">				
					</div>
					<div class="col-sm-4 col-md-4 text-right">
						<div class="btn-group" role="group" aria-label="...">
						    <button type="button" name="image" value="{{$img->id}}" class="btn btn-warning"><i class="fa fa-close "></i></button>
						</div>
							
					</div>
				</div>
		  	</div>
		</div>
@endforeach