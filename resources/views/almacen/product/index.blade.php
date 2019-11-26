@extends ('layouts.app')
@section ('content')

<div class="container">
<div class="row">
	
		<div class="col-md-12">
		<h2 class="page-header">Listado de Productos</h2>

	<!--	<a href="product/create"><button class="btn btn-success">Nuevo</button></a>	-->

		 <a class="btn btn-default btn-lg btn-block" href="{{url('almacen/product/create')}}">Nuevo articulo</a>

		@if (Session::has('mensaje'))

			<p class="alert alert-success">{{ Session::get('mensaje') }}</p>
		@endif
		@include('almacen.product.search')
	



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th class="text-right">Precio</th>
					<th class="text-right">Creado</th>
					<th class="text-right">Actualizado</th>
					<th class="text-center">Opciones</th>
				</thead>
               @foreach ($products as $pro)
				<tr>
					<td>{{ $pro->id}}</td>
					<td>{{ $pro->name}}</td>
					<td class="text-right">$ {{ $pro->price}}</td>
					<td class="text-right">{{ $pro->created_at}}</td>
					<td class="text-right">{{ $pro->updated_at}}</td>
					<td colspan="2" style="text-align:center;">
						<a href="{{URL::action('ProductController@edit',$pro->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$pro->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.product.modal')
				@endforeach
			</table>
							<a href="" data-toggle="modal"><button class="btn btn-success">Descargar Excel</button></a>
		
			
		</div>
							
		{{$products->render()}}
	</div>
</div> 
</div> 
</div> 
</div> 

@endsection