@extends ('layouts.admin')
@section ('contenido')

<style>
    .boton {
        padding:20px;
        background:#502121;
        color:white;
        font:bold 10px/10px verdana;
        width:100px;
        cursor:pointer;
        cursor:hand;
        text-align:center;
    }
    
    .boton1 {
        position:absolute;
        left: 15%;
        
    }
    
    .boton2 {
        position:absolute;
        left: 25%;
        
    }
    
</style>

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@if (Session::has('mensaje'))

			<p class="alert alert-success">{{ Session::get('mensaje') }}</p>
		@endif
		@include('ventas.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clientes as $cli)
				<tr>
					<td>{{ $cli->id_cliente}}</td>
					<td>{{ $cli->nombre}}</td>
					<td>{{ $cli->apellido}}</td>
					<td>{{ $cli->direccion}}</td>
					<td>{{ $cli->telefono}}</td>
					<td>
						<a href="{{URL::action('ClienteController@edit',$cli->id_cliente)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cli->id_cliente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('ventas.cliente.modal')
				@endforeach
			</table>

		</div>
		{{$clientes->render()}} 
	</div>
</div>

@endsection