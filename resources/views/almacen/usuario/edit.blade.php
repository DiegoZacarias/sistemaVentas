@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usuario: {{ $usuario->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($usuario,['method'=>'PATCH','route'=>['almacen.usuario.update',$usuario->id_usuario]])!!}
            {{Form::token()}}
              <div class="form-group">
            	<label for="id_usuario">ID</label>
            	<input type="text" name="id_usuario" class="form-control" value="{{$usuario->id_usuario}}" placeholder="ID...">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$usuario->nombre}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="pass">Contraseña</label>
            	<input type="text" name="pass" class="form-control" value="{{$usuario->pass}}" placeholder="Contraseña...">
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