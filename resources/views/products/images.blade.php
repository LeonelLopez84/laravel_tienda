@foreach($images as $img)
		<div class="panel panel-default">
		  	<div class="panel-body">
		    	<div class="row" >
					<div class="col-sm-10 col-md-10 container-img ">
							<img class="img-thumbnail center-block" src="{{url("/products/images/$img->name")}}">				
					</div>
					<div class="col-sm-2 col-md-2 text-right">
						<div class="btn-group" role="group" aria-label="...">
						    <button type="button" name="image" value="{{$img->id}}" class="btn btn-warning"><i class="fa fa-close "></i></button>
						</div>
							
					</div>
				</div>
		  	</div>
		</div>
@endforeach