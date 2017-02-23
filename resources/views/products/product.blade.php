
<div class="card product text-left">
	<h3><a href="{{url('/products/'.$product->id)}}">{{$product->title}}</a></h3>
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  
				<div class="carousel-inner" role="listbox">
					@foreach($product->Images as $k=>$img)
						    <div class="item {{($k==0)?'active':''}}">
						      <img src="{{url('products/images/'.$img->name)}}" alt="">
						    </div>
				  	@endforeach
			  	</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<ul class="list-unstyled">
				<li>{{$product->description}}</li>
				<li><strong>$ {{number_format($product->pricing)}}</strong></li>
				<li>
					<ol class="breadcrumb">
						<li><a href="{{url('/categories/'.$product->Categorie->upCategorie->id)}}">{{$product->Categorie->upCategorie->name}}</a></li>
							<li><a href="{{url('/categories/'.$product->Categorie->id)}}">{{$product->Categorie->name}}</a></li>
						</ol>								
				</li>
			</ul>
			<p>@include("in_shopping_carts.form",["product"=>$product])</p>
		</div> 
		
	</div>
</div>