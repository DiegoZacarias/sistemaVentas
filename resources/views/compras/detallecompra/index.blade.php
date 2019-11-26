@extends ('layouts.app')
@section ('content')
<div class="container">
<div class="row">
	<div class="col-md-12">
		<h2 class="page-header">Lista de Detalle Compras </h2>

		 <a class="btn btn-default btn-lg btn-block" href="{{url('compras/detallecompra/create')}}">Nuevo Detalle Compra</a>

		@if (Session::has('mensaje'))

			<p class="alert alert-success">{{ Session::get('mensaje') }}</p>
		@endif
		@include('compras.detallecompra.search')
	

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id Detalle Compra</th>
					<th>Id Compra</th>
					<th>Id Producto</th>
					<th class="text-right">Cantidad</th>
					<th class="text-right">Precio Unitario</th>
					<th class="text-right">Subtotal</th>
					<th class="text-center">Opciones</th>
				</thead>
               @foreach ($detallecompras as $dc)
				<tr>
					<td>{{ $dc->id_detalle}}</td>
					<td>{{ $dc->compra}}</td>
					<td>{{ $dc->producto}}</td>
					<td class="text-right">{{ $dc->cantidad}}</td>
					<td class="text-right">$ {{ $dc->precio_unitario}}</td>
					<td class="text-right">$ {{ $dc->subtotal}}</td>
					
					<td colspan="2" style="text-align:center;">
						<a href="{{URL::action('DetalleCompraController@edit',$dc->id_detalle)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$dc->id_detalle}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('compras.detallecompra.modal')
				@endforeach
			</table>
		</div>
		{{$detallecompras->render()}}
	</div>
</div>
</div>
</div>
</div>
@endsection