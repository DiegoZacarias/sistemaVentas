@extends ('layouts.app')
@section ('content')
<div class="container">
<div class="row">
	<div class="col-md-12">
		<h2 class="page-header">Lista de Ventas  </h2>

<a class="btn btn-default btn-lg btn-block" href="{{url('ventas/venta/create')}}">Nueva Venta</a>



		@if (Session::has('mensaje'))

			<p class="alert alert-success">{{ Session::get('mensaje') }}</p>
		@endif
		@include('ventas.venta.search')
	

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Fecha de Venta</th>
					<th class="text-center">Condicion</th>
					<th class="text-right">Total de Venta</th>
					
					<th class="text-right">Id de Cliente</th>
					<th class="text-center">Opciones</th>
				</thead>
               @foreach ($ventas as $ven)
				<tr>
					<td>{{ $ven->id_venta}}</td>
					<td>{{ $ven->fecha_venta}}</td>
					<td class="text-center">{{ $ven->condicion_venta}}</td>
					<td class="text-right">$ {{ $ven->total_venta}}</td>
					
					<td class="text-right">{{ $ven->cliente}}</td>
					
					<td colspan="2" style="text-align:center;">
						<a href="{{URL::action('VentaController@edit',$ven->id_venta)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$ven->id_venta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('ventas.venta.modal')
				@endforeach
			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>
</div>
</div>
</div>

@endsection