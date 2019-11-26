@extends ('layouts.app')
@section ('content')
<div class="container">
<div class="row">
	<div class="col-md-12">
		<h2 class="page-header">Listado de Clientes </h2>

		<a class="btn btn-default btn-lg btn-block" href="{{url('ventas/client/create')}}">Nuevo Cliente</a>

		@if (Session::has('mensaje'))

			<p class="alert alert-success">{{ Session::get('mensaje') }}</p>
		@endif
		@include('ventas.client.search')
	

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th class="text-right">Ruc</th>
					<th class="text-right">Direccion</th>
					<th class="text-right">Creado</th>
					<th class="text-right">Actualizado</th>
					<th class="text-center">Opciones</th>
				</thead>
               @foreach ($clients as $cli)
				<tr>
					<td>{{ $cli->id}}</td>
					<td>{{ $cli->name}}</td>
					<td class="text-right">{{ $cli->ruc}}</td>
					<td class="text-right">{{ $cli->address}}</td>
					<td class="text-right">{{ $cli->created_at}}</td>
					<td class="text-right">{{ $cli->updated_at}}</td>
					<td colspan="2" style="text-align:center;">
						<a href="{{URL::action('ClientController@edit',$cli->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cli->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('ventas.client.modal')
				@endforeach
			</table>
		</div>
		{{$clients->render()}}
	</div>
</div>
</div>
</div>
</div>
@endsection