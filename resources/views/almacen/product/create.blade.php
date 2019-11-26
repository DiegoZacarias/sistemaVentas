@extends ('layouts.app')
@section ('content')
	<div class="container">
      <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'almacen/product','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="id">ID</label>
            	<input type="text" name="id" class="form-control" placeholder="ID...">
            </div>
            <div class="form-group">
            	<label for="name">Nombre</label>
            	<input type="text" name="name" class="form-control" placeholder="Nombre...">
            </div>
             <div class="form-group">
                  <label for="price">Precio</label>
                  <input type="text" name="price" class="form-control" placeholder="Precio...">
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