@extends ('layouts.app')
@section ('content')
<div class="container">
<div class="row">
	<div class="col-md-12">
		<h2 class="page-header">Listado de Proveedores</h2>

		<a class="btn btn-default btn-lg btn-block" href="{{url('compras/proveedor/create')}}">Nuevo Proveedor</a>

		@if (Session::has('mensaje'))

			<p class="alert alert-success">{{ Session::get('mensaje') }}</p>
		@endif
		@include('compras.proveedor.search')
	

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripcion</th>
					<th class="text-right">Direccion</th>
					<th class="text-right">Telefono</th>
					
					<th class="text-center">Opciones</th>
				</thead>
               @foreach ($proveedores as $pro)
				<tr>
					<td>{{ $pro->id_proveedor}}</td>
					<td>{{ $pro->descri_proveedor}}</td>
					<td class="text-right">{{ $pro->direccion_prov}}</td>
					<td class="text-right">{{ $pro->telefono_prov}}</td>
					
					<td colspan="2" style="text-align:center;">
						<a href="{{URL::action('ProveedorController@edit',$pro->id_proveedor)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$pro->id_proveedor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('compras.proveedor.modal')
				@endforeach
			</table>
		</div>
		{{$proveedores->render()}}
	</div>
</div>
</div>
</div>
</div>
@endsection