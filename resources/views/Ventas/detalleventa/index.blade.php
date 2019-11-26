@extends ('layouts.app')
@section ('content')
<div class="container">
<div class="row">
	<div class="col-md-12">
		<h2 class="page-header">Lista de Detalles de ventas  </h2>
<a class="btn btn-default btn-lg btn-block" href="{{url('ventas/detalleventa/create')}}">Nuevo Detalle Venta</a>

		@if (Session::has('mensaje'))

			<p class="alert alert-success">{{ Session::get('mensaje') }}</p>
		@endif
		@include('ventas.detalleventa.search')
	

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id Detalle Venta</th>
					<th>Id Venta</th>
					<th>Id Producto</th>
					<th class="text-right">Cantidad</th>
					<th class="text-right">Precio Unitario</th>
					<th class="text-right">Subtotal</th>
					<th class="text-center">Opciones</th>
				</thead>
               @foreach ($detalleventas as $dv)
				<tr>
					<td>{{ $dv->id_detalle_venta}}</td>
					<td>{{ $dv->venta}}</td>
					<td>{{ $dv->producto}}</td>
					<td class="text-right">{{ $dv->cantidad}}</td>
					<td class="text-right">{{ $dv->precio_unitario}}</td>
					<td class="text-right">{{ $dv->subtotal}}</td>
					
					<td colspan="2" style="text-align:center;">
						<a href="{{URL::action('DetalleVentaController@edit',$dv->id_detalle_venta)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$dv->id_detalle_venta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('ventas.detalleventa.modal')
				@endforeach
			</table>
		</div>
		{{$detalleventas->render()}}
	</div>
</div>
</div>
</div>
</div>
@endsection