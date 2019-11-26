@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $cliente->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($cliente,['method'=>'PATCH','route'=>['ventas.cliente.update',$cliente->id_cliente]])!!}
            {{Form::token()}}
              <div class="form-group">
                  <label for="id_cliente">ID</label>
                  <input type="text" name="id_cliente" class="form-control" value="{{$cliente->id_cliente}}">
            </div>
            <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="{{$cliente->nombre}}">
            </div>
             <div class="form-group">
                  <label for="apellido">Apellido</label>
                  <input type="text" name="apellido" class="form-control" value="{{$cliente->apellido}}">
            </div>
             <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input type="text" name="direccion" class="form-control" value="{{$cliente->direccion}}">
            </div>
            <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input type="text" name="telefono" class="form-control" value="{{$cliente->telefono}}">
            </div>
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <!--<button class="btn btn-danger" type="reset">Cancelar</button>-->
                  <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection