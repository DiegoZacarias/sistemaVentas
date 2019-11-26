@extends ('layouts.app')
@section ('content')

<div class="container">
<div class="row">
	<div class="col-md-12">
		<h2 lass="page-header">Listado de Compras</h2>

	<!--	<a href="compra/create"><button class="btn btn-success">Nuevo</button></a>  -->
		<a class="btn btn-default btn-lg btn-block" href="{{url('compras/compra/create')}}">Nueva Compra</a>

		@if (Session::has('mensaje'))

			<p class="alert alert-success">{{ Session::get('mensaje') }}</p>
		@endif
		@include('compras.compra.search')
	

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Fecha de Compra</th>
					<th class="text-center">Condicion</th>
					<th class="text-right">Total de Compra</th>
					
					<th class="text-center">Opciones</th>
				</thead>
               @foreach ($compras as $com)
				<tr>
					<td>{{ $com->id_compra}}</td>
					<td>{{ $com->fecha_compra}}</td>
					<td class="text-center">{{ $com->condicion}}</td>
					<td class="text-right">$ {{ $com->total_compra}}</td>
					
					<td colspan="2" style="text-align:center;">
						<a href="{{URL::action('CompraController@edit',$com->id_compra)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$com->id_compra}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('compras.compra.modal')
				@endforeach
			<a class="btn btn-success btn-block btn-xs" href="{{ url('compras/compra/pdf') }}">
                                <i class="fa fa-file-pdf-o"></i> Descargar
                            </a>
			</table>




		</div>
		{{$compras->render()}}	
	</div>
	
</div>
</div>
</div>
</div>

@endsection