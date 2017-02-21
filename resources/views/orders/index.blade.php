@extends("layouts.app")
@section("content")
<div class="container-fluid">
<div class="row">
	<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Dashboard</h3>
		</div>
		<div class="panel-body">
			<h3>Estadisticas</h3>
			<div class="row">
				<div class="col-xs-4 col-m-3 col-lg-2 sale-data"> 
					<span>{{$totalMonth}} USD</span>
					Ingresos del mes
				</div>
				<div class="col-xs-4 col-m-3 col-lg-2 sale-data"> 
					<span>{{$totalMonthCount}}</span>
					No. de ventas
				</div>
			</div>
			<h3>Ventas</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID Venta</th>
						<th>Comprador</th>
						<th>Dirección</th>
						<th>No. Guia</th>
						<th>Estatus</th>
						<th>Fecha Venta</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($orders as $order)
					<tr>
						<td>{{$order->id}}</td>
						<td>{{$order->recipient_name}}</td>
						<td>{{$order->address()}}</td>
						<td><a href="#" 
							data-type="text" 
							data-pk-="{{$order->id}}" 
							data-url="{{url("/orders/$order->id")}}"
							data-title="Número de guia"
							data-value="{{$order->guide_nummber}}"
							name="guide_number"
							id="guide_number"
							data-name="guide_number"
							class="editable set-guide-number">
								{{$order->guide_number}}
							</a>
						</td>
						<td><a href="#" 
							data-type="select" 
							data-pk-="{{$order->id}}" 
							data-url="{{url("/orders/$order->id")}}"
							data-title="status"
							data-value="{{$order->status}}"
							data-name="status"
							id="status"
							name="status"
							class="editable select-status">
								{{$order->status}}
							</a></td>
						<td>{{$order->created_at}}</td>
						<td>Acciones</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	</div>
	</div>
</div>

@endsection