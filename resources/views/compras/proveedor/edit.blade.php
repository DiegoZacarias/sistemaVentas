@extends ('layouts.app')
@section ('content')
	<div class="container">
  <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Proveedor: {{ $proveedor->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($proveedor,['method'=>'PATCH','route'=>['compras.proveedor.update',$proveedor->id_proveedor]])!!}
            {{Form::token()}}
              <div class="form-group">
                  <label for="id_proveedor">ID</label>
                  <input type="text" name="id_proveedor" class="form-control" value="{{$proveedor->id_proveedor}}">
            </div>
            <div class="form-group">
                  <label for="descri_proveedor">Descripcion</label>
                  <input type="text" name="descri_proveedor" class="form-control" value="{{$proveedor->descri_proveedor}}">
            </div>
             <div class="form-group">
                  <label for="direccion_prov">Direccion</label>
                  <input type="text" name="direccion_prov" class="form-control" value="{{$proveedor->direccion_prov}}">
            </div>
             <div class="form-group">
                  <label for="telefono_prov">Telefono</label>
                  <input type="text" name="telefono_prov" class="form-control" value="{{$proveedor->telefono_prov}}">
            </div>
            
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <!--<button class="btn btn-danger" type="reset">Cancelar</button>-->
                  <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
  </div>
@endsection