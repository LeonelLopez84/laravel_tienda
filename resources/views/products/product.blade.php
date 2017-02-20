
			<div class="card product text-left">
				<h3><a href="{{url('/products/'.$product->id)}}">{{$product->title}}</a></h3>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						@if($product->extension)
						<a href="{{url('/products/'.$product->id)}}">
							<img src="{{url("/products/images/{$product->id}.{$product->extension}")}}" class="img-thumbnail">
						</a>
						@endif
					</div>
					<div class="col-xs-12 col-sm-6">
						<p><strong>Descripción</strong></p>
						<p>{{$product->description}}</p>
						<p><strong>$ {{number_format($product->pricing)}}</strong></p>
						<p>@include("in_shopping_carts.form",["product"=>$product])</p>
					</div> 
					
				</div>
			</div>