
			<div class="card product text-left">
				<h3>{{$product->title}}</h3>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						@if($product->extension)
						<img src="{{url("/products/images/{$product->id}.{$product->extension}")}}" class="img-thumbnail">
						@endif
					</div>
					<div class="col-xs-12 col-sm-6">
						<p><strong>Descripción</strong></p>
						<p>{{$product->description}}</p>
						<p>@include("in_shopping_carts.form",["product"=>$product])</p>
					</div> 
					
				</div>
			</div>