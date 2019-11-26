@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Articulos <a href="producto/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@if (Session::has('mensaje'))

			<p class="alert alert-success">{{ Session::get('mensaje') }}</p>
		@endif
		@include('almacen.producto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripcion</th>
					<th>Cantidad existente</th>
					<th>Precio de Compra</th>
					<th>Precio de Venta</th>
					<th>Id de Proveedor</th>
					<th>Opciones</th>
				</thead>
               @foreach ($productos as $art)
				<tr>
					<td>{{ $art->id_producto}}</td>
					<td>{{ $art->descri_producto}}</td>
					<td>{{ $art->cantidad_existencia}}</td>
					<td>$ {{ $art->precio_compra}}</td>
					<td>$ {{ $art->precio_venta}}</td>
					<td>{{ $art->proveedor}}</td>
					
					<td>
						<a href="{{URL::action('ProductoController@edit',$art->id_producto)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$art->id_producto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.producto.modal')
				@endforeach
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>

@endsection