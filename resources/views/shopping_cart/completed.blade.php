@extends("layouts.app")

@section("content")

<header class="big-padding text-center blue-grey white-text">
	<h1>Compra completada</h1>
</header>

<div class="container-fluid" id="order">
	<div class="card large-padding">
		<h3>Tu pago fue procesado <span class="{{$order->status}}">{{$order->status}}</span></h3>
		<p>Corrobora los detalles de tu envio:</p>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				Name
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
			{{$order->recipient_name}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				Correo
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
			{{$order->email}}
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				Dirección
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
			{{$order->address()}}
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				CP
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
			{{$order->postal_code}}
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				Ciudad
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
			{{$order->city}}
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				Estado y Pais 
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
			{{ "$order->state $order->contry_code"}}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<a href="{{url('/compras/'.$shopping_cart->customid)}}">Link permanete de tu compra</a>
			</div>
		</div>

	</div>
</div>
@endsection